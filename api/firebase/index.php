<?php 
require('./includes/init.php'); 
$users = select("SELECT `Id`, `Username` FROM `Users`");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['Id'] ?></td>
                    <td><?= $user['Username'] ?></td>
                    <td>
                        <button onclick="showNotification(<?= $user['Id'] ?>)">Show notification</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script>
        function showNotification(userId)
        {
            window.location.href = `notify.php?id=${userId}`;
        }
    </script>
</body>
</html>