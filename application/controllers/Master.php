<?php

class Master extends CI_Controller
{

    private $availableControllers;

    public function __construct()
    {
        parent::__construct();
        $this->availableControllers = $this->crudService->fetch_data("controller", "controller_meta_data", [])->result_array();

        $this->availableControllers = array_map(function ($controller) {
            return $controller["controller"];
        }, $this->availableControllers);



        // authentication redirections

        $sessionData = $this->session->get_userdata();

        if (array_key_exists("logged_in", $sessionData) === false || $sessionData["logged_in"] === null)
            redirect(base_url('login'));
    }


    public function index()
    {
        redirect(base_url('login'));
    }

    // master -fetch start 

    public function fetch()
    {
        try {

            $controller = $this->uri->segment(1);

            $filterID = $this->uri->segment(4);


            if (in_array($controller, $this->availableControllers)) {

                $where = ["controller" => $controller];

                $data["user"] = $this->session->uid;
                $data["user"] = $this->crudService->fetch_data("user_name", "igsmp_team", ["id" => $this->session->uid])->row();

                $meta = $this->crudService->fetch_data("*", 'controller_meta_data', $where);
                $meta = $meta->row();

                $join = $meta->join_str ? explode(',',$meta->join_str) : [];
                // fetch data regarding controller


                $data["dataSet"] = $this->crudService->fetch_data("*", $meta->tableName, [], 0, 0, $join);

                $filters = [];
                if ($filterID != null && $filterID != "")
                    $filters["webinar_ids like "] = "%" . $filterID . "%";
                $data["dataSet"] = $this->crudService->fetch_data("*", $meta->tableName, $filters);

                $data['controller'] = $controller;

                $data['webUrl'] = "https://igsmpinternational.com/";

                // render data
                $data["webinarList"] = $this->crudService->fetch_data("id,title", "igsmp_webinars", []);
                $this->load->view("shared/header", $data);
                $this->load->view($meta->view, $data);
                $this->load->view("shared/footer", $data);
            } else {
                throw new Error("invalid controller name");
            }
        } catch (\Throwable $th) {

            echo $th;
            exit();
        }
    }


    // master fetch end


    // master delete start

    public function delete()
    {

        $data = $this->input->post();
        $meta = $this->crudService->fetch_data("*", 'controller_meta_data', ["controller" => $data['controller']]);
        $meta = $meta->row();


        if ($this->crudService->delete_data($meta->tableName, ['id' => $data['deleteId']])) {
            echo true;
        } else {
            echo false;
        }
    }




    // master delete end



    // master insert start


    public function insert()
    {

        $data = $this->security->xss_clean($this->input->post());
         
        if($data['webinar_ids']){
         
            $data['webinar_ids'] = implode(",",$data['webinar_ids']);
            
        }

        $controller = $data["controller"];

        $meta = $this->crudService->fetch_data("*", 'controller_meta_data', ["controller" => $controller]);
        $meta = $meta->row();

        unset($data["controller"]);

        if (isset($data["search_terms"])) unset($data["search_terms"]);
        if (isset($data["user_password"])) $data["user_password"] = password_hash($data["user_password"], PASSWORD_BCRYPT);


        $data["created_by"] = $this->session->uid;


        if ($controller == "webinars") {
            $target = [];
            $startTime = $data["startTime"];
            $endTime = $data["endTime"];
            $schedDesc = $data["schedDesc"];

            print_r($schedDesc);

            for ($i = 0; $i < count($startTime); $i++) {
                $temp = $startTime[$i] . " " . $endTime[$i];
                $target[$temp] = $schedDesc[$i];
            }

            $data["schedules"] = json_encode($target);

            unset($data["startTime"]);
            unset($data["endTime"]);
            unset($data["schedDesc"]);
        }

        if ($this->crudService->insert_data($meta->tableName, $data)) {
            $this->session->set_flashdata($controller . "_msg", "User created sucessfully");
            redirect(base_url("$controller/render"));
        } else {
            $this->session->set_flashdata($controller . "_err", "User creation failed");
            redirect(base_url("$controller/render"));
        }
    }






    // master insert end



    // master update start

    public function update()
    {

        $data = $this->security->xss_clean($this->input->post());

        print_r($data);

        $controller = $data["controller"];
        unset($data["controller"]);
        unset($data["search_terms"]);


        $meta = $this->crudService->fetch_data("*", 'controller_meta_data', ["controller" => $controller]);
        $meta = $meta->row();






        if ($this->crudService->update_data($meta->tableName, $data, ["id" => $data["id"]])) {
            $this->session->set_flashdata($controller . "_msg", "Updated sucessfully");
            redirect(base_url("$controller/render"));
        } else {
            $this->session->set_flashdata($controller . "_msg", "unable to update");
            redirect(base_url("$controller/render"));
        }
    }


    // master update end



    // fetch data from database

    public function fetchSingle()
    {
        $data = $this->security->xss_clean($this->input->post());
        $controller = $data["controller"];

        $meta = $this->crudService->fetch_data("*", 'controller_meta_data', ["controller" => $controller]);
        $meta = $meta->row();

        if ($query = $this->crudService->fetch_data("*", $meta->tableName, ["id" => $data["id"]])) {
            $result = $query->row();
            $result->controller = $controller;
            echo json_encode($result);
        } else {
            echo "failure";
        }
    }
    public function toggle_status()
    {

        $controller = $this->uri->segment(2);
        $id = $this->uri->segment(3);
        $status = $this->uri->segment(4);

        $meta = $this->crudService->fetch_data("*", 'controller_meta_data', ["controller" => $controller]);
        $meta = $meta->row();

        if ($this->crudService->update_data($meta->tableName, ["active" => !$status], ["id" => $id])) {
            $this->session->set_flashdata($controller . "_msg", "Updated sucessfully");
            redirect(base_url("$controller/render"));
        } else {
            $this->session->set_flashdata($controller . "_msg", "unable to update");
            redirect(base_url("$controller/render"));
        }
    }
}