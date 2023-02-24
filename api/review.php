<?php
header('Content-Type: application/json');
$connection = new PDO("mysql:host=localhost;port=3306;dbname=tourism", "root", "");
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        clientReviews($connection);
        break;

    default:
        http_response_code(405);
        break;
}

function clientReviews($connection)
{
    $query = "SELECT * FROM `client_reiviws`";
    $statement = $connection->prepare($query);

    $statement->execute();
    $clientreiviws = $statement->fetchAll(PDO::FETCH_ASSOC);

    $arr = Array();
    foreach ($clientreiviws as $clientreiviw) {
        $userId = $clientreiviw['User_id'];
        $user = $connection->prepare("Select * from users where Id = ?");
        $user->execute([$userId]);
        $userRecord = $user->fetch();

        $tep = [
            "Id" => $clientreiviw['Id'],
            "Reviews" => $clientreiviw['Reviews'],
            "Stars" => $clientreiviw['Stars'],
            "userName" => $userRecord['Name']
        ];
        array_push($arr, $tep);

    }

    $json = json_encode($arr);
    echo $json;
}
