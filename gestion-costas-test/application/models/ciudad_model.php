<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Ciudas_model extends CI_Model {
  
  public function __construct() {
    parent::__construct();
  }

  public function set_ciudad($cod_ciudad, $nom_ciudad, $id_region) {
    $data = array(
      'CIU_ID' => $cod_ciudad,
      'CIU_NOMBRE' => $nom_ciudad     
      'SGC_REGION_REG_ID' => $id_region
    );

    $this->db->insert('SGC_CIUDAD', $data);
  }

  public function delete_ciudad($id) {
    $data = array(
      'CIU_ID' => $id
    );

    $this->db->delete('SGC_CIUDAD', $data);
  }

  public function update_ciudad($cod_ciudad, $nom_ciudad, $id_region) {
    $this->db->set('CIU_NOMBRE', $nom_ciudad);
    $this->db->set('SGC_REGION_REG_ID', $id_region);
    $this->db->where('CIU_ID', $cod_ciudad);
    $this->db->update('SGC_CIUDAD');
  }

  public function get_ciudad() {
    $this->db->select('*');
    $this->db->from('SGC.SGC_CIUDAD');
    $this->db->order_by('CIU_ID DESC');
    $query = $this->db->get();    
    if($query->num_rows() > 0) {
      return $query;
    } else {
      return false;
    }
  }
}
?>