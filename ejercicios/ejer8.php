<?php

class Ejer3 {

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
    $objDB = new Ejer3('localhost', 'bddesercion', 'root', 'Sena2014');
$sql = "select count(cod_causa) as causa,des_causa from causa_desercion natural join desercion group by desercion.cod_causa ";
$arrData = $objDB->getInstance()
        ->query($sql)
        ->fetchAll(PDO::FETCH_ASSOC);
//$db = new PDO($dsn, $username, $passwd);
//$sql = 'SELECT * FROM usuario';
//$src = $db->query($sql);
//$arrData = $src->fetchAll(PDO::FETCH_ASSOC);
$row = NULL;
echo '<pre>';
print_r($row);
echo '</pre>';
    
} catch (PDOException $ex) {
    echo $exc->getmessage();
}
?>

<html>
<head><title></title></head>
<body>
    
<table border='2' align="center">
<tr><th>causa</th>
<th>descripcion causa</th>
</tr>
<?php foreach($arrData as $row): ?>
<tr><td><?php echo $row['causa']?></td><td><?php echo $row['des_causa']?></td>
</tr>
<?php endforeach ?>
</table>
</body>
</html>



