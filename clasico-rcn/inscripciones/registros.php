<?php require_once('bd.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
      break;
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

$db_selected = mysqli_select_db($audios, $database_audios);
$query_cambiar = "SELECT id, nombre, cedula, ano, mes, dia, direccion, telefono, celular, email, ciudad, gruposanguineo, eps, ars, funcion, equipo, empresa, direccionempresa, ciudadempresa, licencia, participacion, anosparticipacion, responsableequipo, fecha, hora FROM acreditacion ORDER BY id ASC";
$cambiar = mysqli_query($audios, $query_cambiar) or die(mysqli_error($audios));
$row_cambiar = mysqli_fetch_assoc($cambiar);
$totalRows_cambiar = mysqli_num_rows($cambiar);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
<title>RESULTADOS</title>
<style type="text/css">
<!--
.Estilo6 {font-family: Arial, Helvetica, sans-serif; font-size: 12px; }
.Estilo7 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.Estilo13 {color: #FFFFFF; font-weight: bold; font-family: Arial, Helvetica, sans-serif; font-size: 14px; }
-->
</style>
</head>

<body>
<p class="Estilo7">INSCRIPCION CLASICO RCN</p>
<p class="Estilo6"><a href="mys.php"><img src="images/icono-excel.gif" width="36" height="36" border="0" align="absmiddle" /> <strong>Descargar archivo</strong></a><strong></strong></p>

<?php //echo $row_cambiar['id']; ?>	

<table width="100%" border="0" cellpadding="3" cellspacing="1">
  <tr bgcolor="#000000">
	<td><span class="Estilo13">ID</span></td>
    <td><span class="Estilo13">NOMBRE</span></td>
    <td><span class="Estilo13">CEDULA</span></td>
    <td><span class="Estilo13">ANO / MES / DIA</span></td>
    <td><span class="Estilo13">DIRECCION</span></td>
    <td><span class="Estilo13">TELEFONO</span></td>
    <td><span class="Estilo13">CELULAR</span></td>
    <td><span class="Estilo13">EMAIL</span></td>    
    <td><span class="Estilo13">CIUDAD</span></td>
	<td><span class="Estilo13">GRUPO SANGUINEO</span></td>
    <td><span class="Estilo13">EPS</span></td>
    <td><span class="Estilo13">ARS</span></td>
    <td><span class="Estilo13">FUNCION</span></td>
    <td><span class="Estilo13">EQUIPO</span></td>   
    <td><span class="Estilo13">EMPRESA</span></td>
    <td><span class="Estilo13">DIRECCION</span></td>
    <td><span class="Estilo13">CIUDAD</span></td>
    <td><span class="Estilo13">LICENCIA</span></td>
    <td><span class="Estilo13">PARTICIPACION</span></td>    
    <td><span class="Estilo13">ANOS</span></td>
    <td><span class="Estilo13">RESPONSABLE</span></td>    
    <td><span class="Estilo13">FECHA</span></td>  
    <td><span class="Estilo13">HORA</span></td>    
  </tr>

<?php do { ?>
      <tr align="left" valign="middle" class="Estilo6" style="border-bottom:#000000; border-bottom-width:1px; border-bottom-style:solid;">
        <td height="30" bgcolor="#000000"><div align="justify"><span class="Estilo13"><?php echo $row_cambiar['id']; ?></span></div></td>
        <td height="30"><div align="justify"><?php echo $row_cambiar['nombre']; ?></div></td>
		<td height="30"><div align="justify"><?php echo $row_cambiar['cedula']; ?></div></td>
        <td height="30"><div align="justify"><?php echo $row_cambiar['ano']; ?> / <?php echo $row_cambiar['mes']; ?> / <?php echo $row_cambiar['dia']; ?></div></td>
        <td height="30"><div align="justify"><?php echo $row_cambiar['direccion']; ?></div></td>
        <td height="30"><div align="justify"><?php echo $row_cambiar['telefono']; ?> </div></td>        
        <td height="30"><div align="justify"><?php echo $row_cambiar['celular']; ?> </div></td>
        <td height="30"><div align="justify"><?php echo $row_cambiar['email']; ?> </div></td>
        <td height="30"><div align="justify"><?php echo $row_cambiar['ciudad']; ?> </div></td>
        <td height="30"><div align="justify"><?php echo $row_cambiar['gruposanguineo']; ?> </div></td>
        <td height="30"><div align="justify"><?php echo $row_cambiar['eps']; ?> </div></td>
        <td height="30"><div align="justify"><?php echo $row_cambiar['ars']; ?> </div></td> 
        <td height="30"><div align="justify"><?php echo $row_cambiar['funcion']; ?> </div></td>
        <td height="30"><div align="justify"><?php echo $row_cambiar['equipo']; ?></div></td>
        <td height="30"><div align="justify"><?php echo $row_cambiar['empresa']; ?> </div></td>        
        <td height="30"><div align="justify"><?php echo $row_cambiar['direccionempresa']; ?> </div></td>
        <td height="30"><div align="justify"><?php echo $row_cambiar['ciudadempresa']; ?> </div></td>
        <td height="30"><div align="justify"><?php echo $row_cambiar['licencia']; ?> </div></td>
        <td height="30"><div align="justify"><?php echo $row_cambiar['participacion']; ?> </div></td>
        <td height="30"><div align="justify"><?php echo $row_cambiar['anosparticipacion']; ?> </div></td>
        <td height="30"><div align="justify"><?php echo $row_cambiar['responsableequipo']; ?> </div></td> 
        <td height="30"><div align="justify"><?php echo $row_cambiar['fecha']; ?> </div></td>
        <td height="30"><div align="justify"><?php echo $row_cambiar['hora']; ?> </div></td>
      </tr>


      <tr align="left" valign="middle" bgcolor="#CCCCCC" class="Estilo6" style="border-bottom:#000000; border-bottom-width:1px; border-bottom-style:solid;">
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>
        <td height="5"></td>                  
    </tr>
      <?php } while ($row_cambiar = mysqli_fetch_assoc($cambiar)); ?>
</table>
</body>
</html>
<?php
mysqli_free_result($cambiar);
?>
