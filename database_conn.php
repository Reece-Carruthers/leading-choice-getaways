<?php

$dbConn = new mysqli(
    'localhost',
    'XXXXXXXX',
    'XXXXXXXX!',
    'XXXXXXXX');

if($dbConn->connect_error){
    echo "<p>Connection failed: ".$dbConn->connect_error."</p>p>\n";
    exit;
}
?>

