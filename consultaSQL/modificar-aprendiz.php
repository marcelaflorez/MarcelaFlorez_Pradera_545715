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
    $id_apre = $_POST['id'];
    $nom_apre = $_POST['nom'];
    $apel_apre = $_POST['apel'];
    $tel_apre = $_POST['tel'];
    $cod_ciudad = $_POST['ciudad'];
    $cod_tipo_id = $_POST['tipo_id'];
    $cod_rh = $_POST['rh'];
    $genero = $_POST['genero'];
    $edad = $_POST['edad'];
// esta variable $SQL es la que permite hacer validar la sentencia y asi realizar la conexion con la base de datos
$sql= "update aprendiz set id_apre = '$id_apre', nom_apre='$nom_apre',apel_apre = '$apel_apre',tel_apre = '$tel_apre', cod_ciudad = '$cod_ciudad',cod_tipo_id = '$cod_tipo_id',cod_rh = '$cod_rh',genero = '$genero',edad = '$edad' where id_apre = " . $id_apre;
echo $sql;     
// Esta variable es la que hace posible nuestra conexion con el servidor 
$objDB= new DataBaseClass('localhost', 'bddesercion', 'root', 'Sena2014'); 

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