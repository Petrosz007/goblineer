<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . "/includes.php");


$goggles = item_array([
    "Sawed-Off Cranial Cannon" => 132505,
    "Semi-Automagic Cranial Cannon" => 132504,
    "Ironsight Cranial Cannon" => 132507,
    "Double-Barreled Cranial Cannon" => 132506,
], $conn);

$goggles715 = item_array([
    "Bolt-Action Headgun" => 132502,
    "Tactical Headgun" => 132501,
    "Reinforced Headgun" => 132503,
    "Blink-Trigger Headgun" => 132500,
], $conn);

$relics = item_array([
    "Shockinator" => 136688,
    "\"The Felic\"" => 136687,
], $conn);

$reaves = item_array([
    "Reaves Module: Bling Mode" => 132530,
    "Reaves Module: Piloted Combat Mode" => 132531,
    "Reaves Module: Failure Detection Mode" => 132526,
    "Reaves Module: Fireworks Display Mode" => 132528,
    "Reaves Module: Repair Mode" => 132525,
    "Reaves Module: Wormhole Generator Mode" => 132524,
], $conn);

$legionOther = item_array([
    "Mecha-Bond Imprint Matrix" => 134125,
    "Trigger" => 132519,
    "Blingtron's Circuit Design Tutorial" => 132518,
    "Sonic Environment Enhancer" => 132982,
    "Intra-Dalaran Wormhole Generator" => 132517,
    "Pump-Action Bandage Gun" => 132511,
    "Gunshoes" => 132516,
    "Gunpack" => 132513,
    "Failure Detection Pylon" => 132515,
    "Wormhole Generator: Argus" => 151652,
    "Gravitational Reduction Slippers" => 151651,
    "Auto-Hammer" => 132514,
    "Deployable Bullet Dispenser" => 132509,
    "Gunpowder Charge" => 132510,
    "Leystone Buoy" => 136606,
], $conn);

$wodUpgrades = item_array([
    "True Iron Trigger" => 128017,
    "Taladite Firing Pin" => 127737,
    "Infrablue-Blocker Lenses" => 127738,
    "Bi-Directional Fizzle Reducer" => 127720,
    "Advanced Muzzlesprocket" => 127719,
    "Linkgrease Locksprocket" => 128011,
], $conn);

$wodScopes = item_array([
    "Oglethorpe's Missile Splitter" => 109120,
    "Megawatt Filament" => 109122,
    "Hemet's Heartseeker" => 118008,
], $conn);

$wodGadgets = item_array([
    "Mecha-Bond Imprint Matrix" => 134125,
    "Trigger" => 132519,
    "Swapblaster" => 111820,
    "Intra-Dalaran Wormhole Generator" => 132517,
    "Ultimate Gnomish Army Knife" => 109253,
    "Findle's Loot-A-Rang" => 109167,
    "Pump-Action Bandage Gun" => 132511,
    "Gunshoes" => 132516,
    "Personal Hologram" => 108745,
    "Gunpack" => 132513,
    "Didi's Delicate Assembly" => 114056,
    "Gunpowder Charge" => 132510,
    "Goblin Glider Kit" => 109076,
    "Shieldtronic Shield" => 118006,
    "Leystone Buoy" => 136606,
    "Mecha-Blast Rocket" => 118007,
    "Stealthman 54" => 109184,
], $conn);

$otherScopes = item_array([
    "R19 Threatfinder" => 59595,
    "Flintlocke's Woodchucker" => 70139,
    "Lord Blastington's Scope of Doom" => 77529,
    "Stabilized Eternium Scope" => 23766,
    "Sun Scope" => 41146,
    "Safety Catch Removal Kit" => 59596,
    "Gnomish X-Ray Scope" => 59594,
    "Heartseeker Scope" => 41167,
    "Sniper Scope" => 10548,
    "Diamond-Cut Refractor Scope" => 44739,
    "Deadly Scope" => 10546,
    "Mirror Scope" => 77531,
    "Adamantite Scope" => 23764,
    "Biznicks 247x128 Accurascope" => 18283,
    "Khorium Scope" => 23765,
], $conn);

$otherGadgets= item_array([
    "Reaves Module: Piloted Combat Mode" => 132531,
    "Crashin' Thrashin' Robot" => 23767,
    "Reaves Module: Fireworks Display Mode" => 132528,
    "Serpent's Heart Firework" => 87764,
    "Authentic Jr. Engineer Goggles" => 60222,
    "Mist-Piercing Goggles" => 87213,
    "Horde Firework" => 116148,
    "Hammer Pick" => 40892,
    "Gnomish Army Knife" => 40772,
    "Voice Amplification Modulator" => 16009,
    "Steam Tonk Controller" => 22728,
    "Ghost Iron Dragonling" => 77530,
    "High-Powered Flashlight" => 45631,
    "Bladed Pickaxe" => 40893,
    "Gravitational Reduction Slippers" => 151651,
    "Healing Injector Kit" => 37567,
    "Mana Injector Kit" => 42546,
    "Goblin Dragon Gun, Mark II" => 86607,
    "Purple Smoke Flare" => 25886,
    "Heat-Treated Spinning Lure" => 68049,
    "Celestial Firework" => 88493,
    "Autumn Flower Firework" => 89893,
    "Discombobulator Ray" => 4388,
    "Goblin Barbecue" => 60858,
    "Thermal Anvil" => 87216,
    "Jade Blossom Firework" => 89888,
    "Aquadynamic Fish Attractor" => 6533,
    "Red Smoke Flare" => 23769,
    "Ez-Thro Dynamite" => 6714,
    "Grand Celebration Firework" => 88491,
    "Green Smoke Flare" => 23771,
    "Ornate Spyglass" => 5507,
    "Snake Firework" => 116149,
    "Ez-Thro Dynamite II" => 18588,
    "White Smoke Flare" => 23768,
    "G91 Landshark" => 77589,
    "Healing Potion Injector" => 33092,
    "Alliance Firework" => 116147,
    "Flame Deflector" => 4376,
    "Flash Bomb" => 4852,
    "Ice Deflector" => 4386,
    "Mana Potion Injector" => 33093,
    "Snake Burst Firework" => 19026,
], $conn);

$pets = item_array([
    "Rascal-Bot" => 100905,
    "Pierre" => 94903,
    "Tranquil Mechanical Yeti" => 21277,
    "Personal World Destroyer" => 59597,
    "Lil' Smoky" => 11826,
    "Mechanical Pandaren Dragonling" => 87526,
    "De-Weaponized Mechanical Companion" => 60216,
    "Mechanical Squirrel Box" => 4401,
    "Mechanical Axebeak" => 111402,
    "Pet Bombling" => 11825,
    "Lifelike Mechanical Toad" => 15996,
    "Mechanical Scorpid" => 118741,
    "Lifelike Mechanical Frostboar" => 112057,
], $conn);

$mounts = item_array([
    "Mekgineer's Chopper" => 44413,
    "Depleted-Kyparium Rocket" => 87250,
    "Geosynchronous World Spinner" => 87251,
    "Sky Golem" => 95416,
    "Turbo-Charged Flying Machine" => 34061,
    "Mechano-Hog" => 41508,
    "Flying Machine" => 34060,
], $conn);

?>

<?php include_once($path . "/inc/header.inc.php"); ?>

<h2 class="text-center"> Category: Engineering</h2>
<hr>

<?php 

table($goggles, "Goggles");
table($goggles715, "Goggles 715");

table($relics, "Relics");
table($reaves, "Reaves");
table($legionOther, "Legion Other");
table($wodUpgrades, "Draenor Upgrades");
table($wodScopes, "Draenor Ranged Enchants (Scopes)");
table($wodGadgets, "Draenor Gadgets");
table($otherScopes, "Other Ranged Enchants (Scopes)");
table($otherGadgets, "Other Gadgets");
table($pets, "Pets");
table($mounts, "Mounts");



?>



<?php include_once($path . "/inc/footer.inc.php"); ?>