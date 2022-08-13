<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once(__DIR__ . "/../includes.php");

global $conn;

$legionFlasks = item_array([
    "Flask of the Seventh Demon" => 127848,
    "Flask of the Countless Armies" => 127849,
    "Flask of the Whispered Pact" => 127847,
    "Flask of Ten Thousand Scars" => 127850,
], $conn);

$legionRPotions = item_array([
    "Astral Healing Potion" => 152615,
    "Leytorrent Potion" => 127846,
    "Ancient Mana Potion" => 127835,
    "Ancient Healing Potion" => 127834,
    "Ancient Rejuvenation Potion" => 127836,
], $conn);

$legionBuffPotions = item_array([
    "Unbending Potion" => 127845,
    "Potion of Deadly Grace" => 127843,
    "Potion of the Old War" => 127844,
    "Potion of Prolonged Power" => 142117,
], $conn);

$general = item_array([
    "Frost Oil" => 3829,
    "Potion of Treasure Finding" => 58488,
    "Elixir of Dream Vision" => 9197,
    "Potion of Illusion" => 58489,
    "Potion of Deepholm" => 58487,
    "Restorative Potion" => 9030,
    "Skystep Potion" => 127841,
    "Lightblood Elixir" => 151608,
    "Draenic Invisibility Potion" => 116268,
    "Invisibility Potion" => 9172,
    "Swim Speed Potion" => 6372,
    "Great Rage Potion" => 5633,
    "Darkwater Potion" => 76096,
    "Transmorphic Tincture" => 112090,
    "Skaggldrynk" => 127840,
    "Avalanche Elixir" => 127839,
    "Desecrated Oil" => 87872,
    "Elixir of Detect Demon" => 9233,
    "Elixir of Water Breathing" => 5996,
    "Draenic Swiftness Potion" => 116266,
    "Sylvan Elixir" => 127838,
    "Elixir of Water Walking" => 8827,
    "Tears of the Naaru" => 151609,
    "Limited Invulnerability Potion" => 3387,
    "Pure Rage Potion" => 118704,
    "Lesser Invisibility Potion" => 3823,
    "Draenic Water Walking Elixir" => 118711,
    "Draenic Water Breathing Elixir" => 116271,
    "Free Action Potion" => 5634,
    "Draenic Living Action Potion" => 116276,
    "Living Action Potion" => 20008,
    "Swiftness Potion" => 2459,
    "Rage Potion" => 5631,
    "Deathblood Venom" => 58142,
    "Elixir of Greater Water Breathing" => 18294,
    "Draught of Raw Magic" => 127837,
    "Elixir of Detect Lesser Invisibility" => 3828,
    "Purification Potion" => 13462,
    "Earthen Elixir" => 32063,
    "Elixir of Camouflage" => 22823,
    "Potion of Curing" => 3386,
    "Elixir of Detect Undead" => 9154,
    "Oil of Immolation" => 8956,
    "Shadow Oil" => 3824,
    "Potion of Petrification" => 13506,
    "Shrouding Potion" => 22871,
], $conn);
?>

<?php include_once(__DIR__ . "/../inc/header.inc.php"); ?>

<h2 class="text-center"> Category: Alchemy</h2>
<hr>

<?php 

table($legionFlasks, "Legion Flasks");
table($legionBuffPotions, "Legion Buff Potions");
table($legionRPotions, "Legion Restorative Potions");
table($general, "General Purpose Elixirs and Potions");


?>



<?php include_once(__DIR__ . "/../inc/footer.inc.php"); ?>
