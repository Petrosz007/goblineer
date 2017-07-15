<?php
include "includes.php";
?>

<?php include "inc/header.inc.php"; ?>


<div class="col-md-3 col-sm-2 col-xs-1">
</div>

<div class="col-md-6 col-sm-8 col-xs-10">
   <a href='index.php' class="btn btn-default btn-primary">Back to the Home Page</a><br>



   <h2><a href='//wowhead.com/item=124124' class='q3 iconmedium1' rel='item=124124' class="text-center align-center"></a></h2>
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
            $result = bloodPrices($conn);
   			while($row = mysqli_fetch_assoc($result)){
   			   echo "
   			   <tr>
   			      <td align='right'>".$row['quantity']."</td>
   			      <td><a href='item.php?item=".$row['item']."' class='q3' rel='item=".$row['item']."'></td>
                  <td align='right'>".number_format($row['unit_price'], 2)."<span class='gold-g'>g</span></td>
   			      <td align='right'>".number_format($row['marketvalue'], 2)."<span class='gold-g'>g</span></td>
   			   </tr>";
   			}
         ?>
      </tbody>
   </table>

</div>

<div class="col-md-3 col-sm-2 col-xs-1">
</div>

<?php include "inc/footer.inc.php"; ?>