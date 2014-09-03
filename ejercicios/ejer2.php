<?php

class Ejer2 {

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
    $objDB = new Ejer2('localhost', 'bddesercion', 'root', 'Sena2014');
$sql = "SELECT nom_apre,des_tipo_id,ficha.num_ficha,nom_ciudad,nom_depto,centro.cod_centro,cod_causa FROM tipo_id,aprendiz,desercion,ficha,centro,ciudad,depto where desercion.cod_causa=desercion.cod_causa and desercion.id_apre=aprendiz.id_apre and aprendiz.cod_tipo_id=tipo_id.cod_tipo_id and ficha.cod_centro=centro.cod_centro and ciudad.cod_depto=depto.cod_depto and aprendiz.cod_ciudad=ciudad.cod_ciudad and desercion.num_ficha=ficha.num_ficha";
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
<head><title></title></head>
<body>
    
<table border='2'>
<tr><th>nom_apre</th>
<th>des_tipo_id</th>
<th>num_ficha</th>
<th>nom_ciudad</th>
<th>nom_depto</th>
<th>cod_centro</th>
<th>cod_causa</th>
    
</tr>
<?php foreach($arrData as $row): ?>
<tr><td><?php echo $row['nom_apre']?></td><td><?php echo $row['des_tipo_id']?>
</td><td><?php echo $row['num_ficha']?></td><td><?php echo $row['nom_ciudad']?>
</td><td><?php echo $row['nom_depto']?></td><td><?php echo $row['cod_centro']?>
</td><td><?php echo $row['cod_causa']?></td>

</tr>
<?php endforeach ?>
</table>
</body>
</html>

