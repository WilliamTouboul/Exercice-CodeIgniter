<?php
class Add_patient_model extends CI_Model
{
    function test_add_patient()
    {
        echo "This is model function";
    }
    // Methode Insert
    function insert_data($data)
    {
        $this->db->insert("patients", $data);
    }
    //Methode pour select * from machin
    function fetch_data()
    {
        //$query = $this->db->get("tbl_user");  
        //select * from tbl_user  
        //$query = $this->db->query("SELECT * FROM tbl_user ORDER BY id DESC");  
        $this->db->select("*");
        $this->db->from("patients");
        $query = $this->db->get();
        return $query;
    }
    // Methode pour suppr 
    function delete_data($id)
    {
        $this->db->where("id", $id);
        $this->db->delete("patients");
        //DELETE FROM tbl_user WHERE id = $id  
    }
    // Methode pour SELECT un truc FROM machin
    function fetch_single_data($id)
    {
        $this->db->where("id", $id);
        $query = $this->db->get("patients");
        return $query;
        //Select * FROM tbl_user where id = '$id'  
    }
    function update_data($data, $id)
    {
        $this->db->where("id", $id);
        $this->db->update("patients", $data);
        //UPDATE tbl_user SET first_name = '$first_name', last_name = '$last_name' WHERE id = '$id'  
    }
}
