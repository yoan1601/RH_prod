<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
 *
 * Model Accueil_model
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

class Accueil_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function getVariableAccueil($language){
    $rep= $this->data->getData()['accueil_'.$language];
    return $rep;
  }

  public function index()
  {
    // 
  }


}

/* End of file Accueil_model.php */
/* Location: ./application/models/Accueil_model.php */