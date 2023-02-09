<?php
    $pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
    $id = $_GET['id'];
    $statementplace = $pdo->prepare("UPDATE places SET PlaceIsDelete=? WHERE Id=?");
    $statementplace->execute(array(1,$id));
    $message = 'Place DELETE Successfully!.';
    echo "<SCRIPT>alert('$message');window.location.replace('../placesmanagement.php');</SCRIPT>";
?>