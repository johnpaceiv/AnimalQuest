<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FriendsList extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function results()
    {
        $this->load->model('Retrieveresults');
        if ($this->form_validation->run() == FALSE) {
            $rescueName = $this->Retrieveresults->getRescueName();
            $rescueResults['results_query'] = $this->Retrieveresults->getRescueResults();
            $this->load->view('header');
            $this->load->view('friendsList/resultsCTA', $rescueName);
            $this->load->view('friendsList/resultsSearch');
            $this->load->view('friendsList/results', $rescueResults);
            $this->load->view('footer');

        }
    }

    public function details()
    {
        $this->load->model('Retrieveresults');
        if ($this->form_validation->run() == FALSE) {
            $petResults['results_query'] = $this->Retrieveresults->getPetResults();
            $this->load->view('header');
            $this->load->view('friendsList/details', $petResults);
            $this->load->view('footer');
        }
    }

    public function updateStatus()
    {
        $this->load->model('Updatepet');
        if ($query = $this->Updatepet->update_status()) {
            redirect('/friendsList/results');
        }else{
            $this->load->view('header');
        }
    }

}