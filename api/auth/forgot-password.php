<?php

require './helpers/init.php';
allowedMethods(['POST']);

$request = getRequestBody();
if (!isset($request->otp) || !isset($request->email) || !isset($request->password)) {
    http_response_code(400);
    die(json_encode(["message" => "Incomplete data"]));
}

$otp = $request->otp;
$email = $request->email;
$password = $request->password;

$user = selectOne("SELECT * FROM `users` WHERE `Email` = ?", [$email]);
if ($user == null) {
    http_response_code(404);
    die();
}

$forgotPasswordOtp = selectOne("SELECT * FROM `ForgotPasswordOTPs` WHERE `UserId` = ?", [$user['Id']]);
if ($forgotPasswordOtp == null || $forgotPasswordOtp['GeneratedOTP'] != $otp) {
    http_response_code(400);
    die();
}

$currentDate = new DateTime();
$expiresOn = DateTime::createFromFormat('Y-m-d h:i:s', $forgotPasswordOtp['ExpiresOn']);
if ($currentDate > $expiresOn) {
    execute("DELETE FROM `ForgotPasswordOTPs` WHERE `UserId` = ?", [$user['Id']]);
    
    http_response_code(403);
    die(json_encode(["message" => "Wrong or expired OTP!"]));
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);
execute("UPDATE `Users` SET `PasswordHash` = ? WHERE `Id` = ?", [$passwordHash, $user['Id']]);
execute("DELETE FROM `ForgotPasswordOTPs` WHERE `UserId` = ?", [$user['Id']]);