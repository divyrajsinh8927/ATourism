<?php
header('Content-Type: Application/jason');
$connection = new PDO("mysql:host=localhost;port=3306;dbname=tourism", "root", "");
switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        if (isset($_GET["id"]))
            getCity($_GET["id"], $connection);
        else
            getAllcitys($connection);
        break;
    default:
        http_response_code(405);
        break;
}

function getAllcitys($connection)
{
    $query = "SELECT * FROM `city`";
    $statement = $connection->prepare($query);

    $statement->execute();
    $citys = $statement->fetchAll(PDO::FETCH_ASSOC);

    $json = json_encode(["Citys: " => $citys]);
    echo $json;
}

function getCity($city_id, $connection)
{

    $query = "SELECT * FROM `city` WHERE `Id` = ?";
    $statement = $connection->prepare($query);

    $statement->execute([$city_id]);
    $city = $statement->fetchAll(PDO::FETCH_ASSOC);

    $json = json_encode(["City: " => $city]);
    echo $json;
}
