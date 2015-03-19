<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Doctor extends CI_Controller {
    /*
     * To change this template, choose Tools | Templates
     * and open the template in the editor.
     */

    public function __construct() {

        parent::__construct();
        $this->load->library('usertracking');
        $this->usertracking->track_this();
        $config['userTracking']['user_identifier'] = array('model', 'users_model', 'users_visits', $this->session->userdata('doctor_id'));
        ////      echo $this->session->userdata('username');die();
        if ( $this->session->userdata('username') != "" && ($this->session->userdata('usertype') === "doctor"||$this->session->userdata('usertype')==='hll-emily@admin' ))
		{
            // do nothing
        }
		 else 
		 {
            redirect('/home', 'REFRESH');
        }
        // Your own constructor code
    }

    public function viewpatients() {
        $data = "";
        $this->load->model('Login_model', 'login_m', true);

        // pagination code
        $doc_id = $this->session->userdata('doctor_id');
        $patient_list_count = count($this->login_m->patients_list_count($doc_id));
        $this->load->library('pagination');
        $config['use_page_numbers'] = TRUE;
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<div id="pagination">';
        $config['first_tag_close'] = '<div>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<div id="pagination">';
        $config['last_tag_close'] = '<div>';
        $doc_id = $this->session->userdata("doctor_id");
        $config['base_url'] = base_url() . '/patientlist';
        $config['total_rows'] = $patient_list_count;
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['per_page'] = 10;
        $config['uri_segment'] = 2;
        $config['num_link'] = 5;
        $offset = ($this->uri->segment(2) - 1) * $config['per_page'];
        $this->pagination->initialize($config);

        //pagination code ends

        $patient_list_array = $this->login_m->patients_list($doc_id, $config['per_page'], $offset);
        $data["list_array"] = $patient_list_array;
        $this->layout->view('patientlist', $data);
    }

    public function delete_patient($patient_id) {

        if ($this->uri->segment(4) === FALSE) {
            $offset = 1;
        } else {
            $offset = $this->uri->segment(4);
        }
        $this->uri->segment(4) == false ? $this->uri->segment(4) : 1;
        $doc_id = $this->session->userdata("doctor_id");
        $this->load->model('Login_model', 'login_m', true);
        $patient_list_count = count($this->login_m->patients_list_count($doc_id));
        $this->load->library('pagination');
        $config['use_page_numbers'] = TRUE;
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<div id="pagination">';
        $config['first_tag_close'] = '<div>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<div id="pagination">';
        $config['last_tag_close'] = '<div>';
        $doc_id = $this->session->userdata("doctor_id");
        $config['base_url'] = base_url() . '/patientlist';
        $config['total_rows'] = $patient_list_count;
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
        $config['num_link'] = 5;
        $offset = ( $offset - 1) * $config['per_page'];
        $this->pagination->initialize($config);
        $patient_list_array = $this->login_m->delete_patient($patient_id);
        $patient_list_array = $this->login_m->patients_list($doc_id, $config['per_page'], $offset);
        $data["list_array"] = $patient_list_array;
        $this->layout->view('patientlist', $data);
    }

    public function sort_patient_list($key, $order) {
        $this->load->model('login_model', 'lm', true);
        $data['list_array'] = $this->lm->sortPatients($key, $order);
        $this->load->view('sortpatientlist', $data);
    }

    public function checkusername() {

        $email = $this->input->post('email');
        $this->load->model('Login_model', 'login_m', true);
        $num = $this->login_m->check_user_availability($email);
        if ($num > 0) {
            echo "Not Available";
        } else {
            echo "Available";
        }
    }

    public function detailedprofile($user_id) {
        //   $this->restrict_login();
        $this->load->model('Login_model', 'login_m', true);
        $profile_array = $this->login_m->patient_profile($user_id);
        $data["profile"] = $profile_array[0];
        // print_r($data);
        $this->layout->view('detailedprofile', $data);
    }
	 public function detailedprofile1($user_id) 
	{
        //   $this->restrict_login();
        $this->load->model('Login_model', 'login_m', true);
        $profile_array = $this->login_m->patient_profile($user_id);
        $data["profile"] = $profile_array[0];
		$this->load->view('detailedprofile1', $data);
        
    }  
 	public function changepassword() 
	 {
	 //echo "kjkkk";
 		$this->layout->view('changepassword');
	 }    

}

?>
