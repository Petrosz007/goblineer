<?php
// Script start
$rustart = getrusage();

ini_set('max_execution_time', 300);
require __DIR__ . "/cron_includes.php";
global $conn;

sleep(10);

marketValueAll($conn);



// Script end
function rutime($ru, $rus, $index) {
    return ($ru["ru_$index.tv_sec"]*1000 + intval($ru["ru_$index.tv_usec"]/1000))
     -  ($rus["ru_$index.tv_sec"]*1000 + intval($rus["ru_$index.tv_usec"]/1000));
}

$ru = getrusage();
echo "This process used " . rutime($ru, $rustart, "utime") .
    " ms for its computations\n";
echo "It spent " . rutime($ru, $rustart, "stime") .
    " ms in system calls\n";

function marketValueAll($conn){
    $itemsResult = mysqli_query($conn,  "SELECT DISTINCT item FROM auctions");
    $items = array();
    while($row = mysqli_fetch_assoc($itemsResult)){
        $items[] = $row['item'];
    }




    $mvSqlOriginal = "INSERT INTO mv_all_test (item, marketvalue, quantity) VALUES ";
    $mvSql = $mvSqlOriginal;

    $counter = 0;
    $i = 0;
    foreach($items as $id){
        $item = marketValueArray($id, $conn);
        $mvSql = $mvSql . "(".$item['item'].", ".$item['marketValue'].", ".$item['quantity']."),";

        ++$i;
        ++$counter;
        if($i == 100) {
            $mvSql = substr($mvSql, 0, -1);
            $mvSql = $mvSql .";";
            mysqli_query($conn, $mvSql);
            echo $counter." completed.". PHP_EOL;
            $mvSql = $mvSqlOriginal;
            $i = 0;
        }
        
    }

    if($i > 0){
        $mvSql = substr($mvSql, 0, -1);
        $mvSql = $mvSql .";";
        mysqli_query($conn, $mvSql);
        echo $counter." completed.". PHP_EOL;
    }

}
