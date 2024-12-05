<?php
include 'Database.php';
$database = new Database();
$conn = $database->getConnection();


    $comentario = $_POST['comentario'] ?? null;
    $id_local = $_POST['id_local'] ?? null;
    $nombre_usuario = $_POST['nombre_usuario'] ?? 'Anónimo'; // Nombre de usuario, si no se recibe, se pone "Anónimo"

    // Calificaciones
    $calidad_servicio = $_POST['calidad_servicio'] ?? null;
    $respuesta = $_POST['respuesta'] ?? null;
    $profesionalidad = $_POST['profesionalidad'] ?? null;
    $calidad_precio = $_POST['calidad_precio'] ?? null;

    // Insertar el comentario y las calificaciones en la base de datos
    $query = "INSERT INTO opiniones (id_local, comentario, nombre_usuario, calidad_servicio, respuesta, profesionalidad, calidad_precio)
              VALUES (:id_local, :comentario, :nombre_usuario, :calidad_servicio, :respuesta, :profesionalidad, :calidad_precio)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_local', $id_local);
    $stmt->bindParam(':comentario', $comentario);
    $stmt->bindParam(':nombre_usuario', $nombre_usuario);
    $stmt->bindParam(':calidad_servicio', $calidad_servicio);
    $stmt->bindParam(':respuesta', $respuesta);
    $stmt->bindParam(':profesionalidad', $profesionalidad);
    $stmt->bindParam(':calidad_precio', $calidad_precio);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Opinión guardada con éxito";
    } else {
        echo "Error al guardar la opinión";
    }

?>
