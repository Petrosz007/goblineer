<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . "/includes.php");

function item($id, $conn){
   $sql_herb = "SELECT MIN(buyout / quantity)/10000 as MIN FROM auctions where item=$id";
   $result_herb = mysqli_query($conn, $sql_herb);
   if (mysqli_num_rows($result_herb) > 0) {
       while($row = mysqli_fetch_assoc($result_herb)) {
   	      $herb=$row["MIN"];
       }
   }
   return $herb;
}

function item_q($id, $conn){
   $sql_herb = "SELECT sum(quantity) as SUM FROM auctions where item=$id";
   $result_herb = mysqli_query($conn, $sql_herb);
   if (mysqli_num_rows($result_herb) > 0) {
       while($row = mysqli_fetch_assoc($result_herb)) {
   	      $herb=$row["SUM"];
       }
   } elseif (mysqli_num_rows($result_herb) == 0) {
      return 0;
   }
   return $herb;
}






function item_array($ids, $conn)
{
    $items = [];
    foreach($ids as $name => $id)
    {
        $sql_item = "SELECT MIN(buyout / quantity)/10000 as MIN, sum(quantity) as quantity FROM auctions where item=$id";
        $result_item = mysqli_query($conn, $sql_item);
        if (mysqli_num_rows($result_item) > 0) {
            while($row = mysqli_fetch_assoc($result_item)) {
                $items[$name]["id"] = $id;
                $items[$name]["min"] =  $row["MIN"];
                $items[$name]["quantity"] =  $row["quantity"];
                $items[$name]["marketvalue"] = marketValue($id, $conn);
            }
        } else {
            $items[$name]["id"] = null;
            $items[$name]["min"] =  null;
            $items[$name]["quantity"] =  null;
            $items[$name]["marketvalue"] = null;
        }
    }

    return $items;
}

function tableRow($item)
{
    echo("
    <tr>
      <td><a href='item/".$item["id"]."' class='q3 links' rel='item=".$item["id"]."'></td>
      <td align='right'>".number_format($item["min"],2)."<span class='gold-g'>g</span></td>
      <td align='right'>".number_format($item["marketvalue"], 2)."<span class='gold-g'>g</span></td>
      <td align='right'>".$item["quantity"]."</td>
    </tr>
    ");
}


function table($items, $caption)
{
    echo('
    <div class="table-responsive">
    <table class="table table-striped table-hover table-mats align-center">
        <caption class="text-center">'.$caption.'</caption>
        <thead>
        <th class="tg-9nbt">Item name:</th>
        <th class="tg-9right">Low buy:</th>
        <th class="tg-9right">Market Value:</th>
        <th class="tg-9right">Available:</th>
        </thead>

        <tbody>');

        foreach($items as $item)
        {
            tableRow($item);
        }
        
    echo('
        </tbody>
    </table>
    </div>
    ');
}






function herbRow($id, $herb, $q){
   include 'dbh.php';
   echo ("
   <tr>
      <td><a href='item/".$id."' class='q3 links' rel='item=".$id."'></td>
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
      <td><a href='item/".$id."' class='q3 links' rel='item=".$id."'></td>
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
