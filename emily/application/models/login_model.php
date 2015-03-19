<?php

/* class Search
 *
 *SELECT SUM( score )
FROM `tbl_score`
WHERE date_added
BETWEEN DATE_ADD( NOW( ) , INTERVAL -1
MONTH )
AND NOW( )
GROUP BY MONTH( date_added )
 *
 */

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function users_visits($ip_address){
        
        $currentdate = date("Y-m-d");
         switch ($this->session->userdata('usertype'))
            {
               case 'patient':
               
        return $this->session->userdata('id');
                
                   break;
               case 'doctor':
                   return $this->session->userdata('doctor_id');
            }
    }
 
    public function authenticate_patient($username, $password) {
        
        $this->db->having("email = '" . $username . "' && password ='" . $password . "' && bit_active=0");
        $this->db->order_by("id", "desc");
        $this->db->limit(1, 0);
        $result = $this->db->get('tbl_user');
        return $result->result_array();
    }

    public function authenticate_doctor($username, $password) {
       
        $this->db->having("email = '" . $username . "' && password ='" . $password . "' && bit_active=0");
        $this->db->order_by("id", "desc");
        $this->db->limit(1, 0);
        $result = $this->db->get('tbl_doctor');
        return $result->result_array();
    }

    public function patient_profile($user_id) {
       
        $this->db->having('id =' . $user_id);
        $result = $this->db->get('tbl_user');
        return $result->result_array();
    }

    public function patients_list($doc_id, $per_page, $offset) {

        $this->db->having("bit_active = 0 && doctor_id ='" . $doc_id . "'");
        $this->db->limit($per_page, $offset);
        $this->db->order_by("id", "ASC");
        $result = $this->db->get('tbl_user');
        return $result->result_array();
    }

    public function delete_patient($patient_id) {
       
        $data = array(
            'bit_active' => 1,
        );

        $this->db->where('id', $patient_id);
        $this->db->update('tbl_user', $data);
    }

    function sortPatients($key, $order1) {
       
        if ($order1 == "up") {
            $order = "ASC";
        } else {
            $order = "DESC";
        }
        $doc_id = $this->session->userdata('doctor_id');
        $key == "id" ? $this->db->order_by("id", $order) : '';
        $key == "name" ? $this->db->order_by("name", $order) : '';
        $key == "age" ? $this->db->order_by("age", $order) : '';
        $key == "place" ? $this->db->order_by("place", $order) : '';
        $this->db->having("bit_active = 0 && doctor_id ='" . $doc_id . "'");

        $this->db->select('tbl_user.*', FALSE);
        $this->db->limit(5, 0);
        $result = $this->db->get('tbl_user'); //print_r($result->result_array());
        return $result->result_array();
    }

    public function check_user_availability($email) {
        
        $this->db->having("email ='" . trim($email) . "'");
        $result = $this->db->get('tbl_user');
        $num_result = $result->num_rows(); //echo $num_result;
        return $num_result;
    }

    public function forgot_passsword($email) {
      
        $this->db->where("email = '" . trim($email) . "'");
        $this->db->select('tbl_user.password,tbl_user.name', FALSE);
        $result = $this->db->get('tbl_user'); //echo $this->db->last_query();
        return $result->result_array();
        
    }

    public function doctor_details($user_id) {
        
        $this->db->select('tbl_user.doctor_id,tbl_doctor.*');
        $this->db->from('tbl_user');
        $this->db->where("tbl_user.id = '" . trim($user_id) . "'");
        $this->db->join('tbl_doctor', 'tbl_user.doctor_id = tbl_doctor.id');
        $result = $this->db->get();
        return $result->result_array();
        
    }

    public function patients_list_count($doc_id) {

        $this->db->having("bit_active = 0 && doctor_id ='" . $doc_id . "'");
        $this->db->order_by("id", "ASC");
        $result = $this->db->get('tbl_user');
        return $result->result_array();
    }

    
    public function add_doctorquery(){
        
         $description=$this->input->post('desc',TRUE);
         $description=  mysql_escape_string(str_replace("'"," ",$description));
             $user_id=$this->session->userdata('id',TRUE);
         $username=$this->session->userdata('username',TRUE);
         $doctor_details=$this->doctor_details($user_id);
         $data = array(
                      'message' => $description, 'user_id' =>$user_id , 'user_name' => $username,
            'doctor_id' => $doctor_details[0]['doctor_id'],'date_added'=>date("Y-m-d H:i:s"),'superadmin_read'=>0
        );
        $this->db->insert('tbl_messages', $data);
         
    }
    
}

?>