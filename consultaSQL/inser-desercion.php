<html>
    <head>
    <meta charset="UTF-8">
        <meta name="description"content="ejercicios"><!--es la descripcion general o global de su sitio web-->
        <meta name="keywords"content="html5,css3,javascript"><!--son las palabras claves que necesito para trabajar en mi sitio web-->
        <title>ConsultaSQL_Marcela Florez</title>
        <link rel="stylesheet" href="css/miestilo.css"><!--para relacionar paginas web-->
        <title> </title>
    </head>
    <body>
        <form method="post" action="insertar-desercion.php">
            <table border='2' align='center'>
                <tr>
                    <th>
                        NUM_DOC
                    </th>
                    <th>
                        FECHA
                    </th>
                    <th>
                        ID_APRE
                    </th>
                    <th>
                        NUM_FICHA
                    </th>
                    <th>
                        COD_CAUSA
                    </th>
                    <th>
                        FECHA_DESERCION
                    </th>
                    <th>
                        FASE_DESERCION
                    </th>
                </tr>
                    <th>
                        <input type="text" name="num" required>
                    </th>
                    <th>
                        <input type="text" name="fe">
                    </th>
                    <th>
                        <input type="text" name="id">
                    </th>
                    <th>
                        <input type="text" name="ficha">
                    </th>
                    <th>
                        <input type="text" name="cod">
                    </th>
                    <th>
                        <input type="text" name="fec">
                    </th>
                    <th>
                        <input type="text" name="fase">
                    </th>
                    
            </table>
<input type="submit" value="insertar campo" >
<input type="submit" value="eliminar campo" >
<input type="submit" value="modificar campo">
        </form>
    </body>
</html>