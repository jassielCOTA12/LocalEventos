<?php
include 'Database.php';
$database = new Database();
$conn = $database->getConnection();

// Recibir los datos enviados por la petición POST
$data = json_decode(file_get_contents('php://input'), true);

// Validar que se recibieron los datos necesarios
    $comentarios = $data['comentario'];
    $id_local = $data['id_local'];
    $nombre_usuario = $data['nombre_usuario'] ?? 'Anónimo'; // Nombre de usuario, si no se recibe, se pone "Anónimo"
    
    // Calificaciones
    $calidad_servicio = $calificaciones['calidad_servicio'] ?? null;
    $respuesta = $calificaciones['respuesta'] ?? null;
    $profesionalidad = $calificaciones['profesionalidad'] ?? null;
    $calidad_precio = $calificaciones['calidad_precio'] ?? null;

    // Insertar el comentario y las calificaciones en la base de datos
    $query = "INSERT INTO comentarios (id_local, comentario, nombre_usuario, calidad_servicio, respuesta, profesionalidad, calidad_precio)
              VALUES (:id_local, :comentario, :nombre_usuario, :calidad_servicio, :respuesta, :profesionalidad, :calidad_precio)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_local', $id_local);
    $stmt->bindParam(':comentario', $comentarios);
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
