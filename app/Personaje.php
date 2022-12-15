<?php
class Personaje {
	protected $conexion;

	public function __construct($dbname, $dbuser, $dbpass, $dbhost){

		$opciones = [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'];
		try {
			$conexion = new PDO('mysql:host='. $dbhost .';dbname='.$dbname, $dbuser, $dbpass, $opciones);
			
			$this->conexion = $conexion;
		} catch (PDOException $e) {
			$error = 'Falló la conexión: ' . $e->getMessage();
			die('No ha sido posible realizar la conexión con la base de datos: '. $conexion->connect_error);
		}
	}

	public function getPersonajesManganime($manganime){
		$sql = 'SELECT * FROM `personajes` WHERE manganime LIKE :manganime';
		$result = $this->conexion->prepare($sql);
		
		$result->bindValue(':manganime', "%$manganime%");

		$result->execute();

		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function findPersonajeByName($nombre, $orden='estreno', $ascDesc='DESC'){
		$nombre = htmlspecialchars($nombre);

		//crear consulta para buscar MangAnimes por nombre en el orden y sentido indicados usando los parámetros recibidos
		$sql = 'SELECT * FROM `personajes` WHERE nombre LIKE :nombre ORDER BY '.$orden.' '.$ascDesc.'';
		$result = $this->conexion->prepare($sql);
		
		$result->bindValue(':nombre', "%$nombre%");

	
		$result->execute();

		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function validarDatos($nombre, $creador, $genero, $demografia, $estreno, $fin, $tomos, $capitulos) {
		return (is_string($nombre) && is_string($creador) && is_string($genero) && is_string($demografia) && is_string($estreno) && is_string($fin) && is_numeric($tomos) && is_numeric($capitulos));
	}
}
?>