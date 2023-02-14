<?php

define("BASE_DIR", $_SERVER['DOCUMENT_ROOT'] . "/ATourism");
define("BASE_URL", "/ATourism");

// define("BASE_DIR", $_SERVER['DOCUMENT_ROOT'] . "");
// define("BASE_URL", "");

date_default_timezone_set('Asia/Kolkata');
$connection = new PDO(
    "mysql:host=localhost;port=3306;dbname=tourism",
    "root",
    ""
);

function pathOf($path)
{
    return BASE_DIR . "/" . $path;
}

function urlOf($path)
{
    return BASE_URL . '/' . $path;
}

function execute($query, $params = null)
{
    global $connection;

    $statement = $connection->prepare($query);
    return $statement->execute($params);
}

function selectOne($query, $params = null)
{
    global $connection;

    $statement = $connection->prepare($query);
    $statement->execute($params);

    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function select($query, $params = null)
{
    global $connection;

    $statement = $connection->prepare($query);
    $statement->execute($params);

    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function lastInsertId()
{
    global $connection;
    return $connection->lastInsertId();
}

function getLastError()
{
    global $connection;
    return $connection->errorInfo();
}

function getRequestBody()
{
    $jsonString = file_get_contents("php://input");
    return json_decode($jsonString);
}

function mustBeLoggedIn()
{
    $request = getRequestBody();
    if (!isset($request->userId)) {
        http_response_code(403);
        exit();
    }
}

function getLoggedInUser()
{
    $request = getRequestBody();
    $user = selectOne("SELECT `Id`, `Email`, `IsVerified`, `UserRoleId` FROM `Users` WHERE `Id` = ?", [$request->userId]);

    if ($user == null) {
        http_response_code(403);
        exit();
    }

    return $user;
}

function allowedMethods($methods)
{
    array_push($methods, 'OPTIONS');
    $currentMethod = $_SERVER['REQUEST_METHOD'];

    if (!in_array($currentMethod, $methods)) {
        http_response_code(405);
        exit();
    }
}

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");