<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Pais_model extends CI_Model {
  
  public function __construct() {
    parent::__construct();
  }

  public function set_playa($id, $nom, $ori, $dger, $dtec, $dotosup, $fotopri, $lat, $long) {
    $data = array(
      'PLA_ID' => $id,
      'PLA_NONBRE' => $nom      
      'PLA_ORIENTACION' => $ori
      'PLA_DESCRIPCION_GENERAL' => $dger
      'PLA_DESCRIPCIPCION_TECNICA' => $dtec
      'PLA_FOTO_SUPERIOR' => $fotosup
      'PLA_FOTO_PRINCIPAL' => $fotopri
      'PLAT_LATITUD' => $lat
      'PLAT_LONGITUD' => $long
    );

    $this->db->insert('SGC_PLAYA', $data);
  }

  public function delete_playa($id) {
    $data = array(
      'PLA_ID' => $id
    );

    $this->db->delete('SGC_PLAYA', $data);
  }

  public function update_playa($id, $nom, $ori, $dger, $dtec, $fotsup, $fotopri, &lat, &long) {
    $this->db->set('PLA_NOMBRE', $nom);
    $this->db->set('PLA_ORIENTACION', $ori);
    $this->db->set('PLA_DESCRIPCION_GENERAL', $dger);
    $this->db->set('PLA_DESCRIPCIPCION_TECNICA', $dtec);
    $this->db->set('PLA_FOTO_SUPERIOR', $fotosup);
    $this->db->set('PLA_FOTO_PRINCIPAL', $fotopri);
    $this->db->set('PLAT_LATITUD', $lat);
    $this->db->set('PLAT_LONGITUD', $long);
    $this->db->where('PAI_ID', $id);
    $this->db->update('SGC_PLAYA');
  }

  public function get_playa() {
    $this->db->select('*');
    $this->db->from('SGC.SGC_PLAYA');
    $this->db->order_by('PLA_ID DESC');
    $query = $this->db->get();    
    if($query->num_rows() > 0) {
      return $query;
    } else {
      return false;
    }
  }
}

?>