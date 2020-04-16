<?php

function marketValueArray($item, $conn) {
    $stmt = $conn->prepare("SELECT owner, buyout, quantity, (buyout / quantity) AS unit_price
                            FROM auctions
                            WHERE item=?
                            ORDER BY unit_price ASC");
    $stmt->bind_param("s", $item);
    $stmt->execute();
    $result2 = $stmt->get_result();
    
    $stmt2 = $conn->prepare("SELECT sum(quantity) as quantity FROM auctions where item=?");
    $stmt2->bind_param("s", $item);
    $stmt2->execute();
    $quantitySum = $stmt2->get_result();

    if(mysqli_num_rows($result2) == 0){
        return 0;
        exit();
    } elseif (mysqli_num_rows($result2) == 1){
        $marketValue = number_format(mysqli_fetch_assoc($result2)['unit_price']/100, 2,".","");
        return array('item' => $item, 'marketValue' => $marketValue,'quantity' => $quantitySum);
        exit();
    }

    $marketArray = array();
    $marketValueArray = array();

    //Puts each unit_price into the marketArray (if quantity = 100 it will put the unit_price in 100 times)
    while ($row2 = mysqli_fetch_assoc($result2)) {
        for($i = 0; $i < $row2['quantity']; $i++){
        array_push($marketArray, number_format($row2['unit_price']/100, 2,".",""));
        }
    }

    //After it is through 15% of the auctions, any increase of 20% or more in price from one auction to the next will trigger the algorithm to throw out that auction and any above it. It will consider at most the lowest 30% of the auctions.
    if(count($marketArray) < 4){
        for($i = ceil(count($marketArray)*0.15); $i <= count($marketArray); $i++){
        if($i ==  count($marketArray)){
            $marketValueArray = array_slice($marketArray, 0, $i);
        } elseif($marketArray[$i-1]*1.30 >= $marketArray[$i]) {
            $marketValueArray = array_slice($marketArray, 0, $i);
        }
        }
    } else {
        for($i = ceil(count($marketArray)*0.15); $i <= ceil(count($marketArray)*0.30); $i++){
        if($i ==  ceil(count($marketArray)*0.30)){
            $marketValueArray = array_slice($marketArray, 0, $i);
        } elseif($marketArray[$i]*1.30 >= $marketArray[$i+1]) {
            $marketValueArray = array_slice($marketArray, 0, $i);
        }
        }
    }


    if (count($marketValueArray) == 1){
        $marketValue = number_format($marketValueArray[0], 2,".","");
        return array('item' => $item, 'marketValue' => $marketValue,'quantity' => $quantitySum);
        exit();
    }

    //Calculations
    $standardDeviation = stats_standard_deviation($marketValueArray);
    $marketValueArrayAverage = array_sum($marketValueArray) / count($marketValueArray);
    $devBreakLow = $marketValueArrayAverage - $standardDeviation*1.5;
    $devBreakHigh = $marketValueArrayAverage + $standardDeviation*1.5;


    //Throws out data with is lower/higher than the average +- standard deviation * 1.5
    for($i = 0; $i < count($marketValueArray); $i++){
        if($marketValueArray[$i] < $devBreakLow || $marketValueArray[$i] > $devBreakHigh){
        unset($marketValueArray[$i]);
        }
    }

    //Gets the market value of the item
    $marketValue = number_format(array_sum($marketValueArray) / count($marketValueArray), 2,".","");


    $stmt->close();
    $stmt2->close();
    return array('item' => $item, 'marketValue' => $marketValue, 'quantity' => $quantitySum);
}



function marketValue($item, $conn) {
    $stmt = $conn->prepare("SELECT marketvalue FROM marketvalue WHERE item=?");
    $stmt->bind_param("s", $item);
    $stmt->execute();
    $result = $stmt->get_result();

    if(mysqli_num_rows($result) > 0 || mysqli_fetch_assoc($result)['marketvalue'] != 0){
        return mysqli_fetch_assoc($result)['marketvalue'];

    } else {
        $stmt2 = $conn->prepare("SELECT owner, buyout, quantity, (buyout / quantity) AS unit_price
                                FROM auctions
                                WHERE item=?
                                ORDER BY unit_price ASC");
        $stmt2->bind_param("s", $item);
        $stmt2->execute();
        $result2 = $stmt2->get_result();

        $stmt3 = $conn->prepare("SELECT sum(quantity) as quantity FROM auctions where item=?");
        $stmt3->bind_param("s", $item);
        $stmt3->execute();
        $quantitySum = mysqli_fetch_assoc($stmt3->get_result())['quantity'];


        if(mysqli_num_rows($result2) == 0){
            return 0;
            exit();
        } elseif (mysqli_num_rows($result2) == 1){
            $marketValue = number_format(mysqli_fetch_assoc($result2)['unit_price']/100, 2,".","");

            $stmt4 = $conn->prepare("INSERT INTO marketvalue (item, marketvalue, quantity) VALUES (?, ?, ?)");
            $stmt4->bind_param("sss", $item, $marketValue, $quantitySum);
            $stmt4->execute();

            return $marketValue;
            exit();
        }

        $marketArray = array();
        $marketValueArray = array();

        //Puts each unit_price into the marketArray (if quantity = 100 it will put the unit_price in 100 times)
        while ($row2 = mysqli_fetch_assoc($result2)) {
            for($i = 0; $i < $row2['quantity']; $i++){
            array_push($marketArray, number_format($row2['unit_price']/100, 2,".",""));
            }
        }

        $marketArrayCount = count($marketArray);
        //After it is through 15% of the auctions, any increase of 20% or more in price from one auction to the next will trigger the algorithm to throw out that auction and any above it. It will consider at most the lowest 30% of the auctions.
        if($marketArrayCount < 4){
            for($i = ceil($marketArrayCount*0.15); $i <= $marketArrayCount; $i++){
                if($i ==  $marketArrayCount){
                    $marketValueArray = array_slice($marketArray, 0, $i);
                } elseif($marketArray[$i-1]*1.30 >= $marketArray[$i]) {
                    $marketValueArray = array_slice($marketArray, 0, $i);
                }
            }
        } else {
            // If the differance between the 15% and 30% value is less than 30% it will not count step by step, it will get the average of the cheapest 30%
            if($marketArray[ceil($marketArrayCount*0.15)] / $marketArray[ceil($marketArrayCount*0.30)] >= 0.7) {
                $marketValueArray = array_slice($marketArray, 0, ceil($marketArrayCount*0.30));
            } elseif($marketArray[ceil($marketArrayCount*0.15)] / $marketArray[ceil($marketArrayCount*0.25)] >= 0.7) {
                $marketValueArray = stepBystepArrayCheck(ceil($marketArrayCount*0.25), ceil($marketArrayCount*0.30), $marketArray);
            } elseif($marketArray[ceil($marketArrayCount*0.15)] / $marketArray[ceil($marketArrayCount*0.20)] >= 0.7) {
                $marketValueArray = stepBystepArrayCheck(ceil($marketArrayCount*0.20), ceil($marketArrayCount*0.30), $marketArray);
            } else {
                $marketValueArray = stepBystepArrayCheck(ceil($marketArrayCount*0.15), ceil($marketArrayCount*0.30), $marketArray);
            }
        }


        if (count($marketValueArray) == 1){
            $marketValue = number_format($marketValueArray[0], 2,".","");

            $stmt4 = $conn->prepare("INSERT INTO marketvalue (item, marketvalue, quantity) VALUES (?, ?, ?)");
            $stmt4->bind_param("sss", $item, $marketValue, $quantitySum);
            $stmt4->execute();

            return $marketValue;
            exit();
        }

        //Calculations
        $standardDeviation = stats_standard_deviation($marketValueArray);
        $marketValueArrayAverage = array_sum($marketValueArray) / count($marketValueArray);
        $devBreakLow = $marketValueArrayAverage - $standardDeviation*1.5;
        $devBreakHigh = $marketValueArrayAverage + $standardDeviation*1.5;


        //Throws out data with is lower/higher than the average +- standard deviation * 1.5
        for($i = 0; $i < count($marketValueArray); $i++){
            if($marketValueArray[$i] < $devBreakLow || $marketValueArray[$i] > $devBreakHigh){
            unset($marketValueArray[$i]);
            }
        }

        //Gets the market value of the item
        $marketValue = number_format(array_sum($marketValueArray) / count($marketValueArray), 2,".","");

        $stmt4 = $conn->prepare("INSERT INTO marketvalue (item, marketvalue, quantity) VALUES (?, ?, ?)");
        $stmt4->bind_param("sss", $item, $marketValue, $quantitySum);
        $stmt4->execute();

        $stmt->close();
        $stmt2->close();
        $stmt3->close();
        $stmt4->close();

        return $marketValue;
    }
}

function stepBystepArrayCheck($startingPoint, $maxPoint, $marketArray) {
    $marketValueArray = array();

    for($i = $startingPoint, $max = $maxPoint; $i <= $max; $i++){
        if($i == $max){
            $marketValueArray = array_slice($marketArray, 0, $i);
        } elseif($marketArray[$i]*1.30 >= $marketArray[$i+1]) {
            $marketValueArray = array_slice($marketArray, 0, $i);
        }
    }

    return $marketValueArray;
}

/*function marketValueAll($conn){
    $sql = "SELECT DISTINCT item FROM auctions";
    $result = mysqli_query($conn, $sql);


    $mvSql = "INSERT INTO marketvalue (item, marketvalue, quantity) VALUES ";

    $counter = 0;
    $i = 0;
    while($row = mysqli_fetch_assoc($result)){
        $mvSql = $mvSql . marketValue($row['item'], $conn, 'sqlResponse');

        ++$i;
        ++$counter;
        if($i == 100) {
            $mvSql = substr($mvSql, 0, -1);
            $mvSql = $mvSql .";";
            mysqli_query($conn, $mvSql);
            echo $counter." completed.". PHP_EOL;
            $mvSql = "INSERT INTO marketvalue (item, marketvalue, quantity) VALUES ";
            $i = 0;
        }
        
    }

    if($i > 0){
        $mvSql = substr($mvSql, 0, -1);
        $mvSql = $mvSql .";";
        mysqli_query($conn, $mvSql);
        echo $counter." completed.". PHP_EOL;
    }

}*/


if (!function_exists('stats_standard_deviation')) {
    /**
     * This user-land implementation follows the implementation quite strictly;
     * it does not attempt to improve the code or algorithm in any way. It will
     * raise a warning if you have fewer than 2 values in your array, just like
     * the extension does (although as an E_USER_WARNING, not E_WARNING).
     *
     * @param array $a
     * @param bool $sample [optional] Defaults to false
     * @return float|bool The standard deviation or false on error.
     */
    function stats_standard_deviation(array $a, $sample = false) {
        $n = count($a);
        if ($n === 0) {
            trigger_error('The array has zero elements', E_USER_WARNING);
            return false;
        }
        if ($sample && $n === 1) {
            trigger_error('The array has only 1 element', E_USER_WARNING);
            return false;
        }
        $mean = array_sum($a) / $n;
        $carry = 0.0;
        foreach ($a as $val) {
            $d = ((double) $val) - $mean;
            $carry += $d * $d;
        };
        if ($sample) {
           --$n;
        }
        return sqrt($carry / $n);
    }
}
?>
