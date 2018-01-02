<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . "/includes.php");

$legionOre = item_array([
    "Infernal Brimstone" => 124444,
    "Felslate" => 123919,
    "Empyrium" => 151564,
    "Leystone Ore" => 123918,
    ], $conn);

$wodOre = item_array([
    "True Iron Ore" => 109119,
    "Blackrock Ore" => 109118,
    ], $conn);

$mopOre = item_array([
    "Black Trillium Ore" => 72094,
    "White Trillium Ore" => 72103,
    "Ghost Iron Ore" => 72092,
    "Kyparite" => 72093
    ], $conn);

$mopBar = item_array([
    "Trillium Bar" => 72095,
    "Ghost Iron Bar" => 72096,
    ], $conn);

$cataOre = item_array([
    "Pyrite Ore" => 52183,
    "Obsidium Ore" => 53038,
    "Elementium Ore" => 52185,
    ], $conn);

$cataBar = item_array([
    "Hardened Elementium Bar" => 53039,
    "Pyrium Bar" => 51950,
    "Obsidium Bar" => 54849,
    "Elementium Bar" => 52186,
    ], $conn);

$wotlkOre = item_array([
    "Titanium Ore" => 36910,
    "Saronite Ore" => 36912,
    "Cobalt Ore" => 36909,
    ], $conn);

$wotlkBar = item_array([
    "Titansteel Bar" => 37663,
    "Titanium Bar" => 41163,
    "Saronite Bar" => 36913,
    "Cobalt Bar" => 36916,
    ], $conn);

$bcOre = item_array([
    "Khorium Ore" => 23426,
    "Eternium Ore" => 23427,
    "Fel Iron Ore" => 23424,
    "Adamantite Ore" => 23425,
    ], $conn);

$bcBar = item_array([
    "Hardened Khorium" => 35128,
    "Khorium Bar" => 23449,
    "Felsteel Bar" => 23448,
    "Eternium Bar" => 23447,
    "Hardened Adamantite Bar" => 23573,
    "Fel Iron Bar" => 23445,
    "Adamantite Bar" => 23446,
    ], $conn);

$classicOre = item_array([
    "Silver Ore" => 2775,
    "Truesilver Ore" => 7911,
    "Mithril Ore" => 3858,
    "Gold Ore" => 2776,
    "Iron Ore" => 2772,
    "Tin Ore" => 2771,
    "Copper Ore" => 2770,
    "Thorium Ore" => 10620,
    ], $conn);

$classicBar = item_array([
    "Enchanted Elementium Bar" => 17771,
    "Dark Iron Bar" => 11371,
    "Silver Bar" => 2842,
    "Steel Bar" => 3859,
    "Truesilver Bar" => 6037,
    "Mithril Bar" => 3860,
    "Bronze Bar" => 2841,
    "Gold Bar" => 3577,
    "Copper Bar" => 2840,
    "Enchanted Thorium Bar" => 12655,
    "Iron Bar" => 3575,
    "Tin Bar" => 3576,
    "Thorium Bar" => 12359,
    ], $conn);

?>

<?php include_once($path . "/inc/header.inc.php"); ?>

<h2 class="text-center"> Category: Mining</h2>
<hr>

<?php 

table($legionOre, "Legion Ore");
table($wodOre, "Draenor Ore");
table($mopOre, "Pandaria Ore");
table($mopBar, "Pandaria Bar");
table($cataOre, "Cataclysm Ore");
table($cataBar, "Cataclysm Bar");
table($wotlkOre, "Northrend Ore");
table($wotlkBar, "NorthrendBar");
table($bcOre, "Outland Ore");
table($bcBar, "Outland Bar");
table($classicOre, "Classic Ore");
table($classicBar, "Classic Bar");

?>



<?php include_once($path . "/inc/footer.inc.php"); ?>