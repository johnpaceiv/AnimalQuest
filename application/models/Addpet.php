<?php

class Addpet extends CI_Model{
    public function add_new(){
        $rescueid = $_SESSION['rescueid'];
        $imageNameFix = str_replace(" ", "_", $this->input->post('addanimalName'));
        $pet_data = array(
            'animalName' => $this->input->post('addanimalName'),
            'animalAge' => $this->input->post('age'),
            'alone' => $this->input->post('aloneFor'),
            'energy' => $this->input->post('energyLevel'),
            'bio' => $this->input->post('newbio'),
            'image' => $_SESSION['rescueid'] . "_" . $imageNameFix,
            'rescueid' => $rescueid
        );
        $new_pet = $this->db->insert('animals', $pet_data);
        return $new_pet;
    }

}