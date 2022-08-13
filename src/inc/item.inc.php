<?php
include_once(__DIR__ . "/../includes.php");

global $conn;

function item($id, $conn){
    $result = null;

    $stmt = $conn->prepare("SELECT MIN(buyout / quantity)/100 as MIN FROM auctions where item=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($result);
    $stmt->fetch();
    $stmt->close();

    return $result;
}

function item_q($id, $conn){
    $result = null;

    $stmt = $conn->prepare("SELECT sum(quantity) as SUM FROM auctions where item=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($result);

    if($stmt->fetch() == null) {
        return 0;
    }

    $stmt->close();
    return $result;
}






function item_array($ids, $conn)
{
    $items = [];
    foreach($ids as $name => $id)
    {
        $min = null;
        $quantity = null;

        $stmt = $conn->prepare("SELECT MIN(buyout / quantity) as MIN, sum(quantity) as quantity FROM auctions where item=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($min, $quantity);


        if ($stmt->fetch()) {
            $items[$name]["id"] = $id;
            $items[$name]["min"] =  $min;
            $items[$name]["quantity"] =  $quantity;
            $items[$name]["marketvalue"] = marketValue($id, $conn);
        } else {
            $items[$name]["id"] = null;
            $items[$name]["min"] =  null;
            $items[$name]["quantity"] =  null;
            $items[$name]["marketvalue"] = null;
        }

        $stmt->close();
    }

    return $items;
}

function tableRow($item)
{
    echo("
    <tr>
      <td><a href='item/".$item["id"]."' class='q3 links' rel='item=".$item["id"]."'></td>
      <td align='right'>".number_format($item["min"] ?? 0,2)."<span class='gold-g'>g</span></td>
      <td align='right'>".number_format($item["marketvalue"] ?? 0, 2)."<span class='gold-g'>g</span></td>
      <td align='right'>".($item["quantity"] ?? 0)."</td>
    </tr>
    ");
}

function cmp($a, $b) {
    if ($a["marketvalue"] == $b["marketvalue"]) {
        return 0;
    }
    return ($a["marketvalue"] > $b["marketvalue"]) ? -1 : 1;
}

function table($items, $caption)
{
    

    uasort($items, 'cmp');

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






function herbRow($id, $herb, $q) {
    global $conn;

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
    global $conn;

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
