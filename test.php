<?php
include 'inc/header.inc.php';
include 'inc/bloodprice.inc.php';



//echo bloodPrice($conn);

?>

<table class="table table-striped table-hover table-mats align-center">
	<caption class="text-center">Other mats<caption>
	<thead>
		<tr>
			<th class="tg-9nbt">Quantity:</th>
			<th class="tg-9right">Item:</th>
			<th class="tg-9right">Market Value:</th>
		<tr>
	</thead>
	<tbody>
		<?	$result = bloodPrices($conn);
			while($row = mysqli_fetch_assoc($result)){
			   echo "
			   <tr>
			      <td align='right'>".$row['quantity']."</td>
			      <td><a href='item.php?item=".$row['item']."' class='q3' rel='item=".$row['item']."'></td>
			      <td align='right'>".number_format($row['marketvalue'], 2)."<span class='gold-g'>g</span></td>
			   </tr>";
			} ?>
	</tbody>
</table>

<?php include 'inc/footer.inc.php'?>
