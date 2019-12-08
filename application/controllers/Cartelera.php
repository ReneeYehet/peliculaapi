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


		$query = $this->db->query('SELECT B.id_pelicula,C.pelicula_deseada AS titulo, B.idioma,B.fecha,B.duracion,B.sinopsis,B.clasificacion,B.director,B.categoria,B.portada,B.valoracion,B.pelicula FROM Pelicula AS B INNER JOIN Compra AS C ON B.titulo = C.id_compra');


		$resultado = array(
			'Mensaje' => 'Consulta Correcta',
			'total_registros' => $query->num_rows(),
			'Agenda' => $query->result_array()

		);
		
		
		echo json_encode($resultado);
	}

}
