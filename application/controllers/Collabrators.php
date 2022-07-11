<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Collabrators.php
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Collabrators extends  My_Controller
{

  public $tableName = 'igsmp_collaborators';

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data["collabrators"] = $this->crudService->fetch_data("*", $this->tableName, []);
    $data['webUrl'] = "https://igsmpinternational.com/";
    $data['controller'] = $this->uri->segment(1);
    $this->load->view("shared/header", $data);
    $this->load->view("collabrators", $data);
    $this->load->view("shared/footer", $data);
  }
}