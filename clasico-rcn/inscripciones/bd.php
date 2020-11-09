<?php
	
	// $hostname_audios = "10.0.0.156";
	// $database_audios = "clscorcn";
	// $username_audios = "minsits";
	// $password_audios = "d1fCeTEFEK3xaAw";
	$hostname_audios = "localhost";
	$database_audios = "clscorcn";
	$username_audios = "root";
	$password_audios = "";
$audios = mysqli_connect($hostname_audios, $username_audios, $password_audios, $database_audios) or die("Error al conectarse a la base de datos");

function conectar()
{
	// $hostname_audios = "10.0.0.156";
	// $database_audios = "clscorcn";
	// $username_audios = "minsits";
	// $password_audios = "d1fCeTEFEK3xaAw";
	// mysqli_connect($hostname_audios, $username_audios, $password_audios, $database_audios) or die("Error al conectarse a la base de datos");
	

	$hostname_audios = "localhost";
	$database_audios = "clscorcn";
	$username_audios = "root";
	$password_audios = "";
	mysqli_connect($hostname_audios, $username_audios, $password_audios, $database_audios) or die("Error al conectarse a la base de datos");
	

	// $bd = mysql_connect("localhost", "homestead", "secret");
	// mysql_select_db("clscorcn");
}

function desconectar()
{
	// $hostname_audios = "10.0.0.156";
	// $database_audios = "clscorcn";
	// $username_audios = "minsits";
	// $password_audios = "d1fCeTEFEK3xaAw";
	$hostname_audios = "localhost";
	$database_audios = "clscorcn";
	$username_audios = "root";
	$password_audios = "";
	$audios = mysqli_connect($hostname_audios, $username_audios, $password_audios, $database_audios) or die("Error al conectarse a la base de datos");
	mysqli_close($audios);
}

