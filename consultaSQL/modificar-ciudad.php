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
    $cod_ciudad = $_POST['cod'];
    $nom_ciudad = $_POST['nom'];
    $cod_depto = $_POST['codDepto'];
    $habitantes = $_POST['habitantes'];
// esta variable $SQL es la que permite hacer validar la sentencia y asi realizar la conexion con la base de datos
    $sql= "update ciudad set cod_ciudad = '$cod_ciudad', nom_ciudad='$nom_ciudad', cod_depto = '$cod_depto', habitantes = '$habitantes' where cod_ciudad = " . $cod_ciudad;
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