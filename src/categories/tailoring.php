<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include_once(__DIR__ . "/../includes.php");
global $conn;

$cloth = item_array([
    "Imbued Silkweave" => 127004,
    "Silk Cloth" => 4306,
    "Lightweave Cloth" => 151567,
    "Shal'dorei Silk" => 124437,
    "Sumptuous Fur" => 111557,
    "Wool Cloth" => 2592,
    "Netherweave Cloth" => 21877,
    "Frostweave Cloth" => 33470,
    "Embersilk Cloth" => 53010,
    "Mageweave Cloth" => 4338,
    "Runecloth" => 14047,
    "Linen Cloth" => 2589,
    "Windwool Cloth" => 72988,
], $conn);

$iSilkweave = item_array([
    "Imbued Silkweave Hood" => 126995,
    "Imbued Silkweave Robe" => 126998,
    "Imbued Silkweave Epaulets" => 127000,
    "Imbued Silkweave Gloves" => 126997,
    "Imbued Silkweave Bracers" => 127002,
    "Imbued Silkweave Slippers" => 126996,
    "Imbued Silkweave Pantaloons" => 126999,
    "Imbued Silkweave Cinch" => 127001,
], $conn);

$silkweave = item_array([
    "Silkweave Slippers" => 126988,
    "Silkweave Cinch" => 126993,
    "Silkweave Pantaloons" => 126991,
    "Silkweave Gloves" => 126989,
    "Silkweave Robe" => 126987,
    "Silkweave Bracers" => 126994,
    "Silkweave Hood" => 126990,
    "Silkweave Epaulets" => 126992,
], $conn);

$iSilkweaveCape = item_array([
    "Imbued Silkweave Cover" => 127019,
    "Imbued Silkweave Flourish" => 127034,
    "Imbued Silkweave Drape" => 127020,
    "Imbued Silkweave Shade" => 127033,
], $conn);

$silkweaveCape = item_array([
    "Silkweave Drape" => 127017,
    "Silkweave Shade" => 127031,
    "Silkweave Flourish" => 127032,
    "Silkweave Cover" => 127016,
], $conn);

$bags = item_array([
    "Ebon Shadowbag" => 21872,
    "Primal Mooncloth Bag" => 21876,
    "Imbued Silkweave Bag" => 142075,
    "Hexweave Bag" => 114821,
    "Illusionary Bag" => 54444,
    "Royal Satchel" => 82446,
    "Abyssal Bag" => 41597,
    "Soul Pouch" => 21340,
    "Silkweave Satchel" => 127035,
    "Embersilk Bag" => 54443,
    "Imbued Netherweave Bag" => 21843,
    "Mooncloth Bag" => 14155,
    "Frostweave Bag" => 41599,
    "Glacial Bag" => 41600,
    "Core Felcloth Bag" => 21342,
    "Runecloth Bag" => 14046,
    "Netherweave Bag" => 21841,
    "Bottomless Bag" => 14156,
    "Felcloth Bag" => 21341,
], $conn);

$professionBags = item_array([
    "Spellfire Bag" => 21858,
    "Mysterious Bag" => 41598,
    "Big Bag of Enchantment" => 22249,
    "Hyjal Expedition Bag" => 54446,
    "Enchanted Runecloth Bag" => 22248,
    "Luxurious Silk Gem Bag" => 70138,
    "Emerald Bag" => 45773,
    "Mycah's Botanical Bag" => 38225,
    "Otherworldly Bag" => 54445,
    "Bag of Jewels" => 24270,
    "Enchanted Mageweave Pouch" => 22246,
    "Cenarion Herb Bag" => 22251,
    "Satchel of Cenarius" => 22252,
], $conn);

$legionOther = item_array([
    "Lightweave Breeches" => 151571,
    "Clothes Chest: Dalaran Citizens" => 137556,
    "Clothes Chest: Molten Core" => 137558,
    "Clothes Chest: Karazhan Opera House" => 137557,
    "Bloodtotem Saddle Blanket" => 139503,
], $conn);

$wodTG = item_array([
    "Mighty Hexweave Essence" => 127715,
    "Savage Hexweave Essence" => 127733,
    "Hexweave Essence" => 128012,

], $conn);

$wodCons = item_array([
    "Clothes Chest: Dalaran Citizens" => 137556,
    "Clothes Chest: Molten Core" => 137558,
    "Clothes Chest: Karazhan Opera House" => 137557,
    "Bloodtotem Saddle Blanket" => 139503,
], $conn);
?>

<?php include_once(__DIR__ . "/../inc/header.inc.php"); ?>

<h2 class="text-center"> Category: Tailoring</h2>
<hr>

<?php 

table($cloth, "Cloth");
table($iSilkweave, "Imbued Silkweave");
table($iSilkweaveCape, "Imbued Silkweave Cape");
table($silkweave, "Silkweave");
table($silkweaveCape, "Silkweave Cape");
table($bags, "Bags");
table($professionBags, "Profession Bags");
table($legionOther, "Legion Other");
table($wodTG, "Warlords of Draenor Trade Goods");
table($wodCons, "Warlords of Draenor Consumables");



?>



<?php include_once(__DIR__ . "/../inc/footer.inc.php"); ?>
