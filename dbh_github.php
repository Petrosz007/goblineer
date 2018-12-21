<?php
$servername = '';
$username = '';
$password = '';
$schema = '';
$apiKey = '';
$clientId = '';
$clientSecret = '';
$realmName = '';
$realmRegion = '';

$conn = new mysqli($servername, $username, $password, $schema);

$conn->set_charset('utf8');
if ($conn->connect_error) {
   die('Connection failed: ' . $conn->connect_error);
}

$GLOBALS['conn'] = $conn;