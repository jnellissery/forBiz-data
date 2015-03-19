<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SuperAdmin extends CI_Controller {
    /*
     * To change this template, choose Tools | Templates
     * and open the template in the editor.
     */

    public function __construct() {

        parent::__construct();
        
        $this->load->library('usertracking');
        $this->usertracking->track_this();
        $config['userTracking']['user_identifier'] = array('model', 'Login_model', 'users_visits', $this->session->userdata('id'));
        // Your own constructor code
    }

    public function logincheck() {

        $username = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        $this->load->model('admin_model', 'admin_m', true);
		
        $user_array = $this->admin_m->authenticate_admin($username, $password);
        if (count($user_array) > 0) 
		{
				//echo count($user_array);

            $userid = $user_array[0]['id'];
            $username = $user_array[0]['name'];
            $newdata = array(
                'id' => $userid, 'usertype' => 'hll-emily@admin', 'username' => $username
            );
            $this->session->set_userdata($newdata);
            redirect('admin/dashboard');
        } 
		else 
		{
				

             $this->load->view('admin/index');
        }
    }

    public function login() 
	{
        $this->load->view('admin/index');
    }

    public function logout() {
        // $this->restrict_login();
        $newdata = array(
            'username' => '',
            'usertype' => '', 'id' => '',
            'doctor_id' => '',
        );
        $this->session->set_userdata($newdata);
        $this->session->unset_userdata('user_name');
        redirect('admin/hll-emily');
    }

}

?>
