<?php
$servername = '127.0.0.1';
$username = '';
$password = '';
$schema = 'wowah';
$apiKey = '';
$realmName = 'ragnaros';
$realmRegion = 'eu';



$conn = new mysqli($servername, $username, $password, $schema);
$conn->set_charset('utf8');
if ($conn->connect_error) {
   die('Connection failed: ' . $conn->connect_error);
}
