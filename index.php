<head>

<script type="text/javascript" src="//wow.zamimg.com/widgets/power.js"></script>
<script>var wowhead_tooltips = { "colorlinks": true, "iconizelinks": true, "renamelinks": true }</script>


</head>


<?php


include "dbh.php";
include "inc/marketvalue.inc.php";

$GLOBALS['conn'] = $conn;




function item($id, $conn){
   $sql_herb = "SELECT MIN(buyout / quantity)/10000 as MIN FROM auctions where item=".$id."";
   $result_herb = mysqli_query($conn, $sql_herb);
   if ($result_herb->num_rows > 0) {
       while($row = $result_herb->fetch_assoc()) {
   	      $herb=$row["MIN"];
       }
   }
   return $herb;
}

function item_q($id, $conn){
   $sql_herb = "SELECT sum(quantity) as SUM FROM auctions where item=".$id."";
   $result_herb = mysqli_query($conn, $sql_herb);
   if ($result_herb->num_rows > 0) {
       while($row = $result_herb->fetch_assoc()) {
   	      $herb=$row["SUM"];
       }
   }
   return $herb;
}



function herbRow($id, $herb, $q){
   include 'dbh.php';
   echo ("
   <tr>
      <td><a href='item.php?item=".$id."' class='q3' rel='item=".$id."'></td>
      <td align='right'>".number_format($herb,2)."<span class='gold-g'>g</span></td>
      <td align='right'>".number_format(marketValue($id, $conn), 2)."<span class='gold-g'>g</span></td>
      <td align='right'>".$q."</td>
   </tr>
   ");
}

function flaskRow($id, $flask, $q, $cost, $profit, $profit_r3){
   include 'dbh.php';
   echo "
   <tr>
      <td><a href='item.php?item=".$id."' class='q3' rel='item=".$id."'></td>
      <td align='right'>".number_format($flask,2)."<span class='gold-g'>g</span></td>
      <td align='right'>".number_format(marketValue($id, $conn), 2)."<span class='gold-g'>g</span></td>
      <td align='right'>".$q."</td>
      <td align='right'>";
         if ($profit>0) {
            echo "<b><font color=green> +" .number_format($profit,2)."<span class='gold-g'>g</span>";
         } else {
            echo "<b><font color=red>" .number_format($profit,2)."<span class='gold-g'>g</span>";
         }
      echo "</td>
            <td align='right'>";
      if ($profit_r3>0)
      {
         echo "<b><font color=green> +" .number_format($profit_r3,2)."<span class='gold-g'>g</span>";
      } else {
         echo "<b><font color=red>" .number_format($profit_r3,2)."<span class='gold-g'>g</span>";
      }
      echo "</td>";
   echo "</tr>";
}





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
$Old_War         = item(127884, $conn);

$Prolonged_Power_q = item_q(142117, $conn);
$Old_War_q         = item_q(127884, $conn);

//Legion other
$Defiled_Augment_Rune   = item(140587, $conn);
$Defiled_Augment_Rune_q = item_q(140587, $conn);




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
$Old_War_Crafting_Cost=number_format((($Foxflower*2)+($Fjarnskaggl*2)+$Starlight_Rose),2)/*/1.4802*/;
$Old_War_Profit=($Old_War-$Old_War_Crafting_Cost)*0.95;
$Old_War_Profit_r3=($Old_War-$Old_War_Crafting_Cost/1.4802)*0.95;

$Prolonged_Power_Crafting_Cost=0;
$Prolonged_Power_Profit=0;
$Prolonged_Power_Profit_r3=0;






$last_updated_unix_row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(realm) FROM status"));
$last_updated_unix = $last_updated_unix_row["MAX(realm)"];
$last_updated = substr($last_updated_unix_row["MAX(realm)"], 0, -3);


?>










<?php include "inc/header.inc.php"; ?>

<div class="col-md-3 col-sm-1 col-xs-0">
</div>

<div class="col-md-6 col-sm-8 col-xs-10">
   <p>Last Updated: <?php echo date("Y-m-d H:i:s", $last_updated);?></p>
   <p>Next Update should happen at: <span id='nextUpdate' style="display: none;"><?php echo $last_updated_unix; ?></span><?php echo date("Y-m-d H:i:s", strtotime("+30 minutes", $last_updated));?></p>
   <?php echo "<p><span id='update'></span></p>"; ?>
   <script>
      var nextUpdate = document.getElementById('nextUpdate').innerHTML;

      var x = setInterval(function() {

        var now = new Date().getTime();

        var distance = nextUpdate - now + 30*60*1000;

        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById("update").innerHTML = "The database can be updated in <strong>" + minutes + " minutes " + seconds + " seconds.</strong>";

        if (distance < 0) {
          clearInterval(x);
          document.getElementById("update").innerHTML = "The database can be updated!";
        }
     }, 1000);
   </script>
   <h2 class="text-center"> Category: Alchemy</h2>


   <table class="table table-striped table-hover">
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

   <table class="table table-striped table-hover">
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
            //flaskRow(127884, $Old_War, $Old_War_q, $Old_War_Crafting_Cost, $Old_War_Profit, $Old_War_Profit_r3);
         ?>
      </tbody>
   </table>

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

<div class="col-md-3 col-sm-1 col-xs-0">
</div>

<?php include "inc/footer.inc.php"; ?>
