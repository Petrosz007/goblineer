<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "includes.php";

$GLOBALS['conn'] = $conn;

//blood of sargeras price
$bloodPrice = bloodPrice($conn);

$last_updated_unix_row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(realm) FROM status"));
$last_updated_unix = $last_updated_unix_row["MAX(realm)"];
$last_updated = substr($last_updated_unix_row["MAX(realm)"], 0, -3);


?>







<?php include "inc/header.inc.php"; ?>


  <div class="text-center">

    <h1>Welcome to Goblineer!</h1>
  
  </div>

	<hr>
	<div class="col-xs-12 text-center">
		<div class="list-group col-md-8 col-xs-12">

			<p>Goblineer is a website where you can find out plenty of information about the World of Warcraft auction house, like Market Value, Historical price, and crafting profits!</p>
		
	  		<hr>

			<p class="text-left">
				<?php echo "<span id='lastUpdate' style='display: none;'>".$last_updated_unix."</span>"; ?>
				The Blizzard API updates around every 30-40 minutes.
				Last Updated: <span id='updated'></span>
			</p>

			<hr>

			<p class="text-left">
				<a href='//wowhead.com/item=124124' class='q3 iconmedium1 links' rel='item=124124' class="text-center"></a>
				:
				<?php echo $bloodPrice; ?><span class='gold-g'>g </span>
				<a href='/blood' class="btn btn-default links">See Blood of Sargeras Price in-depth</a>
			</p>


		</div>
		<div class="list-group col-md-4 col-xs-12">
			<h3 class="text-left">Categories</h3>
			
			<div class="list-group">
				<a href="/categories/alchemy" class="list-group-item">Alchemy</a>
				<a href="/categories/enchanting" class="list-group-item">Enchanting</a>
				<a href="/categories/inscription" class="list-group-item">Inscription</a>
			</div>
			  
			<div class="list-group">
				<a href="#" class="list-group-item">Herbalism</a>
				<a href="#" class="list-group-item">Mining</a>
				<a href="#" class="list-group-item">Skinning</a>
			</div>

			<div class="list-group">
				<a href="#" class="list-group-item">Blacksmithing</a>
				<a href="#" class="list-group-item">Leatherworking</a>
				<a href="#" class="list-group-item">Tailoring</a>
			</div>

			<div class="list-group">
				<a href="#" class="list-group-item">Jewelcrafting</a>
				<a href="#" class="list-group-item">Engineering</a>
				<a href="#" class="list-group-item">Cooking</a>
			</div>
			
		</div>
		<!--<div class="list-group col-md-4 col-xs-1"></div>-->
	</div>
	

    

<?php include "inc/footer.inc.php"; ?>
