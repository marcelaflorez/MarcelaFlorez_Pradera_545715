<?php

class Ejer4 {

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
    $objDB = new Ejer4('localhost', 'bddesercion', 'root', 'Sena2014');
$sql = "SELECT  count(aprendiz.id_apre) as Aprendiz,des_causa,cod_centro,ficha.num_ficha FROM causa_desercion natural join desercion natural join ficha natural join centro,aprendiz where desercion.id_apre=aprendiz.id_apre and centro.cod_centro=2 group by desercion.cod_causa";
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
<tr><th>id_apre</th>
<th>des_causa</th>
<th>cod_centro</th>
<th>num_ficha</th>    
</tr>
<?php foreach($arrData as $row): ?>
<tr><td><?php echo $row['Aprendiz']?></td><td><?php echo $row['des_causa']?>
</td><td><?php echo $row['cod_centro']?></td><td><?php echo $row['num_ficha']?></td>
</tr>
<?php endforeach ?>
</table>
</body>
</html>






