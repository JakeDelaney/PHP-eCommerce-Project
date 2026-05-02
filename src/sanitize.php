<?php
//Function receives user input as argument, trims any leading whitespaces, removes slashes and converts to HTML entities
//once finished the sanitized data is returned to the function caller
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
    return $data;
}
?>