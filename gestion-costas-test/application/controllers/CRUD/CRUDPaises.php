<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paises extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Pais_model');
	}

	public function agregar_Pais() {
		$id = $this->input->post('id');   
		$nom = $this->input->post('nombre');
		
		$this->Pais_model->set_pais($id, $nom);
    }

    public function borrar_Pais() {
		$id = $this->input->post('id');

		$this->Pais_model->delete_pais($id);
	}

	public function editar_pais() {
		$id = $this->input->post('id');   
		$nom = $this->input->post('nombre');
		
		$this->Pais_model->update_pais($id, $nom);
	}

	public function paises(){
		$paises = $this->Pais_model->get_paises()->result();	    
	    $retorno = json_encode($paises);
	    echo $retorno; 
	    return;
	}
}
