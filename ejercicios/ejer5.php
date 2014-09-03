<?php

class Ejer5 {

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
    $objDB = new Ejer5('localhost', 'bddesercion', 'root', 'Sena2014');
$sql = "SELECT  ficha.num_ficha,nom_apre,des_rh,genero,nom_ciudad,des_causa,des_prog FROM causa_desercion natural join desercion natural join ficha natural join programa, rh natural join aprendiz natural join ciudad where genero='M' and desercion.cod_causa=3 group by desercion.cod_causa";
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
<th>nombre</th>
<th>rh</th>
<th>genero</th>    
<th>ciudad</th>    
<th>descrip_causa</th>    
<th>descrip_prog</th>    
</tr>
<?php foreach($arrData as $row): ?>
<tr><td><?php echo $row['num_ficha']?></td><td><?php echo $row['nom_apre']?>
</td><td><?php echo $row['des_rh']?></td><td><?php echo $row['genero']?>
</td><td><?php echo $row['nom_ciudad']?></td><td><?php echo $row['des_causa']?>
<td><?php echo $row['des_prog']?></td>
</tr>
<?php endforeach ?>
</table>
</body>
</html>
