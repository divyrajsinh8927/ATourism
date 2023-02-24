
<?php
$pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
$id = $_GET['id'];

$statement = $pdo->prepare("UPDATE booking SET status=? WHERE Id=?");
$statement->execute(array(2, $id));

$statementbookingdata = $pdo->prepare("SELECT * from booking where Id=?");
$statementbookingdata->execute(array($id));
$data = $statementbookingdata->fetch();
$userid = $data['User_id'];
header("Location: ../../api/firebase/notify.php?User_id=$userid&status=1");
?>