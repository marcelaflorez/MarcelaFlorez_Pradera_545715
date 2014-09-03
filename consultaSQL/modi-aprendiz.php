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
		<form method="post" action="modificar-aprendiz.php">
			<table border="2" align="center">
				<tr>
					<th>
						ID_APRE
					</th>
					<th>
						NOM_APRE
					</th>
				<th>
						APEL_APRE
					</th>
				<th>
						TEL
					</th>
					<th>
						COD_CIUDAD
					</th>
				<th>
						COD_TIPO_ID
					</th>
				<th>
						COD_RH
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
						<input type="text" name="tipo_id">
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
<center>
<input type="submit" value="insertar campo" >
<input type="submit" value="eliminar campo" >
<input type="submit" value="modificar campo">
		</center>
		</form>
	</body>
</html>