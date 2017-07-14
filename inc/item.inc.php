<?php
include 'dbh.php';

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
