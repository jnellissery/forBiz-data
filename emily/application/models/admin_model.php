<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function summary_patients() {

        $this->db->having("bit_active = 0 ");
        $this->db->order_by("id", "ASC");
        $result = $this->db->get('tbl_user');
        $num = $result->num_rows();
        return $num;
    }
 public function Summary_malayalamanorama() {
          $this->db->select('id,name');
		  $this->db->where('FR_MALA = "MALAYALAMANORAMA"' );
        $result = $this->db->get('tbl_marketing');
        $num = $result->num_rows();
        return $num;
    }
    public function summary_doctors() {

        $this->db->having("bit_active = 0 ");
        $this->db->order_by("id", "ASC");
        $result = $this->db->get('tbl_doctor');
        $num = $result->num_rows();
        return $num;
    }

    public function total_unique_visits() {

        $query = mysql_query("select distinct(client_ip) from usertracking");
        $num = mysql_num_rows($query);
        return $num;
    }

    public function total_visits() {

        $query = mysql_query("select distinct(session_id) from usertracking");
        $num = mysql_num_rows($query);
        return $num;
    }

    public function patientslist($per_page, $offset) {

        //  $this->db->having("bit_active = 0 ");
        $this->db->select('tbl_user.*,tbl_doctor.name as doctor_name,(select sum(score) from tbl_score where tbl_score.user_id=tbl_user.id ) tblscore');
        $this->db->limit($per_page, $offset);
        $this->db->join('tbl_doctor', 'tbl_user.doctor_id = tbl_doctor.id', 'inner');
		$this->db->distinct();
        $this->db->order_by("bit_active", "0", "id", "DESC");
        $result = $this->db->get('tbl_user');
        return $result->result_array();
    }

    public function patient_list_count() {

        // $this->db->having("bit_active = 0 ");
        $this->db->select('tbl_user.*,tbl_doctor.name as doctor_name');
        $this->db->join('tbl_doctor', 'tbl_user.doctor_id = tbl_doctor.id', 'inner');
        $this->db->order_by("id", "DESC");
        $result = $this->db->get('tbl_user');
        return $result->result_array();
    }

    public function states() {
        $this->db->where("city_state <> 'unknown'");
        $this->db->select("city_state");
        $this->db->distinct();
        $this->db->order_by("city_state", "ASC");
	    $result = $this->db->get('tbl_cities');
        return $result->result_array();
    }
 public function getscores() 
 {
		
		$sql = "SELECT Cycle, DATE_ADD(MIN(`date_added`), INTERVAL 12 MONTH) AS date_limit,(SUM(`score`)/COUNT(cycle)) AS avg
		FROM tbl_score WHERE product='emily'
		GROUP BY  `Cycle`  ORDER BY CONVERT (SUBSTR(`Cycle`,6,LENGTH(`Cycle`)) ,UNSIGNED INTEGER) ASC ";
        $query = $this->db->query($sql);
        $result = $query->result();
       return $result;
    }
 public function getscores1()
  {

		$sql = "SELECT Cycle, DATE_ADD(MIN(`date_added`), INTERVAL 12 MONTH) AS date_limit,(SUM(`score`)/COUNT(cycle)) AS avg
		FROM tbl_score WHERE product='LNG-IUS'
		GROUP BY  `Cycle`ORDER BY CONVERT (SUBSTR(`Cycle`,6,LENGTH(`Cycle`)) ,UNSIGNED INTEGER)  ASC ";
        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }
    /* public function getscores() {
		
		$sql = "SELECT e.user_id,e.score,e.date_added,e_limit.sum,e.Cycle
		FROM tbl_score AS e
		JOIN (
		SELECT `user_id`, DATE_ADD(MIN(`date_added`), INTERVAL 12 MONTH) AS date_limit,sum(`score`) as sum
		FROM tbl_score
		GROUP BY `user_id`   
		) AS e_limit
		ON e_limit.`user_id` = e.`user_id`
		AND e.date_added<= e_limit.date_limit and product='Emily'
		ORDER BY `user_id`,date_added ASC,Cycle ";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }
 public function getscores1()
  {

		$sql = "SELECT e.user_id,e.score,e.date_added,e_limit.sum,e.Cycle
		FROM tbl_score AS e
		JOIN (
		SELECT `user_id`, DATE_ADD(MIN(`date_added`), INTERVAL 12 MONTH) AS date_limit,sum(`score`) as sum
		FROM tbl_score
		GROUP BY `user_id`   
		) AS e_limit
		ON e_limit.`user_id` = e.`user_id`
		AND e.date_added<= e_limit.date_limit and product='LNG-IUS'
		ORDER BY `user_id`,date_added ASC,Cycle ";
        $query = $this->db->query($sql);
        $result = $query->result();

        return $result;
    }*/
    public function getStateUsers($state) {
        $sql = "SELECT id from tbl_user where bit_active = 0 and state='" . $state . "'";
        $query = $this->db->query($sql);
        $num = $query->num_rows();
        return $num;
    }

     public function getStateDoctors1($state) 
	{
        $sql = "SELECT id,name from tbl_doctor where bit_active = 0 and state='" . $state . "'";
        $query = $this->db->query($sql);
      	return $query->result_array();

    }
    public function getStateDoctors($state) 
	{
        $sql = "SELECT id,name from tbl_doctor where bit_active = 0 and state='" . $state . "'";
        $query = $this->db->query($sql);
		 $num = $query->num_rows();
        return $num;
    }

    public function delete_patients($patients_id) {
        $patient_id_array = explode(',', $patients_id);

        if (end($patient_id_array) == "") {
            array_pop($patient_id_array);
        }
        $param = "";
        foreach ($patient_id_array as $id) {


            if (end($patient_id_array) == $id) {
                $param.="id=" . $id;
            } else {
                $param.=" id=" . $id . " OR ";
            }
        }
        $sql = "Update  tbl_user set bit_active = 1 WHERE " . $param;
        $query = $this->db->query($sql);
    }
	public function hard_delete_patients($patients_id) {
        $patient_id_array = explode(',', $patients_id);

        if (end($patient_id_array) == "") {
            array_pop($patient_id_array);
        }
        $param = "";
        foreach ($patient_id_array as $id) {


            if (end($patient_id_array) == $id) {
                $param.="id=" . $id;
				$param1.="user_id=" . $id;
            } else {
                $param.=" id=" . $id . " OR ";
				 $param1.=" user_id=" . $id . " OR ";
				 
            }
        }
        $sql = "delete from   tbl_user  WHERE " . $param;
        $query = $this->db->query($sql);
		 $sql = "delete from   tbl_score   WHERE " . $param1;
        $query = $this->db->query($sql);
    }

    public function update_Pat_Profile() {
        $subj_id = $this->input->post('subj_id', TRUE);
        $name = $this->input->post('name', TRUE);
        $dob = $this->input->post('dob', TRUE);
        $age = $this->input->post('age', TRUE);
        $state = $this->input->post('state', TRUE);
        $doctor = $this->input->post('doctor_id', TRUE);
        $address = $this->input->post('address', TRUE);
        $email = $this->input->post('email', TRUE);
        $phone = $this->input->post('phone', TRUE);
        $medical_history = $this->input->post('medical_history', TRUE);
		$username=$this->input->post('username', TRUE);
		$date_of_insertion = $this->input->post('date_of_insertion', TRUE);
        $data = array(
            'name' => $name,
            'dob' => $dob, 'age' => $age,
            'address' => $address, 'state' => $state,
            'phone' => $phone, 'email' => $email,
            'medical_history' => $medical_history,
            'doctor_id' => $doctor,
            'joined_date' =>date('Y-m-d', strtotime($date_of_insertion)),
			'username'=>$username
        );

        $this->db->where('id', $subj_id);
        $this->db->update('tbl_user', $data);
    }

    public function doctors_list() {


        $this->db->select('id,name');
        $this->db->where("bit_active = 0");
        $this->db->order_by("id", "ASC");
        $result = $this->db->get('tbl_doctor');
        return $result->result_array();
    }

    public function getMessages() {

        $this->db->order_by("admin_read", "ASC", "date_added", "DESC");
        $this->db->select('tbl_messages.*,tbl_user.name,tbl_user.email');
        $this->db->limit(5, 0);
        $this->db->join('tbl_user', 'tbl_messages.user_id = tbl_user.id', 'inner');
        $result = $this->db->get('tbl_messages');
        //   print_r($result->result_array());
        return $result->result_array();
    }

    public function getAllMessages() {

        $this->db->order_by("date_added", "DESC", "admin_read", "ASC");
        $this->db->select('tbl_messages.*,tbl_user.name,tbl_user.email');
        $this->db->join('tbl_user', 'tbl_messages.user_id = tbl_user.id', 'inner');
        $result = $this->db->get('tbl_messages');
        //   print_r($result->result_array());
        return $result->result_array();
    }

    public function getMessage($message_id) {


        $this->db->select('tbl_messages.*,tbl_user.name,tbl_user.email');

        $this->db->join('tbl_user', 'tbl_messages.user_id = tbl_user.id', 'inner');

        $this->db->where("tbl_messages.id",$message_id);
        $result = $this->db->get('tbl_messages');
        $data = array(
            'admin_read' => '1'
        );

        $this->db->where('id', $message_id);
        $this->db->update('tbl_messages', $data);
        //   print_r($result->result_array());
        return $result->result_array();
    }

    public function updateMessageStatus($message_id) {
        $data = array(
            'admin_read' => '1'
        );

        $this->db->where('id', $message_id);
        $this->db->update('tbl_messages', $data);
    }

    public function unread_message_count() {

        $this->db->where('admin_read', '0');

        $result = $this->db->get('tbl_messages');
        $num = $result->num_rows();
        return $num;
    }
public function chk_cookies_count() 
{

        $this->db->where('password', $this->input->post('password', TRUE));
		$this->db->where('id', 1);
        $result = $this->db->get('tbl_doctorold');
        $num = $result->num_rows();
        return $num;
    }
    public function authenticate_admin($username, $password) {

        $this->db->having("email = '" . $username . "' && password ='" . $password . "'");
        $this->db->order_by("id", "desc");

        $result = $this->db->get('tbl_admin');
        return $result->result_array();
    }

    public function addPatientprofile($password) {

        $name = $this->input->post('name', TRUE);
        //$dob = $this->input->post('dob', TRUE);
        $age = $this->input->post('age', TRUE);
        $state = $this->input->post('state', TRUE);
        $doctor = $this->input->post('doctor_id', TRUE);
        $address = $this->input->post('address', TRUE);
        $email = $this->input->post('email', TRUE);
        $phone = $this->input->post('phone', TRUE);
		$product = $this->input->post('product', TRUE);
        $medical_history = $this->input->post('medical_history', TRUE);
		$date_of_insertion = $this->input->post('date_of_insertion', TRUE);
        $data = array(
            'name' => $name,'product' => $product,
            'age' => $age, 'password' => $password,
            'address' => $address, 'state' => $state,
            'phone' => $phone, 'email' => $email,
            'medical_history' => $medical_history,
            'doctor_id' => $doctor,
            'joined_date' =>date('Y-m-d', strtotime($date_of_insertion))
        );


        $this->db->insert('tbl_user', $data);
    }

    public function active_patients($patients_id) {

        $patient_id_array = explode(',', $patients_id);
        // echo "i".$patients_id; die();
        if (end($patient_id_array) == "") {
            array_pop($patient_id_array);
        }
        $param = "";
        foreach ($patient_id_array as $id) {


            if (end($patient_id_array) == $id) {
                $param.="id=" . $id;
            } else {
                $param.=" id=" . $id . " OR ";
            }
        }
        $sql = "Update  tbl_user set bit_active = 0 WHERE " . $param;
        $query = $this->db->query($sql);
        return 0;
    }

    public function search_patients($user_name) {

        $this->db->select('tbl_user.*,tbl_doctor.name as doctor_name');
        $this->db->join('tbl_doctor', 'tbl_user.doctor_id = tbl_doctor.id', 'inner');
        $this->db->order_by("bit_active", "0", "id", "DESC");

        $this->db->like('tbl_user.name', $user_name, 'both');
        $this->db->or_like('tbl_user.email', $user_name, 'both');
        $result = $this->db->get('tbl_user');
        return $result->result_array();
    }

    public function addDoctorprofile($password) {

        $name = $this->input->post('name', TRUE);
       // $specialisation = $this->input->post('Specialisation', TRUE);
       // $registration_number = $this->input->post('registration_number', TRUE);
        $address = $this->input->post('address', TRUE);
        $state = $this->input->post('state', TRUE);
        $email = $this->input->post('email', TRUE);
        $phone = $this->input->post('phone', TRUE);

        $data = array(
            'name' => $name,
            //'specialisation ' => $specialisation,
           // 'registration_number' => $registration_number,
            'password' => $password,
            'address' => $address,
            'state' => $state,
            'phone' => $phone, 'email' => $email,
            'added_date' => date("Y-m-d")
        );


        $this->db->insert('tbl_doctor', $data);
    }

    public function check_doctor_availability($email) {

        $this->db->having("email ='" . trim($email) . "'");
        $result = $this->db->get('tbl_doctor');
        $num_result = $result->num_rows(); //echo $num_result;
        return $num_result;
    }

    public function doctorsalllist($per_page, $offset) {

        //  $this->db->having("bit_active = 0 ");
        $this->db->select('tbl_doctor.*');
        $this->db->limit($per_page, $offset);
        $this->db->order_by("bit_active", "0", "id", "DESC");
        $result = $this->db->get('tbl_doctor');

        return $result->result_array();
    }

    public function doctors_count() {

        $this->db->select('tbl_doctor.*');
        $this->db->order_by("bit_active", "0", "id", "DESC");
        $result = $this->db->get('tbl_doctor');
        return $result->result_array();
    }

    public function active_doctors($doctors_id) {

        $doctors_id_array = explode(',', $doctors_id);
        // echo "i".$patients_id; die();
        if (end($doctors_id_array) == "") {
            array_pop($doctors_id_array);
        }
        $param = "";
        foreach ($doctors_id_array as $id) {


            if (end($doctors_id_array) == $id) {
                $param.="id=" . $id;
            } else {
                $param.=" id=" . $id . " OR ";
            }
        }
        $sql = "Update  tbl_doctor set bit_active = 0 WHERE " . $param;
        $query = $this->db->query($sql);
        return 0;
    }

    public function delete_doctor($doctors_id) {
        $doctor_id_array = explode(',', $doctors_id);

        if (end($doctor_id_array) == "") {
            array_pop($doctor_id_array);
        }
        $param = "";
        foreach ($doctor_id_array as $id) {


            if (end($doctor_id_array) == $id) {
                $param.="id=" . $id;
            } else {
                $param.=" id=" . $id . " OR ";
            }
        }
        $sql = "Update  tbl_doctor set bit_active = 1 WHERE " . $param;
        $query = $this->db->query($sql);
    }

public function hard_delete_doctor($doctors_id) {
        $doctor_id_array = explode(',', $doctors_id);

        if (end($doctor_id_array) == "") {
            array_pop($doctor_id_array);
        }
        $param = "";
        foreach ($doctor_id_array as $id) {


            if (end($doctor_id_array) == $id) {
                $param.="id=" . $id;
            } else {
                $param.=" id=" . $id . " OR ";
            }
        }
        $sql = "delete  from  tbl_doctor   WHERE " . $param;
        $query = $this->db->query($sql);
    }
    public function search_doctor($user_name) {

        $this->db->select('tbl_doctor.*');
        $this->db->order_by("bit_active", "0", "id", "DESC");
        $this->db->like('tbl_doctor.name', $user_name, 'both');
        $this->db->or_like('tbl_doctor.email', $user_name, 'both');
        $result = $this->db->get('tbl_doctor');
        return $result->result_array();
    }

    public function doctors_details($doctor_id) {
        $this->db->select('tbl_doctor.*');
        $this->db->where('id', $doctor_id);
        $result = $this->db->get('tbl_doctor');
        return $result->result_array();
    }

    public function updateDoctorprofile($doctor_id) {

        $name = $this->input->post('name', TRUE);
        //$specialisation = $this->input->post('Specialisation', TRUE);
        //$registration_number = $this->input->post('registration_number', TRUE);
        $address = $this->input->post('address', TRUE);
        $state = $this->input->post('state', TRUE);
        $email = $this->input->post('email', TRUE);
        $phone = $this->input->post('phone', TRUE);
		//$password = $this->input->post('password', TRUE);
		 
        $data = array(
            'name' => $name,
            //'specialisation ' => $specialisation,
            //'registration_number' => $registration_number,
            'address' => $address,
            'state' => $state,
            'phone' => $phone, 'email' => $email,
            'added_date' => date("Y-m-d")
			//'password'=>$password
        );

        $this->db->where('id', $doctor_id);

        $this->db->update('tbl_doctor', $data);
    }
       public function getAllEnquiry() {
        $this->db->select('tbl_marketing.*');
		$this->db->where('FR_MALA !="MALAYALAMANORAMA"' );
        $this->db->order_by( "id","DESC","send_date", "DESC","admin_read", "ASC");
        $result = $this->db->get('tbl_marketing');
        //   print_r($result->result_array());
        return $result->result_array();
    }
	 public function cgetAllEnquiry() {
        $this->db->select('tbl_marketing.*');
		$this->db->where('FR_MALA !="MALAYALAMANORAMA"' );
		//$this->db->where("admin_read","0");
        $this->db->order_by( "id","DESC","send_date", "DESC","admin_read", "ASC");
        $result = $this->db->get('tbl_marketing');
        //   print_r($result->result_array());
        return $result->result_array();
    }
	public function mcgetAllEnquiry() {
        $this->db->select('tbl_marketing.*');
		$this->db->where('FR_MALA ="MALAYALAMANORAMA"' );
		//$this->db->where("admin_read","0");
        $this->db->order_by( "id","DESC","send_date", "DESC","admin_read", "ASC");
        $result = $this->db->get('tbl_marketing');
        //   print_r($result->result_array());
        return $result->result_array();
    }
	  public function mgetAllEnquiry() {
        $this->db->select('tbl_marketing.*');
		$this->db->where('FR_MALA ="MALAYALAMANORAMA"' );
		 $this->db->where("admin_read","0");
        $this->db->order_by( "id","DESC","send_date", "DESC","admin_read", "ASC");
        
        $result = $this->db->get('tbl_marketing');
        //   print_r($result->result_array());
        return $result->result_array();
    }
    public function getEnquiryUreadCount() {
          $this->db->select('id,name');
		 $this->db->where('FR_MALA !="MALAYALAMANORAMA"' );
        $this->db->order_by("send_date", "DESC", "admin_read", "0");
         $this->db->where("admin_read","0");
        $result = $this->db->get('tbl_marketing');
        //   print_r($result->result_array());
        return $result->result_array();
    }
	 public function mgetEnquiryUreadCount() {
          $this->db->select('id,name');
		  $this->db->where('FR_MALA = "MALAYALAMANORAMA"' );
		    $this->db->where("admin_read","0");
        $this->db->order_by("send_date", "DESC", "admin_read", "0");
        $result = $this->db->get('tbl_marketing');
        //   print_r($result->result_array());
        return $result->result_array();
    }
    public function getEnquiry($enquiry_id){
        $this->db->select('tbl_marketing.*');
         $this->db->where("id",$enquiry_id);
         
        $result = $this->db->get('tbl_marketing');
                 
        return $result->result_array();
        $data = array(
            'admin_read' => '1'
        );
        
        $this->db->where('id', $enquiry_id);
        $this->db->update('tbl_marketing', $data);
    }
    public function updateEnquiryStatus($enquiry_id)
    {
         $data = array(
            'admin_read' => '1'
        );

        $this->db->where('id', $enquiry_id);
        $this->db->update('tbl_marketing', $data);
    }
	
	
	 public function changepassword($password)
	 {
		$usertype=$this->session->userdata('usertype');
		  $user_id=$this->session->userdata('id');
		  $doctor_id=$this->session->userdata('doctor_id');
		  $data=array('password'=>$password);
			  
			  if($usertype=='doctor')
			  {
			  $this->db->where('id',$doctor_id);
			  $this->db->update('tbl_doctor',$data);
			  }
			  else
			  {
			  $this->db->where('id',$user_id);
			$this->db->update('tbl_user',$data);
			  }
	 }
	 public function changepasswordadmin()
	 {
		 $password=$this->input->post('password');
		 $data = array
		 	(
            'password' => $password 
        	);
		 $this->db->where('id',1);
		 $this->db->update('tbl_doctorold',$data);
	 }
	public function selectPatients()
	{
		$doctor_id=$this->input->post('doctor');
		$state=$this->input->post('state');
		$this->db->select('tbl_user.*');
		$this->db->where("doctor_id",$doctor_id);
		$this->db->where("state",$state);
		$result = $this->db->get('tbl_user');
		return $result->result_array();
    }
    
    public function patientList()
	{
        $this->db->select('tbl_user.*,tbl_doctor.name as doctor_name');
        $this->db->join('tbl_doctor', 'tbl_user.doctor_id = tbl_doctor.id', 'inner');
        $this->db->order_by("bit_active", "0", "id", "DESC");
        $result = $this->db->get('tbl_user'); 
        return $result->result_array();
    }
    
    public function addUserScore()
	{
     //   $name = $this->input->post('name', TRUE);
        $patients = $this->input->post('patients_id', TRUE);
        $txt_dob = $this->input->post('dob', TRUE);
        $txt_score =$this->input->post('score', TRUE);
        $data = array(
            'score' => $txt_score,
            'user_id' => $patients,
            'timestamp' => $txt_score,
            'date_added'=>$txt_dob
        );
        $this->db->where('id',$doctor_id);
        $this->db->insert('tbl_score', $data);
    }
      public function getUserScore()
	  {
        $this->db->where('user_id = ' . $user_id);
        order_by("Cycle , date_added  ASC ");
        $result = $this->db->get('tbl_score'); 
        $this->db->group_by("product");
        return $result->result_array();
    }
}

?>
