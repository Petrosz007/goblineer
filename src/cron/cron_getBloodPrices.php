<?php
require __DIR__ . "/cron_includes.php";

bloodPrices($conn);

echo "Updated Blood Prices" . PHP_EOL;
exit();

?>
