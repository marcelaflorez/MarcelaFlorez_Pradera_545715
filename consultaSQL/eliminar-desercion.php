<?php
// esta clase es para habilitar el funcionamiento con la base de datos y conexion con el servidor
include("DataBaseClass.php");
//esta variable me permite invocar el variable $sql por que existe un instanciamente
$objDB=NULL;
// por medio del TRYCATH logro visualizar mis error y corregirlos
try{
print_r($_POST);
    $num_doc = $_POST['num'];
    $fecha = $_POST['fe'];
    $id_apre = $_POST['id'];
    $num_ficha = $_POST['ficha'];
    $cod_causa = $_POST['cod'];
    $fecha_desercion = $_POST['fec'];
    $fase_desercion = $_POST['fase'];
//variable que permite la consulta en Mysql 
$sql= "delete from desercion where num_doc= " . $num_doc;
           
$objDB= new DataBaseClass('localhost', 'bddesercion', 'root','Sena2014'); 

$objDB->getInstance()->beginTransaction();
$objDB->getInstance()->exec($sql);
$objDB->getInstance()->commit();
// se utiliza para que nos lleve de regreso a la pagina principal
header("location:index.php");
    exit;S                  
    
}catch (PDOException $exc){
 $objDB->getInstance()->rollback();
 echo $exc->getMessage();
}
?>