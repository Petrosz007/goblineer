<?php
require_once __DIR__ . "/cron_includes.php";
global $conn;

function calculateMarketvalues(): void
{
  global $conn;

  $sql = "SELECT DISTINCT item FROM auctions ORDER BY item ASC";
  $result = mysqli_query($conn, $sql);

  $i = 0;
  while ($row = mysqli_fetch_assoc($result)) {
    marketValue($row['item']);
    ++$i;

    if($i % 100 == 0) {
      echo $i . " completed." . PHP_EOL;
    }
  }
  echo $i . " completed." . PHP_EOL;

}

//Creating mv.json, which will be used in the in-game addon
function createMVJson(): void
{
  global $conn;

  $selectSql = "SELECT item, marketvalue, quantity FROM marketvalue";
  $selectResult = mysqli_query($conn, $selectSql);
  echo "Query done..." . PHP_EOL;
  $allItems = array();
  while ($row = mysqli_fetch_assoc($selectResult)) {
    $allItems[] = $row;
  }
  echo "Created Array..." . PHP_EOL;
  //write to json file
  $fp = fopen(__DIR__ . '/../json/mv.json', 'w');
  fwrite($fp, json_encode($allItems));
  fclose($fp);
  echo "File created!" . PHP_EOL;
}


function doMVAll(): void
{
  calculateMarketvalues();
  createMVJson();
}

function benchmarkMarketvalueCalculation(): void
{
  $rustart = getrusage();

  doMVAll();

  function rutime($ru, $rus, $index): float|int
  {
    return ($ru["ru_$index.tv_sec"] * 1000 + intval($ru["ru_$index.tv_usec"] / 1000))
      - ($rus["ru_$index.tv_sec"] * 1000 + intval($rus["ru_$index.tv_usec"] / 1000));
  }

  $ru = getrusage();
  echo "This process used " . rutime($ru, $rustart, "utime") .
    " ms for its computations\n";
  echo "It spent " . rutime($ru, $rustart, "stime") .
    " ms in system calls\n";
}
