<?php

use function PHPSTORM_META\map;

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	private $tableName = "igsmp_team";
	public function index()
	{
		$data['controller'] = $this->uri->segment(1);
		$this->load->view("shared/header", $data);
		$this->load->view('login');
		$this->load->view("shared/footer", $data);
	}

	// ============ authenticate method ============//

	public function authenticate()
	{

		$post = $this->input->post();
		$user = $this->crudService->fetch_data("*", $this->tableName, ["user_email" => $post["user_email"]], 0, 1)
			->row_array();


		if (count($user) > 0) {


			if (password_verify($post["user_password"], $user["user_password"])) {
				$this->session->set_userdata([
					"logged_in" => true,
					"is_admin" => $user["is_admin"] == 1 ? true : false
				]);

				$this->crudService->update_data($this->tableName, ["last_login" => time()], ["user_email" => $post["user_email"]]);
				redirect("/home");
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
		redirect(base_url("/login"));
	}
}