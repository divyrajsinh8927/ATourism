<?php
$pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
$id=$_GET['id'];
            $statementusers = $pdo->prepare("SELECT * FROM users WHERE Id=?");
            $statementusers->execute(array($id));
            $rowuser = $statementusers->fetch();
            $status=$rowuser['Status'];
if ($status == 0) {
    $statement = $pdo->prepare("UPDATE users SET Status=? WHERE Id=?");
    $statement->execute(array(1,$id));
    header("Location: ../usersmanagement.php");
}
elseif($status == 1)
{
    $statement = $pdo->prepare("UPDATE users SET Status=? WHERE Id=?");
    $statement->execute(array(0,$id));
    header("Location: ../usersmanagement.php");
}
?>
