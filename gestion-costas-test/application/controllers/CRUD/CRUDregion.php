<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paises extends CI_Controller {

	public function agregar_region() {
		$cod_region = $this->input->post('código de región');   
		$nom_region = $this->input->post('nombre');
		$id_pais = $this->input->post('id de país');
		
		$this->region_model->set_region($cod_region, $nom_region, $id_pais);
    }

    public function borrar_region() {
		$cod_region = $this->input->post('código de región');

		$this->region_model->delete_region($cod_region);
	}

	public function editar_region() {
		$cod_region = $this->input->post('código de región');   
		$nom_region = $this->input->post('nombre');
		$id_pais = $this->input->post('id de país');
		
		$this->region_model->update_region($cod_region, $nom_region, $id_pais);
	}

	public function regioness(){
		$regiones = $this->region_model->get_region()->result();	    
	    $retorno = json_encode($regiones);
	    echo $retorno; 
	    return;
	}
}
