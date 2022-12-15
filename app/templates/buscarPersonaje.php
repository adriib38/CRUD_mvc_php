<?php ob_start()?>
<form name="formBusqueda" action="/buscarPersonaje" method="post">
	<label for="nombre">Nombre del MangAnime:</label>
	<input type="text" name="nombre" id="nombre" value="<?=$params['nombre']?>">

	<input type="submit" value="buscar">
</form>

<?php if (count($params['resultado'])>0): ?>
	<table>
		<tr>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>Edad</th>
			<th>Manganime</th>
		</tr>

		<?php foreach ($params['resultado'] as $manganime) :?>
		<tr>
			<td><?=$manganime['nombre']?></td>
			<td><?=$manganime['descripcion']?></td>
			<td><?=$manganime['edad']?></td>
			<td><a href="ver/<?=$manganime['id']?>"><?=$manganime['nombre'] ?></a></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php else: ?>
	<p>No se han encontrado resultados.</p>
<?php endif; ?>
	

<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>