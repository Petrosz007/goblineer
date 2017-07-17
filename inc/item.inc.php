<?php
include 'dbh.php';

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
