<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function main_content()
    {
        if(isset($_SESSION["status"]) == FALSE){
            $_SESSION["status"] = 0;
        }
        if($_SESSION["status"]== 1){
            redirect("admin/admin_dashboard");
        }
        if($this->input->post('form') == 'login'){
            $this->form_validation->set_rules('loginUser', 'Username', 'required');
            $this->form_validation->set_rules('loginPass', 'Password', 'required');
        }
        if($this->input->post('form') == 'register'){
            $this->form_validation->set_rules('registerPass', 'Password', 'required');
            $this->form_validation->set_rules(
                'registerUser', 'Username',
                'required|is_unique[users.username]',
                array(
                    'required'      => 'You have not provided %s.',
                    'is_unique'     => 'This %s already exists.'
                )
            );
            $this->form_validation->set_rules('registerConfirmPass', 'Password Confirmation', 'required|matches[registerPass]', array(
                    'matches'=> 'Your passwords do not match. Please try again!')
            );
        }
        if($this->input->post('form') == 'selectRescue') {
            $_SESSION["nonAuth_rescueid"] = $this->input->post('rescue_select');
            redirect("friendsList/results");
        }
        elseif ($this->form_validation->run() == FALSE) {
            $this->load->view('header');
            $this->load->view('userManagement/callToAction');
            $this->load->view('userManagement/selectRescue');
            $this->load->view('userManagement/login');
            $this->load->view('userManagement/createuser');
            $this->load->view('footer');
        }
        elseif($this->input->post('form') == 'register') {
            $this->load->model('Registeruser');
            if ($query = $this->Registeruser->register()) {
                $this->load->model('Login');
                $this->load->view('header');
                $this->load->view('userManagement/registersuccess');
                $this->load->view('footer');
                $_SESSION['status']=1;
                $_SESSION['username']=$this->input->post("registerUser");
                $rescueId =  $this->Login->getRescueId();
                $this->session->set_userdata("rescueid", $rescueId);
                $getRescueName =  $this->Login->getRescueName();
                $this->session->set_userdata("rescueName", $getRescueName);
                if($this->uri->uri_string() == 'main/logout'){
                    header('Refresh: 3; URL=../admin/admin_dashboard');
                }else{
                    header('Refresh: 3; URL=../index.php/admin/admin_dashboard');
                }
            }
        }
        elseif($this->input->post('form') == 'login') {
            $this->load->model('Login');
            $query = $this->Login->validate();
            if($query == true){
                if($query) {
                    $session_data = array(
                        "username" => $this->input->post("loginUser"),
                        // Status Codes: 0=Logged Out; 1=Logged In
                        "status" => 1
                    );
                    $this->session->set_userdata($session_data);
                    $rescueId =  $this->Login->getRescueId();
                    $this->session->set_userdata("rescueid", $rescueId);
                    $getRescueName =  $this->Login->getRescueName();
                    $this->session->set_userdata("rescueName", $getRescueName);
                    redirect("admin/admin_dashboard");
                }
            }elseif($query == false){
                $this->load->view('header');
                $this->load->view('userManagement/callToAction');
                $this->load->view('userManagement/selectRescue');
                $this->load->view('userManagement/login');
                $this->load->view('userManagement/createuser');
                $this->load->view('userManagement/loginerror');
                $this->load->view('footer');
            }
        }
    }
    public function logout(){
        $session_data = array(
            'rescueName', 'rescueid');
        $this->session->unset_userdata($session_data);
        $_SESSION['status']=0;
        $this->main_content();
    }
}
