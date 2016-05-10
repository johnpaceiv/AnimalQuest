<?php

class Updatepet extends CI_Model{
    public function update_status(){
        $data = array(
            'statusId' => $this->input->post('status')
        );
        $this->db->where('id', $this->input->post('animalId'));
        $update_query = $this->db->update('animals', $data);
        return $update_query;
    }
}