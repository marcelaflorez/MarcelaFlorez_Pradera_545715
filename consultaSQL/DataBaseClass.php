<?php
/**
 * @author Marcela Florez
 * Esta clase DataBaseClass es la que dara la correcta funcionabilidad de todas las variables creadas
 */
class DataBaseClass {
 // estas variables me permitaran obtener una excelente conexion con la base de datos 
    private $host,
            $dbname,
            $port,
            $user,
            $password,
            $driver,
            $connect;
// por medio de la funcion contruct trabajo mis variable que esta en la clase
    public function __construct($host, $dbname, $user, $password, $port = 3306, $driver = 'mysql') {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->port = $port;
        $this->user = $user;
        $this->password = $password;
        $this->driver = $driver;
    }
// esta funcion getInstance me permite hacer invocar mis variables la cual me permite la conexion con la base de datos
    public function getInstance() {
        if (!$this->connect) {
// por medio del TRYCATH logro visualizar mis error y corregirlos            
            try {
                $dsn = $this->driver
                        . ':host='
                        . $this->host
                        . ';dbname=' . $this->dbname
                        . ';port=' . $this->port;
                $this->connect = new PDO($dsn, $this->user, $this->password);
                $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //es exclusiva del getinstance             
            } catch (PDOExepcion $exc) {
                echo $exc->getMessage();
            }
        }
        return $this->connect;
    }

}

?>