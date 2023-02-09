<?php
$pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
if (isset($_POST['Updateplace'])) {
    $id = $_GET['id'];
    //img 1
    $file_name1 = $_FILES['placeimage1']['name'];
    $file_tmp_name1 = $_FILES['placeimage1']['tmp_name'];
    $path1="../../images/".$file_name1;

    $placename = $_POST['placename'];
    $imgid = $_POST['placeimage1'];
    $city_id = $_POST['citys'];
    $detail = $_POST['detail'];
    
    
    $statementplace = $pdo->prepare("UPDATE places SET PlaceName=?,City_id=?,Discription=? WHERE Id=?");
    $statementplace->execute(array($placename, $city_id, $detail, $id));


    $statementrecord = $pdo->prepare("SELECT * FROM placemedia WHERE Place_id=?");
    $statementrecord->execute(array($id));
    $rowrecord = $statementrecord->fetch();
    $imagemedia = $rowrecord['PlaceImages'];
    $placeimgid = $rowrecord['Id'];
  
    //img1
    $statementplaceimg1 = $pdo->prepare("UPDATE placemedia SET PlaceImages=? WHERE Id=?");
    $statementplaceimg1->execute(array($file_name1,$imgid));
    
    if($statementplace)
    {
        move_uploaded_file($file_tmp_name1,$path1);
        $message = 'Place Updated Successfully!.';
        echo "<SCRIPT>alert('$message');window.location.replace('../placesmanagement.php');</SCRIPT>";
    }
}
if (isset($_POST['Updatehotel'])) {
    $id = $_GET['id'];
    $hfile_name = $_FILES['hotelimage']['name'];
    $hfile_tmp_name = $_FILES['hotelimage']['tmp_name'];
    $hpath="../../images/".$hfile_name;
    $hotelname = $_POST['hotelname'];
    $pdprice = $_POST['pdprice'];
    $city_id = $_POST['citys'];
    $detail = $_POST['detail'];
    $hotelimgid = $_POST['hotelimage'];
    $statementhotel = $pdo->prepare("UPDATE hotels SET HotelName=?,PerDayPrice=?,City_id=?,HotelDetail=?WHERE ID=?");
    $statementhotel->execute(array($hotelname, $pdprice, $city_id, $detail,$id));
   
    
    //img1
    $statementhotelimg1 = $pdo->prepare("UPDATE hotelmedia SET HotelImages=? WHERE Id=?");
    $statementhotelimg1->execute(array($hfile_name,$hotelimgid));
    
    if($statementhotelimg1)
    {
        move_uploaded_file($hfile_tmp_name,$hpath);
        $message = 'Hotel Updated Successfully!.';
        echo "<SCRIPT>alert('$message');window.location.replace('../hotelsmanagement.php');</SCRIPT>";
    }
}
?>