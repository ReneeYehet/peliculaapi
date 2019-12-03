<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: api-version");
header("Access-Control-Allow-Methods: GET");
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




}