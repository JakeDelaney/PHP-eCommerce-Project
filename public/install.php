<?php 
//Connects to MySQL instance using the details in the config file, 
//and then builds a database, table and constraints based on details in the init.sql file

//require config.php file
require "../data/config.php";
try {
    //creates a new PDO object and passes credentials from the config.php file as arguments
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    //retrieves SQL statements from init.sql file
    $sql = file_get_contents("../data/init.sql");
    //connects to database and passes retrieved SQL statements
    $connection->exec($sql);
    Echo "DB setup successfully";
}   catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>