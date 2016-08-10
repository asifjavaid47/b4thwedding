<?php
class AdminDispute_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

    /**
    * Get category by his id
    * @param int $id 
    * @return array
    */
   
    function cancel_dispute()
    {	
		$this->db->select('*');
			$this->db->where("(dispute='1')");
		$query = $this->db->get('tbl_wr_cancelrefnddsputeproject');
		 if($query->num_rows > 0){
			 return $query->result_array();
			 }else
			 {
				return false;
			 }
    }
	
function cancel_dispute_detail($id)
{	
		$query = "SELECT
					tbl_project_posts.title,
					tbl_project_posts.description,
					tbl_wr_cancelrefnddsputeproject.senderID,
					tbl_wr_cancelrefnddsputeproject.receiverID,
					tbl_users.fName,
					tbl_users.lName,
					tbl_project_posts.hourlyRate,
					tbl_project_posts.fixedBudget,
					tbl_project_posts.hrsPerWeeks,
					tbl_project_posts.duration,
					tbl_wr_cancelrefnddsputeproject.cancelRefndDsputeEscrow,
					tbl_wr_cancelrefnddsputeproject.cancelReqBy,
					tbl_wr_cancelrefnddsputeproject.cancelRefndDsputeFreelancer,
					tbl_wr_cancelrefnddsputeproject.cancelRefndDsputeReasion,
					tbl_wr_cancelrefnddsputeproject.cancelRefndDsputeDate,
					tbl_wr_cancelrefnddsputeproject.cancelRefndDsputeDescribe,
					tbl_wr_cancelrefnddsputeproject.cancelRefndDsputeStatus,
					tbl_wr_cancelrefnddsputeproject.disputeByAdmin,
					tbl_wr_cancelrefnddsputeproject.doneDisputeTo,
					tbl_users.userName,
					tbl_users.email,
					tbl_users.hourlyRate,
					tbl_users.skills,
					tbl_proposal.userId as freelancer,
					tbl_proposal.billedToClient,
					tbl_project_posts.ID,
					tbl_project_posts.userID as client
					FROM
					tbl_wr_cancelrefnddsputeproject
					INNER JOIN tbl_project_posts ON tbl_project_posts.ID = tbl_wr_cancelrefnddsputeproject.projectID
					INNER JOIN tbl_users ON tbl_users.ID = tbl_wr_cancelrefnddsputeproject.senderID OR tbl_users.ID = tbl_wr_cancelrefnddsputeproject.receiverID
					INNER JOIN tbl_proposal ON tbl_project_posts.ID = tbl_proposal.projectId
					WHERE
					tbl_wr_cancelrefnddsputeproject.cancelRefndDsputeID='".$id."'
					";
		$res = $this->db->query($query);
		 if($res->num_rows > 0)
		 {
			 	$rows = $res->result_array();
						   				$data = array(
												"senderID"            => $rows[0]['senderID'],
												"receiverID"            => $rows[0]['receiverID'],	
												"clientID"            => $rows[0]['client'],
												"freelancerID"            => $rows[0]['freelancer'],
												"ID"         => $rows[0]['ID'],
												"title"         => $rows[0]['title'],
												"description"   => $rows[0]['description'],
												"duration"   	=> $rows[0]['duration'],
												"hourlyRate"   	=> $rows[0]['hourlyRate'],
												"hrsPerWeeks"   => $rows[0]['hrsPerWeeks'],
												"fixedBudget"   => $rows[0]['fixedBudget'],
												"billedToClient"   => $rows[0]['billedToClient'],
												"cancelRefndDsputeFreelancer"   => $rows[0]['cancelRefndDsputeFreelancer'],
												"cancelRefndDsputeReasion"   => $rows[0]['cancelRefndDsputeReasion'],
												"cancelRefndDsputeStatus"   => $rows[0]['cancelRefndDsputeStatus'],
												"disputeByAdmin"   => $rows[0]['disputeByAdmin'],
												"doneDisputeTo"   => $rows[0]['doneDisputeTo'],
												"cancelRefndDsputeDescribe"   => $rows[0]['cancelRefndDsputeDescribe'],
												"cancelRefndDsputeDate"   => $rows[0]['cancelRefndDsputeDate'],
												"getclientDetail"  => $this->getUserDetail($rows[0]['client']),
												"getFreelancerDetail"  => $this->getUserDetail($rows[0]['freelancer']),
												"getDisputeFilesclient"  => $this->getDisputeFiles($rows[0]['ID'] , $rows[0]['client']),
												"getDisputeFilesfreelancer"  => $this->getDisputeFiles($rows[0]['ID'] , $rows[0]['freelancer'])
																														
											); 				                
										 
										$jobdata[] = $data; 
								
					
					return $jobdata;
		 }
		 else
		 {
			return false;
		 }
	}
   
   public function getDisputeFiles($projectID , $userID){
	$this->db->select('*');
	$this->db->from('tbl_wr_disputefiles');
		$this->db->where("(projectID='$projectID' AND receiverID='$userID' OR receiverID='$userID')");
	$query = $this->db->get();
	
	 if($query->num_rows > 0)
		 {
		 $rows = $query->result_array();
	$data = array(
				"disputeFilesID"      => $rows[0]['disputeFilesID'],								
				"disputeFilesName"      => $rows[0]['disputeFilesName'],								
				"disputeFilesDescription"      => $rows[0]['disputeFilesDescription'],								
				"disputeFilesimagePath"      => $rows[0]['disputeFilesimagePath'],						
				"userName" => $rows[0]['userName']						
			); 
	return $data; 

	}
	else 
	{
		return false;
	}
}
   public function getUserDetail($userID){
		$where = array(
            'ID = ' => $userID
        );	
	$this->db->select('*');
	$this->db->from('tbl_users');
	$this->db->where($where);
	$query = $this->db->get();
	$rows = $query->result_array();
	$data = array(
				"ID"      => $rows[0]['ID'],								
				"fName"      => $rows[0]['fName'],								
				"lName"      => $rows[0]['lName'],								
				"email"      => $rows[0]['email'],						
				"userName" => $rows[0]['userName'],							
				"hourlyRate" => $rows[0]['hourlyRate'],							
				"userType" => $rows[0]['userType'],							
			); 
	return $data; 

}

   
function approvalByAdmin($userID,$projectID)
{

	$this->db->select('email');
				$this->db->from('tbl_users'); 
				$this->db->where('ID',$userID);
				$query = $this->db->get();
				$row = $query->result_array();
				$email = $row[0]['email'];
			
					$this->load->library('email');
					$this->email->from('b4thewedding@gmail.com', 'cancel  Approval');
					$this->email->to($email);
					$this->email->subject('cancel  Approval');
					$message = "<table width='850' border='0' cellspacing='0' cellpadding='0' style='background:#eee';>
							  <tr>
								<td style='padding:20px;'>
								<table width='630' border='0' cellspacing='0' cellpadding='0' align='center'>
							  
							  <tr>
								<td align=left style='background:#fff; padding:20px; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:25px;'><h3>Hi ".$this->input->post('fName')." ".$this->input->post('lName').", </h3>
								  <p><strong>Welcome to b4thewedding.com !</strong> <br />
								 
							</p>
								 
							</td>
							  </tr>
							  
							  <tr>
								<td>&nbsp;</td>
							  </tr>
							</table>";
					$this->email->message($message);				
					$this->email->send();
		$senderID =$this->session->userdata('userID');  
	// print_r($projectID);
	// exit;
	$this->db->select('cancelRefndDsputeFreelancer');
	$this->db->where("(projectID='$projectID')");
	$query = $this->db->get('tbl_wr_cancelrefnddsputeproject');
	$msgTypes = 'cancelProjectApproval refund return';
	
		// $notification_data = array(
			// 'projectID' 	=> $projectID,
			// 'senderID' 		=> $senderID,			
			// 'receiverID' 	=> $receiverID,
			// 'msgTypes' 		=> $msgTypes,					
			// 'message' 		=> "Cancel Project"	,
			// 'sendDate'		=> date("Y-m-d H:i:s")			
	// );
	if ($query->num_rows() > 0)
	{
		$row = $query->result_array();
		$amount = $row[0]['cancelRefndDsputeFreelancer'];
			$this->db->where("(projectID='$projectID' AND disputeByAdmin='0')");
            $this->db->set('disputeByAdmin', '1');
            $this->db->set('doneDisputeTo', $userID);
           $updatQuery = $this->db->update('tbl_wr_cancelrefnddsputeproject');
			
			// $this->db->where("(ID='$projectID')");
            // $this->db->set('cancelProject', '1');
            // $this->db->update('tbl_project_posts');
			if($updatQuery) {
				$this->db->where(array("userID" => $userID));
				$this->db->set('amount', 'amount+'.$amount, FALSE);
				$this->db->update('tbl_balance');
				return true;	
			}
		
// $this->db->insert('tbl_notification', $notification_data);
	}
	else {
		return false;
	}
}
	
	
	function delete_user($id){
		$data = array(
						'ID' => $id
					 );
		$this->db->where($data);
		$this->db->delete('tbl_users'); 
	}
 
}
?>