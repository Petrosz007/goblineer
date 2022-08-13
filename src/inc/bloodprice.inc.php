<?php

function bloodPrice($conn){
   $sql = "SELECT item, marketvalue, quantity, (marketvalue * quantity) AS unit_price
           FROM blood
           ORDER BY unit_price DESC
           LIMIT 1";

   $result = mysqli_query($conn, $sql);
   $unit_price = mysqli_fetch_assoc($result)['unit_price'] ?? 0;
   return number_format($unit_price, 2);
}

function bloodPrices($conn){
   $sql = "SELECT item, marketvalue, quantity, (marketvalue * quantity) AS unit_price FROM blood ORDER BY unit_price DESC";
   $result = mysqli_query($conn, $sql);

   if(mysqli_num_rows($result) == 0){

      $Blood20 = array(124439);
      $Blood10 = array(142117,124440,124109,124112,124111,
                       124103,124104,124102,124119,124120,
                       123918,124101,124118,124115,124113,
                       124437,124107,124108,124117,124121,
                       124110);
      $Blood5 = array(123919);
      $Blood3 = array(124441,124105);


      $sql = "INSERT INTO blood(item, marketvalue, quantity, bloodprice) VALUES ";

      foreach($Blood20 as $b){
         $mv = marketValue($b);
         $sql = $sql . "($b, $mv, 20, ".($mv*20)."),";
      }

      foreach($Blood10 as $b){
         $mv = marketValue($b);
         $sql = $sql . "($b, $mv, 10, ".($mv*10)."),";
      }

      foreach($Blood5 as $b){
         $mv = marketValue($b);
         $sql = $sql . "($b, $mv, 5, ".($mv*5)."),";
      }

      foreach($Blood3 as $b){
         $mv = marketValue($b);
         $sql = $sql . "($b, $mv, 3, ".($mv*3)."),";
      }


      $sql = substr($sql, 0, -1);
      $sql = $sql .";";
      mysqli_query($conn, $sql);

      $sql = "SELECT item, marketvalue, quantity, (marketvalue * quantity) AS unit_price FROM blood ORDER BY unit_price DESC";
      return $result = mysqli_query($conn, $sql);
      exit();
   } else {
      return $result;
      exit();
   }
}
