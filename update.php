<?php

include "dbh.php";


   $response = file_get_contents('https://'. $realmRegion .'.api.battle.net/wow/auction/data/'. $realmName .'?locale=en_GB&apikey=' . $apiKey);
   $responseObject = json_decode($response, true);


   $checkdate="SELECT realm from status where realm=(select max(realm));";
   $result3 = mysqli_query($conn, $checkdate);


   if (mysqli_num_rows($result3) > 0) {

      while($row = mysqli_fetch_assoc($result3)){

           $lastentry=$row["realm"];

      }

      if ($lastentry==$responseObject['files'][0]['lastModified']) {

         echo "Last entry in the database is too recent. Not updating. Try again later.<br>
               <a href='index.php'>Return to the home page</a>";

      } else {

         writeData($conn, $responseObject);

      }
   } elseif (mysqli_num_rows($result3) == 0) {

         echo "No last entry found. Forcing update.";
         writeData($conn, $responseObject);
         echo "line 45";

   }


function writeData($conn, $responseObject){



   $sql = "INSERT INTO status (realm) VALUES(".$responseObject['files'][0]['lastModified'].");";
   mysqli_query($conn, $sql);

   $auctionsFile = file_get_contents($responseObject['files'][0]['url']);
   $auctionsArray = json_decode($auctionsFile, true)['auctions'];

   mysqli_query($conn, "TRUNCATE TABLE auctions");

   $sql = "INSERT INTO auctions (auc, item, owner, buyout, quantity) VALUES ";
   $i = 0;

   foreach ($auctionsArray as $auction) {
      $sql = $sql . " (". $auction['auc'].",". $auction['item'].",'".$auction['owner']."',".$auction['buyout'].",".$auction['quantity']."),";

      ++$i;
      if($i == 1000) {
         $sql = substr($sql, 0, -1);
         $sql = $sql .";";
         mysqli_query($conn, $sql);
         $sql = "INSERT INTO auctions (auc, item, owner, buyout, quantity) VALUES ";
         $i = 0;
      }
   }

   if($i > 0){
      $sql = substr($sql, 0, -1);
      $sql = $sql .";";
      mysqli_query($conn, $sql);
   }


   mysqli_query($conn, "DELETE FROM auctions WHERE buyout=0");

   mysqli_query($conn, "CREATE TABLE test LIKE auctions");
   mysqli_query($conn, "INSERT INTO test (auc, item, owner, buyout, quantity) SELECT auc, item, owner, buyout, quantity FROM auctions ORDER BY item, owner, quantity, buyout");
   mysqli_query($conn, "DROP TABLE auctions");
   mysqli_query($conn, "RENAME TABLE test TO auctions");

   header("Location: index.php");
   exit();
   echo "Success, updated!<br>
   <a href='index.php'>Return to the home page</a>";

}

?>
