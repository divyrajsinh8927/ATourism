<?php
header('Content-Type: application/json');
$CONNECTION = new PDO("mysql:host=localhost;port=3306;dbname=tourism", "root", "");
$request = getRequestData($CONNECTION);
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        getAllUser($CONNECTION);
        break;

    case 'POST':
        if ($request->Id)
            getUser($request->Id, $CONNECTION);

        else
            addUser($request, $CONNECTION);
        break;


    case 'PUT':
        if (isset($request->Id))
        {
            updatePassword($request, $CONNECTION);
        }

        else
        {
            $id = $_GET['id'];
            $request = getRequestData($CONNECTION);

            updateUser($id, $request, $CONNECTION);
        }
        break;

    case 'DELETE':
        deleteUser($_GET['id'], $CONNECTION);
        break;

    default:
        http_response_code(405);
        break;
}

function getAllUser($CONNECTION)
{
    $query = "SELECT * FROM `users`";

    $statement = $CONNECTION->prepare($query);
    $statement->execute();

    $users = $statement->fetchAll(PDO::FETCH_OBJ);
    if (count($users) == 0) {
        http_response_code(204);
        exit();
    }

    echo json_encode(["Users" => $users]);
}

function getUser($id, $CONNECTION)
{
    $query = "SELECT * FROM `users` WHERE `Id` = ?";

    $statement = $CONNECTION->prepare($query);
    $statement->execute([$id]);

    $user = $statement->fetch(PDO::FETCH_OBJ);
    if ($user == null) {
        http_response_code(404);
        exit();
    }

    echo json_encode($user);
}

function addUser($data, $CONNECTION)
{
    $fullName = $data->Name;
    $mobileNumber = $data->MobileNumber;
    $email = $data->Email;
    $password = $data->PasswordHash;
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);



    $statement = $CONNECTION->prepare("SELECT COUNT(*) AS `ExistingUserCount` FROM `users` WHERE `Email` = ?");
    $statement->execute([$email]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    if ($result['ExistingUserCount'] > 0) {
        http_response_code(409);
        die(json_encode(["message" => "User already exists!"]));
    }

    $query = "INSERT INTO `users` (`Name`, `MobileNumber`,`Email`,`PasswordHash`) VALUES (?, ?,?,?)";
    $statement = $CONNECTION->prepare($query);

    $statement->execute([$fullName, $mobileNumber, $email, $passwordHash]);
    http_response_code(201);
}


function updateUser($id, $data, $CONNECTION)
{
    $fullName = $data->Name;
    $mobileNumber = $data->MobileNumber;
    $email = $data->Email;
    $password = $data->PasswordHash;
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // if (trim($fullName) == "" || $age < 1) {
    //     http_response_code(400);
    //     exit();
    // }

    $query = "UPDATE `users` SET `Name` = ?, `MobileNumber` = ?`Email` = ?, `PasswordHash` = ? WHERE `Id`= ?";
    $statement = $CONNECTION->prepare($query);

    $statement->execute([$fullName, $mobileNumber, $email, $passwordHash, $id]);
}

function updatePassword($data, $CONNECTION)
{
    $id = $data->Id;
    $password = $data->PasswordHash;
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE `users` SET  `PasswordHash` = ? WHERE `Id`= ?";
    $statement = $CONNECTION->prepare($query);

    $statement->execute([$passwordHash, $id]);
}

function deleteUser($id, $CONNECTION)
{
    $query = "UPDATE `users` SET UserIsDelete = ? WHERE `Id`= ?";
    $statement = $CONNECTION->prepare($query);

    $statement->execute([1, $id]);
}


function getRequestData($CONNECTION)
{
    $requestData = file_get_contents("php://input");
    $request = json_decode($requestData);

    return $request;
}
