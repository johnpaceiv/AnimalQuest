<?php

class Login extends CI_Model{
    public function validate()
    {
        $this->db->where('username', $this->input->post('loginUser'));
        $this->db->where('password', md5($this->input->post('loginPass')));
        $query = $this->db->get("users");
        if($query->num_rows() == 1){
            return true;
        }else{
            return false;
        }
    }
    public function getRescueId(){
        $this->db->where('username', $_SESSION['username']);
        $query = $this->db->get("users");
        $rescueid =  $query->row();
        return $rescueid->rescueid;
    }
    public function getRescueName(){
        $this->db->where('username', $_SESSION['username']);
        $query = $this->db->get("users");
        $result =  $query->row();
        return $result->rescueName;
    }
}