<?php
// esta clase es para habilitar el funcionamiento con la base de datos
class depto {
// estas son la variables que me permiten la conexion con el servidor y la base de datos
    private $host,
            $dbname,
            $port,
            $user,
            $password,
            $driver,
            $connect;
// por medio de la funcio contruct trabajo mis variable que esta en la clase
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
// por medio del TRYCATH logro visualizar mis error y corregirlos
try {
    $objDB = new depto('localhost', 'bddesercion', 'root', 'Sena2014');
$sql = "SELECT cod_depto, nom_depto FROM depto";
$arrData = $objDB->getInstance()
        ->query($sql)
        ->fetchAll(PDO::FETCH_ASSOC);
// la variable $row es la que permite que los campos sean reconocidos por el servidor 
$row = null;
echo '<pre>';
print_r($row);
echo '</pre>';

    
} catch (PDOException $ex) {
    echo $exc->getmessage();
}

?>

<html>
<head>
<meta charset="UTF-8">
        <meta name="description"content="ejercicios"><!--es la descripcion general o global de su sitio web-->
        <meta name="keywords"content="html5,css3,javascript"><!--son las palabras claves que necesito para trabajar en mi sitio web-->
        <title>ConsultaSQL_Marcela Florez</title>
        <link rel="stylesheet" href="css/miestilo.css"><!--para relacionar paginas web-->
<title></title> </head>
<body><center><form method="post" action="inser-depto.php" name="form">
    <input type="submit" value="insertar campo"> </form>   
    <form method="post" action="elim-depto.php" name="form">
    <input type="submit" value="eliminar campo"> </form>
    <form method="post" action="modi-depto.php" name="form">
    <input type="submit" value="modificar campo"> </form>
    
<table border='2' align="center">

  <tr><th>codigo departamento</th>   
  <th>nombre departamento</th> 
    </tr>
    <?php foreach($arrData as $row): ?>
<tr><td align="center"><?php echo $row['cod_depto']?></td><td><?php echo $row['nom_depto']?></td>
</tr>
<?php endforeach ?>
</table>
</center>
</body>
</html>

