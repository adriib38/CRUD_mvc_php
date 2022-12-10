<?php
class MangAnimeController
{
	public function inicio() {
		$params = [ 'mensaje' => 'Bienvenido a MangAnime',
					'fecha' => date('d-m-y')
				];
		require __DIR__ . '/templates/inicio.php';
	}
	
	public function listar() {
		// Instancia del modelo MangAnime
		$mangAnimeModel = new MangAnime(Config::$bd_nombre,
										Config::$bd_usuario,
										Config::$bd_clave,
										Config::$bd_hostname);
		$params = ['manganimes' => $mangAnimeModel->getMangAnimes()];
		unset($mangAnimeModel);
		require __DIR__ . '/templates/mostrarMangAnimes.php';
	}

	public function insertar() {
		$params = [ 'nombre' => '',
					'creador' => '',
					'genero' => '',
					'demografia' => '',
					'estreno' => '',
					'fin' => '',
					'tomos' => '',
					'capitulos' => '',
					'imagen' => '',
				];
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Instancia del modelo MangAnime
			$mangAnimeModel = new MangAnime(Config::$bd_nombre,
											Config::$bd_usuario,
											Config::$bd_clave,
											Config::$bd_hostname);
			
			// comprobar campos formulario
			if ($mangAnimeModel->validarDatos($_POST['nombre'],
												$_POST['creador'],
												$_POST['genero'],
												$_POST['demografia'],
												$_POST['estreno'],
												$_POST['fin'],
												$_POST['tomos'],
												$_POST['capitulos'],
												$_POST['imagen'])) {
				$mangAnimeModel->insertMangAnime($_POST['nombre'],
													$_POST['creador'],
													$_POST['genero'],
													$_POST['demografia'],
													$_POST['estreno'],
													$_POST['fin'],
													$_POST['tomos'],
													$_POST['capitulos'],
													$_POST['imagen']);
				unset($mangAnimeModel);
				// Una vez añadido el manganime, redirigimos a la lista de manganimes
				header('Location: /listar');
			}
			else {
				// Si la validación de datos da error se muestra el formulario de nuevo con los datos introducidos previamente
				$params = [ 'nombre' => $_POST['nombre'],
							'creador' => $_POST['creador'],
							'genero' => $_POST['genero'],
							'demografia' => $_POST['demografia'],
							'estreno' => $_POST['estreno'],
							'fin' => $_POST['fin'],
							'tomos' => $_POST['tomos'],
							'capitulos' => $_POST['capitulos'],
							'imagen' => $_POST['imagen']
						];
				$params['mensaje'] = 'No se ha podido insertar el alimento. Revisa el formulario';
			}
		}
		require __DIR__ . '/templates/formInsertar.php';
	}
	
	public function buscarPorNombre() {
		$params = [ 'nombre' => '',
					'resultado' => []
				];
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_GET['nombre'])) {
			$_POST['nombre'] = isset($_GET['nombre']) ? $_GET['nombre'] : $_POST['nombre'];
			$orden = isset($_GET['orden']) ? $_GET['orden'] : 'nombre';
			$by = isset($_GET['by']) ? $_GET['by'] : 'DESC';

			// Instancia del modelo MangAnime
			$mangAnimeModel = new MangAnime(Config::$bd_nombre,
			Config::$bd_usuario,
			Config::$bd_clave,
			Config::$bd_hostname);
			$params["resultado"] = $mangAnimeModel->findMangAnimesByName(
														$_POST['nombre'],
														$orden,
														$by
			);

			unset($mangAnimeModel);
		}
		require __DIR__ . '/templates/buscarPorNombre.php';
	}

	public function buscarPorDemografia() {
		$params = [ 'demografia' => '',
					'resultado' => []
				];
		
			if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_GET['nombre'])) {
				$_POST['demografia'] = isset($_GET['demografia']) ? $_GET['demografia'] : $_POST['demografia'];
				$orden = isset($_GET['orden']) ? $_GET['orden'] : 'nombre';
				$by = isset($_GET['by']) ? $_GET['by'] : 'DESC';
		

			// Instancia del modelo MangAnime
			$mangAnimeModel = new MangAnime(Config::$bd_nombre,
			Config::$bd_usuario,
			Config::$bd_clave,
			Config::$bd_hostname);
			$params["resultado"] = $mangAnimeModel->findMangAnimesByDemography(
														$_POST['demografia'],
														$orden,
														$by
			);

			unset($mangAnimeModel);
		}
		require __DIR__ . '/templates/buscarPorDemografia.php';
	}
	
	public function buscarCombinada() {
		$params = [ 'nombre' => '',
					'demografia' => '',
					'resultado' => []
				];
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_GET['nombre'])) {
			$_POST['nombre'] = isset($_GET['nombre']) ? $_GET['nombre'] : $_POST['nombre'];
			$orden = isset($_GET['orden']) ? $_GET['orden'] : 'nombre';
			$by = isset($_GET['by']) ? $_GET['by'] : 'DESC';

			// Instancia del modelo MangAnime
			$mangAnimeModel = new MangAnime(Config::$bd_nombre,
			Config::$bd_usuario,
			Config::$bd_clave,
			Config::$bd_hostname);
			$params["resultado"] = $mangAnimeModel->findMangAnimesByNameAndDemography(
														$_POST['nombre'],
														$_POST['demografia'],
														$orden,
														$by
			);

			unset($mangAnimeModel);
		}
		require __DIR__ . '/templates/buscarCombinada.php';
	}

	public function ver() {
		if (!isset($_GET['id'])) {
			header('location: index.php');
			exit();

			//throw new Exception('Pagina no encontrada');
		}
		$id = $_GET['id'];
		
		// Instancia del modelo MangAnime
		$mangAnimeModel = new MangAnime(Config::$bd_nombre,
		Config::$bd_usuario,
		Config::$bd_clave,
		Config::$bd_hostname);
		$params = $mangAnimeModel->getMangAnime($id);
		
		unset($mangAnimeModel);
		require __DIR__ . '/templates/verMangAnime.php';
	}
}