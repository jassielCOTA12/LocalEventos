
<?php
$imagenesLocales = [
    1 => 'imagenesLocales/SalonFiestaBonita.png',
    2 => 'imagenesLocales/JardinLosPinos.jpg',
    3 => 'imagenesLocales/SalonsLasEstrellas.jpg',
    4 => 'imagenesLocales/FiestaKids.jpg',
    5 => 'imagenesLocales/BodasDeluxe.jpg',
    6 => 'imagenesLocales/SalonElegance.jpeg',
    7 => 'imagenesLocales/SalonAventuras.jpg',
    8 => 'imagenesLocales/CentroCorporativoElite.jpg',
    9 => 'imagenesLocales/SalonFiestaFeliz.jpeg',
    10 => 'imagenesLocales/HaciendaLosEncinos.jpg',
];
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el cliente está logueado
if (!isset($_SESSION['id_cliente'])) {
    header("Location: /LocalEventos/login.php");
    exit();
}

$id_cliente = $_SESSION['id_cliente'];

// Incluir la conexión a la base de datos
include "Database.php";

// Obtener la conexión a la base de datos
$db = new Database();
$pdo = $db->getConnection();

$query = "
SELECT l.id_local, l.nombre, l.capacidad_maxima, l.precio_base
        FROM favoritos f
        JOIN local l ON f.id_local = l.id_local
        WHERE f.id_cliente = :id_cliente
";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id_cliente', $id_cliente, PDO::PARAM_INT);
$stmt->execute();

// Obtener los resultados
$favoritos = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
