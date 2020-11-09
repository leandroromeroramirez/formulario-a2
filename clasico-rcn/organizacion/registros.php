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


$query_cambiar = '';
$response_bd = [];
if (isset($_POST['buscar'])) {
  $cedula = isset($_POST['xcedula']) ? $_POST['xcedula'] : '';

  if (!empty($cedula)) {
    $query_cambiar = "SELECT * FROM organizacion WHERE cedula='" . $cedula . "'";
    $response_bd = loadData($audios, $database_audios, $query_cambiar);
  } else {
    $query_cambiar = "SELECT * FROM organizacion ORDER BY id ASC";
    $response_bd = loadData($audios, $database_audios, $query_cambiar);
  }
} else {
  $query_cambiar = "SELECT * FROM organizacion ORDER BY id ASC";
  $response_bd = loadData($audios, $database_audios, $query_cambiar);
}

$row_cambiar = mysqli_fetch_assoc($response_bd);
$totalRows_cambiar = mysqli_num_rows($response_bd);

function loadData($audios, $database_audios, $query)
{
  $db_selected = mysqli_select_db($audios, $database_audios);
  $response_bd = mysqli_query($audios, $query) or die(mysqli_error($audios));

  return $response_bd;
}



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
  <title>RESULTADOS</title>
  <style type="text/css">
    .Estilo6 {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 12px;
    }

    .Estilo7 {
      font-family: Arial, Helvetica, sans-serif;
      font-weight: bold;
    }

    .Estilo13 {
      color: #FFFFFF;
      font-weight: bold;
      font-family: Arial, Helvetica, sans-serif;
      font-size: 14px;
    }
  </style>
</head>

<body>
  <p class="Estilo7">ORGANIZACIÓN CLASICO RCN</p>
  <? if (isset($_POST['xcedula']) && $_POST['xcedula'] != '') {
    echo '<form action="descarga.php" method="post">
     <h3>Descargue el reporte del numero de cedula => ' . (isset($_POST['xcedula']) ? $_POST['xcedula'] : '' ) . '</h3>
    <input type="hidden" name="cedula" id="cedula" value="'. (isset($_POST['xcedula']) ? $_POST['xcedula'] : '' ) .'">
    <img src="images/icono-excel.gif" width="36" height="36" border="0" align="absmiddle" />
    <button type="submit">Descargar lista</button>
  </form>';
  }
  ?>
  <br>
  <br>
  <h3>Descarge Todos los registros</h3>
  <p class="Estilo6"><a href="mys.php"><img src="images/icono-excel.gif" width="36" height="36" border="0" align="absmiddle" /> <strong>Descargar archivo</strong></a><strong></strong></p>

  <form action="" method="post" name="form3" id="form3" onSubmit="return">
    <table border="0" align="center" cellpadding="5" cellspacing="0">
      <tr>
        <td colspan="2">
          <table border="0" align="center" cellpadding="5" cellspacing="0" class="wrap-table">
            <tr>
              <td colspan="3" align="center"><span class="titulo">FILTROS DE BUSQUEDA</span>
              </td>
            </tr>
            <tr>
              <td colspan="3">
                <div class="input-field20">
                  <input placeholder="Número de cédula*" name="xcedula" type="text" class="cajadetexto" id="xcedula" size="40" />
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
      <tr>
        <td>
          <button type="submit" value="form3" name="buscar"> Buscar </button>
        </td>
      </tr>
    </table>
  </form>

  <table width="100%" border="0" cellpadding="3" cellspacing="1">
    <tr bgcolor="#000000">
      <td><span class="Estilo13">ID</span></td>
      <td><span class="Estilo13">NOMBRE</span></td>
      <td><span class="Estilo13">CEDULA</span></td>
      <td><span class="Estilo13">EDAD</span></td>
      <td><span class="Estilo13">ENTIDAD</span></td>
      <td><span class="Estilo13">CARGO</span></td>
      <td><span class="Estilo13">EPS</span></td>
      <td><span class="Estilo13">ARL</span></td>
      <td><span class="Estilo13">GRUPO SANGUINEO</span></td>
      <td><span class="Estilo13">CELULAR</span></td>
      <td><span class="Estilo13">NOMBRE CONTACTO</span></td>
      <td><span class="Estilo13">TELEFONO CONTACTO</span></td>
      <td><span class="Estilo13">FECHA</span></td>
      <td><span class="Estilo13">HORA</span></td>
    </tr>

    <?php do { ?>
      <tr align="left" valign="middle" class="Estilo6" style="border-bottom:#000000; border-bottom-width:1px; border-bottom-style:solid;">
        <td height="30" bgcolor="#000000">
          <div align="justify"><span class="Estilo13"><?php echo $row_cambiar['id']; ?></span></div>
        </td>
        <td height="30">
          <div align="justify"><?php echo $row_cambiar['nombre']; ?></div>
        </td>
        <td height="30">
          <div align="justify"><?php echo $row_cambiar['cedula']; ?></div>
        </td>
        <td height="30">
          <div align="justify"><?php echo $row_cambiar['edad']; ?></div>
        </td>
        <td height="30">
          <div align="justify"><?php echo $row_cambiar['entidad']; ?></div>
        </td>
        <td height="30">
          <div align="justify"><?php echo $row_cambiar['cargo']; ?> </div>
        </td>
        <td height="30">
          <div align="justify"><?php echo $row_cambiar['eps']; ?> </div>
        </td>
        <td height="30">
          <div align="justify"><?php echo $row_cambiar['arl']; ?> </div>
        </td>
        <td height="30">
          <div align="justify"><?php echo $row_cambiar['gruposanguineo']; ?> </div>
        </td>
        <td height="30">
          <div align="justify"><?php echo $row_cambiar['celular']; ?> </div>
        </td>
        <td height="30">
          <div align="justify"><?php echo $row_cambiar['responsable']; ?> </div>
        </td>
        <td height="30">
          <div align="justify"><?php echo $row_cambiar['telresponsable']; ?> </div>
        </td>
        <td height="30">
          <div align="justify"><?php echo $row_cambiar['fecha']; ?> </div>
        </td>
        <td height="30">
          <div align="justify"><?php echo $row_cambiar['hora']; ?> </div>
        </td>
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
      </tr>
    <?php } while ($row_cambiar = mysqli_fetch_assoc($response_bd)); ?>
  </table>
</body>

</html>
<?php
mysqli_free_result($response_bd);
?>