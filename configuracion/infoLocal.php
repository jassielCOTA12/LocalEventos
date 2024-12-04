<?php
include 'Database.php';
$database = new Database();
$conn = $database->getConnection();

if (isset($_GET['id'])) {
    $idLocal = $_GET['id'];

    // Consulta para obtener los detalles del local
    $query = "SELECT * FROM local WHERE id_local = :id_local";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id_local', $idLocal, PDO::PARAM_INT);
    $stmt->execute();

    $local = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$local) {
        echo "<p>No se encontró el local.</p>";
        exit;
    }

    // Consultar las amenidades del local
    $queryAmenidades = "
    SELECT a.nombre 
    FROM amenidades a
    INNER JOIN local_amenidades la ON a.id_amenidades = la.id_amenidades
    WHERE la.id_local = :id_local";
    $stmtAmenidades = $conn->prepare($queryAmenidades);
    $stmtAmenidades->bindParam(':id_local', $idLocal, PDO::PARAM_INT);
    $stmtAmenidades->execute();
    $amenidades = $stmtAmenidades->fetchAll(PDO::FETCH_ASSOC);

    $imagenesAmenidades = [
        'Alberca' => 'albercaIcon.png',
        'Mobiliario' => 'mobiliarioIcon.png',
        'Estacionamiento' => 'estacionamientoIcon.png',
        'Cocina' => 'cocinaIcon.png',
        'Jardín' => 'jardinIcon.png',
    ];

    // Consultar los horarios
    $queryHorarios = "SELECT dia_inicio, dia_fin, hora_inicio, hora_fin, precio 
                      FROM horarios 
                      WHERE id_local = :id_local";
    $stmtHorarios = $conn->prepare($queryHorarios);
    $stmtHorarios->bindParam(':id_local', $idLocal, PDO::PARAM_INT);
    $stmtHorarios->execute();
    $horarios = $stmtHorarios->fetchAll(PDO::FETCH_ASSOC);

    // Consulta para contar las opiniones
    $queryOpinion = "SELECT COUNT(*) AS num_opiniones FROM opiniones WHERE id_local = :id_local";
    $stmtO = $conn->prepare($queryOpinion);
    $stmtO->bindParam(':id_local', $idLocal, PDO::PARAM_INT);
    $stmtO->execute();
    $row = $stmtO->fetch();

    $num_opiniones = $row['num_opiniones'];

    $totalCalidadServicio = 0;
    $totalRespuesta = 0;
    $totalProfesionalidad = 0;
    $totalCalidadPrecio = 0;
    $promedioCalidadServicio = 0;
    $promedioRespuesta = 0;
    $promedioProfesionalidad = 0;
    $promedioCalidadPrecio = 0;
    
    // Verificar que haya opiniones para evitar la división por cero
    if ($num_opiniones > 0) {
    // Procesar cada opinión
    foreach ($num_opiniones as $opinion) {
        // Sumar los valores de cada campo
        $totalCalidadServicio += $opinion['calidad_servicio'];
        $totalRespuesta += $opinion['respuesta'];
        $totalProfesionalidad += $opinion['profesionalidad'];
        $totalCalidadPrecio += $opinion['calidad_precio'];
    }

    // Calcular los promedios
    $promedioCalidadServicio = $totalCalidadServicio / $num_opiniones;
    $promedioRespuesta = $totalRespuesta / $num_opiniones;
    $promedioProfesionalidad = $totalProfesionalidad / $num_opiniones;
    $promedioCalidadPrecio = $totalCalidadPrecio / $num_opiniones;
    }

    $promedioCalificacion = $local['promedio_calificacion'];
   

    $queryPropietario = "
                            SELECT p.id_propietarios, p.nombre, p.telefono 
                            FROM propietarios p
                            INNER JOIN local l ON p.id_propietarios = l.propietario_id
                            WHERE l.id_local = :id_local";
    $stmtPropietario = $conn->prepare($queryPropietario);
    $stmtPropietario->bindParam(':id_local', $idLocal, PDO::PARAM_INT);
    $stmtPropietario->execute();
    $propietario = $stmtPropietario->fetch(PDO::FETCH_ASSOC);


    $queryOpiniones = "
    SELECT id_opinion, id_local, comentario, fecha, nombre_usuario, calidad_servicio, respuesta, profesionalidad, calidad_precio 
    FROM opiniones
    WHERE id_local = :id_local";
    
    $stmtOpiniones = $conn->prepare($queryOpiniones);
    $stmtOpiniones->bindParam(':id_local', $idLocal, PDO::PARAM_INT);
    $stmtOpiniones->execute();
    $opiniones = $stmtOpiniones->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "<p>ID de local no proporcionada.</p>";
    exit;
}



?>
