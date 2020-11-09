<?php
	
	require_once('bd.php');
	
	if (!function_exists("GetSQLValueString")) {
		function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
		{ $hostname_audios = "localhost";
      $database_audios = "clscorcn";
      $username_audios = "root";
      $password_audios = "";
			
			$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
			
			$mysqli = new mysqli($hostname_audios, $username_audios, $password_audios, $database_audios) or die("Error al conectarse a la base de datos");
			
			$theValue = $mysqli->real_escape_string($theValue);
			
			switch ($theType) {
				case "text":
					$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
					break;
				case "long":
				case "int":
					$theValue = ($theValue != "") ? intval($theValue) : "NULL";
					break;
				case "double":
					$theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
					break;
				case "date":
					$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
					break;
				case "defined":
					$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
					break;
			}
			return $theValue;
		}
	}
	
	$editFormAction = $_SERVER['PHP_SELF'];
	if (isset($_SERVER['QUERY_STRING'])) {
		$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
	}
	
	if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
		$insertSQL = sprintf("INSERT INTO acreditacion (nombre, cedula, ano, mes, dia, direccion, telefono, celular, email, ciudad, gruposanguineo, eps, ars, funcion, equipo, empresa, direccionempresa, ciudadempresa, licencia, participacion, anosparticipacion, responsableequipo, fecha, hora) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
			GetSQLValueString($_POST['nombre'], "text"),
			GetSQLValueString($_POST['cedula'], "text"),
			GetSQLValueString($_POST['ano'], "int"),
			GetSQLValueString($_POST['mes'], "int"),
			GetSQLValueString($_POST['dia'], "int"),
			GetSQLValueString($_POST['direccion'], "text"),
			GetSQLValueString($_POST['telefono'], "text"),
			GetSQLValueString($_POST['celular'], "text"),
			GetSQLValueString($_POST['email'], "text"),
			GetSQLValueString($_POST['ciudad'], "text"),
			GetSQLValueString($_POST['gruposanguineo'], "text"),
			GetSQLValueString($_POST['eps'], "text"),
			GetSQLValueString($_POST['ars'], "text"),
			GetSQLValueString($_POST['funcion'], "text"),
			GetSQLValueString($_POST['equipo'], "text"),
			GetSQLValueString($_POST['empresa'], "text"),
			GetSQLValueString($_POST['direccionempresa'], "text"),
			GetSQLValueString($_POST['ciudadempresa'], "text"),
			GetSQLValueString($_POST['licencia'], "text"),
			GetSQLValueString($_POST['participacion'], "text"),
			GetSQLValueString($_POST['anosparticipacion'], "text"),
			GetSQLValueString($_POST['responsableequipo'], "text"),
			GetSQLValueString($_POST['fecha'], "text"),
			GetSQLValueString($_POST['hora'], "text"));
		
		// $hostname_audios = "10.0.0.156";
		// $database_audios = "clscorcn";
		// $username_audios = "minsits";
    // $password_audios = "d1fCeTEFEK3xaAw";
      $hostname_audios = "localhost";
      $database_audios = "clscorcn";
      $username_audios = "root";
      $password_audios = "root";
		$audios = mysqli_connect($hostname_audios, $username_audios, $password_audios, $database_audios) or die("Error al conectarse a la base de datos");
//		$Result1 = mysqli_query($audios, $insertSQL) or die(('<html><head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta http-equiv="Refresh" content="1;url=error.php"></head><body></body></html>'));
		$Result1 = mysqli_query($audios, $insertSQL) or die(('<html><head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta http-equiv="Refresh" content="1;url=error.php"></head><body></body></html>'));
//        $Result1 = mysqli_query($audios, $insertSQL);
//
//
		$insertGoTo = "gracias.php";
		if (isset($_SERVER['QUERY_STRING'])) {
			$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
			$insertGoTo .= $_SERVER['QUERY_STRING'];
		}
		$sprint = sprintf("Location: %s", $insertGoTo);
		header(sprintf("Location: %s", $insertGoTo));
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
  <title>RCN RADIO | REGISTRO DE ACREDITACI&Oacute;N CLASICO RCN</title>
  <link href="build/assets/css/style.css" rel="stylesheet" type="text/css"/>

  <!-- boostrap -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        crossorigin="anonymous">


  <script type="text/javascript">
      <!--
      function MM_validateForm() { //v4.0
          if (document.getElementById){
              var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
              for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
                  if (val) { nm=val.name; if ((val=val.value)!="") {
                      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
                          if (p<1 || p==(val.length-1)) errors+='- '+nm+' debe escribir un correo electrónico\n';
                      } else if (test!='R') { num = parseFloat(val);
                          if (isNaN(val)) errors+='- '+nm+' debe escribir números.\n';
                          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
                              min=test.substring(8,p); max=test.substring(p+1);
                              if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
                          } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' está vacio.\n'; }
              } ifhttps://antena2.com.co/ (errors) alert('El formulario no está diligenciado correctamente. Por favor, reviselo para realizar el envio.\n');
              document.MM_returnValue = (errors == '');
          } }
      //-->
  </script>
  <script language="JavaScript">
      function textCounter(field, countfield, maxlimit) {
          if (field.value.length > maxlimit) // if too long...trim it!
              field.value = field.value.substring(0, maxlimit);
// otherwise, update 'characters left' counter
          else
              countfield.value = maxlimit - field.value.length;
      }
  </script>
<!--  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script>-->
<!--  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.4.4.min.js"></script>-->
<!--  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  
</head>

<body>
<script type="text/javascript" src="js/validation.js"></script>

<div class="header">
  <a target="_blank" href="https://www.antena2.com.co/"><img src="logo_antena2.svg" alt=""></a>
</div>
<div id="container">
  <div class="formulario">


    <div class="container">
      <div class="col-lg-5 col-md-5 col-sm-12 wrap-left">
        <img src="ClasicoRCN2020Andina.png" alt="">
        <h1>Registro de acreditación</h1>
        <p>Los campos con asteriscos (*) son obligatorios.</p>
      </div>
      <div class="col-lg-7 col-md-7 col-sm-12">
        <div class="wrap-form">
          <form class="formgral" action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1"
                onSubmit="return">
            <table border="0" align="center" cellpadding="5" cellspacing="0">
              <tr>
                <td colspan="2">
                  <table border="0" align="center" cellpadding="5" cellspacing="0" class="wrap-table">
                    <tr>
                      <td colspan="3" align="center"><span class="titulo">INFORMACI&Oacute;N PERSONAL</span>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Nombre completo*" name="nombre" type="text"
                                 class="cajadetexto" id="nombre" size="40"/>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Número de cédula*" name="cedula" type="text"
                                 class="cajadetexto" id="cedula" size="40" />
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <strong class="fnacimiento">Fecha de nacimiento*</strong>
                          <div class="wrap-flex">
                            <div class="wrap-select">
                              <select name="ano">
                                <option value="" disabled selected>Año</option>
                                <option value="1920" <?php if (!(strcmp(1920, ""))) {
																	echo "SELECTED";
																} ?>>1920
                                </option>
                                <option value="1921" <?php if (!(strcmp(1921, ""))) {
																	echo "SELECTED";
																} ?>>1921
                                </option>
                                <option value="1922" <?php if (!(strcmp(1922, ""))) {
																	echo "SELECTED";
																} ?>>1922
                                </option>
                                <option value="1923" <?php if (!(strcmp(1923, ""))) {
																	echo "SELECTED";
																} ?>>1923
                                </option>
                                <option value="1924" <?php if (!(strcmp(1924, ""))) {
																	echo "SELECTED";
																} ?>>1924
                                </option>
                                <option value="1925" <?php if (!(strcmp(1925, ""))) {
																	echo "SELECTED";
																} ?>>1925
                                </option>
                                <option value="1926" <?php if (!(strcmp(1926, ""))) {
																	echo "SELECTED";
																} ?>>1926
                                </option>
                                <option value="1927" <?php if (!(strcmp(1927, ""))) {
																	echo "SELECTED";
																} ?>>1927
                                </option>
                                <option value="1928" <?php if (!(strcmp(1928, ""))) {
																	echo "SELECTED";
																} ?>>1928
                                </option>
                                <option value="1929" <?php if (!(strcmp(1929, ""))) {
																	echo "SELECTED";
																} ?>>1929
                                </option>
                                <option value="1930" <?php if (!(strcmp(1930, ""))) {
																	echo "SELECTED";
																} ?>>1930
                                </option>
                                <option value="1931" <?php if (!(strcmp(1931, ""))) {
																	echo "SELECTED";
																} ?>>1931
                                </option>
                                <option value="1932" <?php if (!(strcmp(1932, ""))) {
																	echo "SELECTED";
																} ?>>1932
                                </option>
                                <option value="1933" <?php if (!(strcmp(1933, ""))) {
																	echo "SELECTED";
																} ?>>1933
                                </option>
                                <option value="1934" <?php if (!(strcmp(1934, ""))) {
																	echo "SELECTED";
																} ?>>1934
                                </option>
                                <option value="1935" <?php if (!(strcmp(1935, ""))) {
																	echo "SELECTED";
																} ?>>1935
                                </option>
                                <option value="1936" <?php if (!(strcmp(1936, ""))) {
																	echo "SELECTED";
																} ?>>1936
                                </option>
                                <option value="1937" <?php if (!(strcmp(1937, ""))) {
																	echo "SELECTED";
																} ?>>1937
                                </option>
                                <option value="1938" <?php if (!(strcmp(1938, ""))) {
																	echo "SELECTED";
																} ?>>1938
                                </option>
                                <option value="1939" <?php if (!(strcmp(1939, ""))) {
																	echo "SELECTED";
																} ?>>1939
                                </option>
                                <option value="1940" <?php if (!(strcmp(1940, ""))) {
																	echo "SELECTED";
																} ?>>1940
                                </option>
                                <option value="1941" <?php if (!(strcmp(1941, ""))) {
																	echo "SELECTED";
																} ?>>1941
                                </option>
                                <option value="1942" <?php if (!(strcmp(1942, ""))) {
																	echo "SELECTED";
																} ?>>1942
                                </option>
                                <option value="1943" <?php if (!(strcmp(1943, ""))) {
																	echo "SELECTED";
																} ?>>1943
                                </option>
                                <option value="1944" <?php if (!(strcmp(1944, ""))) {
																	echo "SELECTED";
																} ?>>1944
                                </option>
                                <option value="1945" <?php if (!(strcmp(1945, ""))) {
																	echo "SELECTED";
																} ?>>1945
                                </option>
                                <option value="1946" <?php if (!(strcmp(1946, ""))) {
																	echo "SELECTED";
																} ?>>1946
                                </option>
                                <option value="1947" <?php if (!(strcmp(1947, ""))) {
																	echo "SELECTED";
																} ?>>1947
                                </option>
                                <option value="1948" <?php if (!(strcmp(1948, ""))) {
																	echo "SELECTED";
																} ?>>1948
                                </option>
                                <option value="1949" <?php if (!(strcmp(1949, ""))) {
																	echo "SELECTED";
																} ?>>1949
                                </option>
                                <option value="1950" <?php if (!(strcmp(1950, ""))) {
																	echo "SELECTED";
																} ?>>1950
                                </option>
                                <option value="1951" <?php if (!(strcmp(1951, ""))) {
																	echo "SELECTED";
																} ?>>1951
                                </option>
                                <option value="1952" <?php if (!(strcmp(1952, ""))) {
																	echo "SELECTED";
																} ?>>1952
                                </option>
                                <option value="1953" <?php if (!(strcmp(1953, ""))) {
																	echo "SELECTED";
																} ?>>1953
                                </option>
                                <option value="1954" <?php if (!(strcmp(1954, ""))) {
																	echo "SELECTED";
																} ?>>1954
                                </option>
                                <option value="1955" <?php if (!(strcmp(1955, ""))) {
																	echo "SELECTED";
																} ?>>1955
                                </option>
                                <option value="1956" <?php if (!(strcmp(1956, ""))) {
																	echo "SELECTED";
																} ?>>1956
                                </option>
                                <option value="1957" <?php if (!(strcmp(1957, ""))) {
																	echo "SELECTED";
																} ?>>1957
                                </option>
                                <option value="1958" <?php if (!(strcmp(1958, ""))) {
																	echo "SELECTED";
																} ?>>1958
                                </option>
                                <option value="1959" <?php if (!(strcmp(1959, ""))) {
																	echo "SELECTED";
																} ?>>1959
                                </option>
                                <option value="1960" <?php if (!(strcmp(1960, ""))) {
																	echo "SELECTED";
																} ?>>1960
                                </option>
                                <option value="1961" <?php if (!(strcmp(1961, ""))) {
																	echo "SELECTED";
																} ?>>1961
                                </option>
                                <option value="1962" <?php if (!(strcmp(1962, ""))) {
																	echo "SELECTED";
																} ?>>1962
                                </option>
                                <option value="1963" <?php if (!(strcmp(1963, ""))) {
																	echo "SELECTED";
																} ?>>1963
                                </option>
                                <option value="1964" <?php if (!(strcmp(1964, ""))) {
																	echo "SELECTED";
																} ?>>1964
                                </option>
                                <option value="1965" <?php if (!(strcmp(1965, ""))) {
																	echo "SELECTED";
																} ?>>1965
                                </option>
                                <option value="1966" <?php if (!(strcmp(1966, ""))) {
																	echo "SELECTED";
																} ?>>1966
                                </option>
                                <option value="1967" <?php if (!(strcmp(1967, ""))) {
																	echo "SELECTED";
																} ?>>1967
                                </option>
                                <option value="1968" <?php if (!(strcmp(1968, ""))) {
																	echo "SELECTED";
																} ?>>1968
                                </option>
                                <option value="1969" <?php if (!(strcmp(1969, ""))) {
																	echo "SELECTED";
																} ?>>1969
                                </option>
                                <option value="1970" <?php if (!(strcmp(1970, ""))) {
																	echo "SELECTED";
																} ?>>1970
                                </option>
                                <option value="1971" <?php if (!(strcmp(1971, ""))) {
																	echo "SELECTED";
																} ?>>1971
                                </option>
                                <option value="1972" <?php if (!(strcmp(1972, ""))) {
																	echo "SELECTED";
																} ?>>1972
                                </option>
                                <option value="1973" <?php if (!(strcmp(1973, ""))) {
																	echo "SELECTED";
																} ?>>1973
                                </option>
                                <option value="1974" <?php if (!(strcmp(1974, ""))) {
																	echo "SELECTED";
																} ?>>1974
                                </option>
                                <option value="1975" <?php if (!(strcmp(1975, ""))) {
																	echo "SELECTED";
																} ?>>1975
                                </option>
                                <option value="1976" <?php if (!(strcmp(1976, ""))) {
																	echo "SELECTED";
																} ?>>1976
                                </option>
                                <option value="1977" <?php if (!(strcmp(1977, ""))) {
																	echo "SELECTED";
																} ?>>1977
                                </option>
                                <option value="1978" <?php if (!(strcmp(1978, ""))) {
																	echo "SELECTED";
																} ?>>1978
                                </option>
                                <option value="1979" <?php if (!(strcmp(1979, ""))) {
																	echo "SELECTED";
																} ?>>1979
                                </option>
                                <option value="1980" <?php if (!(strcmp(1980, ""))) {
																	echo "SELECTED";
																} ?>>1980
                                </option>
                                <option value="1981" <?php if (!(strcmp(1981, ""))) {
																	echo "SELECTED";
																} ?>>1981
                                </option>
                                <option value="1982" <?php if (!(strcmp(1982, ""))) {
																	echo "SELECTED";
																} ?>>1982
                                </option>
                                <option value="1983" <?php if (!(strcmp(1983, ""))) {
																	echo "SELECTED";
																} ?>>1983
                                </option>
                                <option value="1984" <?php if (!(strcmp(1984, ""))) {
																	echo "SELECTED";
																} ?>>1984
                                </option>
                                <option value="1985" <?php if (!(strcmp(1985, ""))) {
																	echo "SELECTED";
																} ?>>1985
                                </option>
                                <option value="1986" <?php if (!(strcmp(1986, ""))) {
																	echo "SELECTED";
																} ?>>1986
                                </option>
                                <option value="1987" <?php if (!(strcmp(1987, ""))) {
																	echo "SELECTED";
																} ?>>1987
                                </option>
                                <option value="1988" <?php if (!(strcmp(1988, ""))) {
																	echo "SELECTED";
																} ?>>1988
                                </option>
                                <option value="1989" <?php if (!(strcmp(1989, ""))) {
																	echo "SELECTED";
																} ?>>1989
                                </option>
                                <option value="1990" <?php if (!(strcmp(1990, ""))) {
																	echo "SELECTED";
																} ?>>1990
                                </option>
                                <option value="1991" <?php if (!(strcmp(1991, ""))) {
																	echo "SELECTED";
																} ?>>1991
                                </option>
                                <option value="1992" <?php if (!(strcmp(1992, ""))) {
																	echo "SELECTED";
																} ?>>1992
                                </option>
                                <option value="1993" <?php if (!(strcmp(1993, ""))) {
																	echo "SELECTED";
																} ?>>1993
                                </option>
                                <option value="1994" <?php if (!(strcmp(1994, ""))) {
																	echo "SELECTED";
																} ?>>1994
                                </option>
                                <option value="1995" <?php if (!(strcmp(1995, ""))) {
																	echo "SELECTED";
																} ?>>1995
                                </option>
                                <option value="1996" <?php if (!(strcmp(1996, ""))) {
																	echo "SELECTED";
																} ?>>1996
                                </option>
                                <option value="1997" <?php if (!(strcmp(1997, ""))) {
																	echo "SELECTED";
																} ?>>1997
                                </option>
                                <option value="1998" <?php if (!(strcmp(1998, ""))) {
																	echo "SELECTED";
																} ?>>1998
                                </option>
                                <option value="1999" <?php if (!(strcmp(1999, ""))) {
																	echo "SELECTED";
																} ?>>1999
                                </option>
                                <option value="2000" <?php if (!(strcmp(2000, ""))) {
																	echo "SELECTED";
																} ?>>2000
                                </option>
                                <option value="2001" <?php if (!(strcmp(2001, ""))) {
																	echo "SELECTED";
																} ?>>2001
                                </option>
                                <option value="2002" <?php if (!(strcmp(2002, ""))) {
																	echo "SELECTED";
																} ?>>2002
                                </option>
                                <option value="2003" <?php if (!(strcmp(2003, ""))) {
																	echo "SELECTED";
																} ?>>2003
                                </option>
                                <option value="2004" <?php if (!(strcmp(2004, ""))) {
																	echo "SELECTED";
																} ?>>2004
                                </option>
                                <option value="2005" <?php if (!(strcmp(2005, ""))) {
																	echo "SELECTED";
																} ?>>2005
                                </option>
                                <option value="2006" <?php if (!(strcmp(2006, ""))) {
																	echo "SELECTED";
																} ?>>2006
                                </option>
                                <option value="2007" <?php if (!(strcmp(2007, ""))) {
																	echo "SELECTED";
																} ?>>2007
                                </option>
                                <option value="2008" <?php if (!(strcmp(2008, ""))) {
																	echo "SELECTED";
																} ?>>2008
                                </option>
                                <option value="2009" <?php if (!(strcmp(2009, ""))) {
																	echo "SELECTED";
																} ?>>2009
                                </option>
                                <option value="2010" <?php if (!(strcmp(2010, ""))) {
																	echo "SELECTED";
																} ?>>2010
                                </option>
                              </select>
                            </div>

                            <div class="wrap-select">
                              <select name="mes" >
                                <option value="" disabled selected>Mes</option>
                                <option value="1" <?php if (!(strcmp(1, ""))) {
																	echo "SELECTED";
																} ?>>Enero
                                </option>
                                <option value="2" <?php if (!(strcmp(2, ""))) {
																	echo "SELECTED";
																} ?>>Febrero
                                </option>
                                <option value="3" <?php if (!(strcmp(3, ""))) {
																	echo "SELECTED";
																} ?>>Marzo
                                </option>
                                <option value="4" <?php if (!(strcmp(4, ""))) {
																	echo "SELECTED";
																} ?>>Abril
                                </option>
                                <option value="5" <?php if (!(strcmp(5, ""))) {
																	echo "SELECTED";
																} ?>>Mayo
                                </option>
                                <option value="6" <?php if (!(strcmp(6, ""))) {
																	echo "SELECTED";
																} ?>>Junio
                                </option>
                                <option value="7" <?php if (!(strcmp(7, ""))) {
																	echo "SELECTED";
																} ?>>Julio
                                </option>
                                <option value="8" <?php if (!(strcmp(8, ""))) {
																	echo "SELECTED";
																} ?>>Agosto
                                </option>
                                <option value="9" <?php if (!(strcmp(9, ""))) {
																	echo "SELECTED";
																} ?>>Septiembre
                                </option>
                                <option value="10" <?php if (!(strcmp(10, ""))) {
																	echo "SELECTED";
																} ?>>Octubre
                                </option>
                                <option value="11" <?php if (!(strcmp(11, ""))) {
																	echo "SELECTED";
																} ?>>Noviembre
                                </option>
                                <option value="12" <?php if (!(strcmp(12, ""))) {
																	echo "SELECTED";
																} ?>>Diciembre
                                </option>
                              </select>
                            </div>
                            <div class="wrap-select">
                              <select name="dia" >
                                <option value="" disabled selected>Día</option>
                                <option value="1" <?php if (!(strcmp(1, ""))) {
																	echo "SELECTED";
																} ?>>1
                                </option>
                                <option value="2" <?php if (!(strcmp(2, ""))) {
																	echo "SELECTED";
																} ?>>2
                                </option>
                                <option value="3" <?php if (!(strcmp(3, ""))) {
																	echo "SELECTED";
																} ?>>3
                                </option>
                                <option value="4" <?php if (!(strcmp(4, ""))) {
																	echo "SELECTED";
																} ?>>4
                                </option>
                                <option value="5" <?php if (!(strcmp(5, ""))) {
																	echo "SELECTED";
																} ?>>5
                                </option>
                                <option value="6" <?php if (!(strcmp(6, ""))) {
																	echo "SELECTED";
																} ?>>6
                                </option>
                                <option value="7" <?php if (!(strcmp(7, ""))) {
																	echo "SELECTED";
																} ?>>7
                                </option>
                                <option value="8" <?php if (!(strcmp(8, ""))) {
																	echo "SELECTED";
																} ?>>8
                                </option>
                                <option value="9" <?php if (!(strcmp(9, ""))) {
																	echo "SELECTED";
																} ?>>9
                                </option>
                                <option value="10" <?php if (!(strcmp(10, ""))) {
																	echo "SELECTED";
																} ?>>10
                                </option>
                                <option value="11" <?php if (!(strcmp(11, ""))) {
																	echo "SELECTED";
																} ?>>11
                                </option>
                                <option value="12" <?php if (!(strcmp(12, ""))) {
																	echo "SELECTED";
																} ?>>12
                                </option>
                                <option value="13" <?php if (!(strcmp(13, ""))) {
																	echo "SELECTED";
																} ?>>13
                                </option>
                                <option value="14" <?php if (!(strcmp(14, ""))) {
																	echo "SELECTED";
																} ?>>14
                                </option>
                                <option value="15" <?php if (!(strcmp(15, ""))) {
																	echo "SELECTED";
																} ?>>15
                                </option>
                                <option value="16" <?php if (!(strcmp(16, ""))) {
																	echo "SELECTED";
																} ?>>16
                                </option>
                                <option value="17" <?php if (!(strcmp(17, ""))) {
																	echo "SELECTED";
																} ?>>17
                                </option>
                                <option value="18" <?php if (!(strcmp(18, ""))) {
																	echo "SELECTED";
																} ?>>18
                                </option>
                                <option value="19" <?php if (!(strcmp(19, ""))) {
																	echo "SELECTED";
																} ?>>19
                                </option>
                                <option value="20" <?php if (!(strcmp(20, ""))) {
																	echo "SELECTED";
																} ?>>20
                                </option>
                                <option value="21" <?php if (!(strcmp(21, ""))) {
																	echo "SELECTED";
																} ?>>21
                                </option>
                                <option value="22" <?php if (!(strcmp(22, ""))) {
																	echo "SELECTED";
																} ?>>22
                                </option>
                                <option value="23" <?php if (!(strcmp(23, ""))) {
																	echo "SELECTED";
																} ?>>23
                                </option>
                                <option value="24" <?php if (!(strcmp(24, ""))) {
																	echo "SELECTED";
																} ?>>24
                                </option>
                                <option value="25" <?php if (!(strcmp(25, ""))) {
																	echo "SELECTED";
																} ?>>25
                                </option>
                                <option value="26" <?php if (!(strcmp(26, ""))) {
																	echo "SELECTED";
																} ?>>26
                                </option>
                                <option value="27" <?php if (!(strcmp(27, ""))) {
																	echo "SELECTED";
																} ?>>27
                                </option>
                                <option value="28" <?php if (!(strcmp(28, ""))) {
																	echo "SELECTED";
																} ?>>28
                                </option>
                                <option value="29" <?php if (!(strcmp(29, ""))) {
																	echo "SELECTED";
																} ?>>29
                                </option>
                                <option value="30" <?php if (!(strcmp(30, ""))) {
																	echo "SELECTED";
																} ?>>30
                                </option>
                                <option value="31" <?php if (!(strcmp(31, ""))) {
																	echo "SELECTED";
																} ?>>31
                                </option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr class="transparencia">
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Dirección" name="direccion" type="text"
                                 class="cajadetexto" id="direccion" size="40"/>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Ciudad" name="ciudad" type="text"
                                 class="cajadetexto" id="ciudad" size="40"/>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Teléfono" name="telefono" type="text"
                                 class="cajadetexto" id="telefono" size="40" maxlength="10"/>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Celular" name="celular" type="text"
                                 class="cajadetexto" id="celular" size="40" maxlength="10"/>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Email" name="email" type="email"
                                 class="cajadetexto" id="email" size="40"
                                 pattern="/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/"/>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <div class="wrap-select">
                            <select name="gruposanguineo" class="cajatexto3" >
                              <option value="" disabled selected>Grupo Sanguineo*</option>
                              <option value="O-" <?php if (!(strcmp(1, ""))) {
																echo "SELECTED";
															} ?>>O-
                              </option>
                              <option value="O+" <?php if (!(strcmp(2, ""))) {
																echo "SELECTED";
															} ?>>O+
                              </option>
                              <option value="A-" <?php if (!(strcmp(3, ""))) {
																echo "SELECTED";
															} ?>>A-
                              </option>
                              <option value="A+" <?php if (!(strcmp(4, ""))) {
																echo "SELECTED";
															} ?>>A+
                              </option>
                              <option value="B-" <?php if (!(strcmp(5, ""))) {
																echo "SELECTED";
															} ?>>B-
                              </option>
                              <option value="B+" <?php if (!(strcmp(6, ""))) {
																echo "SELECTED";
															} ?>>B+
                              </option>
                              <option value="AB-" <?php if (!(strcmp(7, ""))) {
																echo "SELECTED";
															} ?>>AB-
                              </option>
                              <option value="AB+" <?php if (!(strcmp(8, ""))) {
																echo "SELECTED";
															} ?>>AB+
                              </option>
                            </select>
                          </div>
                      </td>
                    </tr>

                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="EPS*" name="eps" type="text" class="cajadetexto"
                                 id="eps" size="40" />
                        </div>
                      </td>
                    </tr>
                    <tr class="end-table">
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="ARS*" name="ars" type="text" class="mb15"
                                 id="ars" size="40" />
                        </div>
                      </td>
                    </tr>
                  </table>

                  <table border="0" align="center" cellpadding="5" cellspacing="0" class="wrap-table">
                    <tr>
                      <td colspan="3" align="center" valign="top"><span
                            class="titulo">INFORMACI&Oacute;N ADICIONAL</span>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Función en el clásico*" name="funcion"
                                 type="text" class="cajadetexto" id="funcion" size="40" />
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Nombre del equipo*" name="equipo" type="text"
                                 class="cajadetexto" id="equipo" size="40" />
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Empresa*" name="empresa" type="text"
                                 class="cajadetexto" id="empresa" size="40" />
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Dirección de la empresa*"
                                 name="direccionempresa" type="text" class="cajadetexto"
                                 id="direccionempresa" size="40" />
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Ciudad*" name="ciudadempresa" type="text"
                                 class="cajadetexto" id="ciudadempresa" size="40" />
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Licencia Federación Colombiana de Ciclismo*"
                                 name="licencia" type="text" class="cajadetexto" id="licencia"
                                 size="40" />
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Número de participaciones en clásicos"
                                 name="participacion" type="number" min="0" class="cajadetexto"
                                 id="participacion" size="40" />
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Ediciones en que participó"
                                 name="anosparticipacion" type="text" class="cajadetexto"
                                 id="anosparticipacion" size="40" />
                          <p class="example"><i>Ej: 2010, 2011, 2016</i></p>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Nombre del responsable del equipo*"
                                 name="responsableequipo" type="text" class="mb15"
                                 id="responsableequipo" size="40" />
                        </div>
                      </td>
                    </tr>
                  </table>

                  <table border="0" align="center" cellpadding="5" cellspacing="0" class="wrap-table">
                    <tr>
                      <td colspan="3" align="center"><span class="titulo">NOTA LEGAL</span></td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <p class="terminos">Al firmar esta solicitud para la inscripci&oacute;n
                            y acreditaci&oacute;n en el <strong>CL&Aacute;SICO RCN</strong>
                            acepto someterme a las reglas del cl&aacute;sico y dem&aacute;s
                            reglamentos que gobiernan el evento, de igual manera exonero de
                            todas las responsabilidades a <strong>RADIO CADENA NACIONAL
                              S.A., RCN</strong>. Declaro adem&aacute;s estar en buena
                            salud y que no tengo ninguna condici&oacute;n m&eacute;dica que
                            me impida participar en este evento.</p>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        <div>
                          <input type="hidden" name="fecha" value="<?= date("d/m/Y"); ?>"/>
                          <input type="hidden" name="hora" value="<?= date("G:i:s"); ?>"/>
                          <input type="hidden" name="MM_insert" value="form1"/>
                          <input type="submit" name="postback" id="postback"
                                 value="Enviar registro" class="boton btn-enviar"/>
<!--                                 onclick="MM_validateForm('nombre','','R','telefono','','R','email','','RisEmail','ciudad','','R');return document.MM_returnValue"-->
                          
                          <input type="reset" value="Limpiar formulario">
                        </div>
                      </td>
                    </tr>
                  </table>

                </td>
              </tr>
            </table>
          </form><?php if (isset($msg)) echo $msg; ?>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
    <!--
    function validar(formulario) {
        if (formulario.ano.value == '') {
            alert('Seleccione Ano de Nacimiento');
            formulario.ano.focus();
            return false;
        }
        if (formulario.mes.value == '') {
            alert('Seleccione Mes de Nacimiento');
            formulario.mes.focus();
            return false;
        }
        if (formulario.dia.value == '') {
            alert('Seleccione Dia de Nacimiento');
            formulario.dia.focus();
            return false;
        }
        if (formulario.gruposanguineo.value == '') {
            alert('Seleccione Grupo Sanguineo');
            formulario.gruposanguineo.focus();
            return false;
        }
        return true;
    }

    //-->
</script>

</div>
</div>


<div id="footer"></div>

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-54490095-14', 'auto');
    ga('send', 'pageview');

</script>

</body>
</html>