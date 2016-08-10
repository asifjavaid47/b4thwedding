<?php
class CencellationReason_model extends CI_Model {
 
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

    public function get_cancelReasonName_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('tbl_cancel_reason');
		$this->db->where('cancelReasonID', $id);
		$query = $this->db->get(); 
		
						if ($query->num_rows() > 0)
						{
							$rows = $query->result_array();
						   				$data = array(
												"cancelReasonID"            => $rows[0]['cancelReasonID'],
												"cancelReasonName"            => $rows[0]['cancelReasonName'],
											);
										 
										$catdata[] = $data; 
								return $catdata;
						}
						else {
							return false;
						}
					
    }    


   function updateCencellationReason($id)
    {
        $cancelReasonName = $this->input->post('cancelReasonName');
		$where = array(
			'tbl_cancel_reason.cancelReasonName' =>$cancelReasonName
		);
		$this->db->select();
		$this->db->from('tbl_cancel_reason');
		$this->db->where($where);
		$query = $this->db->get();
        
        if($query->num_rows > 0){
            return false;
        } else{
            $data = array(
            'cancelReasonName' => $cancelReasonName,
            );
            $this->db->where('cancelReasonID', $id);
            $msg = $this->db->update('tbl_cancel_reason', $data);
            if($msg){
            return true;
            }else{
            return false;
            }
        }
    }
	
    function addCencellationReason()
    {	
		$cancelReasonName = $this->input->post('cancelReasonName');
		$where = array(
			'tbl_cancel_reason.cancelReasonName' =>$cancelReasonName
		);
		$this->db->select();
		$this->db->from('tbl_cancel_reason');
		$this->db->where($where);
		$query = $this->db->get();

        if($query->num_rows > 0){
            return false;
		}
		else
		{	
			
		 $data = array(
                        'cancelReasonName' => $cancelReasonName
                );
			$query = $this->db->insert('tbl_cancel_reason', $data);
			return $query;
		}
	}

    function showCencellationReason()
    {
		$this->db->select('*');
		$this->db->from('tbl_cancel_reason');
		// $this->db->where('tbl_cancel_reason.deleted', '0');
		$query = $this->db->get();

	// $this->db->select('*');
	// $query = $this->db->get('tbl_sub_categories');
	 if($query->num_rows > 0){
		 return $query->result_array();
		 }else
		 {
			return false;
		 }
	}




	function deleteCencellationReason($id){
		$this->db->where('cancelReasonID', $id);
		$this->db->delete('tbl_cancel_reason'); 
	}
	

 
}
?>