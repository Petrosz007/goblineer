<?php
include 'includes.php';

if(isset($_GET['seller']) && $_GET['seller'] != ""){
   $seller = $_GET['seller'];


}
?>

<?php include "inc/header.inc.php"; ?>
<div class="seller-search">
   <form method="GET" action="" class="form">
      <div class="input-group">
         <input class="form-control" name="seller" placeholder="Seller's name here ..." value="<?php if(isset($_GET['seller'])) { echo htmlspecialchars($_GET['seller']); } ?>">
         <span class="input-group-btn">
            <input type="submit" class="btn btn-default" value="Search">
         </span>
      </div>
   </form>
   <br>
</div>

<?php
if(isset($seller)){
   echo "
   <div class='table-responsive'>
      <table class='table table-striped table-hover align-center'>
         <caption><h3>Seller: ".$seller."</h3></caption>
         <thead>
            <tr>
               <td>Stack</td>
               <td>Item</td>
               <td>$/1</td>
               <td>Buyout</td>
               <td>Stack count</td>
               <td>Total items</td>
            </tr>
         </thead>
         <tbody>
      ";
      $stmt = $conn->prepare("SELECT item, owner, buyout, quantity, (buyout / quantity) AS unit_price
                              FROM auctions
                              WHERE owner=?
                              ORDER BY unit_price DESC");
      $stmt->bind_param("s", $seller);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($item, $owner, $buyout, $quantity, $unit_price);

      $old_row = array('buyout' => '', 'quantity' => '', 'item' => '');
      $counter = 1;
      while ($stmt->fetch()) {
         if(!($buyout == $old_row['buyout'] && $quantity == $old_row['quantity'] && $item == $old_row['item'])){

            echo "<tr>
            <td>".$quantity."</td>
            <td><a href='item.php?item=".$item."' class='q3 links' rel='item=".$item."'></td>
            <td>".number_format($unit_price/100, 2) . "<span class='gold-g'>g</span></td>
            <td>".number_format($buyout/100, 2) . "<span class='gold-g'>g</span></td>
            <td>".$counter."</td>
            <td>".$counter*$quantity."</td>
            </tr>";

            $counter = 1;

         } else {
            $counter++;
         }

         $old_row = array('buyout' => $buyout, 'quantity' => $quantity, 'item' => $item);
      }

      $stmt->close();

      echo"
         </tbody>
         </table>
      </div>";
}
?>
<?php include "inc/footer.inc.php"; ?>