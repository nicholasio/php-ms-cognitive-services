<?php
require __DIR__ . '/../vendor/autoload.php';

use PHP_MSCS\ComputerVision\ComputerVision;

$client = new \PHP_MSCS\Client();

$client->setSubscriptionKeys([
    ComputerVision::class => '11b94871ba6046c398adfa6adc2704bf'
]);

$cv = new ComputerVision($client);

try {
    $image = 'https://www.w3schools.com/css/img_fjords.jpg';
    $response = $cv->analyze($image, [
        ComputerVision::VS_DESCRIPTION,
        ComputerVision::VS_ADULT,
    ]);
    echo '<pre>';
    var_dump($response->getBody()->getContents());
    echo PHP_EOL . PHP_EOL;
    $response = $cv->describe($image);
    var_dump($response->getBody()->getContents());
    echo PHP_EOL . PHP_EOL;
    $response = $cv->models();
    var_dump($response->getBody()->getContents());
    echo PHP_EOL . PHP_EOL;
    $response = $cv->tagImage($image);
    var_dump($response->getBody()->getContents());
    echo PHP_EOL . PHP_EOL;
    $response = $cv->thumbnail($image, 200, 300);
    var_dump($response->getBody()->getContents());
    echo PHP_EOL . PHP_EOL;
    echo '</pre>';
} catch (Exception $e) {
    var_dump($e->getMessage());
}


