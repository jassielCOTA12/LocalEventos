<?php
session_start();

if (!isset($_SESSION['id_cliente'])) {
    header("Location: /LocalEventos/login.php");
    exit();
}

$id_cliente = $_SESSION['id_cliente'];
$id_local = $_POST['id_local'];
$accion = $_POST['accion'];

// Conectar a la base de datos
include 'Database.php';
$db = new Database();
$pdo = $db->getConnection();

$response = ['success' => false, 'message' => '']; 
try {
    if ($accion === 'verificar') {
        $query2 = "SELECT * FROM favoritos WHERE id_cliente = :id_cliente AND id_local = :id_local";
        $stmt2 = $pdo->prepare($query2);
        $stmt2->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt2->bindParam(':id_local', $id_local, PDO::PARAM_INT);
        $stmt2->execute();
        $isFavorito = $stmt2->rowCount() > 0 ? true : false;

        $response = ['success' => true, 'isFavorito' => $isFavorito];
    }

    if ($accion === 'agregar' || $accion === 'eliminar') {
        // Verificar si ya existe en la lista de favoritos
        $stmt = $pdo->prepare("SELECT * FROM favoritos WHERE id_cliente = :id_cliente AND id_local = :id_local");
        $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
        $stmt->bindParam(':id_local', $id_local, PDO::PARAM_INT);
        $stmt->execute();

        if ($accion === 'agregar' && $stmt->rowCount() === 0) {
            // Agregar a favoritos
            $stmt = $pdo->prepare("INSERT INTO favoritos (id_cliente, id_local) VALUES (:id_cliente, :id_local)");
            $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':id_local', $id_local, PDO::PARAM_INT);
            $stmt->execute();
            $response = ['success' => true, 'message' => 'Favorito agregado correctamente'];
        } elseif ($accion === 'eliminar' && $stmt->rowCount() > 0) {
            // Eliminar de favoritos
            $stmt = $pdo->prepare("DELETE FROM favoritos WHERE id_cliente = :id_cliente AND id_local = :id_local");
            $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
            $stmt->bindParam(':id_local', $id_local, PDO::PARAM_INT);
            $stmt->execute();
            $response = ['success' => true, 'message' => 'Favorito eliminado correctamente'];
        } else {
            // Si la acción no corresponde
            $response = ['success' => false, 'message' => 'Acción no válida o el local no está en favoritos'];
        }
    }
} catch (Exception $e) {
    // Capturar cualquier error
    $response = ['success' => false, 'message' => 'Ocurrió un error en el servidor: ' . $e->getMessage()];
}

// Asegurarse de que siempre se retorne un JSON
echo json_encode($response);
exit();
?>