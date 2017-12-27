<?php
//error_reporting(E_ALL); ini_set('display_errors', '1');
ini_set('max_execution_time', 300);
require __DIR__ . "/cron_includes.php";

$sql = "SELECT DISTINCT item FROM auctions";
$result = mysqli_query($GLOBALS['conn'], $sql);


$sql2 = "SELECT * FROM items";
$result2 = mysqli_query($GLOBALS['conn'], $sql2);
$alreadydid = array();

$last_sql = "SELECT MAX(last) AS last FROM item_status";
$last_result = mysqli_query($GLOBALS['conn'], $last_sql);
$last = mysqli_fetch_assoc($last_result)['last'];
echo "Last: ".$last. PHP_EOL;

while($row = mysqli_fetch_assoc($result2)){
    array_push($alreadydid, $row['item']);
}


$sql = 'INSERT INTO items (item, name) VALUES ';
$i = 0;



while($row = mysqli_fetch_assoc($result)){
    if(!in_array($row['item'], $alreadydid)){
        $response = @file_get_contents('https://'. $realmRegion .'.api.battle.net/wow/item/'. $row['item'] .'?locale=en_GB&apikey=' . $apiKey);
        var_dump($response);
        echo "Before ".$row['item'] ."  auc  ". $i. PHP_EOL;

        if($response != false){
            echo "After  ".$row['item'] ."  auc  ". $i. PHP_EOL;
            $response = file_get_contents('https://'. $realmRegion .'.api.battle.net/wow/item/'. $row['item'] .'?locale=en_GB&apikey=' . $apiKey);

            
            $responseObject = json_decode($response, true)['name'];
            
            $name = str_replace('"','""',$responseObject);
            $sql = $sql . ' ('.$row['item'].', "'.$name.'"),';
            ++$i;
            if($i == 45) {
                $sql = substr($sql, 0, -1);
                $sql = $sql .";";
                mysqli_query($GLOBALS['conn'], $sql);
                exit();

            }
        }
    }
}







if($i > 0){
    $sql = substr($sql, 0, -1);
    $sql = $sql .";";
    mysqli_query($GLOBALS['conn'], $sql);
}





?>