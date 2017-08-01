<?php
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


exit();

?>
