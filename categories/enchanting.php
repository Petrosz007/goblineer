<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . "/includes.php");

$all_data = [
    "Chaos Crystal" => 124442,
    "Temporal Crystal" => 113588,
    "Void Crystal" => 22450,
    "Sha Crystal" => 74248,
    "Abyss Crystal" => 34057,
    "Maelstrom Crystal" => 52722,
    "Fractured Temporal Crystal" => 115504,
    "Nexus Crystal" => 20725,

    "Luminous Shard" => 111245,
    "Large Brilliant Shard" => 14344,
    "Leylight Shard" => 124441,
    "Dream Shard" => 34052,
    "Large Radiant Shard" => 11178,
    "Heavenly Shard" => 52721,
    "Ethereal Shard" => 74247,
    "Large Prismatic Shard" => 22449,
    "Large Glimmering Shard" => 11084,
    "Large Glowing Shard" => 11139,

    "Greater Nether Essence" => 11175,
    "Greater Eternal Essence" => 16203,
    "Greater Planar Essence" => 22446,
    "Greater Astral Essence" => 11082,
    "Greater Mystic Essence" => 11135,
    "Greater Magic Essence" => 10939,
    "Greater Cosmic Essence" => 34055,
    "Mysterious Essence" => 74250,
    "Greater Celestial Essence" => 52719,

    "Hypnotic Dust" => 52555,
    "Arkhana" => 124440,
    "Arcane Dust" => 22445,
    "Vision Dust" => 11137,
    "Illusion Dust" => 16204,
    "Strange Dust" => 10940,
    "Dream Dust" => 11176,
    "Soul Dust" => 11083,
    "Infinite Dust" => 34054,
    "Draenic Dust" => 109693,
    "Spirit Dust" => 74249,

    "Enchant Cloak - Binding of Intellect" => 128550,
    "Enchant Cloak - Binding of Agility" => 128549,
    "Enchant Cloak - Binding of Strength" => 128548,
    "Enchant Cloak - Word of Intellect" => 128547,
    "Enchant Cloak - Word of Agility" => 128546,
    "Enchant Cloak - Word of Strength" => 128545,

    "Enchant Neck - Mark of the Hidden Satyr" => 128553,
    "Enchant Neck - Mark of the Trained Soldier" => 141909,
    "Enchant Neck - Mark of the Heavy Hide" => 141908,
    "Enchant Neck - Mark of the Claw" => 128551,
    "Enchant Neck - Mark of the Ancient Priestess" => 141910,
    "Enchant Neck - Mark of the Distant Army" => 128552,

    "Enchant Ring - Binding of Critical Strike" => 128541,
    "Enchant Ring - Binding of Haste" => 128542,
    "Enchant Ring - Binding of Versatility" => 128544,
    "Enchant Ring - Binding of Mastery" => 128543,
    "Enchant Ring - Word of Haste" => 128538,
    "Enchant Ring - Word of Critical Strike" => 128537,
    "Enchant Ring - Word of Mastery" => 128539,
    "Enchant Ring - Word of Versatility" => 128540,

    "Enchant Gloves - Legion Herbalism" => 128558,
    "Enchant Shoulder - Boon of the Scavenger" => 128554,
    "Enchant Gloves - Legion Mining" => 128559,
    "Enchant Gloves - Legion Surveying" => 128561,
    "Enchant Gloves - Legion Skinning" => 128560,

    "Immaculate Fibril" => 136691,
    "Soul Fibril" => 136689,

    "Tome of Illusions: Elemental Lords" => 138792,
    "Tome of Illusions: Draenor" => 138795,
    "Tome of Illusions: Outland" => 138789,
    "Tome of Illusions: Secrets of the Shado-Pan" => 138794,
    "Tome of Illusions: Azeroth" => 138787,
    "Tome of Illusions: Pandaria" => 138793,
    "Tome of Illusions: Northrend" => 138790,
    "Tome of Illusions: Cataclysm" => 138791,

    "Leylight Brazier" => 128536,
    "Enchanted Pen" => 128535,
    "Enchanted Torch" => 128534,
    "Enchanted Cauldron" => 128533
  ];

$all = item_array($all_data, $conn);

$crystals = [
	$all["Chaos Crystal"],
	$all["Temporal Crystal"],
	$all["Void Crystal"],
	$all["Sha Crystal"],
	$all["Abyss Crystal"],
	$all["Maelstrom Crystal"],
	$all["Fractured Temporal Crystal"],
	$all["Nexus Crystal"]
];

$shards = [
	$all["Luminous Shard"],
	$all["Large Brilliant Shard"],
	$all["Leylight Shard"],
	$all["Dream Shard"],
	$all["Large Radiant Shard"],
	$all["Heavenly Shard"],
	$all["Ethereal Shard"],
	$all["Large Prismatic Shard"],
	$all["Large Glimmering Shard"],
	$all["Large Glowing Shard"]
];

$essences = [
	$all["Greater Nether Essence"],
	$all["Greater Eternal Essence"],
	$all["Greater Planar Essence"],
	$all["Greater Astral Essence"],
	$all["Greater Mystic Essence"],
	$all["Greater Magic Essence"],
	$all["Greater Cosmic Essence"],
	$all["Mysterious Essence"],
	$all["Greater Celestial Essence"]
];

$dusts = [
	$all["Hypnotic Dust"],
	$all["Arkhana"],
	$all["Arcane Dust"],
	$all["Vision Dust"],
	$all["Illusion Dust"],
	$all["Strange Dust"],
	$all["Dream Dust"],
	$all["Soul Dust"],
	$all["Infinite Dust"],
	$all["Draenic Dust"],
	$all["Spirit Dust"]
];

$enchCloak = [
    $all["Enchant Cloak - Binding of Intellect"],
    $all["Enchant Cloak - Binding of Agility"],
    $all["Enchant Cloak - Binding of Strength"],
    $all["Enchant Cloak - Word of Intellect"],
    $all["Enchant Cloak - Word of Agility"],
    $all["Enchant Cloak - Word of Strength"]
];

$enchNeck = [
    $all["Enchant Neck - Mark of the Hidden Satyr"],
    $all["Enchant Neck - Mark of the Trained Soldier"],
    $all["Enchant Neck - Mark of the Heavy Hide"],
    $all["Enchant Neck - Mark of the Claw"],
    $all["Enchant Neck - Mark of the Ancient Priestess"],
    $all["Enchant Neck - Mark of the Distant Army"]
];

$enchRing = [
    $all["Enchant Ring - Binding of Critical Strike"],
    $all["Enchant Ring - Binding of Haste"],
    $all["Enchant Ring - Binding of Versatility"],
    $all["Enchant Ring - Binding of Mastery"],
    $all["Enchant Ring - Word of Haste"],
    $all["Enchant Ring - Word of Critical Strike"],
    $all["Enchant Ring - Word of Mastery"],
    $all["Enchant Ring - Word of Versatility"]
];

$enchGloves = [
    $all["Enchant Gloves - Legion Herbalism"],
    $all["Enchant Shoulder - Boon of the Scavenger"],
    $all["Enchant Gloves - Legion Mining"],
    $all["Enchant Gloves - Legion Surveying"],
    $all["Enchant Gloves - Legion Skinning"]
];


$relics = [
	$all["Immaculate Fibril"],
	$all["Soul Fibril"]
];

$tomes = [
    $all["Tome of Illusions: Elemental Lords"],
    $all["Tome of Illusions: Draenor"],
    $all["Tome of Illusions: Outland"],
    $all["Tome of Illusions: Secrets of the Shado-Pan"],
    $all["Tome of Illusions: Azeroth"],
    $all["Tome of Illusions: Pandaria"],
    $all["Tome of Illusions: Northrend"],
    $all["Tome of Illusions: Cataclysm"]
];


$toys = [
    $all["Leylight Brazier"],
    $all["Enchanted Pen"],
    $all["Enchanted Torch"],
    $all["Enchanted Cauldron"]
];
?>

<?php include_once($path . "/inc/header.inc.php"); ?>

<h2 class="text-center"> Category: Enchanting</h2>
<hr>

<?php 

table($crystals, "Crystals");
table($shards, "Shards");
table($essences, "Essences");
table($dusts, "Dusts");

table($enchCloak, "Enchant Cloak"); 
table($enchNeck, "Enchant Neck");
table($enchRing, "Enchant Ring");
table($enchGloves, "Enchant Gloves, Shoulder");

table($relics, "Relics");

table($tomes, "Tomes of Illusions");
table($toys, "Legion Toys and Companions");

?>



<?php include_once($path . "/inc/footer.inc.php"); ?>