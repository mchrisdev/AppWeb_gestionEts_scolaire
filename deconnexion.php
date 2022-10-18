<?php
session_start();
unset($_SESSION['user_token']);
$_SESSION[] = array();

session_destroy();
header('Location:index.php');

?>