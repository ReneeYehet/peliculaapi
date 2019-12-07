<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: api-version");
header("Access-Control-Allow-Methods: GET");
header("Allow: GET");
defined('BASEPATH') OR exit('No direct script access allowed');
require (APPPATH.'libraries/REST_Controller.php');

class Cartelera extends REST_Controller {



	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function agenda_get(){


		$query = $this->db->query('SELECT D.pelicula_deseada AS titulo, A.duracion, A.sinopsis, A.categoria, P.Horarios, B.num_sala FROM Programacion AS P INNER JOIN Pelicula AS A ON P.id_pelicula = A.id_pelicula INNER JOIN Sala AS B ON P.id_sala = B.id_sala INNER JOIN Compra AS D ON A.titulo = D.id_compra');


		$resultado = array(
			'Mensaje' => 'Consulta Correcta',
			'total_registros' => $query->num_rows(),
			'Agenda' => $query->result_array()

		);
		
		
		echo json_encode($resultado);
	}

}
