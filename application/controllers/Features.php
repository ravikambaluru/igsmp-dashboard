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


    public function cronHandler()
    {
        $id = $this->crudService->fetch_data("id", "igsmp_webinars", ["end_date" => "< now()"]);
        $this->crudService->update_data("igsmp_webinars", ["active" => 0], ["id" => " in " . $id]);
    }
}