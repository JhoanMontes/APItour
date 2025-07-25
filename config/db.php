<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'agencia_tours';

try {
    // Formar correctamente el DSN para MySQL
    $dsn = "mysql:host=$host;dbname=$database;charset=utf8";  // Es importante usar charset=utf8 para evitar problemas de codificación.

    // Establecer la conexión PDO
    $connection = new PDO($dsn, $user, $password);

    // Establecer el modo de error de PDO
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Hacer que la conexión esté disponible globalmente
    $pdo = $connection;  // Asignamos la conexión a la variable $pdo

} catch (PDOException $e) {
    // Si ocurre un error, muestra el mensaje
    die("ERROR: " . $e->getMessage());
}
?>