<?php

class Retrieveresults extends CI_Model
{
    public function getRescueName()
    {
        $this->input->post("rescue_select");
        $this->db->where('rescueid', $_SESSION["nonAuth_rescueid"]);
        $query = $this->db->get("users");
        $rescueName =  $query->row();
        return $rescueName;
    }
    public function getRescueResults()
    {
        if($_SESSION['status']==0){
            $results_query =  $this->db->where('rescueid', $_SESSION["nonAuth_rescueid"])->where('statusId', 0)->get("animals");
        }
        if($_SESSION['status']==1){
            $results_query =  $this->db->where('rescueid', $_SESSION["rescueid"])->where('statusId', 0)->get("animals");
        }
        //$rescueDetails =  $query->row();
        if($results_query->num_rows()>0){
            return $results_query->result();
        }else{
            return false;
        }
    }
    public function getPetResults()
    {
        $animalid = $this->uri->segment(3, 0);
        $results_query =  $this->db->where('id', $animalid)->get("animals");

        //$rescueDetails =  $query->row();
        if($results_query->num_rows()>0){
            return $results_query->result();
        }else{
            return false;
        }
    }
}