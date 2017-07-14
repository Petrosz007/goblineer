<?php
include "dbh.php";

$item = $_GET["item"];



include "inc/marketvalue.inc.php";
include "inc/item.inc.php";


?>

<?php include "inc/header.inc.php"; ?>


<div class="col-md-3 col-sm-2 col-xs-1">
</div>

<div class="col-md-6 col-sm-8 col-xs-10">
   <a href='index.php' class="btn btn-default btn-primary">Back to the Home Page</a><br>



   <h2><a href='//wowhead.com/item=<?php echo $item;?>' class='q3 iconmedium1' rel='item=<?php echo $item;?>' class="text-center"></a></h2>
   <p>
      <h4>Lowest Price: <?php echo number_format(item($item, $conn), 2);?><span class='gold-g'>g</span></h4>
      <h4>Market Value: <?php echo number_format(marketValue($item, $conn), 2); ?><span class='gold-g'>g</span></h4>
   <p>
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

<div class="col-md-3 col-sm-2 col-xs-1">
</div>

<?php include "inc/footer.inc.php"; ?>
