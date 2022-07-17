<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Auth
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

class Auth extends CI_Controller
{

  public $meta;
  public function __construct()
  {
    parent::__construct();
    $this->meta = $this->crudService->fetch_data("*", 'controller_meta_data', ["controller" => "login"]);
    $this->meta = $this->meta->row();
  }

  // ======================= Authentication methods =================//

  public function login()
  {

    $data["controller"] = "login";
    $this->load->view("shared/header", $data);
    $this->load->view("login", $data);
    $this->load->view("shared/footer", $data);
  }

  public function authenticate()
  {

    $post = $this->input->post();
    $user = $this->crudService->fetch_data("*", $this->meta->tableName, ["user_email" => $post["user_email"]], 0, 1)
      ->row_array();


    if (count($user) > 0) {


      if (password_verify($post["user_password"], $user["user_password"])) {
        $this->session->set_userdata([
          "logged_in" => true,
          "is_admin" => $user["is_admin"] == 1 ? true : false,
          "uid" => $user["id"]
        ]);

        $this->crudService->update_data($this->meta->tableName, ["last_login" => time()], ["user_email" => $post["user_email"]]);
        redirect(base_url("webinars/render"));
      } else {
        echo "incorrect password";
      }
    } else {

      echo "email is not registered";
    }
  }


  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url("/login/render"));
  }
}


/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */