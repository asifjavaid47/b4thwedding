<?php
class Categories_model extends CI_Model {
 
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
   
    function show_user_list()
    {	
	$this->db->where('delete', '0');
	$this->db->select('*');
	$query = $this->db->get('tbl_users');
	 if($query->num_rows > 0){
		 return $query->result_array();
		 }else
		 {
			return 'not_exist';
		 }
	}
   
	function delete_category($id){
		$data = array(
						'delete' => 1
					 );
		$this->db->where('ID', $id);
		$this->db->update('tbl_main_categories',$data); 
	}
 
}
?>