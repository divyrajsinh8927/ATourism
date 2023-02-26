<?php
header('Content-Type: application/json');
$CONNECTION = new PDO("mysql:host=localhost;port=3306;dbname=tourism", "root", "");
switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        if (isset($_GET['id']))
            getBooking($_GET['id'], $CONNECTION);
        elseif (isset($_GET['User_id']))
            getUserBooking($_GET['User_id'], $CONNECTION);
        else
            getAllBookings($CONNECTION);
        break;

    case 'POST':
        $request = getRequestData($CONNECTION);
        addBooking($request, $CONNECTION);
        break;

    // case 'PUT':

    //     $id = $_GET['id'];
    //     $request = getRequestData($CONNECTION);

    //     // updatebooking($id, $request, $CONNECTION);
    //     break;

    case 'DELETE':
        deletebooking($_GET['id'], $CONNECTION);
        break;

    default:
        http_response_code(405);
        break;
}

function getAllBookings($CONNECTION)
{
    $query = "SELECT * FROM `booking`";

    $statement = $CONNECTION->prepare($query);
    $statement->execute();

    $bookings = $statement->fetchAll(PDO::FETCH_OBJ);
    if (count($bookings) == 0) {
        http_response_code(204);
        exit();
    }

    echo json_encode(["bookings" => $bookings]);
}

function getBooking($id, $CONNECTION)
{
    $array = array();

    $query = "SELECT * FROM `booking` WHERE `Id` = ?";
    $statement = $CONNECTION->prepare($query);
    $statement->execute([$id]);
    $booking = $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($booking == null) {
        http_response_code(404);
        exit();
    }

    foreach ($booking as $bookings) {
        $Hotel_id = $bookings['Hotel_id'];
        $query = "SELECT * FROM `hotels` WHERE `Id` = ?";
        $statementHotel = $CONNECTION->prepare($query);
        $statementHotel->execute([$Hotel_id]);
        $hotels = $statementHotel->fetch();

        if ($bookings['Status'] == null) {
            $Status = "waiting";
        } elseif ($bookings['Status'] == 0) {
            $Status = "Rejected";
        } else {
            $Status = "Confirmed";
        }

        $tep = [
            "Id" => $bookings['Id'],
            "BookingFor" => $bookings['BookingFor'],
            "HotelName" => $hotels['HotelName'],
            "BookingDate" => $bookings['BookingDate'],
            "ArrivalDate" => $bookings['ArrivalDate'],
            "LeavingDate" => $bookings['LeavingDate'],
            "Totaldays" => $bookings['Totaldays'],
            "TotalRooms" => $bookings['TotalRooms'],
            "TotalPrice" => $bookings['TotalPrice'],
            "Status" => $Status,
            "BookingIsCancel" => $bookings['BookingIsCancel'],
            "PerDayPrice" => $hotels['PerDayPrice']
        ];

        array_push($array, $tep);
    }

    echo json_encode($array);
}

function getUserBooking($userid, $CONNECTION)
{
    $array = array();

    $query = "SELECT * FROM `booking` WHERE `User_id` = ?";
    $statement = $CONNECTION->prepare($query);
    $statement->execute([$userid]);
    $booking = $statement->fetchAll(PDO::FETCH_ASSOC);

    if ($booking == null) {
        http_response_code(404);
        exit();
    }

    foreach ($booking as $bookings) {
        $Hotel_id = $bookings['Hotel_id'];
        $query = "SELECT * FROM `hotels` WHERE `Id` = ?";
        $statementHotel = $CONNECTION->prepare($query);
        $statementHotel->execute([$Hotel_id]);
        $hotels = $statementHotel->fetch();

        if ($bookings['Status'] == null) {
            $Status = "waiting";
        } elseif ($bookings['Status'] == 0) {
            $Status = "Rejected";
        } else {
            $Status = "Confirmed";
        }

        $tep = [
            "Id" => $bookings['Id'],
            "BookingFor" => $bookings['BookingFor'],
            "HotelName" => $hotels['HotelName'],
            "BookingDate" => $bookings['BookingDate'],
            "ArrivalDate" => $bookings['ArrivalDate'],
            "LeavingDate" => $bookings['LeavingDate'],
            "Totaldays" => $bookings['Totaldays'],
            "TotalRooms" => $bookings['TotalRooms'],
            "TotalPrice" => $bookings['TotalPrice'],
            "Status" => $Status,
            "BookingIsCancel" => $bookings['BookingIsCancel']
        ];
        array_push($array, $tep);
    }

    echo json_encode($array);
}

function addBooking($data, $CONNECTION)
{
    $User_id = $data->User_id;
    $BookingFor = $data->BookingFor;
    $HotalName = $data->HotelName;
    $BookingDate = $data->BookingDate;
    $ArrivalDate = $data->ArrivalDate;
    $LeavingDate = $data->LeavingDate;
    $Totaldays = $data->Totaldays;
    $TotalRooms = $data->TotalRooms;
    $TotalPrice = $data->TotalPrice;

    $query = "INSERT INTO `booking` (`User_id`, `BookingFor`,`Hotel_id`,`BookingDate`,`ArrivalDate`,`LeavingDate`,`Totaldays`,`TotalRooms`,`TotalPrice`) VALUES (?, ? ,? ,? ,? ,? ,? , ?, ?)";
    $statement = $CONNECTION->prepare($query);

    $statement->execute([$User_id, $BookingFor, $HotalName, $BookingDate, $ArrivalDate, $LeavingDate, $Totaldays, $TotalRooms, $TotalPrice]);
    http_response_code(201);
}


// function updateBooking($id, $data, $CONNECTION)
// {
//     $BookingFor = $data->BookingFor;
//     $ArrivalDate = $data->ArrivalDate;
//     $LeavingDate = $data->LeavingDate;
//     $Totaldays = $data->Totaldays;
//     $TotalRooms = $data->TotalRooms;
//     $TotalPrice = $data->TotalPrice;

//     $query = "UPDATE `booking` SET `BookingFor` = ?, `ArrivalDate` = ?`LeavingDate` = ?, `Totaldays` = ?, `TotalRooms` = ?,`TotalPrice` = ? WHERE `Id`= ?";
//     $statement = $CONNECTION->prepare($query);

//     $statement->execute([$BookingFor, $ArrivalDate, $LeavingDate, $Totaldays,$TotalRooms,$TotalPrice $id]);
// }

function deleteBooking($id, $CONNECTION)
{
    $query = "UPDATE `booking` SET bookingIsCancel = ? WHERE `Id`= ?";
    $statement = $CONNECTION->prepare($query);

    $statement->execute([1, $id]);
}

function getRequestData($CONNECTION)
{
    $requestData = file_get_contents("php://input");
    $request = json_decode($requestData);

    return $request;
}
