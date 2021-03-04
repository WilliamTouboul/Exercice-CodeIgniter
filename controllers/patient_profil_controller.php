<?php
defined('BASEPATH') or exit('No direct script access allowed');
class patient_profil_controller extends CI_Controller
{
    //functions  
    public function index()
    {
        $this->load->view("patient_profile");
        // $user_id = $this->uri->segment(3);
        // var_dump($user_id);
        // $this->load->model("patient_profilet_model");
        // $data["user_data"] = $this->add_patient_model->fetch_single_data($user_id);
        // $data["fetch_data"] = $this->add_patient_model->fetch_data();
        // $this->load->view("patient_profile", $data);
    }

    // public function profil() {
    //         // $user_id = $this->uri->segment(3);
    //         // var_dump($user_id);
    //         // $this->load->model("patient_profilet_model");
    //         // $data["user_data"] = $this->add_patient_model->fetch_single_data($user_id);
    //         // $data["fetch_data"] = $this->add_patient_model->fetch_data();
    //         $this->load->view("patient_profile");
    // }
    
}