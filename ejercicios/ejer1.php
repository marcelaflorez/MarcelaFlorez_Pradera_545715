<?php

class Ejer1 {

    private $host,
            $dbname,
            $port,
            $user,
            $password,
            $driver,
            $connect;

    public function __construct($host, $dbname, $user, $password, $port = 3306, $driver = 'mysql') {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->port = $port;
        $this->user = $user;
        $this->password = $password;
        $this->driver = $driver;
    }

    public function getInstance() {
        if (!$this->connect) {
            try {
                $dsn = $this->driver
                        . ':host=' . $this->host
                        . ';dbname=' . $this->dbname
                        . ';port=' . $this->port;
                $this->connect = new PDO($dsn, $this->user, $this->password);
            } catch (PDOException $exc) {
                echo $exc->getMessage();
            }
        }
        return $this->connect;
    }

}
try {
    $objDB = new Ejer1('localhost', 'bddesercion', 'root', 'Sena2014');
$sql = "SELECT count(id_apre) as Aprendiz, fase_desercion FROM desercion group by fase_desercion";
$arrData = $objDB->getInstance()
        ->query($sql)
        ->fetchAll(PDO::FETCH_ASSOC);
//$db = new PDO($dsn, $username, $passwd);
//$sql = 'SELECT * FROM usuario';
//$src = $db->query($sql);
//$arrData = $src->fetchAll(PDO::FETCH_ASSOC);
$row = null;
echo '<pre>';
print_r($row);
echo '</pre>';

    
} catch (PDOException $ex) {
    echo $exc->getmessage();
}


?>
<html>
<head><title></title>
<meta charset="UTF-8">
<meta name="description"content="ejercicios"><!--es la descripcion general o global de su sitio web-->
<meta name="keywords"content="html5,css3,javascript"><!--son las palabras claves que necesito para trabajar en mi sitio web-->
<link rel="stylesheet" href="css/miestilo.css"><!--para relacionar paginas web-->
</head>
<body>
    
<table border="2" align="center">
<h3>Consulta SQL ejercicio # 1</h3><br><br>
<tr><th>id_apre</th>
<th>fase_desercion</th>
    <?php foreach($arrData as $row): ?>
</tr>
<tr><td><?php echo $row['Aprendiz']?></td><td><?php echo $row['fase_desercion']?>
</tr>
<?php endforeach ?>
</table>

</body>
</html>

