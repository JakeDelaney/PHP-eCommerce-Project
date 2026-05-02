<?php
//this template blocks end users from accessing any webpages that are for members only (requiring them to signup to access them)
require_once('../src/session-start.php');

//IF STATEMENT
//check if session value is to false and redirect the user to the signup page to create an account
if($_SESSION['Active'] == false) {
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">