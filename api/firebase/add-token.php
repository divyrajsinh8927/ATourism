<?php 

require('./includes/init.php'); 

$userId = $_GET['userId'];
$token = $_GET['token'];

execute("UPDATE `users` SET `FirebaseToken` = ? WHERE `Id` = ?", [$token, $userId]);