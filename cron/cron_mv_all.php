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
