<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "includes.php";

$GLOBALS['conn'] = $conn;

//blood of sargeras price
$bloodPrice = bloodPrice($conn);

//Getting the time of the last update
$last_updated_unix_row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(id), realm FROM status"));
$last_updated = $last_updated_unix_row["realm"];

// AH data
$auctionCount = number_format(mysqli_fetch_row(mysqli_query($conn, "SELECT count(auc) FROM auctions"))[0], 0, ',', ' ');
$itemCount = number_format(mysqli_fetch_row(mysqli_query($conn, "SELECT sum(quantity) FROM auctions"))[0], 0, ',', ' ');
$totalValue = number_format(mysqli_fetch_row(mysqli_query($conn, "SELECT sum(buyout)/100 FROM auctions"))[0], 2);
$distinctItemCount = number_format(mysqli_fetch_row(mysqli_query($conn, "SELECT count(DISTINCT item) FROM auctions"))[0], 0, ',', ' ');
$sellerCount = number_format(mysqli_fetch_row(mysqli_query($conn, "SELECT count(DISTINCT owner) FROM auctions"))[0], 0, ',', ' ');
?>







<?php include "inc/header.inc.php"; ?>


  <div class="text-center">

    <h1>Welcome to Goblineer!</h1>
  
  </div>

	<hr>
	<div class="col-xs-12 text-center">

		<p>Goblineer is a website where you can find out plenty of information about the World of Warcraft auction house, like Market Value, Historical price, and crafting profits!</p>
	
		<hr>

		<p>
			There are currently <b><?php echo $distinctItemCount; ?></b> different items by <b><?php echo $sellerCount; ?></b> different sellers on the Auction House
			with the total value of <b><?php echo $totalValue; ?><span class='gold-g'>g</span></b>.<br>
			These <b><?php echo $auctionCount; ?></b> auctions have a total of <b><?php echo $itemCount; ?></b> items.
		</p>

		<hr>
		
		<p class="text-left">
			<?php echo "<span id='lastUpdate' style='display: none;'>".$last_updated."</span>"; ?>
			Last Updated: <span id='updated'></span>

			<a href="#update-collapse" data-toggle="collapse" >?</a><br>
			<div id="update-collapse" class="collapse">
				The Blizzard API updates around every 30-40 minutes.<br>
				Check the API status here: <a href="https://does.theapi.work/">https://does.theapi.work/</a>
			</div>
		</p>


		<hr>

		<h2 class="text-left">
			<a href="bfa">Battle for Azeroth Material Price List</a>
		</h2>

		<hr>

		<h2 class="text-left">
			<a href='//wowhead.com/item=124124' class='q3 iconmedium1 links' rel='item=124124' class="text-center"></a>
			:
			<?php echo $bloodPrice; ?><span class='gold-g'>g </span>
			<a href='/blood' class="btn btn-default links">See Blood of Sargeras Price in-depth</a>
		</h2>


		<?php 
			// echo $auctionCount ."<br>"; 
			// echo $itemCount ."<br>"; 
			// echo $totalValue ."<br>"; 
			// echo $distinctItemCount ."<br>"; 
			// echo $sellerCount ."<br>"; 
		?>
	</div>
	


<script defer type="text/javascript" src="/js/last_updated.js"></script>

<?php include "inc/footer.inc.php"; ?>
