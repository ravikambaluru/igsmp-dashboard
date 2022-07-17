<?php

class Features extends CI_Controller
{


    public function upload()
    {
        $config['upload_path']          = "./uploads/";
        $config['allowed_types']        = 'gif|jpg|png|jpeg|webp';
        $config['max_size']             = 1000;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());

            print_r($_FILES);
        } else {
            $data = array('upload_data' => $this->upload->data());

            echo "success";
        }
    }
}