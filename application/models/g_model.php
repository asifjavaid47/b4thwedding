<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
	 /***********************************
	 * @author Asif Mahmood 
	   <asifmahmooduos@gmail.com>
	 ************************************/
	 
	
class G_model extends CI_Model {

    private $tableName = 'tbl_users';

    public function __construct() {
        parent::__construct();
    }   
	
	// give the user id of specified eamil address
	public function getgUserId($email){
        $where = array(
            'email' => $email
        );
		
		$this->db->select('gUserId');
		$this->db->from($this->tableName);
        $this->db->where($where);
		$query = $this->db->get();
		
        if ($query->num_rows() > '0') {
			$getgUserId = $query->result();
			
			foreach($getgUserId as $gUserId){
					
				}
				
            return $gUserId->gUserId;  //email exist
        } else {
            return false; //email not exist
        }
    }	
	
	public function isAlreadyEmail($email){
        $where = array(
            'email' => $email
        );
        $this->db->select('email');
		$this->db->from($this->tableName);
        $this->db->where($where);
		$query = $this->db->get();
        if ($query->num_rows() > '0') {
            $liUserEmail = $query->result_array();			
			
            return $liUserEmail[0]['email'];
        } else {
            return false; //email not exist
        }
    }	
	
	public function getUserId($email){
        $where = array(
            'email' => $email
        );
        $this->db->select('ID');
		$this->db->from($this->tableName);
        $this->db->where($where);
		$query = $this->db->get();
		
        if ($query->num_rows() > '0') {
			$getUserID = $query->result();
			
			foreach($getUserID as $userID){
					
				}
				
            return $userID->ID;  //user id exist
        } else {
            return false; //user id does not exist
        }
    }
	
	public function getCountries(){
		 $query = $this->db->get('country');
			if ($query->num_rows() > '0') {
				return $query->result();  //countries exist
			} else {
				return false; //countries does not exist
			}
	 }		 
	 
	public function getSetting(){	
	
		 $this->db->select('*');
		 $this->db->from('settings');
		 $query = $this->db->get();
		
		 if ($query->num_rows() > '0') {		 
			 return $query->result_array();	
		 } else {
			 return false;
		 }	 
	 }
	 
	public function create_user(){
		$this->db->where('userName', $this->input->post('userName'));
		$query = $this->db->get('tbl_users');

		if($query->num_rows > 0){
			echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>';
			  echo "Username already taken";	
			echo '</strong></div>';
		}else{
			
			$data = array(
				'fName' 	  => $this->input->post('fName'),			
				'gUserId'     => $this->session->userdata('ssgUserId'),
				'image' 	  => $this->session->userdata('ssgImage'),
				'lName' 	  => $this->input->post('lName'),
				'email' 	  => $this->input->post('email'),			
				'userName' 	  => $this->input->post('userName'),				
				'userType' 	  => 'Freelancer',
				'createdDate' => date('Y-m-d')					
			);
			 $this->db->insert('tbl_users', $data);
			return $this->db->insert_id();
		}
			  
		}//create_member
	
 
}
