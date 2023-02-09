<?php
header('Content-Type: Application/jason');
$connection = new PDO("mysql:host=localhost;port=3306;dbname=tourism", "root", "");
switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        if (isset($_GET["id"]))
            getState($_GET["id"], $connection);
        else
            getAllStates($connection);
        break;
    default:
        http_response_code(405);
        break;
}

function getAllStates($connection)
{
    $query = "SELECT * FROM `states`";
    $statement = $connection->prepare($query);

    $statement->execute();
    $States = $statement->fetchAll(PDO::FETCH_ASSOC);

    $json = json_encode(["States: " => $States]);
    echo $json;
}

function getState($State_id, $connection)
{

    $query = "SELECT * FROM `states` WHERE `Id` = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$State_id]);
    $State = $statement->fetchAll(PDO::FETCH_ASSOC);

    $json = json_encode(["State: " => $State]);
    echo $json;
}
