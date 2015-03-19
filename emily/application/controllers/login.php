<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Login extends CI_Controller {

    /*

     * To change this template, choose Tools | Templates

     * and open the template in the editor.

     */



    public function __construct() {



        parent::__construct();

        ////      echo $this->session->userdata('username');die();

        $this->load->library('usertracking');

        $this->usertracking->track_this();

        $config['userTracking']['user_identifier'] = array('model', 'Login_model', 'users_visits', $this->session->userdata('id'));

        // Your own constructor code

    }



    public function restrict_login() {



        switch ($this->session->userdata('usertype')) {

            case 'patient':



                redirect('/patient_profile', "REFRESH");



                break;

            case 'doctor':

                redirect('/patientlist/1', "REFRESH");

                break;

            case '' :

                redirect('/home', 'refresh');

                break;

        }

    }



    public function patient() {





        $name = $this->input->post('txt_pat_user');

        $password = $this->input->post('txt_pat_pass');

        $this->load->model('Login_model', 'login_m', true);

        $user_array = $this->login_m->authenticate_patient($name, $password);

        if (count($user_array) > 0) {

            $userid = $user_array[0]['id'];

            $username = $user_array[0]['name'];

//print_r($user_array);die();

             $newdata = array(

                'id' => $userid, 'usertype' => 'patient', 'username' => $username,'email'=>$name

            );

            $this->session->set_userdata($newdata); //echo $this->session->all_userdata();
			
			// redirect("patient_profile", $data);
			
			$user_id = $this->session->userdata('id');
        $this->load->model('Login_model', 'login_m', true);
        $profile_array = $this->login_m->patient_profile($user_id);

        $data["profile"] = $profile_array[0];
		
		$newdata = array(
                'id' => $user_id, 
				'usertype' => 'patient', 
				'username' =>  $profile_array[0]['name'],
				'usertype1' => '',
				'test'=>$user_id,
				'product'=>$profile_array[0]['product']
            );
			
			$this->load->library('session');
		$this->session->set_userdata($newdata);
        //$this->layout->view('view_patient_profile', $data);
			// $this->layout->view('view_patient_profile', $data);

        header("Location:" . base_url() . "patient_profile");

        } else {



            redirect("home?login=failed&user=patient", "REFRESH");

        }

    }

 public function changepassword() 

	 {

		$password = $this->input->post('password');

		$this->load->model('admin_model', 'admin_m', true);

		$this->admin_m->changepassword($password);

		$data ="Updated successfully !!!!";

		echo  json_encode($data);

	 } 

    public function doctor() {



        $name = $this->input->post('txt_doc_email');

        $password = $this->input->post('txt_doc_pass'); //echo $name;die();

        $this->load->model('Login_model', 'login_m', true);

        $user_array = $this->login_m->authenticate_doctor($name, $password);           // 

        // print_r($user_array);

        //echo $name.$password;

        if (count($user_array) > 0) {

            $username = $user_array[0]['name'];

            $newdata = array(

                'doctor_id' => $user_array[0]['id'],

                'username' => $username,

                'usertype' => 'doctor'

            );



            $this->session->set_userdata($newdata); //echo $this->session->all_userdata();

            redirect("patientlist/1", "REFRESH");

        } else {

            header("Location:" . base_url() . "?login=failed&&user=doctor");

        }

    }

	

	

	    public function doctor_direct($name,$password) {



        

        $this->load->model('Login_model', 'login_m', true);

        $user_array = $this->login_m->authenticate_doctor($name, $password);           // 

        // print_r($user_array);

        //echo $name.$password;

        if (count($user_array) > 0) {

            $username = $user_array[0]['name'];

            $newdata = array(

                'doctor_id' => $user_array[0]['id'],

                'username' => $username,

                'usertype' => 'doctor'

            );



            $this->session->set_userdata($newdata); //echo $this->session->all_userdata();

            redirect("patientlist/1", "REFRESH");

        } else {

            header("Location:" . base_url() . "?login=failed&&user=doctor");

        }

    }



    public function logout() {

        // $this->restrict_login();

        $newdata = array(

            'username' => '',

            'usertype' => '', 'id' => '',

            'doctor_id' => '',

			'test'=>'',

			'product'=>'',

			'email'=>''

        );

        $this->session->set_userdata($newdata);

        $this->session->unset_userdata('user_name');

        //$this->layout->view('home');
		$this->layout->view_new('new/index');

    }



    public function sendemail_forgotpassword($name, $email, $password) {

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

		

	    $this->email->from('login@emily.org.in', 'Emily');

        $this->email->to($email);

        $this->email->bcc('jnellissery@yahoo.com');

        $this->email->subject('Emily Forgot Password');

        $this->email->message("<html>



    <body>

        <p>Dear " . $name . ",

        </p>



        <p>Your password  : " . $password . "

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

		echo 'Your e-mail has been sent!';  

    }



    public function forgotpassword() {

        $email = $this->input->post('username');

        $this->load->model('Login_model', 'login_m', true);

        $num = $this->login_m->check_user_availability($email);

        $password_array = $this->login_m->forgot_passsword($email);

        $this->sendemail_forgotpassword($password_array[0]['name'], $email, $password_array[0]['password']);

        if ($num > 0) {



            echo "Password send to your " . $email;

        } else {

            echo "There is no User registered with this mail";

        }

    }



}



?>

