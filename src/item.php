<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$item = $_GET["item"];

include_once(__DIR__ . "/includes.php");
global $conn;

if(isset($item)){
    if(!is_numeric($item)){
        $stmt = $conn->prepare("SELECT item FROM items WHERE name=?");
        $stmt->bind_param("s", $item);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($item);
        $stmt->fetch();
        $stmt->close();
    }

    $stmt = $conn->prepare("select marketvalue, quantity, date from ( SELECT marketvalue, quantity, date FROM historical WHERE item=? ORDER BY date DESC LIMIT 800 ) as tmp order by tmp.date asc");//"SELECT marketvalue, quantity, date FROM historical WHERE item=".$item. " ORDER BY date ASC, marketvalue, quantity";
    $stmt->bind_param("s", $item);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($marketvalue, $quantity, $date);

    $historicalArrayMv = array();
    $historicalArrayQuantity = array();
    $historicalArrayDate = array();

    while($stmt->fetch()){
        $historicalArrayMv[] = floatval($marketvalue);
        $historicalArrayQuantity[] = intval($quantity);
        $historicalArrayDate[] = $date;
    }

    $stmt->close();
}

?>

<?php include "inc/header.inc.php"; ?>


<h2><a href='//wowhead.com/item=<?php echo $item;?>' class='q3 iconmedium1 links' rel='item=<?php echo $item;?>' class="text-center"></a></h2>
<p>
   <h4>Lowest Price: <?php echo number_format(item($item), 2);?><span class='gold-g'>g</span></h4>
   <h4>Market Value: <?php echo number_format(marketValue($item), 2); ?><span class='gold-g'>g</span></h4>
   <h4>Available: <?php echo item_q($item);?></h4>
<p>

<div id="JSON-mv" style="display:none;"><?php echo json_encode($historicalArrayMv); ?></div>
<div id="JSON-quantity" style="display:none;"><?php echo json_encode($historicalArrayQuantity); ?></div>
<div id="JSON-date" style="display:none;"><?php echo json_encode($historicalArrayDate); ?></div>
<!--<canvas id="myChart" width="400" height="200"></canvas>-->
<div id="chart" style="width:100%; height:400px;"></div>
<div id="chart_candlestick" style="width:100%; height:400px;"></div>

<div class='table-responsive'>
    <table class="table table-striped table-hover align-center">
        <thead>
            <tr>
                <td>$/1</td>
                <td>Buyout</td>
                <td>Stack size</td>
                <td>Stack count</td>
                <td>Total items</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $conn->prepare("SELECT buyout AS unit_price, quantity, (buyout * quantity) AS buyout
                                    FROM auctions
                                    WHERE item=?
                                    ORDER BY unit_price ASC");

            $stmt->bind_param("s", $item);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($unit_price, $quantity, $buyout);

            $old_row = array("buyout" => "", "quantity" => "");
            $counter = 1;
            while ($stmt->fetch()) {
                if(!($buyout == $old_row["buyout"] && $quantity == $old_row["quantity"])){

                    echo "<tr>
                    <td>".number_format($unit_price/100, 2) . "<span class='gold-g'>g</span></td>
                    <td>".number_format($buyout/100, 2) . "<span class='gold-g'>g</span></td>
                    <td>".$quantity."</td>
                    <td>".$counter."</td>
                    <td>".$counter * $quantity."</td>
                    </tr>";

                    $counter = 1;

                } else {
                    $counter++;
                }

                $old_row = array("buyout" => $buyout, "quantity" => $quantity);
            }

            $stmt->close();
            ?>
        </tbody>
    </table>
</div>

<script defer src="https://cdn.anychart.com/releases/8.3.0/js/anychart-bundle.min.js" type="text/javascript"></script>
<script defer type="text/javascript" src="./js/chart.js"></script>
<script defer type="text/javascript" src="./js/candlestick.js"></script>
<?php include "inc/footer.inc.php"; ?>
