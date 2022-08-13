<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once(__DIR__ . "/../includes.php");
global $conn;

$legionTrash = item_array([
    "Unbroken Claw" => 124438,
    "Unbroken Tooth" => 124439,
    ], $conn);

$legion = item_array([
    "Felhide" => 124116,
    "Dreadhide Leather" => 136533,
    "Stormscale" => 124115,
    "Stonehide Leather" => 124113,
    "Fiendish Leather" => 151566,
    "Gravenscale" => 136534,
    ], $conn);

$wod = item_array([
    "Raw Beast Hide" => 110609,
    ], $conn);

$mop = item_array([
    "Magnificent Hide" => 72163,
    "Prismatic Scale Fragment" => 112157,
    "Prismatic Scale" => 79101,
    "Exotic Leather" => 72120,
    "Sha-Touched Leather" => 72162,
    ], $conn);

$cata = item_array([
    "Pristine Hide" => 52980,
    "Deepsea Scale" => 52982,
    "Deepsea Scale Fragment" => 112155,
    "Heavy Savage Leather" => 56516,
    "Blackened Dragonscale Fragment" => 112156,
    "Savage Leather" => 52976,
    "Blackened Dragonscale" => 52979,
    "Savage Leather Scraps" => 52977,
    ], $conn);

$wotlk = item_array([
    "Jormungar Scale" => 38561,
    "Arctic Fur" => 44128,
    "Heavy Borean Leather" => 38425,
    "Patch of Fel Hide" => 112182,
    "Icy Dragonscale" => 38557,
    "Nerubian Chitin" => 38558,
    "Nerubian Chitin Fragment" => 112177,
    "Borean Leather Scraps" => 33567,
    "Icy Dragonscale Fragment" => 112158,
    "Borean Leather" => 33568,
    ], $conn);

$bc = item_array([
    "Primal Tiger Leather" => 19768,
    "Wind Scales" => 29547,
    "Nether Dragonscales" => 29548,
    "Cobra Scales" => 29539,
    "Fel Hide" => 25707,
    "Heavy Knothide Leather" => 23793,
    "Fel Scales" => 25700,
    "Thick Clefthoof Leather" => 25708,
    "Patch of Crystal Infused Leather" => 112180,
    "Cobra Scale Fragment" => 112184,
    "Crystal Infused Leather" => 25699,
    "Primal Bat Leather" => 19767,
    "Patch of Thick Clefthoof Leather" => 112179,
    "Knothide Leather Scraps" => 25649,
    "Knothide Leather" => 21887,
    "Wind Scale Fragment" => 112185,
    "Nether Dragonscale Fragment" => 112183,
    "Fel Scale Fragment" => 112181,
    ], $conn);

$classic = item_array([
    "Warbear Leather" => 15419,
    "Green Whelp Scale" => 7392,
    "Black Whelp Scale" => 7286,
    "Blue Dragonscale" => 15415,
    "Turtle Scale" => 8167,
    "Red Dragonscale" => 15414,
    "Black Dragonscale" => 15416,
    "Enchanted Leather" => 12810,
    "Heavy Scorpid Scale" => 15408,
    "Salt" => 4289,
    "Cured Rugged Hide" => 15407,
    "Worn Dragonscale" => 8165,
    "Cured Thick Hide" => 8172,
    "Heavy Hide" => 4235,
    "Scale of Onyxia" => 15410,
    "Cured Heavy Hide" => 4236,
    "Green Dragonscale" => 15412,
    "Raptor Hide" => 4461,
    "Devilsaur Leather" => 15417,
    "Rugged Leather" => 8170,
    "Cured Medium Hide" => 4233,
    "Cured Light Hide" => 4231,
    "Thick Leather" => 4304,
    "Thick Murloc Scale" => 5785,
    "Thin Kodo Leather" => 5082,
    "Light Hide" => 783,
    "Thick Hide" => 8169,
    "Perfect Deviate Scale" => 6471,
    "Heavy Leather" => 4234,
    "Rugged Hide" => 8171,
    "Medium Leather" => 2319,
    "Ruined Leather Scraps" => 2934,
    "Light Leather" => 2318,
    "Core Leather" => 17012,
    "Deeprock Salt" => 8150,
    "Deviate Scale" => 6470,
    "Medium Hide" => 4232,
    "Slimy Murloc Scale" => 5784,
    "Scorpid Scale" => 8154,
    "Dreamscale" => 20381,
    ], $conn);
?>

<?php include_once(__DIR__ . "/../inc/header.inc.php"); ?>

<h2 class="text-center"> Category: Skinning</h2>
<hr>

<?php 

table($legion, "Legion");
table($legionTrash, "Legion Trade Goods");
table($wod, "Draenor");
table($mop, "Pandaria");
table($cata, "Cataclysm");
table($wotlk, "Northrend");
table($bc, "Outland");
table($classic, "Classic");



?>



<?php include_once(__DIR__ . "/../inc/footer.inc.php"); ?>
