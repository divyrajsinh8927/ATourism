
<?php
header("Content-Type: application/json");
try{
    $requestjson = file_get_contents("php://input");
    $request = json_decode($requestjson);
    
    $pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");
if (isset($_POST['adduser'])) {
        $name = $_POST['NAME'];
        $mobile = $_POST['MOBILENO'];
        $email = $_POST['EMAIL'];
        $password1 = $_POST['PASSWORD1'];
        $password2 = $_POST['PASSWORD2'];
        $status=1;
        $usertype = $_POST['usertype'];

        $jname = $request->name = $name;
        $jmobile = $request->mobile = $mobile;
        $jemail = $request->email = $email;
        $jpassword1 = $request->password1 = $password1;
        $jpassword2 = $request->password2 = $password2;
        $jusertype = $request->usertype = $usertype;

        if ($password1 == $password2) {
          $statement = $pdo->prepare("INSERT INTO `users`(`Name`,`MobileNo`,`UserType`,`Email`,`Password`,`status`) values(?,?,?,?,?,?)");
          $statement->execute([$jname, $jmobile, $jusertype, $jemail, $jpassword1,$jstatus]);
          $message = 'User Added Successfully!.';
        echo "<SCRIPT>alert('$message');window.location.replace('./test.php');</SCRIPT>";
        }
    }
}catch(Exception $e)
{
    echo json_encode(["success" => false]);
}
