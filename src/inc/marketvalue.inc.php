<?php

function formatPrice(float $price): string
{
    return number_format($price, 2, ".", "");
}

function marketValue(string $item): string
{
    global $conn;

    $stmt = $conn->prepare("SELECT marketvalue FROM marketvalue WHERE item=?");
    $stmt->bind_param("s", $item);
    $stmt->execute();
    $result = $stmt->get_result();

    $count = $result->num_rows;
    $firstResult = $result->fetch_assoc();
    if ($count > 0 && $firstResult['marketvalue'] > 0) {
        return formatPrice((float)$firstResult['marketvalue']);
    }

    [$marketValue, $quantitySum] = calculateMarketValue($item);

    if ($quantitySum > 0) {
        $stmt4 = $conn->prepare("INSERT INTO marketvalue (item, marketvalue, quantity) VALUES (?, ?, ?)");
        $stmt4->bind_param("sss", $item, $marketValue, $quantitySum);
        $stmt4->execute();
    }

    return formatPrice($marketValue);
}

/**
 * @param string $item
 * @return array<int, float|int>
 */
function calculateMarketValue(string $item): array
{
    global $conn;

    $stmt2 = $conn->prepare("SELECT owner, buyout, quantity, buyout AS unit_price
                                FROM auctions
                                WHERE item=?
                                ORDER BY unit_price ASC");
    $stmt2->bind_param("s", $item);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    $stmt3 = $conn->prepare("SELECT sum(quantity) as quantity FROM auctions where item=?");
    $stmt3->bind_param("s", $item);
    $stmt3->execute();
    $quantitySum = (int)mysqli_fetch_assoc($stmt3->get_result())['quantity'];


    if (mysqli_num_rows($result2) == 0) {
        return [0.0, 0];
    }

    if (mysqli_num_rows($result2) == 1) {
        $marketValue = (float)$result2->fetch_assoc()['unit_price'] / 100;

        return [$marketValue, $quantitySum];
    }

    /** @var array|float[] $marketArray */
    $marketArray = array();
    /** @var array|float[] $marketValueArray */
    $marketValueArray = array();

    //Puts each unit_price into the marketArray (if quantity = 100 it will put the unit_price in 100 times)
    while ($row2 = mysqli_fetch_assoc($result2)) {
        for ($i = 0; $i < $row2['quantity']; $i++) {
            $marketArray[] = (float)$row2['unit_price'] / 100;
        }
    }

    $marketArrayCount = count($marketArray);

    $pIndex = function (float $percentage) use ($marketArrayCount) {
        return (int)ceil($marketArrayCount * $percentage);
    };

    // After it is through 15% of the auctions, any increase of 20% or more in price from one auction to the next
    // will trigger the algorithm to throw out that auction and any above it.
    // It will consider at most the lowest 30% of the auctions.
    if ($marketArrayCount < 4) {
        for ($i = $pIndex(0.15); $i <= $marketArrayCount; $i++) {
            if ($i == $marketArrayCount) {
                $marketValueArray = array_slice($marketArray, 0, $i);
            } elseif ($marketArray[$i - 1] * 1.30 >= $marketArray[$i]) {
                $marketValueArray = array_slice($marketArray, 0, $i);
            }
        }
    } else {
        // If the difference between the 15% and 30% value is less than 30% it will not count step by step,
        // it will get the average of the cheapest 30%
        if ($marketArray[$pIndex(0.15)] / $marketArray[$pIndex(0.30)] >= 0.7) {
            $marketValueArray = array_slice($marketArray, 0, $pIndex(0.30));
        } elseif ($marketArray[$pIndex(0.15)] / $marketArray[$pIndex(0.25)] >= 0.7) {
            $marketValueArray = stepBystepArrayCheck($pIndex(0.25), $pIndex(0.30), $marketArray);
        } elseif ($marketArray[$pIndex(0.15)] / $marketArray[$pIndex(0.20)] >= 0.7) {
            $marketValueArray = stepBystepArrayCheck($pIndex(0.20), $pIndex(0.30), $marketArray);
        } else {
            $marketValueArray = stepBystepArrayCheck($pIndex(0.15), $pIndex(0.30), $marketArray);
        }
    }


    if (count($marketValueArray) == 1) {
        $marketValue = $marketValueArray[0];

        return [$marketValue, $quantitySum];
    }

    // Calculations
    $standardDeviation = stats_standard_deviation($marketValueArray);
    $marketValueArrayAverage = array_sum($marketValueArray) / count($marketValueArray);
    $devBreakLow = $marketValueArrayAverage - $standardDeviation * 1.5;
    $devBreakHigh = $marketValueArrayAverage + $standardDeviation * 1.5;


    // Throws out data with is lower/higher than the average +- standard deviation * 1.5
    for ($i = 0; $i < count($marketValueArray); $i++) {
        if ($marketValueArray[$i] < $devBreakLow || $marketValueArray[$i] > $devBreakHigh) {
            unset($marketValueArray[$i]);
        }
    }

    // Gets the market value of the item
    $marketValue = (float)(array_sum($marketValueArray) / count($marketValueArray));

    return [$marketValue, $quantitySum];
}

/**
 * @param int $startingPoint
 * @param int $maxPoint
 * @param float[] $marketArray
 * @return float[]
 */
function stepBystepArrayCheck(int $startingPoint, int $maxPoint, array $marketArray): array
{
    $marketValueArray = array();

    for ($i = $startingPoint, $max = $maxPoint; $i <= $max; $i++) {
        if ($i == $max) {
            $marketValueArray = array_slice($marketArray, 0, $i);
        } elseif ($marketArray[$i] * 1.30 >= $marketArray[$i + 1]) {
            $marketValueArray = array_slice($marketArray, 0, $i);
        }
    }

    return $marketValueArray;
}

if (!function_exists('stats_standard_deviation')) {
    /**
     * This user-land implementation follows the implementation quite strictly;
     * it does not attempt to improve the code or algorithm in any way. It will
     * raise a warning if you have fewer than 2 values in your array, just like
     * the extension does (although as an E_USER_WARNING, not E_WARNING).
     *
     * @param float[] $array
     * @param bool $sample [optional] Defaults to false
     * @return float|bool The standard deviation or false on error.
     */
    function stats_standard_deviation(array $array, bool $sample = false): float|bool
    {
        $count = count($array);
        if ($count === 0) {
            trigger_error('The array has zero elements', E_USER_WARNING);
            return false;
        }
        if ($sample && $count === 1) {
            trigger_error('The array has only 1 element', E_USER_WARNING);
            return false;
        }
        $mean = array_sum($array) / $count;
        $carry = 0.0;
        foreach ($array as $val) {
            $double = ((double)$val) - $mean;
            $carry += $double * $double;
        }
        if ($sample) {
            --$count;
        }
        return sqrt($carry / $count);
    }
}
