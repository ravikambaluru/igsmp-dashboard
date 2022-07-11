<?php

class My_Controller extends CI_Controller
{

    private $teamsTable = "igsmp_team";
    public function __construct()
    {

        parent::__construct();
        $sessionData = $this->session->get_userdata();

        if (array_key_exists("logged_in", $sessionData) === false || $sessionData["logged_in"] === null)
            redirect(base_url('login'));
    }
}