<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require (APPPATH.'libraries/REST_Controller.php');

class Paquetes extends REST_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		//$this->load->model('Paquete_model');
	}

	public function tabla_paquetes_get()
	{
		$query = $this->db->query('SELECT idioma,fecha,duracion,titulo,sinopsis,clasificacion,director,categoria,portada,valoracion,pelicula FROM Pelicula');

		$respuesta = array(

			'Mensaje' => 'Consulta Correcta',
			'total_registros' => $query->num_rows(),
			'compra' => $query->result()


		);

		echo json_encode($respuesta);

		//$query = $this->db->get('Estado');
		//echo json_encode($query->result());


		//$paquetes = $this->Paquete_model->get_paquetes();
		//$this->response($paquetes);
	}
}