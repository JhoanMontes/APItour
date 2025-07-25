<?php

header('Content-Type: application/json');

include 'config/db.php';

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        handleGet($pdo);
        break;
    case 'POST':

        handlePost($pdo, $input);
        break;
    case 'PUT':

        break;
    case 'DELETE':

        break;
    default:
        echo json_encode(['error' => 'Método no soportado']);
        break;
}

function handleGet($pdo)
{
    $query = "SELECT * FROM clientes";


    if ($pdo) {
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    } else {
        echo json_encode(['error' => 'No se pudo establecer la conexión con la base de datos']);
    }
}


function handlePost($pdo, $input)
{
    $query = "INSERT INTO clientes (numero_documento, nombres, apellidos, telefono, email) VALUES (:documento, :nombre, :apellido, :telefono, :email);";


    if ($pdo) {
        $stmt = $pdo->prepare($query);
        $stmt->execute([

            'documento' => $input['documento'],
            'nombre' => $input['nombre'],
            'apellido' => $input['apellido'],
            'telefono' => $input['telefono'],
            'email' => $input['email'],

        ]);

        echo json_encode(['message' => 'POST creado correctamente']);


    } else {
        echo json_encode(['error' => 'No se pudo establecer la conexión con la base de datos']);
    }
}
?>