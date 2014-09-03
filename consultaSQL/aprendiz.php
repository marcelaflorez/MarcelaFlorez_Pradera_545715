<?php
/**
 * @author Marcela Florez
 * se recreo la clase aprendiz donde se visualizara todo su contenido
 */
class aprendiz {
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
/**
 * se realiza un try donde mostramos el servidor, base de datos y los permisos para mysql
 */
try {
    $objDB = new aprendiz('localhost', 'bddesercion', 'root', 'Sena2014');
$sql = "SELECT id_apre,nom_apre,apel_apre,tel_apre,ciudad.cod_ciudad,cod_tipo_id,cod_rh,genero,edad FROM  rh natural join aprendiz natural join tipo_id,ciudad where aprendiz.cod_ciudad=ciudad.cod_ciudad";
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
<title></title>
</head>
<body><center><form method="post" action="insertar.php" name="form">
    <input type="submit" value="insertar campo"> </form>   
    <form method="post" action="elim-aprendiz.php" name="form">
    <input type="submit" value="eliminar campo"> </form>
    <form method="post" action="modi-aprendiz.php" name="form">
    <input type="submit" value="modificar campo"> </form>

<table border='2' align="center">

  <tr><th>id_apre</th>   
  <th>nom_apre</th> 
    <th>apel_apre</th>
    <th>tel_apre</th> 
    <th>cod_ciudad</th>
    <th>cod_tipo_id</th>
    <th>cod_rh </th>
    <th>genero </th>
    <th>edad </th>
    </tr>
    <?php foreach($arrData as $row): ?>
<tr><td><?php echo $row['id_apre']?></td><td><?php echo $row['nom_apre']?></td>
<td><?php echo $row['apel_apre']?></td><td><?php echo $row['tel_apre']?></td>
<td><?php echo $row['cod_ciudad']?></td><td><?php echo $row['cod_tipo_id']?></td>
<td><?php echo $row['cod_rh']?></td><td><?php echo $row['genero']?></td>
<td><?php echo $row['edad']?></td>
</tr>
<?php endforeach ?>
</table>
</form>
</center>
</body>
</html>

