<?php

class Errors extends CI_Controller{

public function e404(){
    $this->load->view("errors/html/error_404.php");
}


}