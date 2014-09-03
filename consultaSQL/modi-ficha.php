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
		<form method="post" action="modificar-ficha.php">
			<table border="2" align="center">
				<tr>
					<th>
						NUM_FICHA
					</th>
					<th>
						COD_PROGRAMA
					</th>
					<th>
						FECHA_INI
					</th>		
				<th>
						FECHA_FIN
					</th>
				<th>
						COD_CENTRO
					</th>
				</tr>
					<th>
						<input type="text" name="num" required>
					</th>
					<th>
						<input type="text" name="cod" required>
					</th>
					<th>
						<input type="text" name="fe" required>
					</th>
					<th>
						<input type="text" name="fec" required>
					</th>
					<th>
						<input type="text" name="codC" required>
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