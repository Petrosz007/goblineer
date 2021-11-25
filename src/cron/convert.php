<?php
require __DIR__ . "/cron_includes.php";

$selectSql = "SELECT item, name FROM items";
$selectResult = mysqli_query($conn, $selectSql);
echo "Query done...". PHP_EOL;
$allItems = array();
while($row = mysqli_fetch_assoc($selectResult)){
    $allItems[] = $row;
}
echo "Created Array...". PHP_EOL;
//write to json file
$fp = fopen(__DIR__ . '/items.json', 'w');
fwrite($fp, json_encode(array_values(array_unique($allItems, SORT_REGULAR))));
fclose($fp);
echo "File created!". PHP_EOL;
exit();