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
         <input class="form-control" name="seller" placeholder="Check undercuts for ..." value="<?php if(isset($_GET['seller'])) { echo htmlspecialchars($_GET['seller']); } ?>">
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
         <caption><h3>Checking undercuts for: ".$seller."</h3></caption>
         <thead>
            <tr>
               <td>Stack</td>
               <td>Item</td>
               <td>$/1</td>
               <td>Buyout</td>
               <td>Stack count</td>
               <td>Total items</td>
               <td>Status</td>
            </tr>
         </thead>
         <tbody>
      ";
      $sql =  "SELECT item, owner, buyout, quantity, (buyout / quantity) AS unit_price
               FROM auctions
               WHERE owner='".$seller."'
               ORDER BY unit_price DESC";

      $result = mysqli_query($conn, $sql);

      $old_row = array('owner' => '', 'buyout' => '', 'quantity' => '');
      $counter = 1;
      while ($row = mysqli_fetch_assoc($result)) {
         if(!($row['buyout'] == $old_row['buyout'] && $row['quantity'] == $old_row['quantity'] && $row['item'] == $old_row['item'])){

            $minPrice = number_format(item($row['item'],$conn), 2);
            $tableRow = "<td>".$row['quantity']."</td>
                         <td><a href='item.php?item=".$row['item']."' class='q3 links' rel='item=".$row['item']."'></td>
                         <td>".number_format($row['unit_price']/10000, 2) . "<span class='gold-g'>g</span></td>
                         <td>".number_format($row['buyout']/10000, 2) . "<span class='gold-g'>g</span></td>
                         <td>".$counter."</td>
                         <td>".$counter*$row['quantity']."</td>";

            if($minPrice == number_format($row['unit_price']/10000, 2)) {
                  $tableRow = "<tr class='warning'>" . $tableRow . "<td>Your auction is at the same price as someone else's.</td></tr>";
            } elseif($minPrice < number_format($row['unit_price']/10000, 2)) {
                  $tableRow = "<tr class='danger'>" . $tableRow . "<td>You have been undercut.</td></tr>";
            } else {
                  $tableRow = "<tr class='success'>". $tableRow . "<td>Your auction hasn't been undercut.</td></tr>";
            }

            echo $tableRow;

            $counter = 1;

         } else {
            $counter++;
         }

         $old_row = $row;
      }
      echo"
         </tbody>
         </table>
      </div>";
}
?>
<?php include "inc/footer.inc.php"; ?>