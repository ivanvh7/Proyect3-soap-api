<?php
// Cliente SOAP - cliente.php
$client = new SoapClient(null, [
    'location' => 'http://localhost/Proyecto%20UT7/soap_services/server.php',
    'uri' => 'http://localhost/soap',
    'trace' => 1
]);

try {
    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Información de Módulos</title>
        <link rel='stylesheet' href='soap.css'> 
    </head>
    <body class='container'>";

    echo "<h2>Información de un módulo por ID</h2>";
    
    // Llamar al servicio SOAP
    $response = $client->infoModulo(1);
    
    // Decodificar JSON
    $modulo = json_decode($response, true);
    
    // Verificar si la decodificación fue exitosa
    if ($modulo === null) {
        echo "<p class='error'>Error: No se pudo decodificar la respuesta JSON.</p>";
    } else {
        echo "<h3>Datos del módulo:</h3>";
        echo "<pre>" . print_r($modulo, true) . "</pre>";
    }

    echo "<h2>Listado de departamentos</h2>";
    $departamentos = json_decode($client->infoDepartamentos(), true);
    echo "<pre>" . print_r($departamentos, true) . "</pre>";

    echo "<h2>Listado de nomenclaturas</h2>";
    $nomenclaturas = json_decode($client->infoNomenclaturas(), true);
    echo "<pre>" . print_r($nomenclaturas, true) . "</pre>";

    echo "</body></html>";

} catch (Exception $e) {
    echo "<p class='error'>Error: " . $e->getMessage() . "</p>";
}