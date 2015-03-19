<?php

/* class Search
 *
 *
 *
 */

class Bleeding_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

   /* public function Addscore($score,$user_id1,$product) {
       $currenttimestamp = time();
        $currentdate = date("Y-m-d");
        $user_id =$user_id1; //$this->session->userdata('id');
		
        $data = array(
            'id' => '',
            'score' => $score,
			'product'=> $product,
			'date_added' => $currentdate, 
			'timestamp' => $currenttimestamp,
            'user_id' => $user_id
        );
		
		
			$score=array('score' => $score);
			$d = date_parse_from_format("Y-m-d",  $currentdate);
			$query = $this->db->query('select count(*) count from tbl_score where user_id='.$user_id.' and month(date_added)='.$d["month"].' and year(date_added)='.$d["year"] );
			$objCount = $query->result_array();
			 if ($objCount[0]['count']==1)
			 {
				$sel_cycle=$this->input->post('sel_cycle', TRUE);
				 if ($sel_cycle!=0)
				 {
					$array = array('id =' => $sel_cycle); 
					$this->db->where($array);
					$this->db->update('tbl_score',$score );
					return "UU";
				 }
				 else
				 {
					$array = array('user_id =' => $user_id, 'month(date_added) =' => $d["month"]);
					$this->db->where($array);
					$this->db->update('tbl_score',$score );
					return "U" ;
				 }
			}
			else
			{
			 $this->db->insert('tbl_score', $data);
			return $user_id ;
			} 
    }*/
 public function Addscore($score,$user_id1,$product) {
        $currenttimestamp = time();
        $currentdate = date("Y-m-d");
        $user_id =$user_id1; //$this->session->userdata('id');
		$Cycle=$this->input->post('Cycle', TRUE);
        $data = array(
				'score' => $score,
				'product'=> $product,
				'date_added' => $currentdate, 
				'timestamp' => $currenttimestamp,
				'user_id' => $user_id,
				'Cycle'=>$Cycle
        );
			//$score=array('score1' => $score);
			$d = date_parse_from_format("Y-m-d",  $currentdate);
			$query = $this->db->query('select count(Cycle) count from tbl_score where  Cycle= "'.$Cycle.'" and user_id='.$user_id. ' and year(date_added)='.$d["year"]  );
			$objCount = $query->result_array();
			try
			{
				$this->db->trans_begin();
				if ($objCount[0]['count']==1)
				 {
					
						//$array = array("user_id="=>$user_id, "Cycle=" => $Cycle); 
						//$this->db->where($array);
						$this->db->set('score',$score);
						$this->db->where('user_id = ' . $user_id);
						$this->db->where('Cycle = "' . $Cycle .'"');
						$this->db->update('tbl_score');
						if (empty($this->db->_error_message()))
						{
							return "UU";
						}
						else
						{
							return($this->db->_error_message());
						}
				}
				else 
				{
						$this->db->insert('tbl_score', $data);
						return $this->db->insert_id() ;
				} 
				$this->db->trans_complete();
				
				if ($this->db->trans_status()===false)
				{
					return "Database Error!!";
				}
			}
		catch(Exception $ex)
			{
				$var =$e->getMessage();
				return  $var;
			}
		finally
			{
			
			}
    }
    public function lastScoredMonth($user_id) {
        $this->db->having('user_id = ' . $user_id);
       // $this->db->order_by("id", "desc");
	   $this->db->order_by("Cycle , date_added ASC ");
        $this->db->limit(1, 0);
        $result = $this->db->get('tbl_score'); //echo $this->db->last_query();
        return $result->result_array();
    }
public function cycle_count($user_id) 
	{
		$this->db->where('user_id = ' . $user_id);
		$this->db->select("id");
		$result = $this->db->get('tbl_score');
		return $result->result_array();
	}
    public function lastscore($user_id) {
        $sql = "  SELECT *
FROM tbl_score
WHERE YEAR( date_added ) = YEAR( CURDATE( ) )
AND MONTH( date_added ) = MONTH( CURDATE( ) ) And user_id='" . $user_id . "' order by id desc limit 0,1";
        $result = $this->db->query($sql); //echo $this->db->la$user_idst_query();
        return $result->result_array();
    }

    public function allScore($user_id) {
		
		$sql = "SELECT  * FROM tbl_score WHERE  user_id=". $user_id ."  ORDER BY CONVERT (SUBSTR(`Cycle`,6,LENGTH(`Cycle`)) ,UNSIGNED INTEGER) ASC";
		
       // $this->db->where('user_id = ' . $user_id);
        //$this->db->order_by("id", "asc");
		//$this->db->order_by("Cycle  ASC ");
        $result = $this->db->query($sql); 
        return $result->result_array();
    }

    public function addProfile($password, $doctor) {
        $subj_id = $this->input->post('subj_id', TRUE);
        $name = $this->input->post('name', TRUE);
        $dob = $this->input->post('dob', TRUE);
        $age = $this->input->post('age', TRUE);
        $state= $this->input->post('state', TRUE);
        $address = $this->input->post('address', TRUE);
        $email = $this->input->post('email', TRUE);
        $phone = $this->input->post('phone', TRUE);
        $medical_history = $this->input->post('medical_history', TRUE);
		$product = $this->input->post('product', TRUE);
        $data = array(
            'name' => $name,
            'dob' =>  date("Y-m-d") , 'age' => $age,
            'address' => $address,'state' => $state,
            'phone' => $phone, 'email' => $email,
            'username' => $name,
            'password' => $password,
            'medical_history' => $medical_history,
            'doctor_id' => $doctor,
			'product' => $product,
            'joined_date' =>date('Y-m-d', strtotime($dob))
        );

        $this->db->insert('tbl_user', $data);
    }
    public function marketing_enquiry(){
        $name = $this->input->post('name', TRUE);
        
        $age = $this->input->post('age', TRUE);
        $state= $this->input->post('state', TRUE);
        $address = $this->input->post('address', TRUE);
        $email = $this->input->post('email', TRUE);
        $phone = $this->input->post('phone', TRUE);
        $symptoms = $this->input->post('symptoms', TRUE);
		$type= $this->input->post('type', TRUE);
		$FR_MALA=$this->input->post('FR_MALA', TRUE);
        $data = array(
            'name' => $name,
            'age' => $age,
            'address' => $address,
            'state' => $state,
            'phone' => $phone,
            'email' => $email,
            'symptoms' => $symptoms,
            'send_date' => date("Y-m-d"),
			'type'=>$type,
			'FR_MALA'=>$FR_MALA
        );
        $this->db->insert('tbl_marketing', $data);

    }
   

}

?>