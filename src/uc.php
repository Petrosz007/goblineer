<?php
include 'includes.php';
global $conn;

if (isset($_GET['seller']) && $_GET['seller'] != "") {
      $seller = $_GET['seller'];
}
?>

<?php include "inc/header.inc.php"; ?>
<div class="seller-search">
   <form method="GET" action="" class="form">
      <div class="input-group">
         <input class="form-control" name="seller" placeholder="Check undercuts for ..." value="<?php if (isset($_GET['seller'])) {
                                                                                                      echo htmlspecialchars($_GET['seller']);
                                                                                                } ?>">
         <span class="input-group-btn">
            <input type="submit" class="btn btn-default" value="Search">
         </span>
      </div>
   </form>
   <br>
</div>

<?php
if (isset($seller)) {
      echo "
   <div class='table-responsive'>
      <table class='table table-striped table-hover align-center'>
         <caption><h3>Checking undercuts for: " . $seller . "</h3></caption>
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
            if (!($buyout == $old_row['buyout'] && $quantity == $old_row['quantity'] && $item == $old_row['item'])) {

                  $minPrice = number_format(item($item), 2);
                  $tableRow = "<td>" . $quantity . "</td>
                         <td><a href='item.php?item=" . $item . "' class='q3 links' rel='item=" . $item . "'></td>
                         <td>" . number_format($unit_price / 100, 2) . "<span class='gold-g'>g</span></td>
                         <td>" . number_format($buyout / 100, 2) . "<span class='gold-g'>g</span></td>
                         <td>" . $counter . "</td>
                         <td>" . $counter * $quantity . "</td>";

                  //TODO: $owner should be the owner of the min-priced item!
                  if ($minPrice == number_format($unit_price / 100, 2)) {
                        $tableRow = "<tr class='success'>" . $tableRow . "<td>Your auction hasn't been undercut.</td></tr>";
                        /*if($owner == $seller) {
                              $tableRow = "<tr class='success'>" . $tableRow . "<td>Your auction hasn't been undercut.</td></tr>";
                        } else {
                              $tableRow = "<tr class='warning'>" . $tableRow . "<td>Your auction is at the same price as someone else's.</td></tr>";
                        }*/
                  } elseif ($minPrice < number_format($unit_price / 100, 2)) {
                        $tableRow = "<tr class='danger'>" . $tableRow . "<td>You have been undercut.</td></tr>";
                        /*if($owner == $seller) {
                              $tableRow = "<tr class='info'>" . $tableRow . "<td>You have undercut yourself.</td></tr>";
                        } else {
                              $tableRow = "<tr class='danger'>" . $tableRow . "<td>You have been undercut.</td></tr>";
                        }*/
                  }

                  echo $tableRow;

                  $counter = 1;

            } else {
                  $counter++;
            }

            $old_row = array('buyout' => $buyout, 'quantity' => $quantity, 'item' => $item);
      }

      $stmt->close();

      echo "
         </tbody>
         </table>
      </div>";
}
?>
<?php include "inc/footer.inc.php"; ?>
