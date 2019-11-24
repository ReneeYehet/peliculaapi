<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: api-version");
header("Access-Control-Allow-Methods: GET");
header("Allow: GET");
defined('BASEPATH') OR exit('No direct script access allowed');
require (APPPATH.'libraries/REST_Controller.php');

class Almacen extends REST_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();


	}


	public function pelicula_get()
	{
		$query = $this->db->query('SELECT idioma,fecha,duracion,titulo,sinopsis,clasificacion,director,categoria,portada,valoracion,pelicula FROM Pelicula');

		/*$data['Mensaje'] = 'Consulta Correcta';
		$data['Total de Registros'] = $query->num_rows();
		$data['Pelicula'] = $query->result();*/

		$respuesta = array(

			'Mensaje' => 'Consulta Correcta',
			'Total de Registros' => $query->num_rows(),
			'Pelicula' => $query->result_array()


		);



		echo json_encode($respuesta);



	}





}