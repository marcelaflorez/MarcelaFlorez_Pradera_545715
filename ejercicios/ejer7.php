<?php

class Ejer7 {

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
    $objDB = new Ejer7('localhost', 'bddesercion', 'root', 'Sena2014');
$sql = "select ficha.num_ficha,count(cod_causa) as causa,des_causa,centro.cod_centro 
from causa_desercion natural join desercion natural join ficha natural join centro
where centro.cod_centro=1 
group by desercion.cod_causa";
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
<tr><th>num_ficha</th>
<th>causa</th>
<th>descripcion_causa</th>
<th>centro</th>    
</tr>

<?php foreach($arrData as $row): ?>
<tr><td><?php echo $row['num_ficha']?></td><td><?php echo $row['causa']?>
</td><td><?php echo $row['des_causa']?></td><td><?php echo $row['cod_centro']?></td>
</tr>
<?php endforeach ?>
</table>
</body>
</html>


