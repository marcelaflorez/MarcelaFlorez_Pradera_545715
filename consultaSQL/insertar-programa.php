<?php
/**
 * @author Marcela Florez
 * incluyo la clase DataBaseClass que es la que dara la correcta funcionabilidad de todas las variables creadas
 */
include("DataBaseClass.php");
// esta variable permite que se pueda reconoces la sentencia
$objDB = NULL;
// con esta funcion TRYCATCH logro visualizar mis errores
try {
    print_r($_POST);
    $cod_prog = $_POST['cod'];
    $des_prog = $_POST['des'];
    $estado = $_POST['est'];
// esta variable $SQL es la que permite hacer validar la sentencia y asi realizar la conexion con la base de datos
    $sql = "INSERT INTO programa "
            . "(cod_prog,des_prog,estado) "
            . "VALUES ('$cod_prog','$des_prog','$estado') ";
// Esta variable es la que hace posible nuestra conexion con el servidor
    $objDB = new DataBaseClass('localhost', 'bddesercion', 'root', 'Sena2014');

    $objDB->getInstance()->beginTransaction();
    $objDB->getInstance()->exec($sql);
    $objDB->getInstance()->commit();
    // se utiliza para que nos lleve de regreso a la pagina principal
     header("location:index.php");
    exit;
} catch (PDOException $exc) {
    $objDB->getInstance()->rollback();
    echo $exc->getMessage();
}
//$db = new PDO ($dsn,$username,$password);
//$dsn= 'mysql:host=localhost;dbname=test;port=3306';
?>
