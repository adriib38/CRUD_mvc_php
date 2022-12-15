<?php 
	ob_start();
	$params = $params[0];
?>
<h1><?=strtoupper($params['nombre']) ?></h1>

<table class="infomanga">
	<tr>
		<td>Nombre</td>
		<td><?=$params['nombre'] ?></td>
	</tr>
	<tr>
		<td>Descripcion</td>
		<td><?=$params['descripcion'] ?></td>
	</tr>
	<tr>
		<td>Edad</td>
		<td><?=$params['edad'] ?></td>
	</tr>


</table>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>