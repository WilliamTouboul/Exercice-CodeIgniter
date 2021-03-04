<?php
defined('BASEPATH') or exit('No direct script access allowed');
class appointments_controller extends CI_Controller
{
    //functions  
    public function index()
    {
        //Chargement du helper
        $this->load->helper('url');
        //Chargement du modele voulu
        $this->load->model("appointments_model");
        // Creation d'un tableau $data avec les données
        $data["fetch_data"] = $this->appointments_model->fetch_data();
        // Chargement de la vue
        $this->load->view("appointments_view", $data);
    }
    public function form_validation()
    {
        // Chargement lib Form Validation pour le controle de champs
        $this->load->library('form_validation');
        // On traite et valide chaque champ
        // Alpha = que des lettres.
        $this->form_validation->set_rules("dateHour", "dateHour", 'required');
        $this->form_validation->set_rules("idPatients", "idPatients", 'required');


        if ($this->form_validation->run()) {
            //true  
            // On charge le modele 
            $this->load->model("appointments_model");

            // On rempli le tableau data avec les inputs
            $data = array(
                "dateHour"     => $this->input->post("dateHour"),
                "idPatients"          => $this->input->post("idPatients"),

            );


            if ($this->input->post("update")) {
                $this->appointments_model->update_data($data, $this->input->post("hidden_id"));
                redirect(base_url() . "appointments_controller/updated");
            }
            if ($this->input->post("insert")) {
                $this->appointments_model->insert_data($data);
                redirect(base_url() . "appointments_controller/inserted");
            }
        } else {
            //false  
            $this->index();
        }
    }
    public function inserted()
    {
        $this->index();
    }
    public function delete_data()
    {
        // Fonction de suprression
        $id = $this->uri->segment(3);
        $this->load->model("appointments_model");
        $this->appointments_model->delete_data($id);
        redirect(base_url() . "appointments_controller/deleted");
    }
    public function deleted()
    {
        $this->index();
    }
    public function update_data()
    {
        //Fonction d'update
        $user_id = $this->uri->segment(3);
        $this->load->model("appointments_model");
        $data["user_data"] = $this->appointments_model->fetch_single_data($user_id);
        $data["fetch_data"] = $this->appointments_model->fetch_data();
        $this->load->view("appointments_view", $data);
    }
    public function updated()
    {
        $this->index();
    }
}
