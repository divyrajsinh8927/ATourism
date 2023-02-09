<?php
header('Content-Type: Application/jason');
$connection = new PDO("mysql:host=localhost;port=3306;dbname=tourism", "root", "");
$request = getRequestData();
switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
            getAllHotels($connection);
        break;
    case "POST";
        if (isset($request->Hotel_id))
            getHotel($request->Hotel_id, $connection);
        break;
    default:
        http_response_code(405);
        break;
}

function getAllHotels($connection)
{
    $query = "SELECT * FROM `hotels`";
    $statement = $connection->prepare($query);
    $arr = Array();
    $statement->execute();
    $hotels = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($hotels as $hotel) {
        $city_id = $hotel['City_id'];
        $city = $connection->prepare("Select * from city where Id = $city_id");
        $city->execute();
        $cityRecord = $city->fetch();
        $query = "SELECT * FROM `hotelmedia` WHERE `Hotel_id` = ?";
        $statement = $connection->prepare($query);
    
        $statement->execute([$hotel['Id']]);
        $hotelsimage = $statement->fetch(PDO::FETCH_ASSOC);

        $tep = [
            "Id" => $hotel['Id'],
            "HotelName" => $hotel['HotelName'],
            "CityName" => $cityRecord['CityName'],
            "HotelDetail" => $hotel['HotelDetail'],
            "HotelIsDelete" => $hotel['HotelIsDelete'],
            "HotelImage" => $hotelsimage['HotelImages']
        ];
        array_push($arr, $tep);
    }

    $json = json_encode($arr);
    echo $json;
}

function getHotel($hotel_id, $connection)
{

    $array = Array();

    $query = "SELECT * FROM `hotelmedia` WHERE `Hotel_id` = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$hotel_id]);
    $hotelsimages = $statement->fetchAll(PDO::FETCH_ASSOC);

    $image1 = $hotelsimages[0]['HotelImages'];
    $image2 = $hotelsimages[1]['HotelImages'];
    $image3 = $hotelsimages[2]['HotelImages'];
    

    $query = "SELECT * FROM `hotels` WHERE `Id` = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$hotel_id]);
    $hotels = $statement->fetch();
    $city_id = $hotels['City_id'];

    $city = $connection->prepare("SELECT * FROM `city` where `Id` = $city_id");
    $city->execute();
    $cityRecord = $city->fetch();
    $State_id = $cityRecord['State_id'];

    $query = "SELECT * FROM `states` WHERE `Id` = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$State_id]);
    $State = $statement->fetch();
    $country_id = $State['Country_id'];

    $query = "SELECT * FROM `country` WHERE `Id` = ?";
    $countryment = $connection->prepare($query);
    $countryment->execute([$country_id]);
    $country = $countryment->fetch();

    $temp = [
        "Hotel_id" => $hotels['Id'],
        "HotelName" => $hotels['HotelName'],
        "PerDayPrice" => $hotels['PerDayPrice'],
        "CityName" => $cityRecord['CityName'],
        "CountryName" => $country['CountryName'],
        "Discription" => $hotels['HotelDetail'],
        "HotelImage1" => $image1,
        "HotelImage2" => $image2,
        "HotelImage3" => $image3
    ];

    array_push($array, $temp);

    

    $json = json_encode($array);
    echo $json;
}

function getRequestData()
{
    $requestData = file_get_contents("php://input");
    $request = json_decode($requestData);

    return $request;
}
