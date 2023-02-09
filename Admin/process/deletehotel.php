<?php
    $pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
    $id = $_GET['id'];
    $statementplace = $pdo->prepare("UPDATE hotels SET hotel_delete=? WHERE Id=?");
    $statementplace->execute(array(1,$id));
    $message = 'hotel DELETE Successfully!.';
    echo "<SCRIPT>alert('$message');window.location.replace('../hotelsmanagement.php');</SCRIPT>";
?>