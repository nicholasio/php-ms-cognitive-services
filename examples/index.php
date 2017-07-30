<?php
require __DIR__ . '/../vendor/autoload.php';

use PHP_MSCS\Vision\ComputerVision;

$dotenv = new Dotenv\Dotenv(__DIR__ );
$dotenv->load();

$client = new \PHP_MSCS\Client();

$client->setSubscriptionKeys([
    ComputerVision::class => getenv('COMPUTER_VISION_KEY')
]);

$cv = new ComputerVision($client);

try {
    $image = 'https://www.w3schools.com/css/img_fjords.jpg';
    $response = $cv->analyze($image, [
        ComputerVision::VS_DESCRIPTION,
        ComputerVision::VS_ADULT,
    ]);
    echo '<pre>';
    var_dump($response->getData());
    echo PHP_EOL . PHP_EOL;
    $response = $cv->describe($image);
    var_dump($response->getData());
    echo PHP_EOL . PHP_EOL;
    $response = $cv->models();
    var_dump($response->getData());
    echo PHP_EOL . PHP_EOL;
    $response = $cv->tagImage($image);
    var_dump($response->getData());
    echo PHP_EOL . PHP_EOL;
    $response = $cv->thumbnail($image, 200, 300);
    var_dump($response->getData());
    echo PHP_EOL . PHP_EOL;
    echo '</pre>';


} catch (Exception $e) {
    var_dump($e->getMessage());
}


