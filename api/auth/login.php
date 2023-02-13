<?php
header('Content-Type: application/json');

$requestString = file_get_contents("php://input");
$request = json_decode($requestString);

if ($_SERVER['REQUEST_METHOD'] !== 'POST')
{
    http_response_code(405);
    exit();
}

try
{
    if (!isset($request->Email) || !isset($request->PasswordHash))
    {
        http_response_code(400);
        exit();
    }
    
    $email = $request->Email;
    $password = $request->PasswordHash;
    
    $connection = new PDO("mysql:host=localhost;port=3306;dbname=tourism", "root", "");

    $statement = $connection->prepare("SELECT * FROM `users` WHERE `Email` = ?");
    $statement->execute([$email]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($result == null)
    {
        http_response_code(404);
        die(json_encode(["message" => "Wrong email or password!"]));
    }

    if (!password_verify($password, $result['PasswordHash']))
    {
        http_response_code(404);
        die(json_encode(["message" => "Wrong email or password!"]));
    }   
    http_response_code(200);
    echo json_encode($result);
}
catch (Exception $ex)
{
    http_response_code(500);
    echo json_encode(["reason" => $ex->getMessage()]);
}
