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


		/*$query = $this->db->get('Programacion');
		echo json_encode($query->result());*/


		$query = $this->db->query('SELECT D.pelicula_deseada AS titulo, A.duracion, A.sinopsis, A.categoria, B.num_sala, C.hora_inicio, C.Hora_fin FROM Programacion AS P INNER JOIN Pelicula AS A ON P.id_pelicula = A.id_pelicula INNER JOIN Sala AS B ON P.id_sala = B.id_sala INNER JOIN Horario AS C ON P.id_horario = C.id_horario INNER JOIN Compra AS D ON A.titulo = D.id_compra');


		$respuesta = array(

			'Mensaje' => 'Consulta Correcta',
			'Total de Registros' => $query->num_rows(),
			'Agenda' => $query->result_array()


		);

		echo json_encode($respuesta);

	}

}
