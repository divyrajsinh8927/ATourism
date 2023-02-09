<?php
session_start();
if(isset($_SESSION["user"]))
{
unset($_SESSION["user"]);
}
elseif(isset($_SESSION["hotel"]))
{
unset($_SESSION["hotel"]);
}
header("Location: ./login.php");
?>