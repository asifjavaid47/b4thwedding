<?php
class Withdraw_model extends CI_Model {


public function get_acount_all_info($filter=''){
		
			$user_id =$this->session->userdata('userID');
			
			$where = array(
				'userID = ' => $user_id,
			);
			$where2 = array(
				'accountType != ' => 'creditcard',
			);
			$this->db->select('*');
			$this->db->from('tbl_acounts_information');
			$this->db->where($where);
			if($filter!='')
			{
				$this->db->where($where2);
			}
			$this->db->order_by('default','DESC'); 
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


public function add_withdraw($newBalance,$withDrawAmount,$type)
	{
		
			$user_id =$this->session->userdata('userID');
			
			$where = array(
				'userID = ' => $user_id
				
			);
			$data = array(
			'userID'	=>$user_id,
			'amount'	=>$withDrawAmount,
			'type'		=> $type,
			'purpose'	=> 'withdraw',
			'status'	=> 0,
			'transactionDate' =>date("Y-m-d")
			);
			$data2 = array(
			'amount'	=>$newBalance,
			);
			
			$insert = $this->db->insert('tbl_transaction_history', $data);
			$this->db->update('tbl_balance', $data2, $where);
			
		
	} 
		
}
	
