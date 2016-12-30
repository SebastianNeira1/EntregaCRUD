<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Main extends CI_Controller {
 
	public function __construct() {
		parent::__construct();
		$this->load->model('Pais_model');
	}
 
 	public function agregar_playa() {
		$id = $this->input->post('id');   
		$nom = $this->input->post('nombre');
		$ori = $this->input->post('Orientación');
		$dger = $this->input->post('Descripción General');
		$dtec = $this->input->post('Descripción Técnica');
		$fotosup = $this->input->post('Foto Superior');
		$fotopri = $this->input->post('Foto Principal');
		$lat = $this->input->post('latitud');
		$long = $this->input->post('longitud');

		$this->playa_model->set_playa($id, $nom, $ori, $dger, $dtec, $fotosup, $fotopri, $lat, $long);
    }

    public function borrar_playa() {
		$id = $this->input->post('id');

		$this->playa_model->delete_playa($id);
	}

	public function editar_playa() {
		$id = $this->input->post('id');   
		$nom = $this->input->post('nombre');
		$ori = $this->input->post('Orientación');
		$dger = $this->input->post('Descripción General');
		$dtec = $this->input->post('Descripción Técnica');
		$fotosup = $this->input->post('Foto Superior');
		$fotopri = $this->input->post('Foto Principal');
		$lat = $this->input->post('latitud');
		$long = $this->input->post('longitud');
		
		$this->playa_model->update_playa($id, $nom, $ori, $dger, $dtec, $fotosup, $fotopri, $lat, $long);
	}

	public function playas(){
		$playas = $this->playa_model->get_playa()->result();	    
	    $retorno = json_encode($playas);
	    echo $retorno; 
	    return;
	}
}