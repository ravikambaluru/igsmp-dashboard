<?php

class Teams extends My_Controller
{

    public $tableName = "igsmp_team";

    public function index()
    {

        $data["team"] = $this->crudService->fetch_data("*", $this->tableName, []);
        $data['controller'] = $this->uri->segment(1);
        $this->load->view("shared/header", $data);
        $this->load->view("team", $data);
        $this->load->view("shared/footer", $data);
    }

    public function create()
    {
        $user = $this->security->xss_clean($this->input->post());

        $user["user_password"] = password_hash($user["user_password"], PASSWORD_BCRYPT);

        if ($this->crudService->insert_data($this->tableName, $user)) {
            $this->session->set_flashdata("teams_msg", "User created sucessfully");
            redirect(base_url("teams"));
        } else {
            $this->session->set_flashdata("teams_err", "User creation failed");
            redirect(base_url("teams"));
        }
    }

    public function deleteUser($user)
    {

        if ($this->crudService->delete_data($this->tableName, ['id' => $user])) {
            $this->session->set_flashdata("teams_msg", "Deleted User Sucessfully");
            redirect(base_url("teams"));
        } else {
            $this->session->set_flashdata("teams_err", "User deletion failed");
            redirect(base_url("teams"));
        }
    }
}