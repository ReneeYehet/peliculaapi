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
		$query = $this->db->query('SELECT B.id_compra AS id_pelicula, B.pelicula_deseada AS titulo, A.idioma,A.fecha,A.duracion,A.sinopsis,A.clasificacion,A.director,A.categoria,A.portada,A.valoracion,A.pelicula FROM Pelicula AS A INNER JOIN Compra AS B ON A.titulo = B.id_compra');

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
