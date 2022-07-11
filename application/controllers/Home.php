<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
	public function index()
	{
		$data['controller'] = $this->uri->segment(1);
		$this->load->view("shared/header", $data);
		$this->load->view('home');
		$this->load->view("shared/footer", $data);
	}
}