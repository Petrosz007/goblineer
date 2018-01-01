<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . "/includes.php");

$all_data = [
    "Felwort" => 124106,
"Starlight Rose" => 124105,
"Foxflower" => 124103,
"Fjarnskaggl" => 124104,
"Astral Glory" => 151565,
"Dreamleaf" => 124102,
"Aethril" => 124101,
"Yseralline Seed" => 128304,

"Felwort Seed" => 129289,
"Starlight Rose Seed" => 129288,
"Fjarnskaggl Seed" => 129287,
"Dreamleaf Seed" => 129285,
"Aethril Seed" => 129284,
"Foxflower Seed" => 129286,

"Gorgrond Flytrap" => 109126,
"Nagrand Arrowbloom" => 109128,
"Fireweed" => 109125,
"Frostweed" => 109124,
"Starflower" => 109127,
"Talador Orchid" => 109129,

"Golden Lotus" => 72238,
"Desecrated Herb" => 89639,
"Snow Lily" => 79010,
"Fool's Cap" => 79011,
"Green Tea Leaf" => 72234,
"Rain Poppy" => 72237,
"Silkweed" => 72235,

"Azshara's Veil" => 52985,
"Heartblossom" => 52986,
"Cinderbloom" => 52983,
"Whiptail" => 52988,
"Stormvine" => 52984,
"Twilight Jasmine" => 52987,

"Icethorn" => 36906,
"Lichbloom" => 36905,
"Talandra's Rose" => 36907,
"Goldclover" => 36901,
"Adder's Tongue" => 36903,
"Tiger Lily" => 36904,
"Frost Lotus" => 36908,
"Fire Leaf" => 39970,
"Deadnettle" => 37921,

"Ragveil" => 22787,
"Mana Thistle" => 22793,
"Nightmare Vine" => 22792,
"Netherbloom" => 22791,
"Flame Cap" => 22788,
"Dreaming Glory" => 22786,
"Terocone" => 22789,
"Fel Lotus" => 22794,
"Nightmare Seed" => 22797,
"Ancient Lichen" => 22790,
"Felweed" => 22785,

"Arthas' Tears" => 8836,
"Wildvine" => 8153,
"Goldthorn" => 3821,
"Black Lotus" => 13468,
"Gromsblood" => 8846,
"Mountain Silversage" => 13465,
"Ghost Mushroom" => 8845,
"Blindweed" => 8839,
"Wild Steelbloom" => 3355,
"Kingsblood" => 3356,
"Bruiseweed" => 2453,
"Liferoot" => 3357,
"Sorrowmoss" => 13466,
"Purple Lotus" => 8831,
"Briarthorn" => 2450,
"Firebloom" => 4625,
"Grave Moss" => 3369,
"Swiftthistle" => 2452,
"Dragon's Teeth" => 3819,
"Icecap" => 13467,
"Silverleaf" => 765,
"Stranglekelp" => 3820,
"Golden Sansam" => 13464,
"Mageroyal" => 785,
"Sungrass" => 8838,
"Peacebloom" => 2447,
"Bloodthistle" => 22710,
"Fadeleaf" => 3818,
"Khadgar's Whisker" => 3358,
"Earthroot" => 2449,
"Dreamfoil" => 13463,

  ];

$all = item_array($all_data, $conn);

$legionHerbs = [
	$all["Felwort"],
	$all["Starlight Rose"],
	$all["Foxflower"],
	$all["Fjarnskaggl"],
	$all["Astral Glory"],
	$all["Dreamleaf"],
	$all["Aethril"],
	$all["Yseralline Seed"]
];

$legionSeeds = [
	$all["Felwort Seed"],
	$all["Starlight Rose Seed"],
	$all["Fjarnskaggl Seed"],
	$all["Dreamleaf Seed"],
	$all["Aethril Seed"],
	$all["Foxflower Seed"]
];

$wodHerbs = [
	$all["Gorgrond Flytrap"],
	$all["Nagrand Arrowbloom"],
	$all["Fireweed"],
	$all["Frostweed"],
	$all["Starflower"],
	$all["Talador Orchid"]
];

$mopHerbs = [
	$all["Golden Lotus"],
	$all["Desecrated Herb"],
	$all["Snow Lily"],
	$all["Fool's Cap"],
	$all["Green Tea Leaf"],
	$all["Rain Poppy"],
	$all["Silkweed"]
];

$cataHerbs = [
	$all["Azshara's Veil"],
	$all["Heartblossom"],
	$all["Cinderbloom"],
	$all["Whiptail"],
	$all["Stormvine"],
	$all["Twilight Jasmine"]
];

$wotlkHerbs = [
	$all["Icethorn"],
	$all["Lichbloom"],
	$all["Talandra's Rose"],
	$all["Goldclover"],
	$all["Adder's Tongue"],
	$all["Tiger Lily"],
	$all["Frost Lotus"],
	$all["Fire Leaf"],
	$all["Deadnettle"]
];

$tbcHerbs = [
	$all["Ragveil"],
	$all["Mana Thistle"],
	$all["Nightmare Vine"],
	$all["Netherbloom"],
	$all["Flame Cap"],
	$all["Dreaming Glory"],
	$all["Terocone"],
	$all["Fel Lotus"],
	$all["Nightmare Seed"],
	$all["Ancient Lichen"],
	$all["Felweed"]
];

$classicHerbs = [
	$all["Arthas' Tears"],
	$all["Wildvine"],
	$all["Goldthorn"],
	$all["Black Lotus"],
	$all["Gromsblood"],
	$all["Mountain Silversage"],
	$all["Ghost Mushroom"],
	$all["Blindweed"],
	$all["Wild Steelbloom"],
	$all["Kingsblood"],
	$all["Bruiseweed"],
	$all["Liferoot"],
	$all["Sorrowmoss"],
	$all["Purple Lotus"],
	$all["Briarthorn"],
	$all["Firebloom"],
	$all["Grave Moss"],
	$all["Swiftthistle"],
	$all["Dragon's Teeth"],
	$all["Icecap"],
	$all["Silverleaf"],
	$all["Stranglekelp"],
	$all["Golden Sansam"],
	$all["Mageroyal"],
	$all["Sungrass"],
	$all["Peacebloom"],
	$all["Bloodthistle"],
	$all["Fadeleaf"],
	$all["Khadgar's Whisker"],
	$all["Earthroot"],
	$all["Dreamfoil"]
];

?>

<?php include_once($path . "/inc/header.inc.php"); ?>

<h2 class="text-center"> Category: Herbalism</h2>

<?php 

table($legionHerbs, "Legion Herbs"); 
table($legionSeeds, "Legion Seeds"); 
table($wodHerbs, "Warlords of Draenor Herbs"); 
table($mopHerbs, "Mists of Pandaria Herbs"); 
table($cataHerbs, "Cataclysm Herbs"); 
table($wotlkHerbs, "Wrath of the Lich King Herbs"); 
table($tbcHerbs, "Burning Crusade Herbs"); 
table($classicHerbs, "Classic Herbs"); 


?>



<?php include_once($path . "/inc/footer.inc.php"); ?>