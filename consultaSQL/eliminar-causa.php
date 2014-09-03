<?php
// esta clase es para habilitar el funcionamiento con la base de datos y conexion con el servidor
include("DataBaseClass.php");
//esta variable me permite invocar el variable $sql por que existe un instanciamente
$objDB=NULL;
// por medio del TRYCATH logro visualizar mis error y corregirlos
try{

    $cod_causa = $_POST['codC'];
    $des_causa = $_POST['desC'];
    $estado_causa = $_POST['est'];
    
//variable que permite la consulta en Mysql    
$sql= "delete from causa_desercion where cod_causa= ". $cod_causa;
	  
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