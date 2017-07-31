<?php
ini_set('max_execution_time', 300);
require __DIR__ . "/cron_includes.php";

$sql = "SELECT DISTINCT item FROM auctions";
$result = mysqli_query($conn, $sql);

$i = 0;
while($row = mysqli_fetch_assoc($result)){
    marketValue($row['item'], $conn);
    ++$i;
    echo "MV for item ".$row['item']." complete, ".$i." completed.". PHP_EOL;
}


exit();

?>
