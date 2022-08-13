<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once(__DIR__ . "/includes.php");
global $conn;

$ore = item_array([
    "Monelite Ore" => 152512,
    "Platinum Ore" => 152513,
    "Storm Silver Ore" => 152579,
    "Osmenite Ore" => 168185,
], $conn);

$herbs = item_array([
    "Anchor Weed" => 152510,
    "Siren's Pollen" => 152509,
    "Riverbud" => 152505,
    "Winter's Kiss" => 152508,
    "Star Moss" => 152506,
    "Akunda's Bite" => 152507,
    "Sea Stalk" => 152511,
    "Zin'anthid" => 168487,
], $conn);

$skinning = item_array([
    "Blood-Stained Bone" => 154164,
    "Coarse Leather" => 152541,
    "Tempest Hide" => 154722,
    "Shimmerscale" => 153050,
    "Mistscale" => 153051,
    "Calcified Bone" => 154165,
    "Dredged Leather" => 168649,
    "Cragscale" => 168650,
], $conn);

$fish = item_array([
    "Lane Snapper" => 152546,
    "Redtail Loach" => 152549,
    "Slimy Mackerel" => 152544,
    "Great Sea Catfish" => 152547,
    "Frenzied Fangtooth" => 152545,
    "Sand Shifter" => 152543,
    "Tiragarde Perch" => 152548,
    "Midnight Salmon" => 162515,
    "Viper Fish" => 168302,
    "Mauve Stinger" => 168646,
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
    "Gilded Seaweave" => 167738,
], $conn);

$pigments = item_array([
    "Ultramarine Pigment" => 153635,
    "Viridescent Pigment" => 153669,
    "Crimson Pigment" => 153636,
    "Maroon Pigment" => 168662,
], $conn);

$gems = item_array([
    "Kraken's Eye" => 152706,
    "Owlseye" => 154120,
    "Scarlet Diamond" => 154121,
    "Tidal Amethyst" => 154122,
    "Amberblaze" => 154123,
    "Laribole" => 154124,
    "Royal Quartz" => 154125,
    "Rubellite" => 153701,
    "Kubiline" => 153702,
    "Golden Beryl" => 153700,
    "Solstone" => 153703,
    "Viridium" => 153704,
    "Kyanite" => 153705,
    "Lava Lazuli" => 168190,
    "Sea Currant" => 168191,
    "Sand Spinel" => 168192,
    "Sage Agate" => 168188,
    "Dark Opal" => 168189,
    "Azsharine" => 168193,
    "Leviathan's Eye" => 168635,
], $conn);

$enchanting = item_array([
    "Gloom Dust" => 152875,
    "Umbra Shard" => 152876,
    "Veiled Crystal" => 152877,
], $conn);

?>

<?php include_once(__DIR__ . "/inc/header.inc.php"); ?>

<h2 class="text-center">Battle for Azeroth Materials</h2>
<hr>

<?php 

table($herbs, "Herbs");
table($ore, "Ores");
table($skinning, "Skinning");
table($enchanting, "Enchanting");
table($cloth, "Cloth");
table($fish, "Fish");
table($meat, "Meat");
table($pigments, "Pigments");


?>



<?php include_once(__DIR__ . "/../inc/footer.inc.php"); ?>
