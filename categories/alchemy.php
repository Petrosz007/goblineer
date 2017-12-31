<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . "/includes.php");

$all_data = [
    "Flask of the Seventh Demon" => 127848,
    "Flask of the Whispered Pact" => 127847,
    "Flask of Ten Thousand Scars" => 127850,
    "Flask of the Countless Armies" => 127849,
    
    "Astral Healing Potion" => 152615,
    "Leytorrent Potion" => 127846,
    "Ancient Mana Potion" => 127835,
    "Ancient Rejuvenation Potion" => 127836,
    "Ancient Healing Potion" => 127834
  ];

$all = item_array($all_data, $conn);

$legionFlasks = [
    $all["Flask of the Seventh Demon"],
    $all["Flask of the Whispered Pact"],
    $all["Flask of Ten Thousand Scars"],
    $all["Flask of the Countless Armies"]
];

$legionRPotions = [
    $all["Astral Healing Potion"],
    $all["Leytorrent Potion"],
    $all["Ancient Mana Potion"],
    $all["Ancient Rejuvenation Potion"],
    $all["Ancient Healing Potion"]
];
?>

<?php include_once($path . "/inc/header.inc.php"); ?>

<h2 class="text-center"> Category: Alchemy</h2>

<?php 

table($legionFlasks, "Legion Flasks"); 
table($legionRPotions, "Legion Restorative Potions");

?>



<?php include_once($path . "/inc/footer.inc.php"); ?>