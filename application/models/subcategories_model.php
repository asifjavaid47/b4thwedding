<?php
class Subcategories_model extends CI_Model {
 
    /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
    }

    /**
    * Get product by his is
    * @param int $product_id 
    * @return array
    */
    public function get_subcategory_by_id($id)
    {
		$this->db->select('tbl_sub_categories.*,tbl_main_categories.cName');
		$this->db->from('tbl_sub_categories');
		//$this->db->where('ID', $id);		
		$this->db->join('tbl_main_categories', 'tbl_sub_categories.mainCatID = tbl_main_categories.ID');
		$this->db->where('tbl_sub_categories.ID', $id);   		
		$query = $this->db->get();
		//print_r( $query);exit;
		//echo'<pre>';print_r($query->result_array());echo'</pre>';
		return $query->result(); 
    }    
public function getCategories(){
 
        $this->db->select('ID,cName');
        $this->db->from('tbl_main_categories'); 
		$this->db->order_by('cName', 'ASC');
        $query = $this->db->get();
		$query = $query->result();
        return $query;
    }
public function subCategories($main_cat,$sub_cat){
 	$this->db->where('skillName', $sub_cat);
		$query = $this->db->get('tbl_sub_categories');

        if($query->num_rows > 0){
        	echo '<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>';
			  echo "Sub Category already taken";	
			echo '</strong></div>';
		}else{

			$data = array(
				'skillName' 	=> $sub_cat,					
				'mainCatID' 	=> $main_cat					
			);
			$insert = $this->db->insert('tbl_sub_categories', $data);
		    return $insert;
		}
    }
    /**
    * Fetch manufacturers data from the database
    * possibility to mix search, filter and order
    * @param string $search_string 
    * @param strong $order
    * @param string $order_type 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_subcategories($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
    {
		
		
		$this->db->select('tbl_sub_categories.*,tbl_main_categories.cName');
		$this->db->from('tbl_sub_categories');
		/*$this->db->select('*');
		$this->db->from('tbl_sub_categories');*/

		if($search_string){
			$this->db->like('skillName', $search_string);
		}
		$this->db->group_by('id');

		if($order){
			$this->db->order_by($order, $order_type);
		}else{
		    $this->db->order_by('ID', $order_type);
		}

        if($limit_start && $limit_end){
          $this->db->limit($limit_start, $limit_end);	
        }

        if($limit_start != null){
          $this->db->limit($limit_start, $limit_end);    
        }
		$this->db->join('tbl_main_categories', 'tbl_sub_categories.mainCatID = tbl_main_categories.ID');        
		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

    /**
    * Count the number of rows
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count_subcategories($search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('tbl_sub_categories');
		if($search_string){
			$this->db->like('skillName', $search_string);
		}
		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('ID', 'Asc');
		}
		$query = $this->db->get();
		return $query->num_rows();        
    }

    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    function store_subcategory($data)
    {
		$insert = $this->db->insert('tbl_sub_categories', $data);
	    return $insert;
	}

    /**
    * Update manufacture
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_subcategory($id, $data)
    {
		$this->db->where('ID', $id);
		$this->db->update('tbl_sub_categories', $data);
		$report = array();
		$report['error'] = $this->db->_error_number();
		$report['message'] = $this->db->_error_message();
		if($report !== 0){
			return true;
		}else{
			return false;
		}
	}

    /**
    * Delete manufacturer
    * @param int $id - manufacture id
    * @return boolean
    */
	function delete_subcategory($id){
		$data = array(
						'delete' => 1
					 );
		$this->db->where('ID', $id);
		$this->db->update('tbl_sub_categories',$data); 
		 
	}
 
}
?>	
