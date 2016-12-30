<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class region_model extends CI_Model {
  
  public function __construct() {
    parent::__construct();
  }

  public function set_region($cod_region, $nom_region, $id_pais) { 
    $data = array(
      'REG_ID' => $cod_region, //codigo de la region (o id)
      'REG_NOMBRE' => $nom_region, //nombre de la region 
      'SGC_PAIS_PAI_ID' => $id_pais //id del pais al que pertenece la region
    );

    $this->db->insert('SGC_REGION', $data); //inserta la nueva region en la base de datos
  }

  public function delete_region($id) { //borrara una region en base a su id (o cod)
    $data = array(
      'REG_ID' => $id
    );

    $this->db->delete('SGC_REGION', $data); //borra de la BD la region
  }

  public function update_region($cod_region, $nom_region, $id_pais) { //actualiza la informacion de la region
    $this->db->set('REG_ID', $cod_region);
    $this->db->set('REG_NOMBRE', $nom_region);
    $this->db->set('SGC_PAIS_PAI_ID', $id_pais);
  }

  public function get_region() { //obtiene los datos de una region
    $this->db->select('*');
    $this->db->from('SGC.SGC_REGION');
    $this->db->order_by('REG_ID DESC'); //no creo que tenga que ir esto
    $query = $this->db->get();    
    if($query->num_rows() > 0) {
      return $query;
    } else {
      return false;
    }
  }
}
?>