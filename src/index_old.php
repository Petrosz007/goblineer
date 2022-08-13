<?php


include "includes.php";
global $conn;

//blood of sargeras price
$bloodPrice = bloodPrice($conn);
/*
//Argus Stuff
$Obliterum           = item(124125, $conn);
$PrimalObliterum     = item(152296, $conn);
$AstralGlory         = item(151565, $conn);
$Empyrium            = item(151564, $conn);
$FiendishLeather     = item(151566, $conn);
$LightweaveCloth     = item(151567, $conn);
$AstralHealingPotion = item(152615, $conn);

$Obliterum_q           = item_q(124125, $conn);
$PrimalObliterum_q     = item_q(152296, $conn);
$AstralGlory_q         = item_q(151565, $conn);
$Empyrium_q            = item_q(151564, $conn);
$FiendishLeather_q     = item_q(151566, $conn);
$LightweaveCloth_q     = item_q(151567, $conn);
$AstralHealingPotion_q = item_q(152615, $conn);



//Legion Herbs
$Felwort         = item(124106, $conn);
$Starlight_Rose  = item(124105, $conn);
$Fjarnskaggl     = item(124104, $conn);
$Foxflower       = item(124103, $conn);
$Dreamleaf       = item(124102, $conn);
$Aethril         = item(124101, $conn);
$Yseralline_Seed = item(128304, $conn);

$Felwort_q           = item_q(124106, $conn);
$Starlight_Rose_q    = item_q(124105, $conn);
$Fjarnskaggl_q       = item_q(124104, $conn);
$Foxflower_q         = item_q(124103, $conn);
$Dreamleaf_q         = item_q(124102, $conn);
$Aethril_q           = item_q(124101, $conn);
$Yseralline_Seed_q   = item_q(128304, $conn);

//Legion seeds item:129289;item:129286;item:129288;item:129287;item:129284;item:129285
$Felwort_Seed        = item(129289, $conn);
$Starlight_Rose_Seed = item(129288, $conn);
$Fjarnskaggl_Seed    = item(129287, $conn);
$Foxflower_Seed      = item(129286, $conn);
$Dreamleaf_Seed      = item(129285, $conn);
$Aethril_Seed        = item(129284, $conn);

$Felwort_Seed_q        = item_q(129289, $conn);
$Starlight_Rose_Seed_q = item_q(129288, $conn);
$Fjarnskaggl_Seed_q    = item_q(129287, $conn);
$Foxflower_Seed_q      = item_q(129286, $conn);
$Dreamleaf_Seed_q      = item_q(129285, $conn);
$Aethril_Seed_q        = item_q(129284, $conn);


//Legion Enchanting Mats
$Chaos_Crystal = item(124442, $conn);
$Leylight_Shard = item(124441, $conn);
$Arkhana = item(124440, $conn);

$Chaos_Crystal_q = item_q(124442, $conn);
$Leylight_Shard_q = item_q(124441, $conn);
$Arkhana_q = item_q(124440, $conn);



//Legion Skinning
$Felhide = item(124116 ,$conn);
$Stonehide_Leather = item(124115 ,$conn);
$Stormscale = item(124113 ,$conn);

$Felhide_q = item_q(124116 ,$conn);
$Stonehide_Leather_q = item_q(124115 ,$conn);
$Stormscale_q = item_q(124113 ,$conn);









//Legion Flasks
$Wispered_Pact = item(127847, $conn);
$Wispered_Pact_Q = item_q(127847, $conn);
$Seventh_Demon = item(127848, $conn);
$Seventh_Demon_Q = item_q(127848, $conn);
$Ten_Thousand = item(127850, $conn);
$Ten_Thousand_Q = item_q(127850, $conn);
$Countless_Armies = item(127849, $conn);
$Countless_Armies_Q = item_q(127849, $conn);



//Legion Potions
$Prolonged_Power = item(142117, $conn);
$Old_War         = item(127844, $conn);

$Prolonged_Power_q = item_q(142117, $conn);
$Old_War_q         = item_q(127844, $conn);

//Legion other
$Defiled_Augment_Rune   = item(140587, $conn);
$Defiled_Augment_Rune_q = item_q(140587, $conn);*/
$everything_data = [
  "Obliterum"           => 124125,
  "PrimalObliterum"     => 152296,
  "AstralGlory"         => 151565,
  "Empyrium"            => 151564,
  "FiendishLeather"     => 151566,
  "LightweaveCloth"     => 151567,
  "AstralHealingPotion" => 152615,

  "Felwort"         => 124106,
  "Starlight_Rose"  => 124105,
  "Fjarnskaggl"     => 124104,
  "Foxflower"       => 124103,
  "Dreamleaf"       => 124102,
  "Aethril"         => 124101,
  "Yseralline_Seed" => 128304,

  "Felwort_Seed"        => 129289,
  "Starlight_Rose_Seed" => 129288,
  "Fjarnskaggl_Seed"    => 129287,
  "Foxflower_Seed"      => 129286,
  "Dreamleaf_Seed"      => 129285,
  "Aethril_Seed"        => 129284,

  "Chaos_Crystal"  => 124442,
  "Leylight_Shard" => 124441,
  "Arkhana"        => 124440,

  "Felhide"           => 124116,
  "Stonehide_Leather" => 124115,
  "Stormscale"        => 124113,

  "Wispered_Pact"    => 127847,
  "Seventh_Demon"    => 127848,
  "Ten_Thousand"     => 127850,
  "Countless_Armies" => 127849,

  "Prolonged_Power" => 142117,
  "Old_War"         => 127844,

  "Defiled_Augment_Rune"   => 140587

];
$everything = item_array($everything_data, $conn);
//Argus Stuff
$Obliterum           = $everything["Obliterum"]["min"];
$PrimalObliterum     = $everything["PrimalObliterum"]["min"];
$AstralGlory         = $everything["AstralGlory"]["min"];
$Empyrium            = $everything["Empyrium"]["min"];
$FiendishLeather     = $everything["FiendishLeather"]["min"];
$LightweaveCloth     = $everything["LightweaveCloth"]["min"];
$AstralHealingPotion = $everything["AstralHealingPotion"]["min"];

$Obliterum_q           = $everything["Obliterum"]["quantity"];
$PrimalObliterum_q     = $everything["PrimalObliterum"]["quantity"];
$AstralGlory_q         = $everything["AstralGlory"]["quantity"];
$Empyrium_q            = $everything["Empyrium"]["quantity"];
$FiendishLeather_q     = $everything["FiendishLeather"]["quantity"];
$LightweaveCloth_q     = $everything["LightweaveCloth"]["quantity"];
$AstralHealingPotion_q = $everything["AstralHealingPotion"]["quantity"];



//Legion Herbs
$Felwort         = $everything["Felwort"]["min"];
$Starlight_Rose  = $everything["Starlight_Rose"]["min"];
$Fjarnskaggl     = $everything["Fjarnskaggl"]["min"];
$Foxflower       = $everything["Foxflower"]["min"];
$Dreamleaf       = $everything["Dreamleaf"]["min"];
$Aethril         = $everything["Aethril"]["min"];
$Yseralline_Seed = $everything["Yseralline_Seed"]["min"];

$Felwort_q           = $everything["Felwort"]["quantity"];
$Starlight_Rose_q    = $everything["Starlight_Rose"]["quantity"];
$Fjarnskaggl_q       = $everything["Fjarnskaggl"]["quantity"];
$Foxflower_q         = $everything["Foxflower"]["quantity"];
$Dreamleaf_q         = $everything["Dreamleaf"]["quantity"];
$Aethril_q           = $everything["Aethril"]["quantity"];
$Yseralline_Seed_q   = $everything["Yseralline_Seed"]["quantity"];

//Legion seeds item:129289;item:129286;item:129288;item:129287;item:129284;item:129285
$Felwort_Seed        = $everything["Felwort_Seed"]["min"];
$Starlight_Rose_Seed = $everything["Starlight_Rose_Seed"]["min"];
$Fjarnskaggl_Seed    = $everything["Fjarnskaggl_Seed"]["min"];
$Foxflower_Seed      = $everything["Foxflower_Seed"]["min"];
$Dreamleaf_Seed      = $everything["Dreamleaf_Seed"]["min"];
$Aethril_Seed        = $everything["Aethril_Seed"]["min"];

$Felwort_Seed_q        = $everything["Felwort_Seed"]["quantity"];
$Starlight_Rose_Seed_q = $everything["Starlight_Rose_Seed"]["quantity"];
$Fjarnskaggl_Seed_q    = $everything["Fjarnskaggl_Seed"]["quantity"];
$Foxflower_Seed_q      = $everything["Foxflower_Seed"]["quantity"];
$Dreamleaf_Seed_q      = $everything["Dreamleaf_Seed"]["quantity"];
$Aethril_Seed_q        = $everything["Aethril_Seed"]["quantity"];


//Legion Enchanting Mats
$Chaos_Crystal  = $everything["Chaos_Crystal"]["min"];
$Leylight_Shard = $everything["Leylight_Shard"]["min"];
$Arkhana        = $everything["Arkhana"]["min"];

$Chaos_Crystal_q  = $everything["Chaos_Crystal"]["quantity"];
$Leylight_Shard_q = $everything["Leylight_Shard"]["quantity"];
$Arkhana_q        = $everything["Arkhana"]["quantity"];



//Legion Skinning
$Felhide           = $everything["Felhide"]["min"];
$Stonehide_Leather = $everything["Stonehide_Leather"]["min"];
$Stormscale        = $everything["Stormscale"]["min"];

$Felhide_q           = $everything["Felhide"]["quantity"];
$Stonehide_Leather_q = $everything["Stonehide_Leather"]["quantity"];
$Stormscale_q        = $everything["Stormscale"]["quantity"];









//Legion Flasks
$Wispered_Pact    = $everything["Wispered_Pact"]["min"];
$Seventh_Demon    = $everything["Seventh_Demon"]["min"];
$Ten_Thousand     = $everything["Ten_Thousand"]["min"];
$Countless_Armies = $everything["Countless_Armies"]["min"];

$Wispered_Pact_Q    = $everything["Wispered_Pact"]["quantity"];
$Seventh_Demon_Q    = $everything["Seventh_Demon"]["quantity"];
$Ten_Thousand_Q     = $everything["Ten_Thousand"]["quantity"];
$Countless_Armies_Q = $everything["Countless_Armies"]["quantity"];




//Legion Potions
$Prolonged_Power = $everything["Prolonged_Power"]["min"];
$Old_War         = $everything["Old_War"]["min"];

$Prolonged_Power_q = $everything["Prolonged_Power"]["quantity"];
$Old_War_q         = $everything["Old_War"]["quantity"];

//Legion other
$Defiled_Augment_Rune   = $everything["Defiled_Augment_Rune"]["min"];
$Defiled_Augment_Rune_q = $everything["Defiled_Augment_Rune"]["quantity"];




//Legion Flask Crafting Cost
$Wisper_Crafting_Cost = number_format((($Dreamleaf*10)+($Fjarnskaggl*10)+($Starlight_Rose)*7),2)/*/1.4802*/;
$Wisper_Profit        = ($Wispered_Pact-$Wisper_Crafting_Cost)*0.95;
$Wisper_Profit_r3     = ($Wispered_Pact-$Wisper_Crafting_Cost/1.4802)*0.95;

$Seventh_Crafting_Cost=number_format((($Foxflower*10)+($Fjarnskaggl*10)+($Starlight_Rose)*7),2)/*/1.4802*/;
$Seventh_Profit=($Seventh_Demon-$Seventh_Crafting_Cost)*0.95;
$Seventh_Profit_r3=($Seventh_Demon-$Seventh_Crafting_Cost/1.4802)*0.95;

$Ten_Thousand_Crafting_Cost=number_format((($Aethril*10)+($Dreamleaf*10)+($Starlight_Rose)*7),2)/*/1.4802*/;
$Ten_Thousand_Profit=($Ten_Thousand-$Ten_Thousand_Crafting_Cost)*0.95;
$Ten_Thousand_Profit_r3=($Ten_Thousand-$Ten_Thousand_Crafting_Cost/1.4802)*0.95;

$Countless_Crafting_Cost=number_format((($Foxflower*10)+($Aethril*10)+($Starlight_Rose)*7),2)/*/1.4802*/;
$Countless_Profit=($Countless_Armies-$Countless_Crafting_Cost)*0.95;
$Countless_Profit_r3=($Countless_Armies-$Countless_Crafting_Cost/1.4802)*0.95;


//Legion Potion Crafting Cost
$Old_War_Crafting_Cost  = number_format((($Foxflower*2)+($Fjarnskaggl*2)+$Starlight_Rose),2)/*/1.4802*/;
$Old_War_Profit         = ($Old_War-$Old_War_Crafting_Cost)*0.95;
$Old_War_Profit_r3      = ($Old_War-$Old_War_Crafting_Cost/1.4802)*0.95;

$Prolonged_Power_Crafting_Cost = number_format($bloodPrice/10,2)/*/1.4802*/;
$Prolonged_Power_Profit        = ($Prolonged_Power - $Prolonged_Power_Crafting_Cost)*0.95;
$Prolonged_Power_Profit_r3     = ($Prolonged_Power - $Prolonged_Power_Crafting_Cost/1.4802)*0.95;


$AstralHealingPotion_Crafting_Cost  = number_format(($AstralGlory*20),2)/*/1.4802*/;
$AstralHealingPotion_Profit         = ($AstralHealingPotion - $AstralHealingPotion_Crafting_Cost)*0.95;
$AstralHealingPotion_Profit_r3      = ($AstralHealingPotion - number_format(($AstralGlory*15),2)/1.4802)*0.95;




$last_updated_unix_row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(realm) FROM status"));
$last_updated_unix = $last_updated_unix_row["MAX(realm)"];
$last_updated = substr($last_updated_unix_row["MAX(realm)"], 0, -3);


?>










<?php include "inc/header.inc.php"; ?>


   <p>The Blizzard API updates around every 30-40 minutes.</p>

   <p>Last Updated: <span id='updated'></span></p>

   <?php echo "<span id='lastUpdate' style='display: none;'>".$last_updated_unix."</span>"; ?>
   <script>
     var lastUpdate = document.getElementById('lastUpdate').innerHTML;

     var x = setInterval(function(){
        var now = new Date().getTime();

        var distance = now - lastUpdate;

        var days = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60 * 60 *24));
        var hours = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);



        if(days > 1){
           document.getElementById("updated").innerHTML = "<strong>"+ days + " days " + hours + " hours ago.</strong>";
        } else if(hours > 1){
           document.getElementById("updated").innerHTML = "<strong>"+ hours + "h " + minutes + "m ago.</strong>";
        } else if(minutes > 1) {
           document.getElementById("updated").innerHTML = "<strong>"+ minutes + "m " + seconds + "s ago.</strong>";
        } else {
           document.getElementById("updated").innerHTML = "<strong>"+ seconds + "s.</strong>";
        }


     }, 1000);
   </script>




   <h2>
      <a href='//wowhead.com/item=124124' class='q3 iconmedium1 links' rel='item=124124' class="text-center"></a>
      :
      <?php echo $bloodPrice;?><span class='gold-g'>g </span>
      <a href='blood.php' class="btn btn-default links">See Blood of Sargeras Price in-depth</a></h2>

   


    <h2 class="text-center"> Category: Argus Stuff</h2>
    <div class="table-responsive">
      <table class="table table-striped table-hover table-mats align-center">
         <caption class="text-center">Materials</caption>
         <thead>
            <th class="tg-9nbt">Item name:</th>
            <th class="tg-9right">Low buy:</th>
            <th class="tg-9right">Market Value:</th>
            <th class="tg-9right">Available:</th>
         </thead>

         <tbody>
         <?php
            herbRow(151565, $AstralGlory, $AstralGlory_q);
            herbRow(151564, $Empyrium, $Empyrium_q);
            herbRow(151567, $LightweaveCloth, $LightweaveCloth_q);
            herbRow(151566, $FiendishLeather, $FiendishLeather_q);
         ?>
         </tbody>
      </table>
   </div>

   <div class="table-responsive">
      <table class="table table-striped table-hover table-mats align-center">
         <caption class="text-center">Obliterum</caption>
         <thead>
            <th class="tg-9nbt">Item name:</th>
            <th class="tg-9right">Low buy:</th>
            <th class="tg-9right">Market Value:</th>
            <th class="tg-9right">Available:</th>
         </thead>

         <tbody>
         <?php
            herbRow(124125, $Obliterum , $Obliterum_q);
            herbRow(152296, $PrimalObliterum, $PrimalObliterum_q);
            
         ?>
         </tbody>
      </table>
   </div>

   <h2 class="text-center"> Category: Alchemy</h2>
   <div class="table-responsive">
      <table class="table table-striped table-hover table-crafts table-sm">
         <caption class="text-center">Alchemy: Legion Flasks</caption>
         <thead>
            <tr>
               <th class="tg-9nbt">Item name:</th>
               <th class="tg-9right">Low buy:</th>
               <th class="tg-9right">Market Value:</th>
               <th class="tg-9right">Available:</th>
               <th class="tg-9center">Profit:</th>
               <th class="tg-9center">Profit Rank 3:</th>
            </tr>
         </thead>
         <tbody>
            <?php
               flaskRow(127847, $Wispered_Pact, $Wispered_Pact_Q, $Wisper_Crafting_Cost, $Wisper_Profit, $Wisper_Profit_r3);
               flaskRow(127848, $Seventh_Demon, $Seventh_Demon_Q, $Seventh_Crafting_Cost, $Seventh_Profit, $Seventh_Profit_r3);
               flaskRow(127849, $Countless_Armies, $Countless_Armies_Q, $Countless_Crafting_Cost, $Countless_Profit, $Countless_Profit_r3);
               flaskRow(127850, $Ten_Thousand, $Ten_Thousand_Q, $Ten_Thousand_Crafting_Cost, $Ten_Thousand_Profit, $Ten_Thousand_Profit_r3);
            ?>
         </tbody>
      </table>
   </div>

   <div class="table-responsive">
      <table class="table table-striped table-hover table-crafts">
         <caption class="text-center">Alchemy: Legion Potions</caption>
         <thead>
            <tr>
               <th class="tg-9nbt">Item name:</th>
               <th class="tg-9right">Low buy:</th>
               <th class="tg-9right">Market Value:</th>
               <th class="tg-9right">Available:</th>
               <th class="tg-9center">Profit:</th>
               <th class="tg-9center">Profit Rank 3:</th>
            </tr>
         </thead>
         <tbody>
            <?php
               flaskRow(142117, $Prolonged_Power, $Prolonged_Power_q, $Prolonged_Power_Crafting_Cost, $Prolonged_Power_Profit, $Prolonged_Power_Profit_r3);
               flaskRow(127844, $Old_War, $Old_War_q, $Old_War_Crafting_Cost, $Old_War_Profit, $Old_War_Profit_r3);
               flaskRow(152615, $AstralHealingPotion, $AstralHealingPotion_q, $AstralHealingPotion_Crafting_Cost, $AstralHealingPotion_Profit, $AstralHealingPotion_Profit_r3);
            ?>
         </tbody>
      </table>
   </div>

   <div class="table-responsive">
      <table class="table table-striped table-hover table-mats align-center">
         <caption class="text-center">Legion other</caption>
         <thead>
            <th class="tg-9nbt">Item name:</th>
            <th class="tg-9right">Low buy:</th>
            <th class="tg-9right">Market Value:</th>
            <th class="tg-9right">Available:</th>
         </thead>

         <tbody>
         <?php
            herbRow(140587, $Defiled_Augment_Rune, $Defiled_Augment_Rune_q);
         ?>
         </tbody>
      </table>
   </div>

   <div class="table-responsive">
      <table class="table table-striped table-hover table-mats align-center">
         <h2 class="text-center"> Category: Legion Mats</h2>

         <caption class="text-center">Herbs</caption>
         <thead>
            <th class="tg-9nbt">Item name:</th>
            <th class="tg-9right">Low buy:</th>
            <th class="tg-9right">Market Value:</th>
            <th class="tg-9right">Available:</th>
         </thead>

         <tbody>
         <?php
            herbRow(124106, $Felwort, $Felwort_q);
            herbRow(124105, $Starlight_Rose, $Starlight_Rose_q);
            herbRow(124104, $Fjarnskaggl, $Fjarnskaggl_q);
            herbRow(124103, $Foxflower, $Foxflower_q);
            herbRow(124102, $Dreamleaf, $Dreamleaf_q);
            herbRow(124101, $Aethril, $Aethril_q);
            herbRow(128304, $Yseralline_Seed , $Yseralline_Seed_q);
         ?>
         </tbody>

      </table>
   </div>


   <div class="table-responsive">
      <table class="table table-striped table-hover table-mats align-center">
         <caption class="text-center">Seeds</caption>
         <thead>
            <th class="tg-9nbt">Item name:</th>
            <th class="tg-9right">Low buy:</th>
            <th class="tg-9right">Market Value:</th>
            <th class="tg-9right">Available:</th>
         </thead>

         <tbody>
         <?php
            herbRow(129289, $Felwort_Seed, $Felwort_Seed_q);
            herbRow(129288, $Starlight_Rose_Seed, $Starlight_Rose_Seed_q);
            herbRow(129287, $Fjarnskaggl_Seed, $Fjarnskaggl_Seed_q);
            herbRow(129286, $Foxflower_Seed, $Foxflower_Seed_q);
            herbRow(129285, $Dreamleaf_Seed, $Dreamleaf_Seed_q);
            herbRow(129284, $Aethril_Seed, $Aethril_Seed_q);
         ?>
         </tbody>
      </table>
   </div>

   <div class="table-responsive">
      <table  class="table table-striped table-hover table-mats align-center">
         <caption class="text-center">Other mats<caption>
         <thead>
            <tr>
               <th class="tg-9nbt">Item name:</th>
               <th class="tg-9right">Low buy:</th>
               <th class="tg-9right">Market Value:</th>
               <th class="tg-9right">Available:</th>
            <tr>
         </thead>

         <tbody>
            <?php
               herbRow(124442, $Chaos_Crystal, $Chaos_Crystal_q);
               herbRow(124441, $Leylight_Shard, $Leylight_Shard_q);
               herbRow(124440, $Arkhana, $Arkhana_q);
            ?>

            <tr>
               <th class="tg-9nbt">Item name:</th>
               <th class="tg-9right">Low buy:</th>
               <th class="tg-9right">Market Value:</th>
               <th class="tg-9right">Available:</th>
            </tr>

            <?php
               herbRow(124116, $Felhide, $Felhide_q);
               herbRow(124115, $Stonehide_Leather, $Stonehide_Leather_q);
               herbRow(124113, $Stormscale, $Stormscale_q);
            ?>
         </tbody>
      </table>
   </div>

<?php include "inc/footer.inc.php"; ?>
