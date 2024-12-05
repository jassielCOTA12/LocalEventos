<?php
    include 'Database.php';
    $db = new Database();
    $pdo = $db->getConnection();
    
    $id_cliente = $_SESSION['id_cliente'];
    $id_local = $_POST['id_local'];
    $invitados =  $_POST['no_invitados'];
    $fecha = $_POST['fecha'];
    $precio =  $_POST['precio_total'];
    $invitados = filter_var($_POST['no_invitados'], FILTER_SANITIZE_NUMBER_INT);
    $info = filter_var($_POST['información_extra'], FILTER_SANITIZE_STRING);


    $query = '
    INSERT INTO reservas (id_local, 
    id_cliente, fecha, no_invitados, 
    precio_total, información_extra) 
    VALUES (:id_local, :id_cliente, :invitados, :fecha, :precio, :info)';

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
    $stmt->bindParam(':id_local', $id_local, PDO::PARAM_INT);
    $stmt->bindParam(':invitados', $invitados, PDO::PARAM_INT);
    $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR); // Cambiado a STRING
    $stmt->bindParam(':precio', $precio, PDO::PARAM_INT);
    $stmt->bindParam(':info', $info, PDO::PARAM_STR); // Cambiado a STRING
    $stmt->execute();

    if ($stmt->execute()) {
        echo "Reservación guardada exitosamente";
    } else {
        echo "Error al guardar la reservación";
    }
?>