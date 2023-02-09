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

    $json = json_encode(["client reiviws"  => $clientreiviws]);
    echo $json;
}
