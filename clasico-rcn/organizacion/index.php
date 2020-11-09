<?php
	
	require_once('bd.php');
  date_default_timezone_set ('America/Bogota');
  
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
   
	if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
		$insertSQL = sprintf(
      "INSERT INTO organizacion (nombre, cedula, edad, entidad, cargo, eps, arl, gruposanguineo, celular, responsable, telresponsable, respiracion, tos, temperatura, convive_covid, fecha, hora) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
			GetSQLValueString($_POST['nombre'], "text"),
			GetSQLValueString($_POST['cedula'], "text"),
			GetSQLValueString($_POST['edad'], "int"),
			GetSQLValueString($_POST['entidad'], "text"),
      GetSQLValueString($_POST['cargo'], "text"),
      GetSQLValueString($_POST['eps'], "text"),
      GetSQLValueString($_POST['arl'], "text"),
      GetSQLValueString($_POST['gruposanguineo'], "text"),
      GetSQLValueString($_POST['celular'], "text"),
      GetSQLValueString($_POST['responsable'], "text"),
			GetSQLValueString($_POST['telresponsable'], "text"),
      GetSQLValueString($_POST['respiracion'], "text"),
      GetSQLValueString($_POST['tos'], "text"),
      GetSQLValueString($_POST['temperatura'], "text"),
      GetSQLValueString($_POST['convive_covid'], "text"),
      GetSQLValueString($_POST['fecha'], "text"),
      GetSQLValueString($_POST['hora'], "text")
    );
    

		// $hostname_audios = "10.0.0.156";
		// $database_audios = "clscorcn";
		// $username_audios = "minsits";
    // $password_audios = "d1fCeTEFEK3xaAw";
      $hostname_audios = "localhost";
      $database_audios = "clscorcn";
      $username_audios = "root";
      $password_audios = "";

    $audios = mysqli_connect($hostname_audios, $username_audios, $password_audios, $database_audios) or die("Error al conectarse a la base de datos");

    $Result1 = mysqli_query($audios, $insertSQL) or die(('<html><head><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><meta http-equiv="Refresh" content="1;url=error.php"></head><body></body></html>'));

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
  <title>RCN RADIO | REGISTRO DE ORGANIZACI&Oacute;N CLASICO RCN</title>
  <link href="css/style.css" rel="stylesheet" type="text/css"/>

  <!-- boostrap -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        crossorigin="anonymous">

  <script language="JavaScript">
      function textCounter(field, countfield, maxlimit) {
          if (field.value.length > maxlimit) // if too long...trim it!
              field.value = field.value.substring(0, maxlimit);
// otherwise, update 'characters left' counter
          else
              countfield.value = maxlimit - field.value.length;
      }
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
  
</head>

<body>

<div class="header">
  <a target="_blank" href="https://www.antena2.com.co/"><img src="images/logo_antena2.svg" alt=""></a>
</div>
<div id="container">
  <div class="formulario">

    <div class="container">
      <div class="col-lg-5 col-md-5 col-sm-12 wrap-left">
        <img src="images/ClasicoRCN2020Andina.png" alt="">
        <h1>Registro de organización</h1>
        <p>Los campos con asteriscos (*) son obligatorios.</p>
      </div>
      <div class="col-lg-7 col-md-7 col-sm-12">
        <div class="wrap-form">
          <form class="formgral" action="<?php echo $editFormAction; ?>" method="post" name="form2" id="form2"
                onSubmit="return">
            <table border="0" align="center" cellpadding="5" cellspacing="0">
              <tr>
                <td colspan="2">
                  <table border="0" align="center" cellpadding="5" cellspacing="0" class="wrap-table">
                    <tr>
                      <td colspan="3" align="center"><span class="titulo">INFORMACI&Oacute;N PERSONAL</span>
                      </td>
                    </tr>
                    <!-- Nombre -->
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Nombre completo*" name="nombre" type="text"
                                 class="cajadetexto" id="nombre" size="40" required/>
                        </div>
                      </td>
                    </tr>
                    <!-- Cedula -->
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Número de cédula*" name="cedula" type="text"
                                 class="cajadetexto" id="cedula" size="40" required/>
                        </div>
                      </td>
                    </tr>
                    <!-- EDAD -->
                    <tr class="transparencia">
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Edad" name="edad" type="number"
                                 class="cajadetexto" id="edad" size="40" required/>
                        </div>
                      </td>
                    </tr>
                    <!-- ENTIDAD -->
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Entidad" name="entidad" type="text"
                                 class="cajadetexto" id="entidad" size="40" required/>
                        </div>
                      </td>
                    </tr>
                    <!-- CARGO -->
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Cargo" name="cargo" type="text"
                                 class="cajadetexto" id="cargo" size="40" required/>
                        </div>
                      </td>
                    </tr>
                    <!-- EPS -->
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="EPS*" name="eps" type="text" class="cajadetexto"
                                 id="eps" size="40" required/>
                        </div>
                      </td>
                    </tr>
                    <!-- ARL -->
                    <tr class="end-table">
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="ARL*" name="arl" type="text" class="mb15"
                                 id="arl" size="40" required/>
                        </div>
                      </td>
                    </tr>
                    <!-- Grupo sanguineo -->
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <div class="wrap-select">
                            <select name="gruposanguineo" class="cajatexto3" required>
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
                    <!-- CELULAR -->
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Celular" name="celular" type="text" required
                                 class="cajadetexto" id="celular" size="40" maxlength="10"/>
                        </div>
                      </td>
                    </tr>
                    
                  </table>

                  <!-- INFORMACI&Oacute;N ADICIONAL -->
                  <table border="0" align="center" cellpadding="5" cellspacing="0" class="wrap-table">
                    <tr>
                      <td colspan="3" align="center" valign="top"><span
                            class="titulo">DATOS DE EMERGENCIA</span>
                      </td>
                    </tr>
                    
                    <!-- RESPONSABLE -->
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Nombre completo persona de contacto*" name="responsable" type="text"
                                 class="cajadetexto" id="responsable" size="40"/>
                        </div>
                      </td>
                    </tr>
                    <!-- CELULAR -->
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input placeholder="Número celular persona contacto" name="telresponsable" type="text"
                                 class="cajadetexto" id="telresponsable" size="40" maxlength="10"/>
                        </div>
                      </td>
                    </tr>
                    <!-- FECHA-->
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                        <input class="cajadetexto" disabled="true" type="text" id="fecha" placeholder="Fecha de diligenciamiento" 
                        value="<?= date("d/m/Y"); ?>"/>
                        </div>
                      </td>
                    </tr>
                    <!-- HORA -->
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <input class="cajadetexto" disabled="true" type="text" id="hora"
                                 value="<?= date("G:i:s"); ?>"/>
                        </div>
                      </td>
                    </tr>
                   
                  </table>

<!-- INFORMACI&Oacute;N SALUD -->
<table border="0" align="center" cellpadding="5" cellspacing="0" class="wrap-table">
                    <tr>
                      <td colspan="3" align="center" valign="top"><span
                            class="titulo">INFORMACIÓN DE SALUD</span>
                      </td>
                    </tr>
                    
                    <!-- Dificultad para respirar -->
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <div class="wrap-select">
                    <select name="respiracion" class="cajatexto3" required>
                              <option value="" disabled selected>Dificultad para respirar*</option>
                              <option value="si" <?php if (!(strcmp(1, ""))) {
																echo "SELECTED";
															} ?>>Si
                              </option>
                              <option value="no" <?php if (!(strcmp(1, ""))) {
																echo "SELECTED";
															} ?>>No
                              </option>
                              </select>
                              </div>
                              </div>
                              </td>
                              </tr>

                    <!-- TOS -->
      <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <div class="wrap-select">
                    <select name="tos" class="cajatexto3" required>
                              <option value="" disabled selected>¿Tos Seca?*</option>
                              <option value="si" <?php if (!(strcmp(1, ""))) {
																echo "SELECTED";
															} ?>>Si
                              </option>
                              <option value="no" <?php if (!(strcmp(1, ""))) {
																echo "SELECTED";
															} ?>>No
                              </option>
                              </select>
                              </div>
                              </div>
                              </td>
                              </tr>
                    <!-- Temperatura superior a 38º-->
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <div class="wrap-select">
                    <select name="temperatura" class="cajatexto3" required>
                              <option value="" disabled selected>¿Temperatura superior a 38º?*</option>
                              <option value="si" <?php if (!(strcmp(1, ""))) {
																echo "SELECTED";
															} ?>>Si
                              </option>
                              <option value="no" <?php if (!(strcmp(1, ""))) {
																echo "SELECTED";
															} ?>>No
                              </option>
                              </select>
                              </div>
                              </div>
                              </td>
                              </tr>
                    <!-- HORA -->
                    <tr>
                      <td colspan="3">
                        <div class="input-field20">
                          <div class="wrap-select">
                    <select name="convive_covid" class="cajatexto3" required>
                              <option value="" disabled selected>¿Convive con alguien positivo para Covid?*</option>
                              <option value="si" <?php if (!(strcmp(1, ""))) {
																echo "SELECTED";
															} ?>>Si
                              </option>
                              <option value="no" <?php if (!(strcmp(1, ""))) {
																echo "SELECTED";
															} ?>>No
                              </option>
                              </select>
                              </div>
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
                          <input type="hidden" name="MM_insert" value="form2"/>
                          <input type="submit" name="postback" id="postback"
                                 value="Enviar registro" class="boton btn-enviar"/>
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
    function validar(formulario) {
        if (formulario.edad.value == '') {
            alert('Seleccione la edad');
            formulario.edad.focus();
            return false;
        }
        if (formulario.gruposanguineo.value == '') {
            alert('Seleccione Grupo Sanguineo');
            formulario.gruposanguineo.focus();
            return false;
        }
        return true;
    }

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