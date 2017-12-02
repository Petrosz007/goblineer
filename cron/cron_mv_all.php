<?php
// Script start
$rustart = getrusage();

ini_set('max_execution_time', 300);
require __DIR__ . "/cron_includes.php";


sleep(20);
//marketValueAll($conn);

$sql = "SELECT DISTINCT item FROM auctions ORDER BY item ASC";
$result = mysqli_query($conn, $sql);

$i = 0;
while($row = mysqli_fetch_assoc($result)){
    marketValue($row['item'], $conn);
    ++$i;
    echo "MV for item ".$row['item']." complete, ".$i." completed.". PHP_EOL;
}








//Creating mv.json, which will be used in the in-game addon
$selectSql = "SELECT item, marketvalue, quantity FROM marketvalue";
$selectResult = mysqli_query($conn, $selectSql);
echo "Query done...". PHP_EOL;
$allItems = array();
while($row = mysqli_fetch_assoc($selectResult)){
    $allItems[] = $row;
}
echo "Created Array...". PHP_EOL;
//write to json file
$fp = fopen(__DIR__ . '/../json/mv.json', 'w');
fwrite($fp, json_encode($allItems));
fclose($fp);
echo "File created!". PHP_EOL;
















//Creating mv_names.json, the same as above, but has items names and min buyout as well
$selectSql =   "SELECT t1.item, t1.name, t1.marketvalue, t1.quantity, t2.MIN
FROM
    (SELECT marketvalue.item, name, marketvalue, quantity FROM marketvalue LEFT JOIN items ON marketvalue.item = items.item) as t1
LEFT JOIN 
    (SELECT MIN(buyout / quantity)/10000 as MIN, item FROM auctions GROUP BY item) as t2
ON
    t1.item = t2.item";
$selectResult = mysqli_query($conn, $selectSql);
echo "Query done...". PHP_EOL;
$allItems = array();
while($row = mysqli_fetch_assoc($selectResult)){
$allItems[] = $row;
}
echo "Created Array...". PHP_EOL;
//write to json file
$fp = fopen(__DIR__ . '/../json/mv_names.json', 'w');
fwrite($fp, json_encode($allItems));
fclose($fp);
echo "File created!". PHP_EOL;

















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

exit();

?>
