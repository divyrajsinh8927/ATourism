<?php

require './helpers/init.php';
require './helpers/mailer.php';

allowedMethods(['POST']);
$request = getRequestBody();

if (!isset($request->Email)) {
    http_response_code(404);
    die(json_encode(["message" => "Incomplete data"]));
}

$email = $request->Email;
$user = selectOne("SELECT * FROM `users` WHERE `Email` = ?", [$email]);

if ($user == null) {
    http_response_code(404);
    die(json_encode(["message" => "Could not send OTP!"]));
}

$otp = random_int(111111, 999999);
$generatedOn = (new DateTime())->format('Y-m-d h:i:s');
$expiresOn = ((new DateTime())->add(new DateInterval('PT5M')))->format('Y-m-d h:i:s');

try {
    $subject = 'Shiv Tourism OTP';
    $body = "Your OTP: $otp";

    // sendEmail($email, $subject, $body);
    
    execute("INSERT INTO `forgotpasswordotps` SET `GeneratedOTP` = ?, `GeneratedOn` = ?, `ExpiresOn` = ?, `User_Id` = ?", [$otp, $generatedOn, $expiresOn, $user['Id']]);
} catch (Exception $e) {

    http_response_code(500);
    die(json_encode(["message" => "Could not send OTP!"]));
}