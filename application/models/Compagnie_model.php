<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Compagnie_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Compagnie_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function findAll(){
    $query= $this->db->get('compagnies');
    return $query->result();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  // ------------------------------------------------------------------------

}

/* End of file Compagnie_model.php */
/* Location: ./application/models/Compagnie_model.php */