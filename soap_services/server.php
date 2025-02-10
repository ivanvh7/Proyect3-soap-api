<?php
class ServiciosFP {
    private $pdo;

    public function __construct() {
        try {
            $dsn = 'mysql:host=localhost;dbname=fp;charset=utf8';
            $username = 'root'; // Cambia esto según tu configuración
            $password = '';
            $this->pdo = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    // Obtener información de módulos
    public function infoModulo($id) {
        try {
            $stmt = $this->pdo->query("SELECT * FROM Modulos");
            $modulos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            if ($modulos) {
                return json_encode($modulos);
            } else {
                return json_encode(["error" => "No hay módulos disponibles."]);
            }
        } catch (Exception $e) {
            return json_encode(["error" => "Error en la consulta: " . $e->getMessage()]);
        }
    }

    // Obtener listado de departamentos únicos
    public function infoDepartamentos() {
        $stmt = $this->pdo->query("SELECT DISTINCT Departamento FROM Modulos");
        $departamentos = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return json_encode($departamentos ?: ["error" => "No hay departamentos"]);
    }

    // Obtener listado de nomenclaturas únicas
    public function infoNomenclaturas() {
        $stmt = $this->pdo->query("SELECT DISTINCT Nomenclatura FROM Modulos");
        $nomenclaturas = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return json_encode($nomenclaturas ?: ["error" => "No hay nomenclaturas"]);
    }
}

$options = ["uri" => "http://localhost/soap"];
$server = new SoapServer(null, $options);
$server->setClass("ServiciosFP");
$server->handle();
