<?php
include "dbh.php";

$item = $_GET["item"];

include "includes.php";

if(isset($item)){
    if(!is_numeric($item)){
        $sql = "SELECT item FROM items WHERE name='".$item."'";
        $result = mysqli_query($conn, $sql);
        $item = mysqli_fetch_assoc($result)['item'];
    }

    $historicalSql = "SELECT marketvalue, quantity, date FROM historical WHERE item=".$item. " ORDER BY date ASC, marketvalue, quantity";
    $historicalResult = mysqli_query($conn, $historicalSql);

    $historicalArrayMv = array();
    $historicalArrayQuantity = array();
    $historicalArrayDate = array();
    while($row = mysqli_fetch_assoc($historicalResult)){
        $historicalArrayMv[] = floatval($row['marketvalue']);
        $historicalArrayQuantity[] = intval($row['quantity']);
        $historicalArrayDate[] = $row['date'];
    }
}

?>

<?php include "inc/header.inc.php"; ?>


<h2><a href='//wowhead.com/item=<?php echo $item;?>' class='q3 iconmedium1 links' rel='item=<?php echo $item;?>' class="text-center"></a></h2>
<p>
   <h4>Lowest Price: <?php echo number_format(item($item, $conn), 2);?><span class='gold-g'>g</span></h4>
   <h4>Market Value: <?php echo number_format(marketValue($item, $conn), 2); ?><span class='gold-g'>g</span></h4>
   <h4>Available: <?php echo item_q($item, $conn);?></h4>
<p>

<div id="JSON-mv" style="display:none;"><?php echo json_encode($historicalArrayMv); ?></div>
<div id="JSON-quantity" style="display:none;"><?php echo json_encode($historicalArrayQuantity); ?></div>
<div id="JSON-date" style="display:none;"><?php echo json_encode($historicalArrayDate); ?></div>
<!--<canvas id="myChart" width="400" height="200"></canvas>-->
<div id="chart" style="width:100%; height:400px;"></div>

<div class='table-responsive'>
    <table class="table table-striped table-hover align-center">
        <thead>
            <tr>
                <td>Seller</td>
                <td>$/1</td>
                <td>Buyout</td>
                <td>Stack size</td>
                <td>Stack count</td>
                <td>Total items</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql =  "SELECT owner, buyout, quantity, (buyout / quantity) AS unit_price
                    FROM auctions
                    WHERE item=".$item."
                    ORDER BY unit_price ASC";

            $result = mysqli_query($conn, $sql);

            $old_row = array("owner" => "", "buyout" => "", "quantity" => "");
            $counter = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                if(!($row["owner"] == $old_row["owner"] && $row["buyout"] == $old_row["buyout"] && $row["quantity"] == $old_row["quantity"])){

                    echo "<tr>
                    <td>".$row['owner']."</td>
                    <td>".number_format($row['unit_price']/10000, 2) . "<span class='gold-g'>g</span></td>
                    <td>".number_format($row['buyout']/10000, 2) . "<span class='gold-g'>g</span></td>
                    <td>".$row['quantity']."</td>
                    <td>".$counter."</td>
                    <td>".$counter*$row['quantity']."</td>
                    </tr>";

                    $counter = 1;

                } else {
                    $counter++;
                }

                $old_row = $row;
            }
            ?>
        </tbody>
    </table>
</div>

<?php include "inc/footer.inc.php"; ?>
