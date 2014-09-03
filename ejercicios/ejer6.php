<?php

class Ejer6 {

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
    $objDB = new Ejer6('localhost', 'bddesercion', 'root', 'Sena2014');
$sql = "SELECT  ficha.num_ficha,nom_apre,des_tipo_id,genero,desc_centro,des_causa FROM causa_desercion natural join desercion natural join aprendiz natural join tipo_id,ficha,centro where ficha.cod_centro=centro.cod_centro and desercion.num_ficha=ficha.num_ficha and desercion.cod_causa=1 and genero='F'";
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
    
<table border='2'>
<tr><th>ficha</th>
<th>aprendiz</th>
<th>tipo_id</th>
<th>genero</th>    
<th>centro</th>    
<th>causa</th>    
</tr>
<?php foreach($arrData as $row): ?>
<tr><td><?php echo $row['num_ficha']?></td><td><?php echo $row['nom_apre']?>
</td><td><?php echo $row['des_tipo_id']?></td><td><?php echo $row['genero']?>
</td><td><?php echo $row['desc_centro']?></td><td><?php echo $row['des_causa']?></td>

</tr>
<?php endforeach ?>
</table>
</body>
</html>

