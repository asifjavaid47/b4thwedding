<?php
class setting_model extends CI_Model {


public function getSetting(){
			$this->db->select('*');
			$this->db->from('tbl_settings');
			$query = $this->db->get();
			
			 return $query->row_array();
		}
	
	function add_commission()
    {	
		$settingName = $this->input->post('settingName');
		$settingValue = $this->input->post('settingValue');		
		$query = $this->db->get('tbl_settings');

        if($query->num_rows > 0){
            return false;
		}
		else
		{
			$data = array(
                    'settingName' => $settingName,
					'settingValue' => $settingValue
                );
			$query = $this->db->insert('tbl_settings', $data);
			return $query;
					
		}
	}
	
	
	public function get_commission_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('tbl_settings');
		$this->db->where('settingID', $id);
		$query = $this->db->get(); 
		
						if ($query->num_rows() > 0)
						{
							$rows = $query->result_array();
						   				$data = array(
												"ID"            => $rows[0]['settingID'],
												"settingName"   => $rows[0]['settingName'],
												"settingValue"  => $rows[0]['settingValue']	
											); 				                
										 
										$catdata[] = $data; 
								return $catdata;
						}
						else {
							return false;
						}
					
    }
	function update_commission($id)
    {
		$settingName = $this->input->post('settingName');
		$settingValue = $this->input->post('settingValue');
		
			$data = array(
			'settingName' => $settingName,
			'settingValue' => $settingValue,
			);
          
			$this->db->where('settingID', $id);
			$msg = $this->db->update('tbl_settings', $data);
			if($msg){
			return true;
			}else{
			return false;
			}
	}    

		
}
?>