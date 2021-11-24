<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . "/includes.php");

$legionFish = item_array([
    "Black Barracuda" => 124112,
    "Stormray" => 124110,
    "Runescale Koi" => 124111,
    "Highmountain Salmon" => 124109,
    "Silver Mackerel" => 133607,
    "Cursed Queenfish" => 124107,
    "Mossgill Perch" => 124108,
], $conn);

$legionFood = item_array([
    "Lavish Suramar Feast" => 133579,
    "Hearty Feast" => 133578,
    "Feast of the Fishes" => 152564,
    "Koi-Scented Stormray" => 133568,
    "The Hungry Magister" => 133570,
    "Drogbar-Style Salmon" => 133569,
    "Crispy Bacon" => 133681,
    "Azshari Salad" => 133571,
    "Bear Tartare" => 133576,
    "Nightborne Delicacy Platter" => 133572,
    "Fishbrul Special" => 133574,
    "Pickled Stormray" => 133562,
    "Leybeque Ribs" => 133565,
    "Suramar Surf and Turf" => 133566,
    "Barracuda Mrglgagh" => 133567,
    "Seed-Battered Fish Plate" => 133573,
    "Spiced Rib Roast" => 133564,
    "Spiced Falcosaur Omelet" => 142334,
    "Deep-Fried Mossgill" => 133561,
    "Salt & Pepper Shank" => 133557,
    "Faronaar Fizz" => 133563,
    "Fighter Chow" => 133577,
    "Dried Mackerel Strips" => 133575,
], $conn);

?>

<?php include_once($path . "/inc/header.inc.php"); ?>

<h2 class="text-center"> Category: Cooking</h2>
<hr>

<?php 

table($legionFish, "Legion Fish");
table($legionFood, "Legion Food");


?>



<?php include_once($path . "/inc/footer.inc.php"); ?>