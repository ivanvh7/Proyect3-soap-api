<?php
// Archivo: rss_reader.php

$dsn = 'mysql:host=localhost;dbname=fp;charset=utf8';
$username = 'root'; // Cambia esto si tienes otra configuración
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// URL del feed RSS de EuropaPress
$rss_url = "https://www.europapress.es/rss/rss.aspx?ch=00066";
$rss_content = simplexml_load_file($rss_url);

if ($rss_content === false) {
    die("Error al cargar el feed RSS.");
}

foreach ($rss_content->channel->item as $item) {
    $titulo = (string) $item->title;
    $descripcion = (string) $item->description;
    $enlace = (string) $item->link;
    $fecha = date("Y-m-d H:i:s", strtotime($item->pubDate));

    // Insertar noticia en la base de datos si no existe
    $stmt = $pdo->prepare("INSERT INTO Noticias (titulo, descripcion, enlace, fecha) 
                       VALUES (?, ?, ?, ?) 
                       ON DUPLICATE KEY UPDATE 
                       descripcion = VALUES(descripcion), 
                       fecha = VALUES(fecha)");
    $stmt->execute([$titulo, $descripcion, $enlace, $fecha]);
}

echo "Noticias actualizadas correctamente.";
