<?php
require __DIR__ . '/../vendor/autoload.php';

$client = new \PHP_MSCS\Client();

$client->setSubscriptionKeys([
   \PHP_MSCS\ComputerVision\ComputerVision::class => '11b94871ba6046c398adfa6adc2704bf'
]);

$cv = new \PHP_MSCS\ComputerVision\ComputerVision($client);

try {
    $response = $cv->analyze('https://www.w3schools.com/css/img_fjords.jpg', ['Description']);
    var_dump($response->getBody()->getContents());
} catch (Exception $e) {
    var_dump($e->getMessage());
}


