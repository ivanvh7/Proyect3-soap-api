<?php
// Archivo: noticias.php

$dsn = 'mysql:host=localhost;dbname=fp;charset=utf8';
$username = 'root'; // Cambia esto según tu configuración
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Obtener todas las noticias
$stmt = $pdo->query("SELECT * FROM Noticias ORDER BY fecha DESC");
$noticias = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias de EuropaPress</title>
    <link rel="stylesheet" href="noticias.css"> 
</head>
<body class="container">
    <h1>Últimas Noticias</h1>
    <table>
        <tr>
            <th>Noticia</th>
            <th>Descripción</th>
            <th>Enlace</th>
            <th>Fecha</th>
        </tr>
        <?php foreach ($noticias as $noticia): ?>
            <tr>
                <td><?= htmlspecialchars($noticia['titulo']) ?></td>
                <td><?= htmlspecialchars($noticia['descripcion']) ?></td>
                <td><a href="<?= htmlspecialchars($noticia['enlace']) ?>" target="_blank">Ver Noticia</a></td>
                <td><?= htmlspecialchars($noticia['fecha']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
