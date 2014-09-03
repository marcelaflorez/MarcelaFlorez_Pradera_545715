<?php
// esta clase es para habilitar el funcionamiento con la base de datos y conexion con el servidor
include("DataBaseClass.php");
//esta variable me permite invocar el variable $sql por que existe un instanciamente
$objDB=NULL;
try{
// por medio del TRYCATH logro visualizar mis error y corregirlos
    $cod_prog = $_POST['cod'];
    $des_prog = $_POST['des'];
    $estado = $_POST['est'];

//variable que permite la consulta en Mysql
$sql= "delete from programa where cod_prog = " . $cod_prog;
	   
	   
$objDB= new DataBaseClass('localhost', 'bddesercion', 'root','Sena2014'); 

$objDB->getInstance()->beginTransaction();
$objDB->getInstance()->exec($sql);
$objDB->getInstance()->commit();
// se utiliza para que nos lleve de regreso a la pagina principal
header("location:index.php");
    exit;				
	
}catch (PDOException $exc){
 $objDB->getInstance()->rollback();
 echo $exc->getMessage();
}
?>
?>
<html>
<head><title></title></head>
<body>
    
<table border='2' align="center">
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

