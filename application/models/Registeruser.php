<?php

class Registeruser extends CI_Model{
    public function register(){
        $user_data = array(
            'rescueName' => $this->input->post('rescueName'),
            'contactName' => $this->input->post('contactName'),
            'rescuePhone' => $this->input->post('rescuePhone'),
            'rescueEmail' => $this->input->post('rescueEmail'),
            'rescueType' => $this->input->post('rescueType'),
            'username' => $this->input->post('registerUser'),
            'password' => md5($this->input->post('registerPass'))
        );
        $new_user = $this->db->insert('users', $user_data);
        return $new_user;
    }
}