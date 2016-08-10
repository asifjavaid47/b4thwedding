<?php
class AdminPaymentModel extends CI_Model {
 
   /**
    * author	:raza malik <eminentdeveloper69@gmail.com>
    * date		:2 janury 2015
    * @constant string
    */
    public function __construct()
    {
        $this->load->database();
    }

   

 /**
    * show category
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function showPaymentRequest()
    {	
		$query = "SELECT
					tbl_paymentrequest.paymentRequestID,
					tbl_paymentrequest.status,
                                        tbl_paymentrequest.amount as send_amount,
                                        tbl_balance.amount as sender_balance,
					tbl_project_posts.title,
					tbl_project_posts.description,
					tbl_paymentrequest.senderID as client,
					tbl_paymentrequest.receiverID as freelancer
					from tbl_paymentrequest
					INNER JOIN tbl_project_posts on tbl_project_posts.ID = tbl_paymentrequest.projectID
                                        LEFT JOIN tbl_balance ON tbl_balance.userID = tbl_paymentrequest.senderID
					";
		$res = $this->db->query($query);
		 if($res->num_rows > 0)
		 {
			 return $res->result_array();
		 }
		 else
		 {
			return false;
		 }
	}
	
    function detailPaymentRequest($paymentReuestID)
    {	
		// $query = "SELECT
					// tbl_paymentrequest.paymentRequestID,
					// tbl_project_posts.title,
					// tbl_project_posts.description,
					// tbl_project_posts.hourlyRate,
					// tbl_paymentrequest.senderID as client,
					// tbl_paymentrequest.receiverID as freelancer
					// from tbl_project_posts
					// INNER JOIN tbl_paymentrequest on tbl_project_posts.ID = tbl_paymentrequest.projectID
					// WHERE tbl_paymentrequest.paymentRequestID='".$paymentReuestID."'
					// ";
		$query = "SELECT tbl_users.fName,
					tbl_project_posts.title,
					tbl_project_posts.ID AS projectID,
					tbl_paymentrequest.paymentRequestID,
					tbl_balance.amount,
					tbl_project_posts.description,
					tbl_paymentrequest.receiverID,
                                        tbl_paymentrequest.amount as send_amount,
					tbl_paymentrequest.senderID,
					tbl_proposal.billedToClient,
					tbl_proposal.myEarning
					FROM
					tbl_users
					INNER JOIN tbl_project_posts ON tbl_users.ID = tbl_project_posts.userID
					INNER JOIN tbl_paymentrequest ON tbl_project_posts.ID = tbl_paymentrequest.projectID AND tbl_users.ID = tbl_paymentrequest.senderID
					LEFT JOIN tbl_balance ON tbl_users.ID = tbl_balance.userID
					INNER JOIN tbl_proposal ON tbl_project_posts.ID = tbl_proposal.projectId
					WHERE tbl_paymentrequest.paymentRequestID='".$paymentReuestID."'
					";
		$res = $this->db->query($query);
		 if($res->num_rows > 0)
		 {
			 return $res->result_array();
		 }
		 else
		 {
			return false;
		 }
	}
	
	public function addPayment($data){
            
            $amount = $data[0]['amount'];
            $receiverID = $data[0]['receiverID'];
            $senderID = $data[0]['senderID'];
            $fName = $data[0]['fName'];
            $billedToClient = $data[0]['billedToClient'];
            $myEarning = $data[0]['myEarning'];
            $paymentRequestID = $data[0]['paymentRequestID'];
            

            $this->db->select('*');
            $this->db->from('tbl_balance');
            $this->db->where('userID', $senderID);
            $query = $this->db->get(); 

            if ($query->num_rows() > 0){
                $this->db->where(array("userID" => $senderID));
                $this->db->set('amount', 'amount-'.$billedToClient, FALSE);
                $this->db->update('tbl_balance');
            }
            else {
                $data = array(
                'userID' => $senderID,
                'amount' => '-'.$billedToClient,
                'startDate' => date('Y-m-d H:i:s')
                );
                $this->db->insert('tbl_balance' , $data);
            }
            $this->db->select('*');
            $this->db->from('tbl_balance');
            $this->db->where('userID', $receiverID);
            $query2 = $this->db->get(); 

            if ($query2->num_rows() > 0){
                $this->db->where(array("userID" => $receiverID));
                $this->db->set('amount', 'amount+'.$myEarning, FALSE);
                $this->db->update('tbl_balance');
            }
            else {
                $data2 = array(
                'userID' => $receiverID,
                'amount' => $myEarning,
                'startDate' => date('Y-m-d H:i:s')
                );
                $this->db->insert('tbl_balance' , $data2);
            }


            $this->db->where(array("paymentRequestID" => $paymentRequestID));
            $this->db->set('status', 1);
            $this->db->update('tbl_paymentrequest');


            $datanotificationreceiver = array(
                'projectID' 	=> $data[0]['projectID'],
                'senderID' 		=> $senderID,			
                'receiverID' 	=> $receiverID,
                'msgTypes' 		=> 'addBalance',					
                'message' 		=> 	"Payment SuccessFully Add In Your Balance Send By ".$fName."",
                'sendDate'		=>	date("Y-m-d H:i:s")			
            );
            $this->db->insert('tbl_notification', $datanotificationreceiver);

            $datanotificationsender = array(
                'projectID' 	=> $data[0]['projectID'],
                'senderID' 		=> $receiverID,			
                'receiverID' 	=> $senderID,
                'msgTypes' 		=> 'Send_Paymnet',					
                'message' 		=> 	"Payment SuccessFully Send To User",
                'sendDate'		=>	date("Y-m-d H:i:s")			
            );
            $this->db->insert('tbl_notification', $datanotificationsender);

            $tranctionsender = array(
                'userID' 		=> $senderID,			
                'amount' 		=> $billedToClient,
                'type' 			=> 'Admin',
                'purpose' 			=> 'Bill To User',					
                'transactionDate'		=> date('Y-m-d')	
            );
            $insert = $this->db->insert('tbl_transaction_history', $tranctionsender);

            $tranctionreceiver = array(
                'userID' 			=> $receiverID,			
                'amount' 			=> $myEarning,
                'type' 				=> 'Admin',
                'purpose' 			=> 'Payment Receive by Client',					
                'transactionDate'	=> date('Y-m-d')	
            );
            $insert = $this->db->insert('tbl_transaction_history', $tranctionreceiver);
	}
 
}
?>