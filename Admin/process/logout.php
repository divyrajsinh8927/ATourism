<?php
session_start();
unset($_SESSION["Admin"]);
header("Location: ../../loginlogout/login.php");
?>