<?php
include("database.php");
$db = $conn;

// Load .env
$env = parse_ini_file(__DIR__ . '/.env');
$apikey = $env['API_KEY'];
$city = $env['CITY'];

$url = "https://api.openweathermap.org/data/2.5/weather?units=metric&q=$city&appid=$apikey";

// Fetch weather data
$json_data = file_get_contents($url);
$response_data = json_decode($json_data, true);

// Extract values
$temperature = $response_data['main']['temp'];
$pressure = $response_data['main']['pressure'];
$windspeed = $response_data['wind']['speed'];
$humidity = $response_data['main']['humidity'];
$curdate = date("Y-m-d");

// SQL query
$query = "REPLACE INTO weather
(`weather_date`,`temperature`,`pressure`,`wind_speed`,`humidity`)
VALUES ('$curdate', $temperature, $pressure, $windspeed, $humidity)";

// Execute query
$result = $db->query($query);
?>
