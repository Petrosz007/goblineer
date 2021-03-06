<?php
ini_set('mysql.connect_timeout', 1000);
ini_set('default_socket_timeout', 1000); 

require __DIR__ . "/cron_includes.php";

// Getting the oauth token
$oauthToken = getOAuthToken($clientId, $clientSecret);
echo "Got the OAuth Access token\n";


// Getting the time of the last update
$lastUpdateSql="SELECT realm from status WHERE id IN (SELECT MAX(id) FROM status)";
$lastUpdateResult = mysqli_query($conn, $lastUpdateSql);
$lastUpdate = mysqli_fetch_assoc($lastUpdateResult)["realm"];

// Checking if the auctions table is empty
$checkEmptyResult = mysqli_query($conn, "SELECT * FROM auctions");
$isEmpty = mysqli_num_rows($checkEmptyResult) == 0;


if($argv[1] == 'force'){
    echo "Forcing update.". PHP_EOL;
    $lastUpdate = "";
}
else if($isEmpty) {
    echo "No auctions in db, running update...".PHP_EOL;
    $lastUpdate = "";
}


// Getting the auctions
$connectedRealmRaw = getRequest('https://'.$realmRegion.'.api.blizzard.com/data/wow/realm/'.$realmName.'?namespace=dynamic-'
.$realmRegion.'&locale=en_US&access_token='.$oauthToken);
$realmHref = json_decode($connectedRealmRaw, true)["connected_realm"]["href"];
$matches;
preg_match('/connected-realm\/(\d+)\?/', $realmHref, $matches);
$realmId = $matches[1];

$auctionsUrl = 'https://'.$realmRegion.'.api.blizzard.com/data/wow/connected-realm/'.$realmId.'/auctions?namespace=dynamic-'.$realmRegion.
'&locale=en_GB&access_token='.$oauthToken;

$response = getAuctionsRequest($auctionsUrl, $lastUpdate);

$responseObject = json_decode($response, true);
echo "Got the API json data.\n";

if($responseObject == null) {
    echo "No need for update".PHP_EOL;
    exit();
}
else {
    $apiLastUpdate = getLastUpdate($auctionsUrl);
    $sql = "INSERT INTO status (realm) VALUES('".$apiLastUpdate."');";
    var_dump($sql);
    mysqli_query($conn, $sql);

    writeData($conn, $responseObject);
    exit();
}

function getOAuthToken($clientId, $clientSecret) {
    // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
    //Getting the OAuth token
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://us.battle.net/oauth/token");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_USERPWD, $clientId.':'.$clientSecret);

    $headers = array();
    $headers[] = "Content-Type: application/x-www-form-urlencoded";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $oauthToken = json_decode(curl_exec($ch), true)["access_token"];
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close ($ch);

    return $oauthToken;
}

function getRequest($url) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");


    $headers = array();
    $headers[] = "Accept: application/json";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
    }
    curl_close ($ch);

    return $response;
}

function getAuctionsRequest($url, $date) {
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");


    $headers = array('Accept: application/json', 'If-Modified-Since: '.$date);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
    }
    curl_close ($ch);

    return $response;
}

function getLastUpdate($url) {
    $headers = get_headers($url, 1);
    $lastUpdateString = $headers['Last-Modified'];

    return $lastUpdateString;
}

function writeData($conn, $responseObject){

	$last_updated_unix_row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(realm) FROM status"));
	$last_updated_unix = $last_updated_unix_row["MAX(realm)"];
	$last_updated = substr($last_updated_unix_row["MAX(realm)"], 0, -3);
	/*Archiving previous data*/
	$historicalSql = "INSERT INTO historical(item, marketvalue, quantity, date) SELECT item, marketvalue, quantity, ".$last_updated." FROM marketvalue";
	mysqli_query($conn, $historicalSql);

      /*deleting duplicates*/
      mysqli_query($conn,    "CREATE TABLE historical_tmp LIKE historical;
                              INSERT INTO historical_tmp (item, marketvalue, quantity, date) SELECT DISTINCT item, marketvalue, quantity, date FROM `historical`;
                              TRUNCATE TABLE historical;
                              INSERT INTO historical SELECT * FROM historical_tmp;
                              DROP TABLE historical_tmp;");

//    $auctionsFile = file_get_contents($responseObject['files'][0]['url']);
//    $auctionsArray = json_decode($auctionsFile, true)['auctions'];
    $auctionsArray = $responseObject["auctions"];

   mysqli_query($conn, "TRUNCATE TABLE auctions");
   mysqli_query($conn, "TRUNCATE TABLE marketvalue");
   mysqli_query($conn, "TRUNCATE TABLE blood");

   $sql = "INSERT INTO auctions (auc, item, owner, buyout, quantity) VALUES ";
   $i = 0;
   $counter = 0;

    foreach ($auctionsArray as $auction) {
        // Stackable items
        if(array_key_exists('unit_price', $auction)) {
            $sql = $sql . " (". $auction['id'].",". $auction['item']['id'].",null,".$auction['unit_price'].",".$auction['quantity']."),";
        }
        // Battle pets, BOEs, ...
        else {
            $sql = $sql . " (". $auction['id'].",". $auction['item']['id'].",null,".$auction['buyout'].",".$auction['quantity']."),";
        }


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

   mysqli_query($conn, "CREATE TABLE auctions_tmp LIKE auctions;
                        INSERT INTO auctions_tmp (auc, item, owner, buyout, quantity) SELECT auc, item, owner, buyout, quantity FROM auctions ORDER BY item, owner, quantity, buyout;
                        TRUNCATE TABLE auctions;
                        INSERT INTO auctions SELECT * FROM auctions_tmp;
                        DROP TABLE auctions_tmp");




   echo "Update successful.". PHP_EOL;
   echo "Updating Market Values.". PHP_EOL;
   system('php /var/www/html/cron/cron_mv_all.php 2>&1', $output);
   echo $output. PHP_EOL;
   system('pm2 restart bot', $output); //Restarts the discord bot to prevent caching issues. Replace 'bot' with the name of the apprunning in pm2
   echo $output. PHP_EOL;

   exit();
;

}

?>
