<?php
/**
 * @author Marcela Florez
 * incluyo la clase DataBaseClass que es la que dara la correcta funcionabilidad de todas las variables creadas
 */
include("DataBaseClass.php");
// esta variable permite que se pueda reconoces la sentencia
$objDB=NULL;
// con esta funcion TRYCATCH logro visualizar mis errores
try{
print_r($_POST);
    $num_doc = $_POST['num'];
    $fecha = $_POST['fe'];
    $id_apre = $_POST['id'];
    $num_ficha = $_POST['ficha'];
    $cod_causa = $_POST['cod'];
    $fecha_desercion = $_POST['fec'];
    $fase_desercion = $_POST['fase'];
// esta variable $SQL es la que permite hacer validar la sentencia y asi realizar la conexion con la base de datos
$sql= "update desercion set num_doc='$num_doc',fecha='$fecha',id_apre='$id_apre',num_ficha='$num_ficha',cod_causa'$cod_causa',fecha_desercion='$fecha_desercion',fase_desercion='$fase_desercion' where num_doc= " . $num_doc;
// Esta variable es la que hace posible nuestra conexion con el servidor
$objDB= new DataBaseClass('localhost', 'bddesercion', 'root', 'Sena2014'); 

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