<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paises extends CI_Controller {

	public function agregar_ciudad() {
		$cod_ciudad = $this->input->post('código de ciudad');   
		$nom_ciudad = $this->input->post('nombre de ciudad');
		$id_region = $this->input->post('Id de región');
		
		$this->ciudad_model->set_ciudad($cod_ciudad, $nom_ciudad, $id_region);
    }

    public function borrar_ciudad() {
		$cod_ciudad = $this->input->post('código de ciudad');

		$this->ciudad_model->delete_ciudad($cod_ciudad);
	}

	public function editar_ciudad() {
		$cod_ciudad = $this->input->post('código de ciudad');   
		$nom_ciudad = $this->input->post('nombre de ciudad');
		$id_region = $this->input->post('Id de región');
		
		$this->ciudad_model->update_ciudad($cod_ciudad, $nom_ciudad, $id_region);
	}

	public function ciudades(){
		$ciudades = $this->ciudad_model->get_ciudad()->result();	    
	    $retorno = json_encode($ciudades);
	    echo $retorno; 
	    return;
	}
}
