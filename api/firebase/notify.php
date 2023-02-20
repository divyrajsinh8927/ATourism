<?php
require './vendor/autoload.php';
require './includes/init.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\AndroidConfig;
use Kreait\Firebase\Messaging\CloudMessage;

$status = $_GET['status'];
$user = selectOne("SELECT `FirebaseToken` FROM `users` WHERE `Id` = ?", [$_GET['User_id']]);
$token = $user['FirebaseToken'];
if ($token == null)
die("No token for this user!");

$factory = (new Factory)->withServiceAccount('./keys/firebase-key.json');
$messaging = $factory->createMessaging();

$message = CloudMessage::withTarget('token', $token);


if($status == 1)
{
    $message = $message->withAndroidConfig(AndroidConfig::fromArray([
        'ttl' => '3600s',
        'priority' => 'normal',
        'notification' => [
            'title' => 'Your Booking Status',
            'body' => 'Your Booking Has Approved!',
        ],
    ]));
}
else
{
    $message = $message->withAndroidConfig(AndroidConfig::fromArray([
        'ttl' => '3600s',
        'priority' => 'normal',
        'notification' => [
            'title' => 'Your Booking Status',
            'body' => 'Your Booking Has DisApproved!',
        ],
    ]));
}

$messaging->send($message);
header('Location: ../../hotel/hotelsmanagement/index.php');
