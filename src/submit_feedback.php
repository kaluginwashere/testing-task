<?php
session_start();
unset($_SESSION['name']);
unset($_SESSION['email']);
unset($_SESSION['adress']);
unset($_SESSION['phone']);
unset($_SESSION['message']);

unset($_SESSION['error_name']);
unset($_SESSION['error_email']);
unset($_SESSION['error_adress']);
unset($_SESSION['error_phone']);
unset($_SESSION['error_message']);

require_once  '../vendor/autoload.php';


use Aws\DynamoDb\DynamoDbClient;
// use Dotenv\Dotenv;


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();


$accessKeyId = $_ENV['AWS_ACCESS_KEY_ID'];
$secretAccessKey = $_ENV['AWS_SECRET_ACCESS_KEY'];
$region = $_ENV['AWS_DEFAULT_REGION'];


$config = [
    'region' => $region,
    'version' => 'latest',
    'credentials' => [
        'key' => $accessKeyId,
        'secret' => $secretAccessKey,
    ],
];


$dynamodb = new DynamoDbClient($config);

function redirect()
{
    header('Location: /#form');
    exit;
}

$name = htmlspecialchars(trim($_POST['name']));
$email = $_POST['email'];
$adress = $_POST['adress'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['adress'] = $adress;
$_SESSION['phone'] = $phone;
$_SESSION['message'] = $message;

//check form

if (strlen($name) < 3) {
    $_SESSION['error_name'] = 'enter correct name';
    redirect();
} else if (strlen($email) < 3 || strpos($email, '@') == false) {
    $_SESSION['error_email'] = 'enter correct email';
    redirect();
} else if (strlen($adress) < 10) {
    $_SESSION['error_adress'] = 'enter correct adress';
    redirect();
} else if (strlen($phone) < 3) {
    $_SESSION['error_phone'] = 'enter correct phone';
    redirect();
} else if (strlen($message) < 15) {
    $_SESSION['error_message'] = 'enter correct message';
    redirect();
} else {
}



//ID GENERATOR

$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$uid = '';

for ($i = 0; $i < 4; $i++) {
    $uid .= $characters[rand(0, strlen($characters) - 1)];
}


//DB LOGIC

$item = [
    'TableName' => 'Feedback',
    'Item' => [
        'Id' => ['S' => $uid],
        'Name' => ['S' => $name],
        'Email' => ['S' => $email],
        'Message' => ['S' => $message],
        'Adress' => ['S' => $adress],
        'Phone' => ['S' => $phone],
    ],
];
try {
    $result = $dynamodb->putItem($item);
    $_SESSION['success_message'] = 'Congratulations! The form was submitted successfully.';
    redirect();
    // $result = $dynamodb->putItem($item);
    // echo 'Feedback submitted successfully!';
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
