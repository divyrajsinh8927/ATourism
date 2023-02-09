<?php
session_start();
$pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
if (isset($_POST['addplace'])) {
    //img1
    $file_name = $_FILES['placeimage']['name'];
    $file_tmp_name = $_FILES['placeimage']['tmp_name'];
    $path = "../../images/" . $file_name;
    //img2
    $file_name2 = $_FILES['placeimage2']['name'];
    $file_tmp_name2 = $_FILES['placeimage']['tmp_name'];
    $path2 = "../../images/" . $file_name2;
    //img3
    $file_name3 = $_FILES['placeimage3']['name'];
    $file_tmp_name3 = $_FILES['placeimage']['tmp_name'];
    $path3 = "../../images/" . $file_name3;

    $placename = $_POST['placename'];
    $city_id = $_POST['citys'];
    $detail = $_POST['detail'];
    $statementplace = $pdo->prepare("INSERT INTO places(PlaceName,City_id,Discription) VALUES(?,?,?)");
    $statementplace->execute(array($placename, $city_id, $detail));


    $placeid = $pdo->lastInsertId();
    //addimage1
    $statementplaceimg1 = $pdo->prepare("INSERT INTO placemedia(PlaceImages,Place_id) VALUES(?,?)");
    $statementplaceimg1->execute(array($file_name, $placeid));
    //addimage2
    $statementplaceimg2 = $pdo->prepare("INSERT INTO placemedia(PlaceImages,Place_id) VALUES(?,?)");
    $statementplaceimg2->execute(array($file_name2, $placeid));
    //addimage3
    $statementplaceimg3 = $pdo->prepare("INSERT INTO placemedia(PlaceImages,Place_id) VALUES(?,?)");
    $statementplaceimg3->execute(array($file_name3, $placeid));

    if ($statementplace) {
        move_uploaded_file($file_tmp_name, $path);
        move_uploaded_file($file_tmp_name, $path2);
        move_uploaded_file($file_tmp_name, $path3);
        $message = 'Place Added Successfully!.';
        echo "<SCRIPT>alert('$message');window.location.replace('../placesmanagement.php');</SCRIPT>";
    }
}
if (isset($_POST['addhotel'])) {
    //img1
    $hfile_name1 = $_FILES['hotelimage1']['name'];
    $hfile_tmp_name1 = $_FILES['hotelimage1']['tmp_name'];
    $hpath1 = "../../images/" . $hfile_name1;
    //img2
    $hfile_name2 = $_FILES['hotelimage2']['name'];
    $hfile_tmp_name2 = $_FILES['hotelimage2']['tmp_name'];
    $hpath2 = "../../images/" . $hfile_name2;
    //img3
    $hfile_name3 = $_FILES['hotelimage3']['name'];
    $hfile_tmp_name3 = $_FILES['hotelimage3']['tmp_name'];
    $hpath3 = "../../images/" . $hfile_name3;

    $placename = $_POST['hotelname'];
    $pdprice = $_POST['pdprice'];
    $city_id = $_POST['citys'];
    $userid = $_POST['User'];
    $detail = $_POST['detail'];
    $statementhotel = $pdo->prepare("INSERT INTO hotels(HotelName,PerDayPrice,City_id,HotelDetail,User_id) VALUES(?,?,?,?,?)");
    $statementhotel->execute(array($placename, $pdprice, $city_id, $detail, $userid));
    $hotelid = $pdo->lastInsertId();
    //addimage1
    $statementhotelimg1 = $pdo->prepare("INSERT INTO hotelmedia(HotelImages,Hotel_id) VALUES(?,?)");
    $statementhotelimg1->execute(array($hfile_name1, $hotelid));
    //addimage2
    $statementplaceimg2 = $pdo->prepare("INSERT INTO hotelmedia(HotelImages,Hotel_id) VALUES(?,?)");
    $statementplaceimg2->execute(array($hfile_name2, $hotelid));
    //addimage3
    $statementplaceimg3 = $pdo->prepare("INSERT INTO hotelmedia(HotelImages,Hotel_id) VALUES(?,?)");
    $statementplaceimg3->execute(array($hfile_name3, $hotelid));
    if ($statementhotel) {
        move_uploaded_file($hfile_tmp_name1, $hpath1);
        move_uploaded_file($hfile_tmp_name2, $hpath2);
        move_uploaded_file($hfile_tmp_name3, $hpath3);
        $message = 'Hotel Added Successfully!.';
        echo "<SCRIPT>alert('$message');window.location.replace('../hotelsmanagement.php');</SCRIPT>";
    }
}
if (isset($_SESSION['Admin'])) {
    if (isset($_POST['adduser'])) {
        $name = $_POST['NAME'];
        $mobile = $_POST['MOBILENUMBER'];
        $email = $_POST['EMAIL'];
        $password1 = $_POST['PASSWORD1'];
        $password2 = $_POST['PASSWORD2'];
        $status = 1;
        $usertype = $_POST['usertype'];
        if ($password1 == $password2) {
            $statement = $pdo->prepare("INSERT INTO users(Name,MobileNumber,UserType,Email,Password,Status) values(?,?,?,?,?,?)");
            $statement->execute(array($name, $mobile, $usertype, $email, $password1, $status));
            $message = 'User Added Successfully!.';
            echo "<SCRIPT>alert('$message');window.location.replace('../index.php');</SCRIPT>";
        } else {
            echo "<SCRIPT>alert('Passwod Are Not Same!');window.location.replace('../regiester.php');</SCRIPT>";
        }
    }
}
