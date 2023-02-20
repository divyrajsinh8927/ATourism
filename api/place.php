<?php
header('Content-Type: Application/jason');
$connection = new PDO("mysql:host=localhost;port=3306;dbname=tourism", "root", "");
$request = getRequestData();
switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        if(isset($_GET["cityId"]))
            getPlacesByCity($_GET["cityId"],$connection);
        else
            getAllPlaces($connection);
        break;
    case "POST":
        if (isset($request->Place_id))
            getPlace($request->Place_id, $connection);
        break;    
    default:
        http_response_code(405);
        break;
}

function getPlacesByCity($cityId,$connection)
{
    $query = "SELECT * FROM `places` WHERE City_Id = ?";
    $statement = $connection->prepare($query);
    $arr = Array();
    $statement->execute([$cityId]);
    $places = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($places as $place) {
        $city_id = $place['City_id'];
        $city = $connection->prepare("Select * from city where Id = $city_id");
        $city->execute();
        $cityRecord = $city->fetch();
        $query = "SELECT * FROM `placemedia` WHERE `Place_id` = ? LIMIT 1";
        $statement = $connection->prepare($query);

    $statement->execute([$place['Id']]);
    $placesimages = $statement->fetch(PDO::FETCH_ASSOC);

        $tep = [
            "Id" => $place['Id'],
            "PlaceName" => $place['PlaceName'],
            "CityName" => $cityRecord['CityName'],
            "Discription" => $place['Discription'],
            "PlaceIsDelete" => $place['PlaceIsDelete'],
            "PlaceImage" => $placesimages['PlaceImages']

        ];
        array_push($arr, $tep);
    }



    $json = json_encode($arr);
    echo $json;
}

function getAllPlaces($connection)
{
    $query = "SELECT * FROM `places`";
    $statement = $connection->prepare($query);
    $arr = Array();
    $statement->execute();
    $places = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach ($places as $place) {
        $city_id = $place['City_id'];
        $city = $connection->prepare("Select * from city where Id = $city_id");
        $city->execute();
        $cityRecord = $city->fetch();
        $query = "SELECT * FROM `placemedia` WHERE `Place_id` = ? LIMIT 1";
        $statement = $connection->prepare($query);

    $statement->execute([$place['Id']]);
    $placesimages = $statement->fetch(PDO::FETCH_ASSOC);

        $tep = [
            "Id" => $place['Id'],
            "PlaceName" => $place['PlaceName'],
            "CityName" => $cityRecord['CityName'],
            "Discription" => $place['Discription'],
            "PlaceIsDelete" => $place['PlaceIsDelete'],
            "PlaceImage" => $placesimages['PlaceImages']

        ];
        array_push($arr, $tep);
    }



    $json = json_encode($arr);
    echo $json;
}

function getPlace($place_id, $connection)
{
    $array = Array();

    $query = "SELECT * FROM `placemedia` WHERE `Place_id` = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$place_id]);
    $placesimages = $statement->fetchAll(PDO::FETCH_ASSOC);

    $image1 = $placesimages[0]['PlaceImages'];
    $image2 = $placesimages[1]['PlaceImages'];
    $image3 = $placesimages[2]['PlaceImages'];
    

    $query = "SELECT * FROM `places` WHERE `Id` = ?";
    $statement = $connection->prepare($query);
    $statement->execute([$place_id]);
    $places = $statement->fetch();
    $city_id = $places['City_id'];

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
        "Place_id" => $places['Id'],
        "PlaceName" => $places['PlaceName'],
        "CityName" => $cityRecord['CityName'],
        "CountryName" => $country['CountryName'],
        "Discription" => $places['Discription'],
        "PlaceImage1" => $image1,
        "PlaceImage2" => $image2,
        "PlaceImage3" => $image3
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