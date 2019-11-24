<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paquete_model extends CI_Model 
{
	public $idpaquete;
	public $nombre;
	public $detalles;
	public $costo;

	public function get_paquetes()
	{
		$query = $this->db->get('paquetes');
		$rows = $query->custom_result_object('Paquete_model');
		
		return $rows;
	}
}