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
		<form method="post" action="insertar-matricula.php">
			<table border="2" align="center">
				<tr>
					<th>
						NUM_FICHA
					</th>
				<th>
						ID_APRENDIZ
					</th>
				<th>
						ESTADO
					</th>
				</tr>
					<th>
						<input type="text" name="num" required>
					</th>
					<th>
						<input type="text" name="id" required>
					</th>
					<th>
						<input type="text" name="est" required>
					</th>
					
			</table   
<center>
<input type="submit" value="insertar campo" >
<input type="submit" value="eliminar campo" >
<input type="submit" value="modificar campo">
		</center>
		</form>
	</body>
</html>