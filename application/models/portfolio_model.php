<?php
class Portfolio_model extends CI_Model {

	function getPortfolio($userID)
	{
		
		$where = array (
						'userID' => $userID
					);
		
		$this->db->select('*');
		$this->db->from('tbl_portfolio');
		$this->db->where($where);
		$query = $this->db->get();
		$row = $query->result();
		
		return $row;
	}
	
	
	public function addPortfolio($data)
		{  
			  
			$this->db->insert('tbl_portfolio', $data);
			$insert_id = $this->db->insert_id();
			 
			return $insert_id;
		}

	
	
	public function uploadportfolioAttachment($attach_files, $lastInsertID) 
	{

        if ($attach_files) 
		{
            $this->db->where(array("portfolioID" => $lastInsertID));
            $this->db->set('portfolioImage', $attach_files);
            $this->db->update('tbl_portfolio');
        }
	}
	
	public function deletePortfolio($id) {
	
	
	$where = array(
				'portfolioID' 			=> $id
				
			);
		
		
			$this->db->where($where);
   			$this->db->delete('tbl_portfolio'); 
	
			return true;
		
	}
	

	
	
	
}
	
