<?php
class BaseDeDatos {
    public $pdo;

    public function __construct($server, $username, $dbname, $password) {
        try {
            $dsn = "mysql:host=$server;dbname=$dbname";
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->handleError($e);
        }
    }

    public function ejecutar($sql, $par = []) {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($par);
            return $stmt; // Return the PDO statement
        } catch (PDOException $e) {
            $this->handleError($e);
            return null; // Return null in case of an error
        }
    }
    

    public function handleError($exception) {
        // Log the error message to the console
        echo "<script>console.error('Database Error: " . $exception->getMessage() . "');</script>";
    }
}

?>