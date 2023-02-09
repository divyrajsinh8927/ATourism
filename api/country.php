<?php
header('Content-Type: application/json');
$connection = new PDO("mysql:host=localhost;port=3306;dbname=tourism", "root", "");
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if(isset($_GET['country_id']))
        clientReviews($_GET['country_id'],$connection);
        break;

    default:
        http_response_code(405);
        break;
}

function clientReviews($country_id,$connection)
{
    $query = "SELECT * FROM `country` WHERE `Id` = ?";
    $countryment = $connection->prepare($query);
    $countryment->execute([$country_id]);
    $country = $countryment->fetchAll(PDO::FETCH_ASSOC);

    $json = json_encode(["country"  => $country]);
    echo $json;
}