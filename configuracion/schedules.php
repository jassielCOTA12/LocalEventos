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
    -- Verificar si la fecha seleccionada cae dentro del rango de días de inicio y fin
    (DAYOFWEEK(:fecha) BETWEEN
        CASE h.dia_inicio
            WHEN 'Domingo' THEN 1
            WHEN 'Lunes' THEN 2
            WHEN 'Martes' THEN 3
            WHEN 'Miércoles' THEN 4
            WHEN 'Jueves' THEN 5
            WHEN 'Viernes' THEN 6
            WHEN 'Sábado' THEN 7
        END
    AND
        CASE h.dia_fin
            WHEN 'Domingo' THEN 1
            WHEN 'Lunes' THEN 2
            WHEN 'Martes' THEN 3
            WHEN 'Miércoles' THEN 4
            WHEN 'Jueves' THEN 5
            WHEN 'Viernes' THEN 6
            WHEN 'Sábado' THEN 7
        END)
    OR (
        -- Verificar si la fecha seleccionada cae en un rango específico de días (por ejemplo, Lunes a Viernes)
        (DAYOFWEEK(:fecha) = CASE h.dia_inicio
            WHEN 'Domingo' THEN 1
            WHEN 'Lunes' THEN 2
            WHEN 'Martes' THEN 3
            WHEN 'Miércoles' THEN 4
            WHEN 'Jueves' THEN 5
            WHEN 'Viernes' THEN 6
            WHEN 'Sábado' THEN 7
        END)
        
    ) 
    OR (
        (DAYOFWEEK(:fecha) = 1 AND (h.dia_inicio = 'Domingo' OR h.dia_fin = 'Domingo'))
    )
)";


    // Preparar la consulta
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_local', $id_local, PDO::PARAM_INT);
    $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
    $stmt->execute();

    // Obtener el horario
    $horario = $stmt->fetch(PDO::FETCH_ASSOC);
    $precio = $horario['precio'];

    if ($horario) {
        echo date("g:i A", strtotime($horario['hora_inicio'])) . " - " . date("g:i A", strtotime($horario['hora_fin'])) . "|" . $precio; 
    } else {

        echo "No se encontró horario disponible para esta fecha.";
    }
} else {
    echo "Fecha o ID de local no proporcionados.";
}
?>
