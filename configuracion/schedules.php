<?php
if (isset($_POST['fecha']) && isset($_POST['id_local'])) {
    // Obtener los datos del formulario
    $fecha = $_POST['fecha'];
    $id_local = $_POST['id_local'];


    // Incluir la conexión a la base de datos
    include "Database.php";

    // Obtener la conexión a la base de datos
    $db = new Database();
    $pdo = $db->getConnection();

    // Consulta SQL para obtener los horarios dependiendo del día
    $query = "
    SELECT h.hora_inicio, h.hora_fin, h.precio
    FROM horarios h
    WHERE h.id_local = :id_local
    AND (
        -- Día de la semana de la fecha seleccionada
        CASE
            WHEN h.dia_inicio <= h.dia_fin THEN 
                DAYOFWEEK(:fecha) BETWEEN h.dia_inicio AND h.dia_fin
            ELSE
                DAYOFWEEK(:fecha) >= h.dia_inicio OR DAYOFWEEK(:fecha) <= h.dia_fin
        END
    )";


    // Preparar la consulta
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_local', $id_local, PDO::PARAM_INT);
    $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
    $stmt->execute();

    // Obtener el horario
    $horario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($horario) {
        echo date("g:i A", strtotime($horario['hora_inicio'])) . " - " . date("g:i A", strtotime($horario['hora_fin'])) . "|" . $horario['precio']; 
    } else {

        echo "No se encontró horario disponible para esta fecha.";
    }
} else {
    echo "Fecha o ID de local no proporcionados.";
}
?>
