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
		<form method="post" action="eliminar-centro.php">
			<table border="2" align="center">
				<tr>
					<th>
						COD_CENTRO
					</th>
					<th>
						DESC_CENTRO
					</th>
				<th>
						TELEFONO
					</th>
				<th>
						DIRECCION
					</th>
				<th>
						COD_CIUDAD
					</th>
				
				</tr>
					<th>
						<input type="text" name="codC" required>
					</th>
					<th>
						<input type="text" name="desC">
					</th>
					<th>
						<input type="text" name="tel">
					</th>
					<th>
						<input type="text" name="dir">
					</th>
					<th>
						<input type="text" name="cod">
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