<?php

namespace Teddy\WeatherApp;

use GuzzleHttp\Client;

class WeatherService {
  private Client $client;

  public function __construct(
    private string $apiKey = 'e06e43b56772709c8069f2d349152d64',
    private string $apiEndpoint = 'https://api.openweathermap.org/data/2.5/weather',
  )
  {
    $this->client = new Client();
  }

  public function getWeather(string $city): array {
    $response = $this->client->get($this->apiEndpoint, [
      'query'=> [
        'q' => $city,
        'appid' => $this->apiKey,
        'units' => 'metric',
      ]
    ]);

    $weatherData = json_decode($response->getBody()->getContents(), true);

    return [
      'city'  => $weatherData['name'],
      'temperature' => $weatherData['main']['temp'],
      'description' => $weatherData['weather'][0]['description'],
      'humidity' => $weatherData['main']['humidity']
    ];
  }
}