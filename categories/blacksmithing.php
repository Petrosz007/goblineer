<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . "/includes.php");

$leystone = item_array([
    "Leystone Waistguard" => 123897,
    "Leystone Boots" => 123892,
    "Leystone Gauntlets" => 123893,
    "Leystone Helm" => 123894,
    "Leystone Breastplate" => 123895,
    "Leystone Greaves" => 123891,
    "Leystone Pauldrons" => 123898,
    "Leystone Armguards" => 123896,
], $conn);

$demonsteel = item_array([
    "Demonsteel Greaves" => 123914,
    "Demonsteel Waistguard" => 123916,
    "Demonsteel Pauldrons" => 123915,
    "Demonsteel Gauntlets" => 123912,
    "Demonsteel Helm" => 123913,
    "Demonsteel Armguards" => 123917,
    "Demonsteel Breastplate" => 123910,
    "Demonsteel Boots" => 123911,
], $conn);

$relics = item_array([
    "Flamespike" => 136686,
    "Gleaming Iron Spike" => 136684,
    "Terrorspike" => 136683,
    "Consecrated Spike" => 136685,
], $conn);

$legionOther = item_array([
    "Steelbound Harness" => 137686,
    "Demonsteel Stirrups" => 136708,
    "Empyrial Breastplate" => 151576,
    "Leystone Hoofplates" => 123956,
    "Felslate Anchor" => 151239,
    "Demonsteel Bar" => 124461,
], $conn);

$wod = item_array([
    "Mighty Steelforged Essence" => 127713,
    "Truesteel Essence" => 128015,
    "Mighty Truesteel Essence" => 127714,
    "Savage Truesteel Essence" => 127732,
    "Savage Steelforged Essence" => 127731,
    "Steelforged Essence" => 128016,
    "Truesteel Reshaper" => 116428,
    "Truesteel Grinder" => 116654,
    "Demonsteel Bar" => 124461,
], $conn);

$consumables = item_array([
    "Lesser Rune of Warding" => 23559,
    "Ghostly Skeleton Key" => 82960,
    "Obsidium Skeleton Key" => 55053,
    "Greater Ward of Shielding" => 23576,
    "Titanium Skeleton Key" => 43853,
    "Adamantite Sharpening Stone" => 23529,
    "Fel Weightstone" => 28420,
    "Cobalt Skeleton Key" => 43854,
    "Dense Sharpening Stone" => 12404,
    "Greater Rune of Warding" => 25521,
    "Lesser Ward of Shielding" => 23575,
    "Arcanite Skeleton Key" => 15872,
    "Fel Sharpening Stone" => 23528,
    "Dense Weightstone" => 12643,
    "Adamantite Weightstone" => 28421,
    "Elemental Sharpening Stone" => 18262,
], $conn);
?>

<?php include_once($path . "/inc/header.inc.php"); ?>

<h2 class="text-center"> Category: Blacksmithing</h2>
<hr>

<?php 

table($leystone, "Leystone");
table($demonsteel, "Demonsteel");
table($relics, "Relics");
table($legionOther, "Legion Other");
table($wod, "Warlords of Draenor Trade Goods");
table($consumables, "Consumables");


?>



<?php include_once($path . "/inc/footer.inc.php"); ?>