<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {

        parent::__construct();
        ////      echo $this->session->userdata('username');die();
        $this->load->library('usertracking');
        $this->usertracking->track_this();
        $config['userTracking']['user_identifier'] = array('model', 'login_model', 'users_visits', $this->session->userdata('id'));
        // Your own constructor code

        if (( $this->session->userdata('username') != "" && $this->session->userdata('usertype') === "hll-emily@admin")) {
            //$this->load->view('patient-profile'); //die();// redirect('/patient_profile', 'refresh');
        } else {
            redirect('/home', 'REFRESH');
        }
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

    public function dashboard() {
        $data = "";
        $this->load->model('admin_model', 'admin_m', true);
        // notice board view   
        $data['noticeboard']['summary_patients'] = $this->admin_m->summary_patients();
        $data['noticeboard']['summary_doctors'] = $this->admin_m->summary_doctors();
        $data['noticeboard']['total_visits'] = $this->admin_m->total_visits();
        $data['noticeboard']['total_unique_visits'] = $this->admin_m->total_unique_visits();
		$data['noticeboard']['summary_malayalamanoram'] = $this->admin_m->Summary_malayalamanorama();

        // pagination code
        $seg = $this->uri->segment(3);
        $seg = empty($seg) ? '1' : $this->uri->segment(3); //die($seg);
        $patient_list_count = count($this->admin_m->patient_list_count());
        $this->load->library('pagination');
        $config['use_page_numbers'] = TRUE;
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<div id="pagination">';
        $config['first_tag_close'] = '<div>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '';
        $config['last_tag_close'] = '';
        $config['base_url'] = base_url() . '/admin/dashboard#patient_list';
        $config['total_rows'] = $patient_list_count;
        $config['full_tag_open'] = '<div id="pagination" class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['per_page'] = 5;
        $config['uri_segment'] = 1;
        $config['num_link'] = 3;
        $offset = ($seg - 1) * $config['per_page'];
        $this->pagination->initialize($config);

        //pagination code ends
        //patients list
        $patient_list_array = $this->admin_m->patientslist($config['per_page'], $offset);
        $data['viewpatients']['patients_list'] = $patient_list_array;

        //messages list in login box

        $messages_list_array = $this->admin_m->getMessages();
        $data['loginbox']['messages_list'] = $messages_list_array;       
        
        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count
        $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();
        
        //Marketing Enquiry 
        
        $enquiry_list_array = $this->admin_m->getAllEnquiry();
	    $menquiry_list_array = $this->admin_m->mgetAllEnquiry();
        $data['loginbox']['enquiry_list'] = $enquiry_list_array;
        $data['loginbox']['menquiry_list'] = $menquiry_list_array;
		
        $data['loginbox']['enquiry_count']=count($this->admin_m->getEnquiryUreadCount()); 
 		$data['loginbox']['menquiry_count']=count($this->admin_m->mgetEnquiryUreadCount());
        //states
        $states_list_array = $this->admin_m->states();
        $data['add_doctor']['states_list'] = $states_list_array;

        $this->load->view('admin/dashboard', $data);
    }

    public function chart() {
        $this->load->view('admin/chart');
    }

    /* End of file welcome.php *//* Ldashboardocation: ./application/controllers/welcome.php */

    public function stateslist() {
        $this->load->model('admin_model', 'admin_m', true);
        $states_list_array = $this->admin_m->states();
        $data['states_list'] = $states_list_array;

        print_r($data['states_list']);
    }

   /* public function all_scores() {


        $array = array();
        $this->load->model('admin_model', 'admin_m', true);
        $array = $this->admin_m->getscores();

        //print_r($array);
        $new_array = array();
        $user_ids = array();

        foreach ($array as $array_value) {

            $user_id = $array_value->user_id;
            $score = $array_value->score;

            array_push($user_ids, $user_id);

            $user_id_count = count(array_keys($user_ids, $user_id));
            $new_array[$user_id_count]['count'] = isset($new_array[$user_id_count]['count']) ? $new_array[$user_id_count]['count'] + 1 : 1;
            $new_array[$user_id_count]['score'] = isset($new_array[$user_id_count]['score']) ? $new_array[$user_id_count]['score'] + $score : $score;
            $new_array[$user_id_count]['avg'] = isset($new_array[$user_id_count]['score']) ? (($new_array[$user_id_count]['score']) / ($new_array[$user_id_count]['count'])) : $score;
			$new_array[$user_id_count]['Cycle']=$array_value->Cycle ;
        }
        $data['score_array'] = array();
        $data['score_array'] = $new_array;
        //print_r($new_array);die();
        $this->load->view('admin/chart', $data);
    }
	public function all_scores1() {


        $array = array();
        $this->load->model('admin_model', 'admin_m', true);
        $array = $this->admin_m->getscores1();

        //print_r($array);
        $new_array = array();
        $user_ids = array();

        foreach ($array as $array_value) {

            $user_id = $array_value->user_id;
            $score = $array_value->score;

            array_push($user_ids, $user_id);

            $user_id_count = count(array_keys($user_ids, $user_id));
            $new_array[$user_id_count]['count'] = isset($new_array[$user_id_count]['count']) ? $new_array[$user_id_count]['count'] + 1 : 1;
            $new_array[$user_id_count]['score'] = isset($new_array[$user_id_count]['score']) ? $new_array[$user_id_count]['score'] + $score : $score;
            $new_array[$user_id_count]['avg'] = isset($new_array[$user_id_count]['score']) ? (($new_array[$user_id_count]['score']) / ($new_array[$user_id_count]['count'])) : $score;
        	$new_array[$user_id_count]['Cycle']=$array_value->Cycle ;
		}
        $data['score_array'] = array();
        $data['score_array'] = $new_array;
        //print_r($new_array);die();
        $this->load->view('admin/chart1', $data);
    }*/
 public function all_scores()
  {
        $array = array();
        $this->load->model('admin_model', 'admin_m', true);
        $array = $this->admin_m->getscores();
        $user_id_count=0;

        foreach ($array as $array_value) {
          	$user_id_count.=1;
            $new_array[$user_id_count]['avg'] = $array_value->avg; //isset($new_array[$user_id_count]['score']) ? (($new_array[$user_id_count]['score']) / ($new_array[$user_id_count]['count'])) : $score;
			$new_array[$user_id_count]['Cycle']=$array_value->Cycle ;
      }
        $data['score_array'] = $new_array;
        $this->load->view('admin/chart', $data);
    }
	public function all_scores1() {


        $array = array();
        $this->load->model('admin_model', 'admin_m', true);
        $array = $this->admin_m->getscores1();
 		$user_id_count=0;

        foreach ($array as $array_value) 
		{
        	$user_id_count.=1;
            $new_array[$user_id_count]['avg'] = $array_value->avg; //isset($new_array[$user_id_count]['score']) ? (($new_array[$user_id_count]['score']) / ($new_array[$user_id_count]['count'])) : $score;
			$new_array[$user_id_count]['Cycle']=$array_value->Cycle ;
			
        }
        $data['score_array'] = $new_array;
        $this->load->view('admin/chart1', $data);
    }

    public function india_map() {
        $this->load->view('admin/india');
    }

    public function map_popup() 
	{
        $state = $this->input->post('state');
        $this->load->model('admin_model', 'admin_m', true);
        $data["state_users"] = $this->admin_m->getStateUsers($state);
        $data["state_doctors_count"] = $this->admin_m->getStateDoctors($state);
		$data["state_doctors"] = $this->admin_m->getStateDoctors1($state);
        $data["state"] = $state;
        $doctor_list= $this->admin_m->doctors_list();
        $data["doctor_list"]=$doctor_list;
        $this->load->view('admin/popupcontent', $data);
    }
	public function change_password_popup() 
	{
        
        $this->load->view('admin/change_password_popup');
    }
    public function delete_patients() {

        $patients_id = $this->input->post("patients_id", TRUE);
        $this->load->model('admin_model', 'admin_m', true);
        $this->admin_m->delete_patients($patients_id);

        // pagination code
        $seg = $this->uri->segment(3);
        $seg = empty($seg) ? '1' : $this->uri->segment(3); //die($seg);
        $patient_list_count = count($this->admin_m->patient_list_count());
        $this->load->library('pagination');
        $config['use_page_numbers'] = TRUE;
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<div id="pagination">';
        $config['first_tag_close'] = '<div>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '';
        $config['last_tag_close'] = '';
        $config['base_url'] = base_url() . '/admin/dashboard#patient_list';
        $config['total_rows'] = $patient_list_count;
        $config['full_tag_open'] = '<div id="pagination" class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['per_page'] = 25;
        $config['uri_segment'] = 1;
        $config['num_link'] = 3;
        $offset = ($seg - 1) * $config['per_page'];
        $this->pagination->initialize($config);

        //pagination code ends


        $patient_list_array = $this->admin_m->patientslist($config['per_page'], $offset);
        $data['patients_list'] = $patient_list_array;
        $this->load->view('admin/viewpatientswithpagination.php', $data);
    }
	public function hard_delete_patients() {

        $patients_id = $this->input->post("patients_id", TRUE);
        $this->load->model('admin_model', 'admin_m', true);
        $this->admin_m->hard_delete_patients($patients_id);

        // pagination code
        $seg = $this->uri->segment(3);
        $seg = empty($seg) ? '1' : $this->uri->segment(3); //die($seg);
        $patient_list_count = count($this->admin_m->patient_list_count());
        $this->load->library('pagination');
        $config['use_page_numbers'] = TRUE;
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<div id="pagination">';
        $config['first_tag_close'] = '<div>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '';
        $config['last_tag_close'] = '';
        $config['base_url'] = base_url() . '/admin/dashboard#patient_list';
        $config['total_rows'] = $patient_list_count;
        $config['full_tag_open'] = '<div id="pagination" class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['per_page'] = 25;
        $config['uri_segment'] = 1;
        $config['num_link'] = 3;
        $offset = ($seg - 1) * $config['per_page'];
        $this->pagination->initialize($config);

        //pagination code ends


        $patient_list_array = $this->admin_m->patientslist($config['per_page'], $offset);
        $data['patients_list'] = $patient_list_array;
        $this->load->view('admin/viewpatientswithpagination.php', $data);
    }
    public function update_patients_form($patient_id) {
        $this->load->model('admin_model', 'admin_m', true);
        $states_list_array = $this->admin_m->states();

        $this->load->model('Login_model', 'login_m', true);
        $profile_array = $this->login_m->patient_profile($patient_id);
        $data["profile"] = $profile_array[0];

         //messages list in login box

        $messages_list_array = $this->admin_m->getMessages();
        $data['loginbox']['messages_list'] = $messages_list_array;       
        
        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count
        $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();
        
        //Marketing Enquiry 
        
        $enquiry_list_array = $this->admin_m->getAllEnquiry();
        $data['loginbox']['enquiry_list'] = $enquiry_list_array;
        $menquiry_list_array = $this->admin_m->mgetAllEnquiry();
        $data['loginbox']['menquiry_list'] = $menquiry_list_array;
		
        $data['loginbox']['enquiry_count']=count($this->admin_m->getEnquiryUreadCount());
		$data['loginbox']['menquiry_count']=count($this->admin_m->mgetEnquiryUreadCount());
		
        $data['update_doctor']['states_list'] = $states_list_array;
        $data['update_doctor']['doctors_list'] = $this->admin_m->doctors_list();
        $this->load->view('admin/update_patients.php', $data);
    }

    public function update_patients() {
        $this->load->model('admin_model', 'admin_m', true);
        $states_list_array = $this->admin_m->update_Pat_Profile();
        echo "SUCCESS";
    }

    public function message($message_id) {
        $this->load->model('admin_model', 'admin_m', true);
        $message_array = $this->admin_m->getMessage($message_id);
        $data['readmessage']['message'] = $message_array[0];
        //messages list in login box
 //messages list in login box

        $messages_list_array = $this->admin_m->getMessages();
        $data['loginbox']['messages_list'] = $messages_list_array;       
        
        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count
        $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();
        
        //Marketing Enquiry 
        
        $enquiry_list_array = $this->admin_m->getAllEnquiry();
        $data['loginbox']['enquiry_list'] = $enquiry_list_array;
        $menquiry_list_array = $this->admin_m->mgetAllEnquiry();
        $data['loginbox']['enquiry_list'] = $menquiry_list_array;
		
        $data['loginbox']['enquiry_count']=count($this->admin_m->getEnquiryUreadCount());
 		$data['loginbox']['menquiry_count']=count($this->admin_m->mgetEnquiryUreadCount());
        $this->load->view('admin/message', $data);
    }

    public function all_messages() {
        $this->load->model('admin_model', 'admin_m', true);
        $messages_list_array = $this->admin_m->getAllMessages();
        $data['view_all_message']['messages_list'] = $messages_list_array;

//messages list in login box

       //messages list in login box

        $messages_list_array = $this->admin_m->getMessages();
        $data['loginbox']['messages_list'] = $messages_list_array;       
        
        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count
        $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();
        
        //Marketing Enquiry 
        
        $enquiry_list_array = $this->admin_m->getAllEnquiry();
        $data['loginbox']['enquiry_list'] = $enquiry_list_array;
        $menquiry_list_array = $this->admin_m->mgetAllEnquiry();
        $data['loginbox']['menquiry_list'] = $menquiry_list_array;
		
        $data['loginbox']['enquiry_count']=count($this->admin_m->getEnquiryUreadCount());
		$data['loginbox']['menquiry_count']=count($this->admin_m->mgetEnquiryUreadCount());
        // $data['all_messaages']['message_list']=$message_array[0];
        $this->load->view('admin/allmessage', $data);
    }

    public function messsage_status() {
        $this->load->model('admin_model', 'admin_m', true);
        $message_id = $this->input->post('message_id');
        //echo $message_id;
        $messages_list_array = $this->admin_m->updateMessageStatus($message_id);
        //$data['view_all_message']['messages_list'] = $messages_list_array;
    }

    public function add_patients_form() {
        //messages list in login box
        $this->load->model('admin_model', 'admin_m', true);
        //messages list in login box

        $messages_list_array = $this->admin_m->getMessages();
        $data['loginbox']['messages_list'] = $messages_list_array;       
        
        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count
        $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();
        
        //Marketing Enquiry 
        
        $enquiry_list_array = $this->admin_m->getAllEnquiry();
        $data['loginbox']['enquiry_list'] = $enquiry_list_array;
         $menquiry_list_array = $this->admin_m->mgetAllEnquiry();
        $data['loginbox']['menquiry_list'] = $menquiry_list_array;
		
        $data['loginbox']['enquiry_count']=count($this->admin_m->getEnquiryUreadCount());
 $data['loginbox']['menquiry_count']=count($this->admin_m->mgetEnquiryUreadCount());
        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count

        $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();

        //states
        $states_list_array = $this->admin_m->states();
        $data['add_patients']['states_list'] = $states_list_array;

        $data['add_patients']['doctors_list'] = $this->admin_m->doctors_list();
        $this->load->view('admin/add_patients', $data);
    }

    public function sendemail($name, $email, $password) {

        $this->load->library('email');
        //$config['protocol'] = 'smtp';
        //$config['protocol'] = 'sendmail';
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

        //  echo $this->email->print_debugger();die('ss');
    }

    public function add_patients_profile() {
        $this->load->model('admin_model', 'admin_m', true);
        $password = $this->createRandomPassword();
        $states_list_array = $this->admin_m->addPatientprofile($password); //echo $doctor = $this->input->post('doctor_id', TRUE);
        echo "SUCCESS";
        $this->sendemail($this->input->post('name', TRUE), $this->input->post('email', TRUE), $password);
    }

    public function callcenter_enquiry() {
        $this->load->model('admin_model', 'admin_m', true);
         //messages list in login box

        $messages_list_array = $this->admin_m->getMessages();
        $data['loginbox']['messages_list'] = $messages_list_array;       
        
        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count
        $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();
        
        //Marketing Enquiry 
        
        $enquiry_list_array = $this->admin_m->getAllEnquiry();
        $data['loginbox']['enquiry_list'] = $enquiry_list_array;
        $menquiry_list_array = $this->admin_m->mgetAllEnquiry();
        $data['loginbox']['menquiry_list'] = $menquiry_list_array;
		
        $data['loginbox']['enquiry_count']=count($this->admin_m->getEnquiryUreadCount());
        $data['loginbox']['menquiry_count']=count($this->admin_m->mgetEnquiryUreadCount());
		
        $this->load->view('admin/view_callcenter_enquiry', $data);
    }

    public function manage_patients() {
        $this->load->model('admin_model', 'admin_m', true);
        // pagination code
        $seg = $this->uri->segment(3);
        $seg = empty($seg) ? '1' : $this->uri->segment(3); //die($seg);
        $patient_list_count = count($this->admin_m->patient_list_count());
        $this->load->library('pagination');
        $config['use_page_numbers'] = TRUE;
        
        /*$config['first_tag_open'] = '<div id="pagination">';
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
        $config['first_tag_close'] = '</div>';
/*        
        $config['last_tag_open'] = '';
        $config['last_tag_close'] = '';*/
		
        $config['base_url'] = base_url() . '/admin/manage_patients';
        $config['total_rows'] = $patient_list_count;
        //$config['full_tag_open'] = '<div id="pagination" class="pagination" width=100%>';
        //$config['full_tag_close'] = '</div>';
        $config['per_page'] = 5;
        $config['uri_segment'] = 3;
		//$data['links']=$this->pagination->create_links();

       //$config['num_link'] = 3;
		$offset = ($seg - 1) * $config['per_page'];
        $this->pagination->initialize($config);

        //pagination code ends
        //patients list
        $patient_list_array = $this->admin_m->patientslist($config['per_page'], $offset);
        $data['viewpatients']['patients_list'] = $patient_list_array;

        //messages list in login box

         //messages list in login box

        $messages_list_array = $this->admin_m->getMessages();
        $data['loginbox']['messages_list'] = $messages_list_array;       
        
        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count
        $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();
        
        //Marketing Enquiry 
        
        $enquiry_list_array = $this->admin_m->getAllEnquiry();
        $data['loginbox']['enquiry_list'] = $enquiry_list_array;
		
         $menquiry_list_array = $this->admin_m->mgetAllEnquiry();
        $data['loginbox']['menquiry_list'] = $menquiry_list_array;
		
        $data['loginbox']['enquiry_count']=count($this->admin_m->getEnquiryUreadCount());
 		$data['loginbox']['menquiry_count']=count($this->admin_m->mgetEnquiryUreadCount());
        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count
        
        $this->load->view('admin/manage_patients', $data);
    }

    public function active_patient() {

        $patients_id = $this->input->post("patients_id", TRUE);
        $this->load->model('admin_model', 'admin_m', true);
        $this->admin_m->active_patients($patients_id);

        // pagination code
        $seg = $this->uri->segment(3);
        $seg = empty($seg) ? '1' : $this->uri->segment(3); //die($seg);
        $patient_list_count = count($this->admin_m->patient_list_count());
        $this->load->library('pagination');
        $config['use_page_numbers'] = TRUE;
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<div id="pagination">';
        $config['first_tag_close'] = '<div>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '';
        $config['last_tag_close'] = '';
        $config['base_url'] = base_url() . '/admin/dashboard#patient_list';
        $config['total_rows'] = $patient_list_count;
        $config['full_tag_open'] = '<div id="pagination" class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['per_page'] = 25;
        $config['uri_segment'] = 1;
        $config['num_link'] = 3;
        $offset = ($seg - 1) * $config['per_page'];
        $this->pagination->initialize($config);

        //pagination code ends


        $patient_list_array = $this->admin_m->patientslist($config['per_page'], $offset);
        $data['patients_list'] = $patient_list_array;
        $this->load->view('admin/viewpatientswithpagination.php', $data);
    }

    public function search_patients() {

        $name = $this->input->post("patient_name", TRUE);
        $this->load->model('admin_model', 'admin_m', true);
        $patient_list_array = $this->admin_m->search_patients($name);
        $patient_list_count = count($patient_list_array);
        $data['patients_list'] = $patient_list_array;
        $this->load->view('admin/viewpatientswithpagination.php', $data);
    }

    public function add_doctor_form() {
        //messages list in login box
        $this->load->model('admin_model', 'admin_m', true);
         //messages list in login box

        $messages_list_array = $this->admin_m->getMessages();
        $data['loginbox']['messages_list'] = $messages_list_array;       
        
        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count
        $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();
        
        //Marketing Enquiry 
        
        $enquiry_list_array = $this->admin_m->getAllEnquiry();
        $data['loginbox']['enquiry_list'] = $enquiry_list_array;
		$menquiry_list_array = $this->admin_m->mgetAllEnquiry();
        $data['loginbox']['menquiry_list'] = $menquiry_list_array;
        
        $data['loginbox']['enquiry_count']=count($this->admin_m->getEnquiryUreadCount());
		 $data['loginbox']['menquiry_count']=count($this->admin_m->mgetEnquiryUreadCount());

        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count

       // $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();

        //states
        $states_list_array = $this->admin_m->states();
        $data['add_doctor']['states_list'] = $states_list_array;


        $this->load->view('admin/add_doctors', $data);
    }

    public function add_doctors_profile() {
        $this->load->model('admin_model', 'admin_m', true);
        $password = $this->createRandomPassword();
        $states_list_array = $this->admin_m->addDoctorprofile($password); //echo $doctor = $this->input->post('doctor_id', TRUE);
        echo "SUCCESS";
        $this->sendemail($this->input->post('name', TRUE), $this->input->post('email', TRUE), $password);
    }

    public function checkdoctorname() {

        $email = $this->input->post('email');
        $this->load->model('admin_model', 'admin_m', true);
        $num = $this->admin_m->check_doctor_availability($email);
        if ($num > 0) {
            echo "Not Available";
        } else {
            echo "Available";
        }
    }

    public function manage_doctors() {
        $this->load->model('admin_model', 'admin_m', true);
        // pagination code
        $seg = $this->uri->segment(3);
        $seg = empty($seg) ? '1' : $this->uri->segment(3); //die($seg);

        $this->load->library('pagination');
        $config['use_page_numbers'] = TRUE;
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<div id="pagination">';
        $config['first_tag_close'] = '<div>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '';
        $config['last_tag_close'] = '';
        $config['base_url'] = base_url() . '/admin/manage_doctors';

        $config['full_tag_open'] = '<div id="pagination" class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['per_page'] = 5;
        $config['uri_segment'] = 1;
        $config['num_link'] = 3;
        $offset = ($seg - 1) * $config['per_page'];

        //pagination code ends
        //patients list
        $doctors_list_array = $this->admin_m->doctorsalllist($config['per_page'], $offset);
        $data['viewdoctors']['doctors_list'] = $doctors_list_array;
        $doctor_list_count = count($this->admin_m->doctors_count());
        $config['total_rows'] = $doctor_list_count;
        $this->pagination->initialize($config);

        //messages list in login box

       //messages list in login box

        $messages_list_array = $this->admin_m->getMessages();
        $data['loginbox']['messages_list'] = $messages_list_array;       
        
        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count
        $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();
        
        //Marketing Enquiry 
        
        $enquiry_list_array = $this->admin_m->getAllEnquiry();
        $data['loginbox']['enquiry_list'] = $enquiry_list_array;
        $menquiry_list_array = $this->admin_m->mgetAllEnquiry();
        $data['loginbox']['menquiry_list'] = $menquiry_list_array;
		
        $data['loginbox']['enquiry_count']=count($this->admin_m->getEnquiryUreadCount());
		$data['loginbox']['menquiry_count']=count($this->admin_m->mgetEnquiryUreadCount());
        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count

       // $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();
        $this->load->view('admin/manage_doctors', $data);
    }

    public function active_doctor() {

        $doctors_id = $this->input->post("doctors_id", TRUE);
        $this->load->model('admin_model', 'admin_m', true);
        $this->admin_m->active_doctors($doctors_id);
        $seg = $this->uri->segment(3);
        $seg = empty($seg) ? '1' : $this->uri->segment(3);
        $this->load->library('pagination');
        $config['use_page_numbers'] = TRUE;
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<div id="pagination">';
        $config['first_tag_close'] = '<div>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '';
        $config['last_tag_close'] = '';
        $config['base_url'] = base_url() . '/admin/manage_doctors';

        $config['full_tag_open'] = '<div id="pagination" class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['per_page'] = 25;
        $config['uri_segment'] = 1;
        $config['num_link'] = 3;
        $offset = ($seg - 1) * $config['per_page'];

        //pagination code ends
        //patients list
        $doctors_list_array = $this->admin_m->doctorsalllist($config['per_page'], $offset);
        $data['viewdoctors']['doctors_list'] = $doctors_list_array;

        $doctor_list_count = count($this->admin_m->doctors_count()); //print_r($doctors_list_array);
        $config['total_rows'] = $doctor_list_count;
        $this->pagination->initialize($config);

        //messages list in login box

       //messages list in login box

        $messages_list_array = $this->admin_m->getMessages();
        $data['loginbox']['messages_list'] = $messages_list_array;       
        
        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count
        $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();
        
        //Marketing Enquiry 
        
        $enquiry_list_array = $this->admin_m->getAllEnquiry();
        $data['loginbox']['enquiry_list'] = $enquiry_list_array;
		
         $menquiry_list_array = $this->admin_m->mgetAllEnquiry();
        $data['loginbox']['menquiry_list'] = $menquiry_list_array;
		
        $data['loginbox']['enquiry_count']=count($this->admin_m->getEnquiryUreadCount());
		$data['loginbox']['menquiry_count']=count($this->admin_m->mgetEnquiryUreadCount());

        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count

        //$data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();

        $this->load->view('admin/viewdoctor', $data);
    }

    public function delete_doctors() {

        $doctors_id = $this->input->post("doctor_id", TRUE);
        $this->load->model('admin_model', 'admin_m', true);
        $this->admin_m->delete_doctor($doctors_id);

        // pagination code
        $seg = $this->uri->segment(3);
        $seg = empty($seg) ? '1' : $this->uri->segment(3); //die($seg);
        $doctor_list_count = count($this->admin_m->doctors_count());
        $this->load->library('pagination');
        $config['use_page_numbers'] = TRUE;
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<div id="pagination">';
        $config['first_tag_close'] = '<div>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '';
        $config['last_tag_close'] = '';
        $config['base_url'] = base_url() . '/admin/manage_doctors';

        $config['full_tag_open'] = '<div id="pagination" class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['per_page'] = 25;
        $config['uri_segment'] = 1;
        $config['num_link'] = 3;
        $offset = ($seg - 1) * $config['per_page'];

        //pagination code ends
        //patients list
        $doctors_list_array = $this->admin_m->doctorsalllist($config['per_page'], $offset);
        $data['viewdoctors']['doctors_list'] = $doctors_list_array;
        $doctor_list_count = count($this->admin_m->doctors_count());
        $config['total_rows'] = $doctor_list_count;
        $this->pagination->initialize($config);

        //messages list in login box

       //messages list in login box

        $messages_list_array = $this->admin_m->getMessages();
        $data['loginbox']['messages_list'] = $messages_list_array;       
        
        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count
        $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();
        
        //Marketing Enquiry 
        
        $enquiry_list_array = $this->admin_m->getAllEnquiry();
        $data['loginbox']['enquiry_list'] = $enquiry_list_array;
		
		 $menquiry_list_array = $this->admin_m->mgetAllEnquiry();
        $data['loginbox']['menquiry_list'] = $menquiry_list_array;
        
        $data['loginbox']['enquiry_count']=count($this->admin_m->getEnquiryUreadCount());
 		$data['loginbox']['menquiry_count']=count($this->admin_m->mgetEnquiryUreadCount());
        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count

       // $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();
        $this->load->view('admin/viewdoctor', $data);
    }
public function hard_delete_doctor() {

        $doctors_id = $this->input->post("doctor_id", TRUE);
        $this->load->model('admin_model', 'admin_m', true);
        $this->admin_m->hard_delete_doctor($doctors_id);

        // pagination code
        $seg = $this->uri->segment(3);
        $seg = empty($seg) ? '1' : $this->uri->segment(3); //die($seg);
        $doctor_list_count = count($this->admin_m->doctors_count());
        $this->load->library('pagination');
        $config['use_page_numbers'] = TRUE;
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<div id="pagination">';
        $config['first_tag_close'] = '<div>';
        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '';
        $config['last_tag_close'] = '';
        $config['base_url'] = base_url() . '/admin/manage_doctors';

        $config['full_tag_open'] = '<div id="pagination" class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['per_page'] = 25;
        $config['uri_segment'] = 1;
        $config['num_link'] = 3;
        $offset = ($seg - 1) * $config['per_page'];

        //pagination code ends
        //patients list
        $doctors_list_array = $this->admin_m->doctorsalllist($config['per_page'], $offset);
        $data['viewdoctors']['doctors_list'] = $doctors_list_array;
        $doctor_list_count = count($this->admin_m->doctors_count());
        $config['total_rows'] = $doctor_list_count;
        $this->pagination->initialize($config);

        //messages list in login box

       //messages list in login box

        $messages_list_array = $this->admin_m->getMessages();
        $data['loginbox']['messages_list'] = $messages_list_array;       
        
        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count
        $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();
        
        //Marketing Enquiry 
        
        $enquiry_list_array = $this->admin_m->getAllEnquiry();
        $data['loginbox']['enquiry_list'] = $enquiry_list_array;
        $menquiry_list_array = $this->admin_m->mgetAllEnquiry();
        $data['loginbox']['menquiry_list'] = $menquiry_list_array;
		
        $data['loginbox']['enquiry_count']=count($this->admin_m->getEnquiryUreadCount());
		$data['loginbox']['menquiry_count']=count($this->admin_m->mgetEnquiryUreadCount());

        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count

       // $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();
        $this->load->view('admin/viewdoctor', $data);
    }
    public function search_doctors() {

        $name = $this->input->post("search_doctor", TRUE);
        $this->load->model('admin_model', 'admin_m', true);
        $doctor_list_array = $this->admin_m->search_doctor($name);
        $patient_list_count = count($doctor_list_array);
        $data['viewdoctors']['doctors_list'] = $doctor_list_array;
        $this->load->view('admin/viewdoctor.php', $data);
    }

	public function state_list()
		{
		 	$this->load->model('admin_model', 'admin_m', true);
			$states_list_array = $this->admin_m->states();
			$data['states_list_array'] = $states_list_array;
			echo json_encode($data);
			
		}
    public function update_doctor($doctor_id) {

        $this->load->model('admin_model', 'admin_m', true);
        $messages_list_array = $this->admin_m->getMessages();
        $data['loginbox']['messages_list'] = $messages_list_array;

        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count

        $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();

        //states
        $states_list_array = $this->admin_m->states();
        $data['update_doctors']['states_list'] = $states_list_array;

        $data['update_doctors']['doctors_details'] = $this->admin_m->doctors_details($doctor_id);
        $this->load->view('admin/update_doctor.php', $data);
    }

    public function update_doctors_profile($doctor_id) {

        $this->load->model('admin_model', 'admin_m', true);
        $states_list_array = $this->admin_m->updateDoctorprofile($doctor_id); //echo $doctor = $this->input->post('doctor_id', TRUE);
        echo "SUCCESS";
        //  $this->sendemail($this->input->post('name', TRUE), $this->input->post('email', TRUE), $password);
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
    public function getAllEnquiry(){
        
         $this->load->model('admin_model', 'admin_m', true);
        $messages_list_array = $this->admin_m->cgetAllEnquiry();
        $data['view_all_enquiry']['enquiry_list'] = $messages_list_array;
         //messages list in login box
         
        $messages_list_array = $this->admin_m->getMessages();
        $data['loginbox']['messages_list'] = $messages_list_array;       
        
        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count
        $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();
        
        //Marketing Enquiry 
        
        $enquiry_list_array = $this->admin_m->getAllEnquiry();
        $data['loginbox']['enquiry_list'] = $enquiry_list_array;
		 $menquiry_list_array = $this->admin_m->mgetAllEnquiry();
        $data['loginbox']['menquiry_list'] = $menquiry_list_array;
        
        $data['loginbox']['enquiry_count']=count($this->admin_m->getEnquiryUreadCount());
		 $data['loginbox']['menquiry_count']=count($this->admin_m->mgetEnquiryUreadCount());
        $this->load->view('admin/allenquiry', $data);
    }
	public function mgetAllEnquiry(){
        
         $this->load->model('admin_model', 'admin_m', true);
        $messages_list_array = $this->admin_m->mcgetAllEnquiry();
        $data['view_all_enquiry']['enquiry_list'] = $messages_list_array;
         //messages list in login box
         
        $messages_list_array = $this->admin_m->getMessages();
        $data['loginbox']['messages_list'] = $messages_list_array;       
        
        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count
        $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();
        
        //Marketing Enquiry 
        
        $enquiry_list_array = $this->admin_m->getAllEnquiry();
        $data['loginbox']['enquiry_list'] = $enquiry_list_array;
		 $menquiry_list_array = $this->admin_m->mgetAllEnquiry();
        $data['loginbox']['menquiry_list'] = $menquiry_list_array;
        
        $data['loginbox']['enquiry_count']=count($this->admin_m->getEnquiryUreadCount());
		 $data['loginbox']['menquiry_count']=count($this->admin_m->mgetEnquiryUreadCount());
        $this->load->view('admin/allenquiry', $data);
    }
    public function message_status() {
        $this->load->model('admin_model', 'admin_m', true);
        $message_id = $this->input->post('message_id');
        //echo $message_id;
        $messages_list_array = $this->admin_m->updateMessageStatus($message_id);
        //$data['view_all_message']['messages_list'] = $messages_list_array;
    }
    public function enquiry($enquiry_id){
       
        $this->load->model('admin_model', 'admin_m', true);
        
        //enquiry list in login box
        //messages list in login box

        $messages_list_array = $this->admin_m->getMessages();
        $data['loginbox']['messages_list'] = $messages_list_array;       
        
        //Total message count
        $data['noticeboard']['total_messages'] = count($messages_list_array);

        /// unread message count
        $data['loginbox']['messages_count'] = $this->admin_m->unread_message_count();
        
        //Marketing Enquiry 
        
        $enquiry_list_array = $this->admin_m->getAllEnquiry();
        $data['loginbox']['enquiry_list'] = $enquiry_list_array;
        $menquiry_list_array = $this->admin_m->mgetAllEnquiry();
        $data['loginbox']['menquiry_list'] = $menquiry_list_array;
		
        $data['loginbox']['enquiry_count']=count($this->admin_m->getEnquiryUreadCount());
		 $data['loginbox']['menquiry_count']=count($this->admin_m->mgetEnquiryUreadCount());
        $enquiry_array = $this->admin_m->getEnquiry($enquiry_id); 
        $data['view_enquiry']['enquiry']=$enquiry_array[0];
         
        $this->load->view('admin/enquiry', $data);
    }
    public function enquiry_status(){
        $this->load->model('admin_model', 'admin_m', true);
        $enquiry_id = $this->input->post('enquiry_id');
        //echo $message_id;
         $this->admin_m->updateEnquiryStatus($enquiry_id);
    }
	public function selectPatient()
		{
		$this->load->model('admin_model', 'admin_m', true);
		$data['patients']=$this->admin_m->selectPatients();
		
		$this->load->view("admin/statedoctorspatient",$data);
		}
		 public function changepasswordadmin()
		{
			 $this->load->model('admin_model', 'admin_m', true);
			   $this->admin_m->changepasswordadmin();
			   echo "SUCCESS";
			 //print_r($data['add_score']);
		}
    public function addScore()
		{
			$data="";
			   $this->load->model('admin_model', 'admin_m', true);
			$data['add_score']['patient_list']=$this->admin_m->patientList();
			$this->load->view("admin/add_score",$data);     
	
		}
		 public function chk_cookies_count()
		{
			$this->load->model('admin_model', 'admin_m', true);
			$data['chk_cookies_count']=$this->admin_m->chk_cookies_count();
			   if($data['chk_cookies_count']==1)
			   	{
			  		 echo "SUCCESS";
				}
				else
				{
					echo "NO";
				}
			
		}
    public function addUserScore()
		{
			 $this->load->model('admin_model', 'admin_m', true);
			   $data['add_score']=$this->admin_m->addUserScore();
			   echo "SUCCESS";
			 //print_r($data['add_score']);
		}
    public function all_chart()
		{
			   $this->load->model('admin_model', 'admin_m', true);
			$data['add_score']=$this->admin_m->getUserScore();
			
			$this->load->view('admin/all_chart');
		}
		public function popupsidebar()
		{
		$this->load->view('admin/popupsidebar');
		}
}