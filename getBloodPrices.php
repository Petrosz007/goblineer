<?php
include 'includes.php';

bloodPrices();

header("Location: index.php");
exit();
echo "Success, updated!<br>
<a href='index.php'>Return to the home page</a>";

?>
