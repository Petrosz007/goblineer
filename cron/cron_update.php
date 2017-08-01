<?php
ini_set('mysql.connect_timeout', 1000);
ini_set('default_socket_timeout', 1000); 

require __DIR__ . "/cron_includes.php";


   $response = file_get_contents('https://'. $realmRegion .'.api.battle.net/wow/auction/data/'. $realmName .'?locale=en_GB&apikey=' . $apiKey);
   $responseObject = json_decode($response, true);


   $checkdate="SELECT realm from status ORDER BY id ASC";
   $result3 = mysqli_query($conn, $checkdate);


      if($argv[1] == 'force'){
            echo "Forcing update.". PHP_EOL;
            writeData($conn, $responseObject);
            exit();
      }

   if (mysqli_num_rows($result3) > 0) {

      while($row = mysqli_fetch_assoc($result3)){

           $lastentry=$row["realm"];

      }

      if ($lastentry==$responseObject['files'][0]['lastModified']) {

         echo "Last entry in the database is too recent. Not updating. Try again later.<br>
               <a href='index.php'>Return to the home page</a>".PHP_EOL;
         exit();

      } else {

         writeData($conn, $responseObject);
         exit();

      }
   } elseif (mysqli_num_rows($result3) == 0) {

         echo "No last entry found. Forcing update.".PHP_EOL;
         writeData($conn, $responseObject);
         exit();
   }


function writeData($conn, $responseObject){

	$last_updated_unix_row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(realm) FROM status"));
	$last_updated_unix = $last_updated_unix_row["MAX(realm)"];
	$last_updated = substr($last_updated_unix_row["MAX(realm)"], 0, -3);
	/*Archiving previous data*/
	$historicalSql = "INSERT INTO historical(item, marketvalue, quantity, date) SELECT item, marketvalue, quantity, ".$last_updated." FROM marketvalue";
	mysqli_query($conn, $historicalSql);

      /*deleting duplicates*/
      mysqli_query($conn, "CREATE TABLE test20 LIKE historical");
      mysqli_query($conn, "INSERT INTO test20 (item, marketvalue, quantity, date) SELECT DISTINCT item, marketvalue, quantity, date FROM `historical`");
      mysqli_query($conn, "DROP TABLE historical");
      mysqli_query($conn, "RENAME TABLE test20 TO historical");



   $sql = "INSERT INTO status (realm) VALUES(".$responseObject['files'][0]['lastModified'].");";
   mysqli_query($conn, $sql);

   $auctionsFile = file_get_contents($responseObject['files'][0]['url']);
   $auctionsArray = json_decode($auctionsFile, true)['auctions'];

   mysqli_query($conn, "TRUNCATE TABLE auctions");
   mysqli_query($conn, "TRUNCATE TABLE marketvalue");
   mysqli_query($conn, "TRUNCATE TABLE blood");

   $sql = "INSERT INTO auctions (auc, item, owner, buyout, quantity) VALUES ";
   $i = 0;
   $counter = 0;

   foreach ($auctionsArray as $auction) {
      $sql = $sql . " (". $auction['auc'].",". $auction['item'].",'".$auction['owner']."',".$auction['buyout'].",".$auction['quantity']."),";

      ++$i;
      ++$counter;
      if($i == 5000) {
         $sql = substr($sql, 0, -1);
         $sql = $sql .";";
         mysqli_query($conn, $sql);
         echo "Ran ".$counter. PHP_EOL;
         $sql = "INSERT INTO auctions (auc, item, owner, buyout, quantity) VALUES ";
         $i = 0;
      }
   }

   if($i > 0){
      $sql = substr($sql, 0, -1);
      $sql = $sql .";";
      echo "Ran".$counter. PHP_EOL;
      mysqli_query($conn, $sql);
   }


   mysqli_query($conn, "DELETE FROM auctions WHERE buyout=0");

   mysqli_query($conn, "CREATE TABLE test LIKE auctions");
   mysqli_query($conn, "INSERT INTO test (auc, item, owner, buyout, quantity) SELECT auc, item, owner, buyout, quantity FROM auctions ORDER BY item, owner, quantity, buyout");
   mysqli_query($conn, "DROP TABLE auctions");
   mysqli_query($conn, "RENAME TABLE test TO auctions");




   echo "Update successful.". PHP_EOL;
   echo "Updating Market Values.". PHP_EOL;
   system('php /var/www/html/cron/cron_mv_all.php 2>&1', $output);
   echo $output. PHP_EOL;
   exit();
;

}

?>
