<?php
require_once 'Database.php';

try {
    $database = new Database();
    $pdo = $database->getConnection();

    // Obtén todos los clientes
    $stmt = $pdo->query("SELECT id_cliente, contraseña FROM cliente");
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Actualiza las contraseñas con hash
    foreach ($clientes as $cliente) {
        $hashedPassword = password_hash($cliente['contraseña'], PASSWORD_DEFAULT);
        $updateStmt = $pdo->prepare("UPDATE cliente SET contraseña = :hashedPassword WHERE id_cliente = :id");
        $updateStmt->bindParam(':hashedPassword', $hashedPassword);
        $updateStmt->bindParam(':id', $cliente['id_cliente']);
        $updateStmt->execute();
    }

    echo "Contraseñas actualizadas correctamente.";
} catch (PDOException $e) {
    die("Error al actualizar contraseñas: " . $e->getMessage());
}
?>
