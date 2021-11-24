<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "dbh.php";

$item = $_GET["item"];

include "includes.php";

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


<h2><a id="item-name" href='//wowhead.com/item=<?php echo $item;?>' class='q3 iconmedium1 links' rel='item=<?php echo $item;?>' class="text-center"></a></h2>
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
            $stmt = $conn->prepare("SELECT owner, buyout, quantity, (buyout / quantity) AS unit_price
                                    FROM auctions
                                    WHERE item=?
                                    ORDER BY unit_price ASC");

            $stmt->bind_param("s", $item);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($owner, $buyout, $quantity, $unit_price);

            $old_row = array("owner" => "", "buyout" => "", "quantity" => "");
            $counter = 1;
            while ($stmt->fetch()) {
                if(!($owner == $old_row["owner"] && $buyout == $old_row["buyout"] && $quantity == $old_row["quantity"])){

                    echo "<tr>
                    <td><a href='/seller?seller=".$owner."' class='q3 links'>".$owner."</a></td>
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

                $old_row = array("owner" => $owner, "buyout" => $buyout, "quantity" => $quantity);
            }

            $stmt->close();
            ?>
        </tbody>
    </table>
</div>



            
            
            </div><!-- Main center column -->
            <div class="col-md-3 col-sm-1 col-xs-0">
            </div>
        </div><!-- Row end -->

        <div class="row">
            <footer class="text-center col-xs-12" id="footer">
                <p>Copyright Goblineer © 2017 - <?php echo date("Y"); ?>. All Rights Reserved.
                World of Warcraft © is a registered trademark of Blizzard Entertainment, Inc.
                Goblineer is not associated with or endorsed by Blizzard Entertainment, Inc.</p>
            </footer>
        </div>

        
        <div id="offline-notification" style="display: none;">
                    <div style="padding: 5px;">
                        <div id="inner-message" class="alert alert-danger" role="alert">
                            
                            You appear to be offline right now. Data will not be updated until you go online and refresh the page.
                        </div>
                    </div>
                </div>
            </div>
        
      

      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous"></script>
      <script defer src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script defer src="https://cdn.anychart.com/releases/8.3.0/js/anychart-bundle.min.js" type="text/javascript"></script>
      <script defer type="text/javascript" src="/js/candlestick.js"></script>
      <script defer type="text/javascript" src="/js/last_updated.js"></script>
      <script async type="text/javascript" src="/js/typeahead.js"></script>
      <script defer type="text/javascript" src="/js/offline.js"></script>
      <script defer type="text/javascript" src="/js/lightbox-plus-jquery.min.js"></script>
   </body>
</html>

<?php $conn->close(); ?>

