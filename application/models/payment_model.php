<?php
class Payment_model extends CI_Model {


public function addBraintreePaymeny($transactionID,$creditCardNumber,$creditCardExpiremonth,$creditCardExpireyear,$amount)
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
				'purpose' 				=> 'deposit',
				'type'					=> 'creditcard',
				'transactionDate'		=> date('Y-m-d')
			);
		
			$insert = $this->db->insert('tbl_transaction_history', $data);
			$this->db->select('*');
			$this->db->from('tbl_balance');
			$this->db->where(array("userID" => $user_id));
			$query = $this->db->get();
			if($query->num_rows>0)
			{
			$this->db->where(array("userID" => $user_id));
			$this->db->set('amount', 'amount+'.$amount, FALSE);
            $this->db->update('tbl_balance');
				
			}else
			{
    		$data2	= array(
				'userID' =>$user_id,
				'amount'	=>$amount
				);
				 $this->db->insert('tbl_balance', $data2);
			}
}

public function add_paypal_payment($data)
{
			$amount = $data['amount'];
			
			$user_id =$this->session->userdata('userID');
			
			$insert = $this->db->insert('tbl_transaction_history', $data);
			$this->db->select('*');
			$this->db->from('tbl_balance');
			$this->db->where(array("userID" => $user_id));
			$query = $this->db->get();
			if($query->num_rows>0)
			{
					$this->db->where(array("userID" => $user_id));
			$this->db->set('amount', 'amount+'.$amount, FALSE);
            $this->db->update('tbl_balance');
			}else
			{
    	
			$data2	= array(
				'userID' =>$user_id,
				'amount'	=>$amount
				);
				 $this->db->insert('tbl_balance', $data2);
			}
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
		 return $query->row_array();
		}else
		{
			
			 return array('amount' =>0);
		}
        
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
	public function sendPaymentRequestToAdmin($projectID,$amount)
	{
		
 		$user_id =$this->session->userdata('userID');
		
		$where = array(
            'projectId = ' => $projectID,
			'awarded = ' => 'awarded'
        );
        $this->db->select('userId');
        $this->db->from('tbl_proposal');
		$this->db->where($where); 
        $query = $this->db->get();
		if($query->num_rows()>0)
		{
			$rows = $query->row_array();
			$receiverID = $rows['userId'];
			
					/*$datanotification = array(
					'projectID' 	=> $projectID,
					'senderID' 		=> $user_id,			
					'receiverID' 	=> $receiverID,
					'msgTypes' 		=> 'paymentRequestToAdmin',					
					'message' 		=> 	'Client send payment request to admin',
					'sendDate'		=>	date("Y-m-d H:i:s")			
				);
				$this->db->insert('tbl_notification', $datanotification);*/
				
				$data = array(
					'projectID' 	=> $projectID,
					'senderID' 		=> $user_id,			
					'receiverID' 	=> $receiverID,
					'amount' 		=> $amount,			
					'date'			=>	date("Y-m-d")			
				);
				
				$this->db->insert('tbl_paymentrequest', $data);
				
					$this->db->where(array("ID" => $projectID));
            		$this->db->set('paymentRequest', 1);
            		$this->db->update('tbl_project_posts');
					return true;	 
		 
		 
		}
		else
		{
			 return '0';
		}
        
    } 
	
	
	
public function getFreeLancerInfo($projectID){
	
 		$user_id =$this->session->userdata('userID');
		
		$where = array(
            'tbl_project_posts.ID = ' => $projectID
        );
        $this->db->select('tbl_proposal.myEarning,tbl_project_posts.title,tbl_users.fName,
							tbl_project_posts.ID,tbl_awarded.awardedUserId,tbl_proposal.awarded');
        $this->db->from('tbl_proposal');
		$this->db->join('tbl_project_posts', 'tbl_project_posts.ID=tbl_proposal.projectId');
		$this->db->join('tbl_users', 'tbl_users.ID = tbl_proposal.userId');
		$this->db->join('tbl_awarded', 'tbl_project_posts.ID = tbl_awarded.awardedJobId');
		$this->db->where($where); 
        $query = $this->db->get();
		
		 return $query->row_array();
    } 
	
	function getemailReceiverInfo($userID)
	{
		$this->db->select('email,fName,lName');
		$this->db->where('ID', $userID);
		$query = $this->db->get('tbl_users');
		$row = $query->result_array();
		
		return $row;
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
												"releaseamount"  => $this->getReleaseAmount($ID)
												
																				
											); 				                
										 
										$jobdata[] = $data; 
								
					
					return $jobdata;
						}
		
	}
	public function getReleaseAmount($projectId)
	{
		$this->db->select('tbl_release_payment.amount');
		$where = array(
				'projectID' 			=> $projectId,
			);
			
		$this->db->from('tbl_release_payment');
		$this->db->where($where);
		$query = $this->db->get();
		if($query->num_rows()>0)
		{
			$row = $query->result_array();
			$title	=	$row[0]['amount'];
			return $title;
		}else
		{
			return '0';
		}
	}
	
	
	
}
	
