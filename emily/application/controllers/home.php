<?php



if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Home extends CI_Controller {



    /**

     * Index Page for this controller.

     *

     * Maps to the following URL

     * 		http://example.com/index.php/welcome

     * 	- or -  

     * 		http://example.com/index.php/welcome/index

     * 	- or -

     * Since this controller is set as the default controller in 

     * config/routes.php, it's displayed at http://example.com/

     *

     * So any other public methods not prefixed with an underscore will

     * map to /index.php/welcome/<method_name>

     * @see http://codeigniter.com/user_guide/general/urls.html

     */

    public function __construct() {

        parent::__construct();

//              $ip_address=$this->input->ip_address(TRUE);

//              $this->load->model('Login_model', 'login_m', true);

//        $users_visit = $this->login_m->users_visits($ip_address);

        $this->load->library('usertracking');

        $this->usertracking->track_this();

    }



    public function restrict_login() {



        switch ($this->session->userdata('usertype')) {

            case 'patient':



                redirect('/patient_profile', "REFRESH");



                break;

            case 'doctor':

                redirect('/patientlist/1', "REFRESH");

                break;

            default :

                // redirect('/home', 'refresh');

                break;

        }

    }

public function index () {


	 $this->layout->view_new('new/index');
	
		
    }

    public function index1() {


	 $this->layout->view_new('new/index1');
	

    }




    public function about_rd() {

        $this->layout->view('about-us');

    }



    public function faq() {

        $this->layout->view('faq');

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

		/*$name=$this->session->userdata('name');

	 	$email=$this->session->userdata('email');*/



	  	$this->email->from('emilyadmin@emily.org.in', 'Emily');

        $this->email->to('jnellissery@yahoo.com');

        $this->email->bcc('jnellissery@yahoo.com');

		$this->email->subject('Your query is successfully Posted');

	 	$this->email->message("<html>

    <body>

        <p>Dear jojo,

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

/*public function email()

	{

	 $config = 

	 Array

		 (

		'protocol' => 'sendmail',

		'smtp_host' => 'ssl://smtp.emily.org.in',

		'smtp_port' => 465,

		'smtp_user' => 'emilyadmin@emily.org.in',

		'smtp_pass' => 'hll2013@' 

		);

		$this->load->library('email', $config);

		$this->email->set_newline("\r\n");



		$this->email->from('jnellissery1230@gmail.com', 'JOJO');

		$this->email->to('jnellissery1230@gmail.com');

	

	$this->email->subject('CodeIgniter Rocks Socks ');

	$this->email->message('Hello World');

	if (!$this->email->send())

		show_error($this->email->print_debugger());

	else

		echo 'Your e-mail has been sent!';  

	}*/

    public function contactus() {

        $this->layout->view('contactus');

    }



    public function emily() {

       // $this->layout->view('emily');
	  $this->layout->view_new('new/index');

    }

    public function news() {

        $this->layout->view('news');

    }

    public function marketing(){

        $this->load->model('admin_model', 'admin_m', true);

         $states_list_array = $this->admin_m->states();

        $data['states_list'] = $states_list_array;

        $this->layout->view('marketing',$data);

    }

	 public function doctormarketing()

	 {

        $this->load->model('admin_model', 'admin_m', true);

         $states_list_array = $this->admin_m->states();

        $data['states_list'] = $states_list_array;

        $this->layout->view('doctormarketing',$data);

    }

    public function marketing_enquiry(){

        $this->load->model('Bleeding_model', 'bleed_m', true);

        

        $profile_array = $this->bleed_m->marketing_enquiry();

        echo "SUCCESS";

    }

    public function instruction() {

        $this->layout->view('instruction');

    }

    


}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */