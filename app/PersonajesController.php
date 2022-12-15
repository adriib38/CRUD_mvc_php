<?php
class PersonajesController
{
	public function inicio() {
		$params = [ 'mensaje' => 'Bienvenido a MangAnime',
					'fecha' => date('d-m-y')
				];
		require __DIR__ . '/templates/inicio.php';
	}
	
	//Busca personaje por id
	public function personajesManganime() {
		if (!isset($_GET['id'])) {
			header('location: index.php');
			exit();

			//throw new Exception('Pagina no encontrada');
		}
		$id = $_GET['id'];
		
		// Instancia del modelo MangAnime
		$personajeModel = new Personaje(Config::$bd_nombre,
		Config::$bd_usuario,
		Config::$bd_clave,
		Config::$bd_hostname);
		$params = $personajeModel->getPersonajesManganime(
														$id,											
														);
		unset($personajeModel);
		require __DIR__ . '/templates/personajesManganime.php';
	}

	//Busca personaje por nombre
	public function buscarPersonaje() {
			$params = [ 'nombre' => '',
			'resultado' => []
		];

		if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_GET['nombre'])) {
		$_POST['nombre'] = isset($_GET['nombre']) ? $_GET['nombre'] : $_POST['nombre'];
		$orden = isset($_GET['orden']) ? $_GET['orden'] : 'nombre';
		$by = isset($_GET['by']) ? $_GET['by'] : 'DESC';

		// Instancia del modelo MangAnime
		$personajeModel = new Personaje(Config::$bd_nombre,
		Config::$bd_usuario,
		Config::$bd_clave,
		Config::$bd_hostname);
		$params["resultado"] = $personajeModel->findPersonajeByName(
													$_POST['nombre'],
													$orden,
													$by
		);

			unset($personajeModel);
		}
	
		require __DIR__ . '/templates/buscarPersonaje.php';
	}
}