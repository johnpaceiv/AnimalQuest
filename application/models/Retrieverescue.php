<?php

class Retrieverescue extends CI_Model
{
    public function getRescueDetails()
    {
        $this->db->where('username', $_SESSION["username"]);
        $query = $this->db->get("users");
        $rescueDetails =  $query->row();
        return $rescueDetails;
    }
}