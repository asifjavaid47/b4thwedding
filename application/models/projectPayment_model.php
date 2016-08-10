<?php
class Projectpayment_model extends CI_Model {


public function addBraintreePaymeny($transactionID,$creditCardNumber,$creditCardExpiremonth,$creditCardExpireyear,$amount,$projectID)
{
	$amount = $this->input->post('amount');
	$creditCardNumber = $this->input->post('creditCardNumber');
	$creditCardExpireDate = $creditCardExpiremonth.'/'.$creditCardExpireyear;
	
		$user_id =$this->session->userdata('userID');
		
			$data = array(
				'transactionID' 		=> $transactionID,
				'userID' 				=> $user_id,						
				'creditCardNumber' 		=> $creditCardNumber,
				'creditCardExpireDate' 	=> $creditCardExpireDate,
				'amount' 				=> $amount,
				'purpose' 				=> 'Add project Fund',
				'type'					=> 'creditcard',
				'transactionDate'		=> date('Y-m-d')
			);
		
			$insert = $this->db->insert('tbl_transaction_history', $data);
			
			$this->db->where(array("ID" => $projectID));
			$this->db->set('clientAmount', 'clientAmount+'.$amount, FALSE);
            $this->db->update('tbl_project_posts');
				
			
}

public function add_paypal_payment($data,$projectID)
{
			$amount = $data['amount'];
			
			$user_id =$this->session->userdata('userID');
			
			$insert = $this->db->insert('tbl_transaction_history', $data);
			
			$this->db->where(array("ID" => $projectID));
			$this->db->set('clientAmount', 'clientAmount+'.$amount, FALSE);
            $this->db->update('tbl_project_posts');
			
    	
} 

public function get_transaction(){
	
 		$user_id =$this->session->userdata('userID');
		
		$where = array(
            'userID = ' => $user_id
        );
        $this->db->select('*');
        $this->db->from('tbl_transaction_history');
		$this->db->where($where);
		$this->db->order_by('transactionHistoryID' ,'DESC'); 
        $query = $this->db->get();
		
		 return $query->result();
        
    }
public function get_balance(){
	
 		$user_id =$this->session->userdata('userID');
		
		$where = array(
            'userID = ' => $user_id
        );
        $this->db->select('amount');
        $this->db->from('tbl_balance');
		$this->db->where($where); 
        $query = $this->db->get();
		if($query->num_rows()>0)
		{
		 		$row = $query->row_array();
		 		return $row['amount'];
		}else
		{
			
			 return '0';
		}
        
    } 
	
	
	public function getProjectAmount($projectId)
	{
		$this->db->select('myEarning');
		$where = array(
				'projectId' 			=> $projectId,
				'awarded'				=>'awarded'
			);
			
		$this->db->from('tbl_proposal');
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->result_array();
			$title	=	$row[0]['myEarning'];
			return $title;
		}else
		{
			return '';
		}
	}
	
	public function getProjectInfo($ID){
		$where = array(
            'ID = ' => $ID
        );		
		$this->db->select('tbl_project_posts.*');
		$this->db->from('tbl_project_posts');
		$this->db->where($where);
		$query = $this->db->get();
		
        if ($query->num_rows() > 0)
						{
							$rows = $query->result_array();
						   				$data = array(
												"title"         => $rows[0]['title'],
												"postDate"   	=> $rows[0]['postDate'],
												"hourlyRate"   	=> $rows[0]['hourlyRate'],
												"startingDate"   => $rows[0]['startingDate'],
												"clientAmount"   => $rows[0]['clientAmount'],
												"projectuserID"   => $rows[0]['userID'],
												"releaseamount"  => $this->getReleaseAmount($ID)
												
																				
											); 				                
										 
										$jobdata[] = $data; 
								
					
					return $jobdata;
						}
		
	}
	public function getReleaseAmount($projectId)
	{
		$this->db->select('SUM(tbl_release_payment.amount) AS total');
		$where = array(
				'projectID' 			=> $projectId,
			);
			
		$this->db->from('tbl_release_payment');
		$this->db->where($where);
		$this->db->group_by('projectID');
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->result_array();
			$title	=	$row[0]['total'];
			return $title;
		}else
		{
			return '0';
		}
	}
	
	
	
public function AddPaymentPreviousAccount($projectID)
{
	$amount = $this->input->post('amountToAdd');
		$userID =$this->session->userdata('userID');
		
			$data = array(
				'userID' 				=> $userID,						
				'amount' 				=> $amount,
				'purpose' 				=> 'Add project Fund',
				'type'					=> 'Current Account',
				'transactionDate'		=> date('Y-m-d')
			);
		
			$insert = $this->db->insert('tbl_transaction_history', $data);
			
			$this->db->where(array("ID" => $projectID));
			$this->db->set('clientAmount', 'clientAmount+'.$amount, FALSE);
            $this->db->update('tbl_project_posts');
			
			$this->db->where(array("userID" => $userID));
			$this->db->set('amount', 'amount-'.$amount, FALSE);
            $this->db->update('tbl_balance');
				
			
}

public function getMilestone($ID){
 
        $this->db->select('*');
        $this->db->where('milestoneStatus' , '1');
        $this->db->where('projectID' , $ID);
        $this->db->from('tbl_wr_projects_milestone'); 
        $this->db->order_by('milestoneupdateDate', 'DESC');
        $query = $this->db->get();
        if($query->num_rows > 0)
            return $query->result_array();
        else
            return false;
    }
	
	
	
public function releasePayment($projectID,$receiverID,$amountTorelease,$milestoneID)
{
	
		$userID =$this->session->userdata('userID');
		
			$data = array(
				'userID' 				=> $userID,						
				'amount' 				=> $amountTorelease,
				'purpose' 				=> 'Release project Fund',
				'type'					=> 'Current Account',
				'transactionDate'		=> date('Y-m-d')
			);
		
			 $this->db->insert('tbl_transaction_history', $data);
			 
			 
			$data2 = array(
				'senderID' 				=> $userID,
				'receiverID' 			=> $receiverID,
				'projectID' 			=> $projectID,								
				'amount' 				=> $amountTorelease,
				'date'					=> date('Y-m-d')
			);			
			$insert = $this->db->insert('tbl_release_payment', $data2);
			
			
			$this->db->where(array("milestoneID" => $milestoneID));
			$this->db->set('releaseAmount',$amountTorelease);
            $this->db->update('tbl_wr_projects_milestone');
			
			$this->db->where(array("userID" => $userIDs));
			$this->db->set('amount', 'amount-'.$amountTorelease, FALSE);
            $this->db->update('tbl_balance');
			
			$this->db->select('*');
			$this->db->from('tbl_balance');
			$this->db->where(array("userID" => $receiverID));
			$query = $this->db->get();
			
			if($query->num_rows>0)
			{
			$this->db->where(array("userID" => $receiverID));
			$this->db->set('amount', 'amount+'.$amountTorelease, FALSE);
            $this->db->update('tbl_balance');
				
			}else
			{
    		$data3	= array(
				'userID' =>$receiverID,
				'amount'	=>$amountTorelease
				);
				 $this->db->insert('tbl_balance', $data3);
			}
			
			$datanotification = array(
					'projectID' 	=> $projectID,
					'senderID' 		=> $userID,			
					'receiverID' 	=> $receiverID,
					'msgTypes' 		=> 'Receive_project_payment',					
					'message' 		=> 	'You receive '.$amountTorelease.'',
					'sendDate'		=>	date("Y-m-d H:i:s")			
				);
					$this->db->insert('tbl_notification', $datanotification);	
			
}

public function paymentRequest($description,$projectID)
	{
	
 		$user_id =$this->session->userdata('userID');
		
		$where = array(
            'ID = ' => $projectID
        );
        $this->db->select('userID');
        $this->db->from('tbl_project_posts');
		$this->db->where($where); 
        $query = $this->db->get();
		if($query->num_rows()>0)
		{
			$rows = $query->row_array();
			$clientID = $rows['userID'];
			
					$datanotification = array(
					'projectID' 	=> $projectID,
					'senderID' 		=> $user_id,			
					'receiverID' 	=> $clientID,
					'msgTypes' 		=> 'paymentRequest',					
					'message' 		=> 	$description,
					'sendDate'		=>	date("Y-m-d H:i:s")			
				);
					$this->db->insert('tbl_notification', $datanotification);
					
					$this->db->where(array("projectId" => $projectID,"userId" => $user_id));
            		$this->db->set('paymentRequest', 1);
					$this->db->set('paymentRequestDate',date("Y-m-d"));
            		$this->db->update('tbl_proposal');
					
					
					$emailReceiverInfo		=	$this->getemailReceiverInfo($clientID);
					$email					=	$emailReceiverInfo[0]['email'];
					$fName					=	$emailReceiverInfo[0]['fName'];
					$lName					=	$emailReceiverInfo[0]['lName'];
					$this->load->library('email');
					$this->email->from('b4wedding@gmail.con', 'Notification');
					$this->email->to($email);
					$this->email->subject('Paymrnt Request');
					$message = "<table width='850' border='0' cellspacing='0' cellpadding='0' style='background:#eee';>
							  <tr>
								<td style='padding:20px;'>
								<table width='630' border='0' cellspacing='0' cellpadding='0' align='center'>
							  
							  <tr>
								<td align=left style='background:#fff; padding:20px; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:25px;'><h3>".$fName." ".$lName."</h3>
								<p>Send You Payment Request</p>
							<p>".$this->input->post('message')."</p>
							
							</td>
							  </tr>
							  
							  <tr>
								<td>&nbsp;</td>
							  </tr>
							</table>";
							
					$this->email->message($message);				
					$this->email->send();
					
					
					return true;	 
		 
		 
		}
		else
		{
			 return '0';
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
	
	
}
	
