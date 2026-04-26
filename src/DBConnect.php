<?php
//Retrieves database credentials from config file
require_once '../data/config.php';
//Creates an instance of PDO class and attempts to open database connection with values from config.php passed as arguments
try {
    $connection = new PDO($dsn, $username, $password, $options);
} catch (PDOException $error) {
    throw new PDOException($error->getMessage(), (int)$error->getCode());
}
?>