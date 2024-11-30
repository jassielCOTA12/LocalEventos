<?php
class Database {
    private $host = 'sql.freedb.tech';
    private $db_name = 'freedb_LocalMatch';
    private $db_user = 'freedb_Oscarlst';
    private $db_password = '&UE5wuDm4%Cxc6j';
    private $charset = 'utf8mb4';

    public function getConnection() {
        $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset={$this->charset}";
        try {
            $pdo = new PDO($dsn, $this->db_user, $this->db_password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error al intentar la conexión a la base de datos: " . $e->getMessage());
        }
    }
}
?>
