<html>
	<head>
	     <meta charset="UTF-8">
        <meta name="description"content="ejercicios"><!--es la descripcion general o global de su sitio web-->
        <meta name="keywords"content="html5,css3,javascript"><!--son las palabras claves que necesito para trabajar en mi sitio web-->
        <title>ConsultaSQL_Marcela Florez</title>
        <link rel="stylesheet" href="css/miestilo.css"><!--para relacionar paginas web-->
		<title></title>
	</head>
	<body>
		<form method="post" action="insertar2.php">
			<table border='2' align='center'>
				<tr>
					<th>
						ID
					</th>
					<th>
						NOMBRE
					</th>
					<th>
						APELLIDO
					</th>
                    <th>
						TELEFONO
					</th>
                    <th>
						CIUDAD
					</th>
                    <th>
						CODIGO TIPO_ID
					</th>
                    <th>
						CODIGO RH
					</th>
                    <th>
						GENERO
					</th>
                    <th>
						EDAD
					</th>

				</tr>
					<th>
						<input type="text" name="id" required>
					</th>
					<th>
						<input type="text" name="nom">
					</th>
					<th>
						<input type="text" name="apel">
					</th>
					<th>
						<input type="text" name="tel">
					</th>
					<th>
						<input type="text" name="ciudad">
					</th>
					<th>
						<input type="text" name="cod_tipo_id">
					</th>
					<th>
						<input type="text" name="rh">
					</th>
					<th>
						<input type="text" name="genero">
					</th>
					<th>
						<input type="text" name="edad">
					</th>
					
			</table>
<input type="submit" value="insertar campo" >
<input type="submit" value="eliminar campo" >
<input type="submit" value="modificar campo">
		</form>
	</body>
</html>