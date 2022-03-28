<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect</title>
</head>
<body>
<?php
	//Sample Database Connection Syntax for PHP and MySQL.
	
	//Connect To Database
	$USER = $_GET['username'];
	$PASS = $_GET['pass'];
	$hostname="localhost";
	$username="root";
	$password="";
	$dbname="mysql";
	$usertable="login";
	$yourfield = "username";
	$otherfield = "pass";
	
	$conexao = mysqli_connect($hostname,$username, $password) or die ("html>script language='JavaScript'>alert('Unable to connect to database! Please try again later.'),history.go(-1)/script>/html>");

	mysqli_select_db($conexao,$dbname);
	
	# Check If Record Exists

	$query = "INSERT INTO login (username, pass) VALUES('$USER', '$PASS')";
	
	$result = mysqli_query($conexao,$query);
	$query = "SELECT * FROM $usertable";
	$result = mysqli_query($conexao,$query);
	if($result){
		echo "Lista de Usuarios do Banco de Dados: ";
		echo "<br> <br>";
		while($row = mysqli_fetch_array($result)){
			
			echo "Usuario: " .$row["$yourfield"]. "  ";
			echo "Senha: " .$row["$otherfield"]. "<br>";
		}
	}
?>
</body>
</html>