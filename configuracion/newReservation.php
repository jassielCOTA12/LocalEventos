<?php
    include 'schedules.php';

    
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Verificar si el cliente está logueado
    if (!isset($_SESSION['id_cliente'])) {
        header("Location: /LocalEventos/login.php");
        exit();
    }
    
    $id_cliente = $_SESSION['id_cliente'];
    $id_local = $_POST['id_local'];
    $invitados =  $_POST['no_invitados'];
    $fecha = $_POST['fecha'];
    $precio =  $_POST['precio_total'];
    $invitados = filter_var($_POST['no_invitados']);
    $info = filter_var($_POST['información_extra'], FILTER_SANITIZE_STRING);


    $query = '
    INSERT INTO reservas (id_local, 
    id_cliente, fecha, no_invitados, 
    precio_total, información_extra) 
    VALUES (:id_local, :id_cliente, :fecha, :invitados, :precio, :info)';

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
    $stmt->bindParam(':id_local', $id_local, PDO::PARAM_INT);
    $stmt->bindParam(':invitados', $invitados, PDO::PARAM_INT);
    $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR); 
    $stmt->bindParam(':precio', $precio, PDO::PARAM_STR);
    $stmt->bindParam(':info', $info, PDO::PARAM_STR); 
    $stmt->execute();
    
    header("Location: /LocalEventos/local.php?id=" . $id_local);
    exit();
?>