<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: api-version");
header("Access-Control-Allow-Methods: GET, POST");
header("Allow: GET");
defined('BASEPATH') OR exit('No direct script access allowed');
require (APPPATH.'libraries/REST_Controller.php');


class Solicitud extends REST_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		//$this->load->model('Paquete_model');
	}



	public function pelicula_deseada_get(){



			$query = $this->db->query('SELECT A.pelicula_deseada, A.costo, B.estado From Compra AS A INNER JOIN Estado AS B ON A.id_estado = B.id_estado');


			$respuesta = array(

				'Mensaje' => 'Consulta Correcta',
				'Total de Registros' => $query->num_rows(),
				'Solicitud' => $query->result()


			);

			echo json_encode($respuesta);

	}

	public function aprobacion_post(){

		$query = $this->db->query('SELECT A.pelicula_deseada, A.costo, B.estado From Compra AS A INNER JOIN Estado AS B ON A.id_estado = B.id_estado');
	}


	/*public function estado_compra_get(){



		$body = file_get_contents("https://peliculaapi.gearhostpreview.com/index.php/Alamcen/pelicula");


		$body = json_decode($body)

		for($i=0; i<count($body); $i++){
			echo $body[$i]->campo;
		}
	}*/




}