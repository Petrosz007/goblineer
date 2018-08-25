<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . "/includes.php");


$ore = item_array([
    "Monelite Ore" => 152512,
    "Platinum Ore" => 152513,
    "Storm Silver Ore" => 152579,
], $conn);

$herbs = item_array([
    "Anchor Weed" => 152510,
    "Siren's Pollen" => 152509,
    "Riverbud" => 152505,
    "Winter's Kiss" => 152508,
    "Star Moss" => 152506,
    "Akunda's Bite" => 152507,
    "Sea Stalk" => 152511,
], $conn);

$skinning = item_array([
    "Blood-Stained Bone" => 154164,
    "Coarse Leather" => 152541,
    "Tempest Hide" => 154722,
    "Shimmerscale" => 153050,
    "Mistscale" => 153051,
    "Calcified Bone" => 154165,
], $conn);

$fish = item_array([
    "Lane Snapper" => 152546,
    "Redtail Loach" => 152549,
    "Slimy Mackerel" => 152544,
    "Great Sea Catfish" => 152547,
    "Frenzied Fangtooth" => 152545,
    "Sand Shifter" => 152543,
    "Tiragarde Perch" => 152548,
], $conn);

$meat = item_array([
    "Meaty Haunch" => 154898,
    "Stringy Loins" => 154897,
    "Briny Flesh" => 152631,
    "Thick Paleo Steak" => 154899,
], $conn);

$cloth = item_array([
    "Deep Sea Satin" => 152577,
    "Tidespray Linen" => 152576,
], $conn);

?>

<?php include_once($path . "/inc/header.inc.php"); ?>

<h2 class="text-center">Battle for Azeroth Materials</h2>
<hr>

<?php 

table($ore, "Ores");
table($herbs, "Herbs");
table($skinning, "Skinning");
table($fish, "Fish");
table($meat, "Meat");
table($cloth, "Cloth");


?>



<?php include_once($path . "/inc/footer.inc.php"); ?>