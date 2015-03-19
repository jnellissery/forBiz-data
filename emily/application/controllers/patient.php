<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Patient extends CI_Controller {
    /*
     * To change this template, choose Tools | Templates
     * and open the template in the editor.
     */

    public function __construct() {

        parent::__construct();
        $this->load->library('usertracking');
        $this->usertracking->track_this();
        $config['userTracking']['user_identifier'] = array('model', 'Login_model', 'users_visits', $this->session->userdata('id'));

        ////      echo $this->session->userdata('username');die();
		 if ( $this->session->userdata('username') != "" && ($this->session->userdata('usertype') === "patient"||$this->session->userdata('usertype')==='hll-emily@admin' ))
		{
            //$this->load->view('patient-profile'); //die();// redirect('/patient_profile', 'refresh');
        } else {
            redirect('/home', 'REFRESH');
        }
        // Your own constructor code
    }

    public function view_patient_profile() {
        // $this->restrict_login();
        $user_id = $this->session->userdata('id');
        $this->load->model('Login_model', 'login_m', true);
        $profile_array = $this->login_m->patient_profile($user_id);

        $data["profile"] = $profile_array[0];
		echo $profile_array[0]['product'];
		$newdata = array(
                'id' => $user_id, 
				'usertype' => 'patient', 
				'username' =>  $profile_array[0]['name'],
				'usertype1' => '',
				'test'=>$user_id ,
				'product'=>$profile_array[0]['product']
            );
		$this->session->set_userdata($newdata);
        $this->layout->view('view_patient_profile', $data);
    }
public function view_patient_profile1($profile_id) 
{
        // $this->restrict_login();
        $user_id =$profile_id;
        $this->load->model('Login_model', 'login_m', true);
        $profile_array = $this->login_m->patient_profile($user_id);
        $data["profile"] = $profile_array[0];
		$newdata = array(
                'id' => 1, 
				'usertype' => 'hll-emily@admin', 
				'username' => 'admin',
				'usertype1' => 'hll-emily@admin',
				'test'=>$user_id,
				'product'=>$profile_array[0]['product']
            );
		$this->session->set_userdata($newdata);
	$this->layout->view('view_patient_profile', $data);
    }
    public function askadoctor() {
        $data = ""; //$this->restrict_login();
        $user_id = $this->session->userdata('id');
        $this->load->model('Login_model', 'login_m', true);
        $doctor_array = $this->login_m->doctor_details($user_id);
        $data['doctor_details'] = $doctor_array[0];
        $this->layout->view('askadoctor', $data);
        //  $this->load->view('footer',$data);
    }

    public function instruction() {
        $data = "";
        $this->layout->view('instructions', $data);
    }

    public function querydoctor() 
	{	
	 	$this->load->model('Login_model', 'login_m', true);			
          $doctor_array = $this->login_m->add_doctorquery($user_id);
		  $data=$this->email();
          echo $data ;
    }
public function email()
	{
	 $config = 
	 Array
		 (
		'charset'=>'utf-8',
		'wordwrap'=> TRUE,
		'mailtype'=>'html',
		'protocol' => 'sendmail',
		'smtp_host' => 'ssl://smtp.emily.org.in',
		'smtp_port' => 465,
		'smtp_user' => 'emilyadmin@emily.org.in',
		'smtp_pass' => 'hll2013@' 
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$name=$this->session->userdata('name');
	 	$email=$this->session->userdata('email');

	  	$this->email->from('emilyadmin@emily.org.in', 'Emily');
        $this->email->to($email);
        $this->email->bcc('jnellissery@yahoo.com');
		$this->email->subject('Your query is successfully Posted');
	 	$this->email->message("<html>
    <body>
        <p>Dear ".$name.",
        </p>
      
        </a><br><br><br>

        <p>Thanks,<br><br>
            Emily Team
        </p>
    </body>
</html>


<style type='text/css'>

body{
    font-family: 'Lucida Grande';
    background-color: #fdfdfd;
}
a {
  color: #008ee8;
  text-decoration: none;
  outline: none;
}
a:hover {
  color: #ec8526;
  text-decoration: none;
}


</style>");
	if (!$this->email->send())
		show_error($this->email->print_debugger());
	else
		return 'Your e-mail has been sent!';  
	}
	
	public function changepassword() 
	 {
	 //echo "kjkkk";
 		$this->layout->view('changepassword');
	 }    


}

?>
