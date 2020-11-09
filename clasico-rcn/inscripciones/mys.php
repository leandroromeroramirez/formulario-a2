<?php
require_once('bd.php');
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=acreditacion.xls");
header("Pragma: no-cache");
header("Expires: 0");

$tabla = mysqli_query($audios, "SELECT id, nombre, cedula, ano, mes, dia, direccion, telefono, celular, email, ciudad, gruposanguineo, eps, ars, funcion, equipo, empresa, direccionempresa, ciudadempresa, licencia, participacion, anosparticipacion, responsableequipo, fecha, hora FROM acreditacion ORDER BY id ASC");
while ($registro = mysqli_fetch_array($tabla)) {
	
	echo "<table border=1>
	<tr>
	<td>".$registro['id']."</td>
	<td>".$registro['nombre']."</td>
	<td>".$registro['cedula']."</td>
	<td>".$registro['ano']."/".$registro['mes']."/".$registro['dia']."</td>
	<td>".$registro['telefono']."</td>
	<td>".$registro['celular']."</td>
	<td>".$registro['email']."</td>
	<td>".$registro['ciudad']."</td>
	<td>".$registro['gruposanguineo']."</td>
	<td>".$registro['eps']."</td>
	<td>".$registro['ars']."</td>
	<td>".$registro['funcion']."</td>
	<td>".$registro['equipo']."</td>
	<td>".$registro['empresa']."</td>
	<td>".$registro['direccionempresa']."</td>
	<td>".$registro['ciudadempresa']."</td>
	<td>".$registro['licencia']."</td>
	<td>".$registro['participacion']."</td>
	<td>".$registro['anosparticipacion']."</td>
	<td>".$registro['responsableequipo']."</td>
	<td>".$registro['fecha']."</td>
	<td>".$registro['hora']."</td>
	</tr>
	</table>\n";
}  
mysqli_free_result($tabla);
//mysqli_close($audios);