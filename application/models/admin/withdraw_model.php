<?php
class Withdraw_model extends CI_Model {
 
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
    function showWithdraw()
    {	
		$query = "SELECT
					tbl_transaction_history.userID,
					tbl_transaction_history.amount,
					tbl_transaction_history.type,
					tbl_transaction_history.status,
					tbl_transaction_history.purpose,
					tbl_transaction_history.transactionID,
					tbl_transaction_history.transactionHistoryID,
					tbl_users.fName,
					tbl_users.lName
					from tbl_transaction_history
					INNER JOIN tbl_users on tbl_transaction_history.userID = tbl_users.ID
                                        WHERE tbl_transaction_history.purpose = 'withdraw' ORDER BY tbl_transaction_history.status ASC
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
	
    function detailWithdraw($userID , $type)
    {
		$query = "SELECT *
                            FROM tbl_acounts_information
                            WHERE tbl_acounts_information.userID = '".$userID."' AND tbl_acounts_information.accountType = '".$type."'
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

    function getTransaction($transactionID)
    {	
		$query = "SELECT
					tbl_transaction_history.userID,
					tbl_transaction_history.amount,
					tbl_transaction_history.type,
					tbl_transaction_history.status,
					tbl_transaction_history.purpose,
					tbl_transaction_history.transactionID,
					tbl_transaction_history.transactionHistoryID,
					tbl_users.fName,
					tbl_users.lName
					from tbl_transaction_history
					INNER JOIN tbl_users on tbl_transaction_history.userID = tbl_users.ID
                                        WHERE tbl_transaction_history.transactionHistoryID = $transactionID
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

    function approveTransaction($transactionID)
    {
        $status = $this->input->post('final_status');
                $this->db->where(array("transactionHistoryID" => $transactionID));
                $this->db->set('status', $status);
                $this->db->update('tbl_transaction_history');
			return true;
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