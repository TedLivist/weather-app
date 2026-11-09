<?php

use Teddy\WeatherApp\WeatherService;

require_once (dirname(__FILE__) ."/vendor/autoload.php");

$weatherService = new WeatherService();

$city = $argv['1'];
echo "Getting weather for $city...\n";
$weather = $weatherService->getWeather($city);

echo "\n";
echo "City: " . $weather['city'] . "\n";
echo "Temperature: " . $weather['temperature'] . "°C\n"; 
echo "Description: " . $weather['description'] . "\n"; 
echo "Humidity: " . $weather['humidity'] . "%\n";