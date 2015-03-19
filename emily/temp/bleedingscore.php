<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Bleedingscore extends CI_Controller {

    public function rate() {

        $rate = $this->input->post('bleeding_rate');
        $this->load->model('Bleeding_model', 'bleeding', true);
        $content = $this->bleeding->Addscore($rate);
    }

    public function createRandomPassword() {
       
        $chars = "abcdefghijuvwxyz023456789VWXYZABCDEFGHIJKLAMOPQRSTUkmnopqrst";
        srand((double) microtime() * 1000000);
        $i = 0;
        $pass = '';
        while ($i <= 10) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
        return $pass;
    }

    public function bleeding() {
        
        $data = array(); //$this->restrict_login();
        $this->load->model('Bleeding_model', 'bleeding', true);
        $user_id = $this->session->userdata('id'); //echo $user_id;
        $data['lastScoredMonth'] = "";
        $data['lastscore_array'] = "";
        $lastScoredMonth = $this->bleeding->lastScoredMonth($user_id);
        $data['lastScoredMonth'] = $lastScoredMonth[0]['date_added'];
        $lastscore_array = $this->bleeding->lastscore($user_id);
        $data['lastscore_array'] = $lastscore_array[0];
        $this->layout->view('bleeding', $data);
    }

    public function graph($user_id) {

        $this->load->model('Bleeding_model', 'bleeding', true);
        $allscore_array = $this->bleeding->allScore($user_id);
        $data['allscore_array'] = $allscore_array;
        $this->layout->view('graph', $data);
    }

    public function sendemail($name, $email, $password) {

        $this->load->library('email');
        $config = Array(
      'protocol' => 'sendmail',
      'smtp_host' => 'relay-hosting.secureserver.net',
      'smtp_port' => 25,
      'smtp_user' => 'login@emily.org.in', // change it to yours
      'smtp_pass' => 'uce@51074', // change it to yours
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );
        $this->email->initialize($config);

        $this->email->from('login@emily.org.in', 'Emily');
        $this->email->to($email);
        $this->email->bcc('nidhinjp@gmail.com');

        $this->email->subject('Email');
        $from='FROM:login@emily.org.in';
        $subject="Email";
       $message= "Dear " . $name . ", \n Your password :".$password." \n Thanks, \n nidhin";
        $this->email->message("<html>

    <body>
        <p>Dear " . $name . ",
        </p>

        <p>Your password : " . $password . "
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

        $this->email->send();

        //echo $this->email->print_debugger();
    }

    public function patient_profile() {
        
        $data[] = "";
        $subj_id = $this->input->post('txt_subject_id');

        $this->layout->view('patient-profile', $data);
    }

    public function insert_patient_profile() {
        // Generating Random Password
        $password = $this->createRandomPassword();
        $doctor_id = $this->session->userdata('doctor_id');
        $this->load->model('Bleeding_model', 'bleeding', true);
        $this->bleeding->addProfile($password, $doctor_id);
        echo "SUCCESS";
        $this->sendemail($name = $this->input->post('name'), $name = $this->input->post('email'), $password);
    }

    /* End of file welcome.php *//* Location: ./application/controllers/welcome.php */}