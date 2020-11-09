<?php
require_once('bd.php');
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=acreditacion.xls");
header("Pragma: no-cache");
header("Expires: 0");

$tabla = mysqli_query($audios, "SELECT id, nombre, cedula, edad, entidad, cargo, eps, arl, gruposanguineo, celular, responsable, telresponsable, fecha, hora FROM organizacion ORDER BY id ASC");
while ($registro = mysqli_fetch_array($tabla)) {
	
	echo "<table border=1>
	<tr>
	<td>".$registro['id']."</td>
	<td>".$registro['nombre']."</td>
	<td>".$registro['cedula']."</td>
	<td>".$registro['edad']."</td>
	<td>".$registro['celular']."</td>
	<td>".$registro['entidad']."</td>
	<td>".$registro['cargo']."</td>
	<td>".$registro['eps']."</td>
	<td>".$registro['arl']."</td>
	<td>".$registro['gruposanguineo']."</td>
	<td>".$registro['celular']."</td>
	<td>".$registro['responsable']."</td>
	<td>".$registro['telresponsable']."</td>
	<td>".$registro['fecha']."</td>
	<td>".$registro['hora']."</td>
	</tr>
	</table>\n";
}  
mysqli_free_result($tabla);