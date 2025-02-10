<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Incluir la clave desde un archivo de configuración
require_once 'config.php'; // Archivo donde se almacena API_KEY de forma segura

// Validar que se haya recibido el parámetro 'url'
if (!isset($_GET['url']) || empty($_GET['url'])) {
    echo json_encode(["error" => "Falta el parámetro 'url'"]);
    exit;
}

$allowed_endpoints = [
    "mapasygraficos/analisis",
    "prediccion/provincia/07",
    "prediccion/provincia/35"
];

$api_url = $_GET['url'];

// Verificar si el endpoint solicitado está permitido
if (!in_array($api_url, $allowed_endpoints)) {
    echo json_encode(["error" => "Endpoint no permitido"]);
    exit;
}

$full_url = "https://opendata.aemet.es/opendata/api/{$api_url}?api_key=" . API_KEY;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $full_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($http_code !== 200 || $response === false) {
    echo json_encode(["error" => "No se pudo conectar a la API de AEMET"]);
    exit;
}

echo $response;
