<?php
class WorkRoom_model extends CI_Model {

public function sendMessage($projectID,$receiverID,$message)
{  
	$sender_id =$this->session->userdata('userID');  
	$msgTypes = 'message'; 
	$data = array(
		'projectID' 	=> $projectID,
		'senderID' 		=> $sender_id,			
		'receiverID' 	=> $receiverID,
		'msgTypes' 		=> $msgTypes,					
		'message' 		=> $message	,
		'sendDate'		=> date("Y-m-d H:i:s")			
	);
	//$this->db->insert('tbl_notification', $data);
	$insert = $this->db->insert('tbl_private_messages', $data);
	$insert_id = $this->db->insert_id();
	 
	return $insert_id;
}

/* vv */
public function checkExitDispute($projectID ,$receiverID)
{
	$senderID =$this->session->userdata('userID');  
	$this->db->select('*');
	$this->db->where("(projectID='$projectID' AND receiverID='$receiverID' OR receiverID='$senderID')");
	$query = $this->db->get('tbl_wr_cancelrefnddsputeproject');

	if ($query->num_rows() > 0)
	{
		return true;	
	}
	else
	{
		return false;
		
	}

}
public function checkApproval($projectID){
		$where = array(
            'projectID = ' => $projectID
        );	
	$this->db->select('disputeFilesimagePath,cancelRefndDsputeDescribe,cancelReqBy,approval,dispute,disputeTwo');
	$this->db->from('tbl_wr_cancelrefnddsputeproject');
	$this->db->where($where);
	$query = $this->db->get();
	$rows = $query->result_array();
			$data = array(
						"cancelRefndDsputeDescribe"            => $rows[0]['cancelRefndDsputeDescribe'],								
						"disputeFilesimagePath"            => $rows[0]['disputeFilesimagePath'],								
						"cancelReqBy"            => $rows[0]['cancelReqBy'],								
						"approval"            => $rows[0]['approval'],								
						"dispute"            => $rows[0]['dispute'],						
						"disputeTwo"            => $rows[0]['disputeTwo']							
					); 
	return $data; 

}


public function getProject($projectID){
		$where = array(
            'ID = ' => $projectID
        );		
		$this->db->select();
		$this->db->from('tbl_project_posts');
		$this->db->where($where);
		$query = $this->db->get();
		
        if ($query->num_rows() > 0)
						{
							$rows = $query->result_array();
						   				$data = array(
												"ID"            => $rows[0]['ID'],
												"title"         => $rows[0]['title'],
												"description"   => $rows[0]['description'],
												"postDate"   	=> $rows[0]['postDate'],
												"duration"   	=> $rows[0]['duration'],
												"hourlyRate"   	=> $rows[0]['hourlyRate'],
												"hrsPerWeeks"   => $rows[0]['hrsPerWeeks'],
												"attachFiles"   => $rows[0]['attachFiles'],
												"skills"   		=> $rows[0]['skills'],
												"workType"   	=> $rows[0]['workType'],
												"fixedBudget"   => $rows[0]['fixedBudget'],
												"mainCategoryId"  => $rows[0]['mainCategoryId'],
												"checkApproval"  => $this->checkApproval($rows[0]['ID'])
												
																				
											); 				                
										 
										$jobdata[] = $data; 
								
					
					return $jobdata;
						}
		
	}
	
public function cancelProjectApproval($projectID ,$receiverID)
{  
	$projectTitle = $this->input->post('projectTitle');

	$senderID =$this->session->userdata('userID');  
	
	$this->db->select('cancelRefndDsputeFreelancer,cancelRefndDsputeReasion,cancelRefndDsputeDescribe,cancelRefndDsputeStatus');
	$this->db->where("(projectID='$projectID')");
	$query = $this->db->get('tbl_wr_cancelrefnddsputeproject');
	$row = $query->result_array();
	$amount = $row[0]['cancelRefndDsputeFreelancer'];
	$cancelRefndDsputeReasion = $row[0]['cancelRefndDsputeReasion'];
	$cancelRefndDsputeDescribe = $row[0]['cancelRefndDsputeDescribe'];
	$cancelRefndDsputeStatus = $row[0]['cancelRefndDsputeStatus'];
		
		
				$this->db->select('email');
				$this->db->from('tbl_users'); 
				$this->db->where('ID',$receiverID);
				$query = $this->db->get();
				$rows = $query->result_array();
				$email = $rows[0]['email'];
			
					$this->load->library('email');
			$this->email->from('b4thewedding@gmail.com', $cancelRefndDsputeStatus.' Request Approval and also refund return');
					$this->email->to($email);
					$this->email->subject($cancelRefndDsputeStatus.'Request Approval');
					$message = "<table width='850' border='0' cellspacing='0' cellpadding='0' style='background:#eee';>
							  <tr>
								<td style='padding:20px;'>
								<table width='630' border='0' cellspacing='0' cellpadding='0' align='center'>
							  
							  <tr>
							<td align=left style='background:#fff; padding:20px; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:25px;'>
							<h3>Project Title</h3>
							<p><strong>".$projectTitle."</strong> <br /></p>
							<h3>Reason</h3>
							<p><strong>".$cancelRefndDsputeReasion."</strong> <br /></p>
							<h3>Describe</h3>
							<p><strong>".$cancelRefndDsputeDescribe."</strong> <br /></p>
								 
							</td>
							  </tr>
							  
							  <tr>
								<td>&nbsp;</td>
							  </tr>
							</table>";
					$this->email->message($message);				
					$this->email->send();
	
		$notification_data = array(
			'projectID' 	=> $projectID,
			'senderID' 		=> $senderID,			
			'receiverID' 	=> $receiverID,
			'msgTypes' 		=> 'canceldisputerefund',					
			'message' 		=> "Request Approval and also refund return"	,
			'sendDate'		=> date("Y-m-d H:i:s")			
	);

		
			$this->db->where("(projectID='$projectID' AND approval='0')");
            $this->db->set('approval', '1');
            $this->db->update('tbl_wr_cancelrefnddsputeproject');
			
			$this->db->where("(ID='$projectID')");
            $this->db->set('cancelProject', '1');
            $this->db->update('tbl_project_posts');
			
			$this->db->where(array("userID" => $receiverID));
			$this->db->set('amount', 'amount+'.$amount, FALSE);
            $this->db->update('tbl_balance');
			

		$this->db->insert('tbl_notification', $notification_data);


}
	
/* vv */


public function cancelProjectStepFinal($projectID ,$receiverID ,$data)
{  

	$this->db->select('email');
				$this->db->from('tbl_users'); 
				// $this->db->join('tbl_users_skills', 'tbl_users_skills.userID=tbl_users.ID');
				$this->db->where('ID',$receiverID);
				$query = $this->db->get();
				$row = $query->result_array();
				$email = $row[0]['email'];
	
			$this->load->library('email');
					$this->email->from('b4thewedding@gmail.com', $this->input->post('cancelRefndDsputeStatus').' Request');
					$this->email->to($email);
					$this->email->subject($this->input->post('cancelRefndDsputeStatus').'Request');
					$message = "<table width='850' border='0' cellspacing='0' cellpadding='0' style='background:#eee';>
							  <tr>
								<td style='padding:20px;'>
								<table width='630' border='0' cellspacing='0' cellpadding='0' align='center'>
							  
							  <tr>
							<td align=left style='background:#fff; padding:20px; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:25px;'>
							<h3>Project Title</h3>
							<p><strong>".$this->input->post('projectTitle')."</strong> <br /></p>
							<h3>Reason</h3>
							<p><strong>".$this->input->post('cancelRefndDsputeReasion')."</strong> <br /></p>
							<h3>Describe</h3>
							<p><strong>".$this->input->post('cancelRefndDsputeDescribe')."</strong> <br /></p>
								 
							</td>
							  </tr>
							  
							  <tr>
								<td>&nbsp;</td>
							  </tr>
							</table>";
					$this->email->message($message);				
					$this->email->send();
		
$senderID =$this->session->userdata('userID');  

	
	$notification_data = array(
			'projectID' 	=> $projectID,
			'senderID' 		=> $senderID,			
			'receiverID' 	=> $receiverID,
			'msgTypes' 		=> 'canceldisputerefund',					
			'message' 		=> $this->input->post('cancelRefndDsputeStatus')." Request"	,
			'sendDate'		=> date("Y-m-d H:i:s")			
	);
	
	$this->db->select('projectID,receiverID');
	// $this->db->where("(projectID='$projectID' AND senderID='$senderID' OR projectID='$projectID' AND receiverID='$senderID')");
	$this->db->where("(projectID='$projectID' AND receiverID='$receiverID')");
	$query = $this->db->get('tbl_wr_cancelrefnddsputeproject');
	
	
	if ($query->num_rows() > 0)
	{
		return false;
	
			
	}
	else
	{
		
		$this->db->insert('tbl_notification', $notification_data);
		$insert = $this->db->insert('tbl_wr_cancelrefnddsputeproject', $data);
		if($insert)
		{	
			return true;
		}
		else
		{
			return false;
		}
	}

}

public function disputeapprovalOk($projectID)
{  

$senderID =$this->session->userdata('userID');  


	$this->db->select('dispute');
	$this->db->where("(projectID='$projectID')");
	$query = $this->db->get('tbl_wr_cancelrefnddsputeproject');
	
	
	if ($query->num_rows() > 0)
	{
		$row = $query->result_array();
		$dispute = $row[0]['dispute'];
		return $dispute;
	}
	else {
		return false;
	}

}
public function approvalOk($projectID)
{  

	$senderID =$this->session->userdata('userID');  


	$this->db->select('approval');
	$this->db->where("(projectID='$projectID')");
	$query = $this->db->get('tbl_wr_cancelrefnddsputeproject');
	
	
	if ($query->num_rows() > 0)
	{
		$row = $query->result_array();
		$approval = $row[0]['approval'];
		return $approval;
	}
	else {
		return false;
	}

}

public function cancellationReasonList()
{ 

	$this->db->select();
	$query = $this->db->get('tbl_cancel_reason');
	
	return $query->result_array();

}
public function disputeShow($projectID ,$receiverID)
{ 
	$senderID =$this->session->userdata('userID');  
	$this->db->select('disputeFilesName,disputeFilesDescription,disputeFilesimagePath,userName');
	$this->db->where("(projectID='$projectID')");
	$query = $this->db->get('tbl_wr_disputefiles');
	
	return $query->result_array();

}

public function disputeProjectApproval($insert_data,$projectID,$receiverID)
{  
	$disputeTwo	=  $this->input->post('disputeTwo');
	$projectTitle	=  $this->input->post('projectTitle');

	if(empty($disputeTwo))
	{
	$disputeTwo	= '0';
	}

	$senderID =$this->session->userdata('userID');  

			$this->db->select('cancelRefndDsputeFreelancer,cancelRefndDsputeReasion,cancelRefndDsputeDescribe,cancelRefndDsputeStatus');
	$this->db->where("(projectID='$projectID')");
	$query = $this->db->get('tbl_wr_cancelrefnddsputeproject');
	$row = $query->result_array();
	$amount = $row[0]['cancelRefndDsputeFreelancer'];
	$cancelRefndDsputeReasion = $row[0]['cancelRefndDsputeReasion'];
	$cancelRefndDsputeDescribe = $row[0]['cancelRefndDsputeDescribe'];
	$cancelRefndDsputeStatus = $row[0]['cancelRefndDsputeStatus'];
		
		
				$this->db->select('email');
				$this->db->from('tbl_users'); 
				$this->db->where('ID',$receiverID);
				$query = $this->db->get();
				$rows = $query->result_array();
				$email = $rows[0]['email'];
			
					$this->load->library('email');
			$this->email->from('b4thewedding@gmail.com', $cancelRefndDsputeStatus.' Request');
					$this->email->to($email);
					$this->email->subject($cancelRefndDsputeStatus.'Request ');
					$message = "<table width='850' border='0' cellspacing='0' cellpadding='0' style='background:#eee';>
							  <tr>
								<td style='padding:20px;'>
								<table width='630' border='0' cellspacing='0' cellpadding='0' align='center'>
							  
							  <tr>
							<td align=left style='background:#fff; padding:20px; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:25px;'>
							<h3>Project Title</h3>
							<p><strong>".$projectTitle."</strong> <br /></p>
							<h3>Reason</h3>
							<p><strong>".$cancelRefndDsputeReasion."</strong> <br /></p>
							<h3>Describe</h3>
							<p><strong>".$cancelRefndDsputeDescribe."</strong> <br /></p>
								 
							</td>
							  </tr>
							  
							  <tr>
								<td>&nbsp;</td>
							  </tr>
							</table>";
					$this->email->message($message);				
					$this->email->send();
					/* email to admin */
					
					$this->email->from('b4thewedding@gmail.com', $cancelRefndDsputeStatus.' Request');
					$this->email->to('b4thewedding@gmail.com');
					$this->email->subject($cancelRefndDsputeStatus.'Request ');
					$message = "<table width='850' border='0' cellspacing='0' cellpadding='0' style='background:#eee';>
							  <tr>
								<td style='padding:20px;'>
								<table width='630' border='0' cellspacing='0' cellpadding='0' align='center'>
							  
							  <tr>
							<td align=left style='background:#fff; padding:20px; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:25px;'>
							<h3>Project Title</h3>
							<p><strong>".$projectTitle."</strong> <br /></p>
							<h3>Reason</h3>
							<p><strong>".$cancelRefndDsputeReasion."</strong> <br /></p>
							<h3>Describe</h3>
							<p><strong>".$cancelRefndDsputeDescribe."</strong> <br /></p>
								 
							</td>
							  </tr>
							  
							  <tr>
								<td>&nbsp;</td>
							  </tr>
							</table>";
					$this->email->message($message);				
					$this->email->send();
					/* email to admin */
					
				$notification_data = array(
						'projectID' 	=> $projectID,
						'senderID' 		=> $senderID,			
						'receiverID' 	=> $receiverID,
						'msgTypes' 		=> 'canceldisputerefund',					
						'message' 		=> "dispute files"	,
						'sendDate'		=> date("Y-m-d H:i:s")			
				);
	
			$this->db->insert('tbl_notification', $notification_data);

			$insert = $this->db->insert('tbl_wr_disputeFiles', $insert_data);
			$this->db->where("(projectID='$projectID')");
            $this->db->set('dispute', '1');
			 $this->db->set('disputeTwo',$disputeTwo);
            $this->db->update('tbl_wr_cancelrefnddsputeproject');
			
			$this->db->where("(ID='$projectID')");
            $this->db->set('disputeProject', '1');
            $this->db->update('tbl_project_posts');

}


public function getMessage($projectID)
{  
	$where = array(
	'projectID' => $projectID
	);  
	$userID =$this->session->userdata('userID');  
	$this->db->select('tbl_private_messages.*,tbl_users.fName,tbl_users.userName,tbl_users.image');
	$this->db->from('tbl_private_messages');
	$this->db->join('tbl_users', ' tbl_users.ID=tbl_private_messages.senderID');
	$this->db->where("(tbl_private_messages.senderID='".$userID."' OR tbl_private_messages.receiverID='".$userID."')", NULL, FALSE);
	$this->db->where($where);
	$this->db->order_by('tbl_private_messages.msgID','DESC');
	$query = $this->db->get();
	return $query->result();
	
}

public function getProjectDetailPrice($projectID){
					$query = "SELECT
tbl_proposal.billedToClient,
tbl_project_posts.title,
tbl_project_posts.description
FROM
tbl_project_posts
INNER JOIN tbl_proposal ON tbl_project_posts.ID = tbl_proposal.projectId
								Where tbl_project_posts.ID =$projectID";
						$query = $this->db->query($query);

						if ($query->num_rows() > 0)
						{
							$rows = $query->result_array();
						   				$data = array(
												"title"         => $rows[0]['title'],
												"description"   => $rows[0]['description'],
												"billedToClient"   	=> $rows[0]['billedToClient']											

											); 				                
										 
										$jobdata[] = $data; 
								
						}
					return $jobdata;
		
    }

public function getProjectDetail($ID){
					$query = "SELECT tbl_project_posts.ID,tbl_project_posts.title,tbl_project_posts.description,tbl_project_posts.postDate,tbl_project_posts.duration,tbl_project_posts.cancelProject,tbl_project_posts.clientFinishProject,tbl_project_posts.userID,tbl_project_posts.skills,tbl_project_posts.hourlyRate,tbl_project_posts.hrsPerWeeks,tbl_users.fName,tbl_project_posts.freelancerFinishProject
								FROM 
								tbl_project_posts 
								INNER JOIN tbl_users ON tbl_users.ID = tbl_project_posts.userID
								INNER JOIN tbl_main_categories ON tbl_main_categories.ID = tbl_project_posts.mainCategoryId
								Where tbl_project_posts.ID =$ID";
						$query = $this->db->query($query);

						if ($query->num_rows() > 0)
						{
							$rows = $query->result_array();
						   				$data = array(
												"ID"            => $rows[0]['ID'],
												"title"         => $rows[0]['title'],
												"fName"         => $rows[0]['fName'],
												"description"   => $rows[0]['description'],
												"postDate"   	=> $rows[0]['postDate'],
												"duration"   	=> $rows[0]['duration'],												
												"projectPostUserID"   		=> $rows[0]['userID'],		
												"cancelProject" => $rows[0]['cancelProject'],											
												"clientFinishProject" => $rows[0]['clientFinishProject'],
												"freelancerFinishProject" => $rows[0]['freelancerFinishProject'],											

											); 				                
										 
										$jobdata[] = $data; 
								
						}
					return $jobdata;
		
    }
	
			
public function uploadMessageAttachment($attach_files, $lastInsertID) {

        if ($attach_files) {
            $this->db->where(array("msgID" => $lastInsertID));
            $this->db->set('attachFiles', $attach_files);
            $this->db->update('tbl_private_messages');
        }
}

function getemailReceiverInfo($userID)
	{
		$this->db->select('email,fName,lName');
		$this->db->where('ID', $userID);
		$query = $this->db->get('tbl_users');
		$row = $query->result_array();
		
		return $row;
	}
	
	/* uploading */
	

	
	
	public function addUploadFiles($data)
		{  
			  
			$this->db->insert('tbl_wr_uploading_files', $data);
			$insert_id = $this->db->insert_id();
			 
			return $insert_id;
		}

	
	
	public function uploadportfolioAttachment($attach_files, $lastInsertID) 
	{

        if ($attach_files) 
		{
            $this->db->where(array("wrUploadFileID" => $lastInsertID));
            $this->db->set('wrUploadFileImage', $attach_files);
            $this->db->update('tbl_wr_uploading_files');
        }
	}
	
	public function deleteUploadsFiles($id) {
	
	
	$where = array(
				'wrUploadFileID' 			=> $id
				
			);
		
		
			$this->db->where($where);
   			$this->db->delete('tbl_wr_uploading_files'); 
	
			return true;
		
	}
	
function getUploadsFilesList($projectID)
	{
		
		$where = array (
						'tbl_project_posts.ID' => $projectID
					);
		
		$this->db->select('tbl_project_posts.ID,tbl_project_posts.title,tbl_project_posts.attachFiles As projectFile,tbl_proposal.filePath AS  propsalFile');
		$this->db->from('tbl_project_posts');
		$this->db->where($where);
		$this->db->join('tbl_proposal','tbl_proposal.projectId=tbl_project_posts.ID','LEFT');
		$query = $this->db->get();
		$row = $query->result_array();
				$data = array(
				"projectFile" => $row[0]['projectFile'],
				"title" => $row[0]['title'],
				"propsalFile" => $row[0]['propsalFile'],
				"privateMessageFile" => $this->getPrivateMessageFiles($projectID)
				
				);
			

		return $data;
	}
	
		function getPrivateMessageFiles($projectID)
	{
		
		$where = array (
						'tbl_private_messages.projectID' => $projectID
					);
		
		$this->db->select('tbl_private_messages.attachFiles');
		$this->db->from('tbl_private_messages');
		$this->db->where($where);
		$query = $this->db->get();
		$row = $query->result_array();
		
		return $row;
	}


	
}
	
