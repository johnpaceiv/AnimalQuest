<?php

class Editrescue extends CI_Model{
    public function edit_submit(){
        $user_data = array(
            'contactName' => $this->input->post('editcontactName'),
            'rescuePhone' => $this->input->post('editrescuePhone'),
            'rescueEmail' => $this->input->post('editrescueEmail'),
            'rescueType' => $this->input->post('editrescueType'),
            'bio' => $this->input->post('bioEdit')
        );
        $edit_query = $this->db->update('users', $user_data, array('rescueid' => $_SESSION['rescueid']));
        return $edit_query;
    }
}