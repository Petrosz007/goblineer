<?php
//error_reporting(E_ALL); ini_set('display_errors', '1');
ini_set('max_execution_time', 300);
require __DIR__ . "/cron_includes.php";

$sql = "SELECT item FROM auctions GROUP BY item";
$result = mysqli_query($conn, $sql);


$sql2 = "SELECT * FROM items";
$result2 = mysqli_query($conn, $sql2);
$alreadydid = array();


while($row = mysqli_fetch_assoc($result2)){
    array_push($alreadydid, $row['item']);
}




$sql = 'INSERT INTO items (item, name) VALUES ';
$i = 0;

while($row = mysqli_fetch_assoc($result)){
    if(!in_array($row['item'], $alreadydid)){
        $response = file_get_contents('https://'. $realmRegion .'.api.battle.net/wow/item/'. $row['item'] .'?locale=en_GB&apikey=' . $apiKey);
        $responseObject = json_decode($response, true)['name'];
        
        $name = str_replace('"','""',$responseObject);
        $sql = $sql . ' ('.$row['item'].', "'.$name.'"),';
        ++$i;
        if($i == 50) {
            $sql = substr($sql, 0, -1);
            $sql = $sql .";";
            mysqli_query($conn, $sql);
            //echo "line 35 ".$sql;
            exit();
        }
    }
}


if($i > 0){
    $sql = substr($sql, 0, -1);
    $sql = $sql .";";
    mysqli_query($conn, $sql);
    //echo "line 46 " . $sql;
}





?>