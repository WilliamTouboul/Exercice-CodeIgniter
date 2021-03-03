<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Add_patient extends CI_Controller
{
    //functions  
    public function index()
    {
        //Chargement du helper
        $this->load->helper('url');
        //Chargement du modele voulu
        $this->load->model("add_patient_model");
        // Creation d'un tableau $data avec les données
        $data["fetch_data"] = $this->add_patient_model->fetch_data();
        // Chargement de la vue
        $this->load->view("add_patient_view", $data);
    }
    public function form_validation()
    {
        // Chargement lib Form Validation pour le controle de champs
        $this->load->library('form_validation');
        // On valide chaque champ
        // Alpha = que des lettres.
        $this->form_validation->set_rules("firstname", "firstname", 'required|alpha');
        $this->form_validation->set_rules("lastname", "lastname", 'required|alpha');
        $this->form_validation->set_rules("birthdate", "birthdate", 'required');
        $this->form_validation->set_rules("phone", "phone", 'required');
        $this->form_validation->set_rules("mail", "mail", 'required');

        if ($this->form_validation->run()) {
            //true  
            // On charge le modele 
            $this->load->model("add_patient_model");

            // On rempli le tableau data avec les inputs
            $data = array(
                "firstname"     => $this->input->post("firstname"),
                "lastname"          => $this->input->post("lastname"),
                "birthdate"     => $this->input->post("birthdate"),
                "phone"     => $this->input->post("phone"),
                "mail"     => $this->input->post("mail")
            );
            // Si update ou insert on modifie l'uRL en conséquence
            if ($this->input->post("update")) {
                $this->add_patient_model->update_data($data, $this->input->post("hidden_id"));
                redirect(base_url() . "add_patient/updated");
            }
            if ($this->input->post("insert")) {
                $this->add_patient_model->insert_data($data);
                redirect(base_url() . "add_patient/inserted");
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
        $this->load->model("add_patient_model");
        $this->add_patient_model->delete_data($id);
        redirect(base_url() . "add_patient/deleted");
    }
    public function deleted()
    {
        $this->index();
    }
    public function update_data()
    {
        //Fonction d'update
        $user_id = $this->uri->segment(3);
        $this->load->model("add_patient_model");
        $data["user_data"] = $this->add_patient_model->fetch_single_data($user_id);
        $data["fetch_data"] = $this->add_patient_model->fetch_data();
        $this->load->view("add_patient_view", $data);
    }
    public function updated()
    {
        $this->index();
    }
}
