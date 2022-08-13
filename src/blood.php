<?php
include_once(__DIR__ . "/includes.php");
global $conn;
?>

<?php include "inc/header.inc.php"; ?>


<h2><a href='https://wowhead.com/item=124124' class='q3 iconmedium1 links' rel='item=124124' class="text-center align-center"></a></h2>
<table class="table table-striped table-hover table-mats align-center">
   <thead>
      <tr>
         <td></td>
         <td>Item:</td>
         <td>Blood Value:</td>
         <td>Market Value:</td>
      </tr>
   </thead>
   <tbody>
      <?php
         $result = bloodPrices();
			while($row = mysqli_fetch_assoc($result)){
			   echo "
			   <tr>
			      <td align='right'>".$row['quantity']."</td>
			      <td><a href='./item.php?item=".$row['item']."' class='q3 links' rel='item=".$row['item']."'></td>
               <td align='right'>".number_format($row['unit_price'], 2)."<span class='gold-g'>g</span></td>
			      <td align='right'>".number_format($row['marketvalue'], 2)."<span class='gold-g'>g</span></td>
			   </tr>";
			}
      ?>
   </tbody>
</table>

<?php include "inc/footer.inc.php"; ?>
