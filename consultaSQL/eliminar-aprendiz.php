<?php
// esta clase es para habilitar el funcionamiento con la base de datos y conexion con el servidor
include("DataBaseClass.php");
//esta variable me permite invocar el variable $sql por que existe un instanciamente
$objDB=NULL;
// por medio del TRYCATH logro visualizar mis error y corregirlos
try{
print_r($_POST);
    $id_apre = $_POST['id'];
    $nom_apre = $_POST['nom'];
    $apel_apre = $_POST['apel'];
    $tel_apre = $_POST['tel'];
    $cod_ciudad = $_POST['ciudad'];
    $cod_tipo_id = $_POST['tipo_id'];
    $cod_rh = $_POST['rh'];
    $genero = $_POST['genero'];
    $edad = $_POST['edad'];

//variable que permite la consulta en Mysql    
$sql= "delete from aprendiz where id_apre = " . $id_apre;
echo $sql;     
    
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