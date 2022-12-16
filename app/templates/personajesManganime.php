<?php ob_start() ?>

<?php  foreach($params as $personaje) { ?>
	<table class="infomanga">
		<h1><?=strtoupper($personaje['nombre']) ?></h1>
		<tr>
			<td>Nombre</td>
			<td><?=$personaje['nombre'] ?></td>
		</tr>
		<tr>
			<td>Descripcion</td>
			<td><?=$personaje['descripcion'] ?></td>
		</tr>
		<tr>
			<td>Edad</td>
			<td><?=$personaje['edad'] ?></td>
		</tr>

		
	</table>
<?php } ?>


<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>