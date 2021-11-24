<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . "/includes.php");

$fiendish = item_array([
    "Fiendish Spaulders" => 151578,
    "Fiendish Shoulderguards" => 151577,
], $conn);

$warhide = item_array([
    "Warhide Mask" => 128879,
    "Warhide Belt" => 128882,
    "Warhide Shoulderguard" => 128881,
    "Warhide Jerkin" => 128876,
    "Warhide Gloves" => 128878,
    "Warhide Pants" => 128880,
    "Warhide Bindings" => 128883,
    "Warhide Footpads" => 128877,
], $conn);

$dreadleather = item_array([
    "Dreadleather Shoulderguard" => 128889,
    "Dreadleather Mask" => 128887,
    "Dreadleather Pants" => 128888,
    "Dreadleather Jerkin" => 128884,
    "Dreadleather Bindings" => 128891,
    "Dreadleather Gloves" => 128886,
    "Dreadleather Belt" => 128890,
    "Dreadleather Footpads" => 128885,
], $conn);

$battlebound = item_array([
    "Battlebound Treads" => 128893,
    "Battlebound Warhelm" => 128895,
    "Battlebound Grips" => 128894,
    "Battlebound Leggings" => 128896,
    "Battlebound Spaulders" => 128897,
    "Battlebound Hauberk" => 128892,
    "Battlebound Girdle" => 128898,
    "Battlebound Armbands" => 128899,
], $conn);

$gravenscale = item_array([
    "Gravenscale Hauberk" => 128900,
    "Gravenscale Spaulders" => 128905,
    "Gravenscale Treads" => 128901,
    "Gravenscale Warhelm" => 128903,
    "Gravenscale Leggings" => 128904,
    "Gravenscale Girdle" => 128906,
    "Gravenscale Grips" => 128902,
    "Gravenscale Armbands" => 128907,
], $conn);

$legionOther = item_array([
    "Leather Love Seat" => 129956,
    "Leather Pet Leash" => 129958,
    "Flaming Hoop" => 129961,
    "Leather Pet Bed" => 129960,
    "Stonehide Leather Barding" => 131746,
    "Drums of the Mountain" => 142406,
    "Fiendish Leather" => 151566,
], $conn);

$bags = item_array([
    "Leatherworker's Satchel" => 34482,
    "Triple-Reinforced Mining Bag" => 70137,
    "Reinforced Mining Bag" => 29540,
    "Magnificent Hide Pack" => 95536,
    "Burnished Inscription Bag" => 116261,
    "Burnished Mining Bag" => 116260,
    "Mammoth Mining Bag" => 38347,
    "Bag of Many Hides" => 34490,
    "Burnished Leather Bag" => 116259,
    "Royal Scribe's Satchel" => 70136,
    "Trapper's Traveling Pack" => 38399,
    "Pack of Endless Pockets" => 44446,
    "Kodo Hide Bag" => 5081,
    "Quiver of a Thousand Feathers" => 34105,
], $conn);

$wodTG = item_array([
    "Savage Burnished Essence" => 127730,
    "Mighty Burnished Essence" => 127712,
    "Burnished Essence" => 128014,
    "Leather Refurbishing Kit" => 116170,
], $conn);

$wodCons = item_array([
    "Stonehide Leather Barding" => 131746,
    "Drums of the Mountain" => 142406,
    "Drums of Fury" => 120257,
], $conn);
?>

<?php include_once($path . "/inc/header.inc.php"); ?>

<h2 class="text-center"> Category: Leatherworking</h2>
<hr>

<?php 

table($fiendish, "Fiendish");
table($warhide, "Warhide Leather");
table($dreadleather, "Dreadleather");
table($battlebound, "Battlebound Mail");
table($gravenscale, "Gravenscale Mail");
table($legionOther, "Legion Other");
table($bags, "Bags");
table($wodTG, "Warlords of Draenor Trade Goods");
table($wodCons, "Warlords of Draenor Consumables");



?>



<?php include_once($path . "/inc/footer.inc.php"); ?>