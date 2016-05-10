<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function admin_dashboard(){
        //Conditional to prevent View Friends List from throwing an error when $_SESSION["nonAuth_rescueid"] is unset by setting that variable to $_SESSION["rescueid"]
        if($_SESSION["status"] == 1){
            $_SESSION["nonAuth_rescueid"]=$_SESSION['rescueid'];
        }

        $this->load->library('upload'); //Loads the Codeigniter Upload Library for profile image upload
        if($this->input->post('form') == 'addNew'){ //This will only show the Add New Pet validation checks in that section if it's submitted.
            $this->form_validation->set_rules('addanimalName', 'Animal Name', 'required'); //Validates that an Animal Name is entered
            $this->form_validation->set_rules('age', 'Age', 'required'); //Validates that Animal Age is entered
            $this->form_validation->set_rules('aloneFor', 'Alone For', 'required'); //Validates that an Animal Name is entered
            $this->form_validation->set_rules('energyLevel', 'Energy Level', 'required'); //Validates that an Animal Name is entered
            $this->form_validation->set_rules('image', 'Image', 'callback_image_check'); //Validates that the image uploaded is a JPG
        }
        $this->load->model('Retrieverescue'); //Loads Retrieve Rescue Database Interaction Model
        if ($this->form_validation->run() == FALSE) { //Page setup before any form is submitted
            $this->load->view('header'); //Loads the header
            $this->load->view('admin/adminCTA'); //Loads the Admin Call to Action
            $this->load->view('admin/addNewPet'); //Loads the Add New Pet form.
            $getRescueDetails=  $this->Retrieverescue->getRescueDetails(); //Retrieves the rescue details for the Edit Rescue module
            $this->load->view('admin/editRescue', $getRescueDetails); //Loads the editRescue Form dialog box and passes the query to load the Rescue Details data into the form elements
            $this->load->view('footer'); //Loads the footer

        }else{
            if($this->input->post('form') == 'addNew') { //Checks to see if the form submitted is the Add New Friend Form
                $this->load->model('Addpet'); //Loads Add Pet Database Interaction Model
                if ($query = $this->Addpet->add_new()) { //Runs the Add New Friend query in the Addpet Model
                    $this->do_upload('image'); //Uploads the image from the do_upload() function below
                    $this->load->view('header'); //Loads the header
                    $this->load->view('admin/adminCTA'); //Loads the Admin Call to Action
                    $this->load->view('admin/addNewPet'); //Loads the Add New Pet form.
                    $getRescueDetails=  $this->Retrieverescue->getRescueDetails(); //Retrieves the rescue details for the Edit Rescue module
                    $this->load->view('admin/editRescue', $getRescueDetails); //Loads the editRescue Form dialog box and passes the query to load the Rescue Details data into the form elements
                    $this->load->view('admin/addsuccess'); //Loads the addSuccess to throw a success message when the Friend is added successfully.
                    $this->load->view('footer'); //Loads the footer
                } else {
                    //Do Nothing
                }

            }
        }if($this->input->post('form') == 'editRescue') { //Checks to see if the form submitted is the Edit Rescue Form
            $this->load->model('Retrieverescue'); //Loads Retrieve Rescue Database Interaction Model
            $this->load->model('Editrescue'); //Loads Edit Rescue Database Interaction Model
            if ($query = $this->Editrescue->edit_submit()) { //Runs the Edit Rescue update query in the Editrescue Model
                $this->load->view('admin/editsuccess'); //Loads the addSuccess to throw a success message when the Friend is added successfully.
            } else {
                //Do Nothing
            }
        }
    }
    // ========== IMAGE UPLOAD FUNCTION RUN BY ADD NEW PET FORM ABOVE ==========
    public function do_upload(){
        $animalName = str_replace(" ", "_", $this->input->post('addanimalName')); //File replaces spaces with underscores
        $config['file_name']            = $_SESSION['rescueid'] . '_' . $animalName . ".jpg";//Sets up the file name to be called later
        $config['upload_path']          = './img/animalProfiles/'; //Sets the upload path
        $config['allowed_types']        = 'jpg';//Sets the acceptable file types
        $config['max_size']             = 2000000; //Sets the max size of file upload
        $this->load->library('upload');
        $this->upload->initialize($config); //Initializes the upload with the specifications listed above
        $this->upload->do_upload('image'); //Runs the do_upload function for the image "file" submitted in the form
    }
    // ========== IMAGE CHECK FUNCTION RUN BY VALIDATION RULE ABOVE ==========
    public function image_check()
    {
        //Image Check is the validation function that is called by the validation rule above
        $fileName = $_FILES['image']['name']; //Sets a variable for file name.
        $fileSize = $_FILES['image']['size']; //Sets a variable for file name.
        $extension = pathinfo($fileName, PATHINFO_EXTENSION); //Sets up extension variable to check what the extension of the upload is
        //Conditional to check if the upload field is empty
        if (empty($fileName))
        {
            $this->form_validation->set_message('image_check', 'You must upload an image!'); //If upload field is empty, this error message will be thrown and the form will not be submitted.
            return FALSE; //Returns FALSE to not submit the form.
        }
        //Conditional to check if the upload field has a JPG extension
        if(strtolower($extension) != "jpg"){
            $this->form_validation->set_message('image_check', 'The {field} must be a JPEG file.');//If upload extension is not JPG, this error message will be thrown and the form will not be submitted.
            return FALSE; //Returns FALSE to not submit the form.
        }if($fileSize == 0){
            $this->form_validation->set_message('image_check', 'The {field} must be under 2 megabytes.');//If upload extension is not JPG, this error message will be thrown and the form will not be submitted.
            return FALSE; //Returns FALSE to not submit the form.
        }
        else
        {
            return TRUE;  //Returns TRUE and no validation error is thrown for image field.
        }
    }
}