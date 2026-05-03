<?php
//waits for user to click logout button, and then redirects them here
//Creates an instance of session and calls the forgetSession() function from its class
require_once('../src/session-end.php');
$session = new session();
$session->forgetSession();
exit;
?>