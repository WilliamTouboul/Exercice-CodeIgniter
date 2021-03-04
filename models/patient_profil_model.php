<?php
class Patient_profil_model extends CI_Model
{
    function insert_data($data)
    {
        $this->db->insert("patients", $data);
    }
    function fetch_data()
    {
        $this->db->select("*");
        $this->db->from("patients");
        $query = $this->db->get();
        return $query;
    }
    function delete_data($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("patients");
    }
    function fetch_single_data($id)
    {
        $this->db->where("id", $id);
        $query = $this->db->get("patients");
        return $query;
    }
    function update_data($data, $id)
    {
        $this->db->where("id", $id);
        $this->db->update("patients", $data);
    }
}
