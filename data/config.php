<?php
//CONFIG FILE WITH CREDENTIALS TO OPEN CONNECTION TO DATABASE
$host="localhost";
$username="root";
$password="";
$dbname="emerald_records_db";
$dsn="mysql:host=$host;dbname=$dbname";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);
?>