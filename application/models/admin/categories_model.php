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
    public function get_category_by_id($id)
    {
		
		$this->db->select('*');
		$this->db->from('tbl_main_categories');
		$this->db->where('ID', $id);
		$query = $this->db->get(); 
		
						if ($query->num_rows() > 0)
						{
							$rows = $query->result_array();
						   				$data = array(
												"ID"            	=> $rows[0]['ID'],
												"cName"            => $rows[0]['cName'],
												"orderNo"            => $rows[0]['orderNo'],
												"description"        => $rows[0]['description'],  
												"imagePath"        => $rows[0]['imagePath']			
											); 				                
										 
										$catdata[] = $data; 
								return $catdata;
						}
						else {
							return false;
						}
					
    }    

    public function get_sub_category_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('tbl_sub_categories');
		$this->db->where('ID', $id);
		$query = $this->db->get(); 
		
						if ($query->num_rows() > 0)
						{
							$rows = $query->result_array();
						   				$data = array(
												"ID"            => $rows[0]['ID'],
												"skillName"            => $rows[0]['skillName'],
											);
										 
										$catdata[] = $data; 
								return $catdata;
						}
						else {
							return false;
						}
					
    }    
    
    /**
    * Fetch categories data from the database
    * possibility to mix search, filter and order
    * @param string $search_string 
    * @param strong $order
    * @param string $order_type 
    * @param int $limit_start
    * @param int $limit_end
    * @return array
    */
    public function get_categories($search_string=null, $order=null, $order_type='Asc', $limit_start=null, $limit_end=null)
    {
	    
		$this->db->select('*');
		$this->db->from('tbl_main_categories');

		if($search_string){
			$this->db->like('cName', $search_string);
		}
		$this->db->group_by('id');

		if($order){
			$this->db->order_by($order, $order_type);
		}else{
		    $this->db->order_by('id', $order_type);
		}

        if($limit_start && $limit_end){
          $this->db->limit($limit_start, $limit_end);	
        }

        if($limit_start != null){
          $this->db->limit($limit_start, $limit_end);    
        }
        
		$query = $this->db->get();
		
		return $query->result_array(); 	
    }

    /**
    * Count the number of rows
    * @param int $search_string
    * @param int $order
    * @return int
    */
    function count_categories($search_string=null, $order=null)
    {
		$this->db->select('*');
		$this->db->from('tbl_main_categories');
		if($search_string){
			$this->db->like('name', $search_string);
		}
		if($order){
			$this->db->order_by($order, 'Asc');
		}else{
		    $this->db->order_by('id', 'Asc');
		}
		$query = $this->db->get();
		return $query->num_rows();        
    }

    /**
    * Store the new item into the database
    * @param array $data - associative array with data to store
    * @return boolean 
    */
    function store_category($data)
    {
		$insert = $this->db->insert('tbl_main_categories', $data);
	    return $insert;
	}
	 /**
    * add category
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function add_category()
    {	
		$cName = $this->input->post('cName');
		$description = $this->input->post('description');
		$this->db->where('cName', $cName);
		$query = $this->db->get('tbl_main_categories');

        if($query->num_rows > 0){
            return false;
		}
		else
		{	
			if ($_FILES['fileAttachement']['name'])
			{
			
				$file_name = $this->uploadAttachment();
			
				// $config['upload_path']   = "public/upload/categories/";
				// $config['allowed_types'] = "gif|jpg|jpeg|png|tiff|tif|pdf|jpeg|jif|bmp";

				// $config['max_size'] = "0";
				// $config['max_width'] = "0";
				// $config['max_height'] = "0";

				// $this->load->library('upload', $config);

				// if (!$this->upload->do_upload("fileAttachement")) {

					// echo $this->upload->display_errors();
				// } else {

					// $finfo = $this->upload->data("fileAttachement");
					// $im = $finfo['file_name'];
						
		
				// }
				
				 $data = array(
                    'cName' => $cName,
					'description' => $description,
					'imagePath' => $file_name
                );
			$query = $this->db->insert('tbl_main_categories', $data);
			return $query;
				
			}
		
		}
	}
	    /**
    * Update category
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_category($id)
    {
		$cName = $this->input->post('cName');
		$description = $this->input->post('description');
		$orderNo = $this->input->post('orderNo');
		$imagePath = $this->input->post('imagePath');
		if ($_FILES['fileAttachement']['name'])
		{
			$deleteAttachFile = $this->deleteAttachFile($imagePath);
			$file_name = $this->uploadAttachment();
			$data = array(
			'cName' => $cName,
			'orderNo' => $orderNo,
			'description' => $description,
			'imagePath' => $file_name
			);
		} else {
			$data = array(
			'cName' => $cName,
			'orderNo' => $orderNo,
			'description' => $description,
			);
                }

			$this->db->where('id', $id);
			$msg = $this->db->update('tbl_main_categories', $data);
			if($msg){
			return true;
			}else{
			return false;
			}
	}
    function update_sub_category($id)
    {
        $sub_cat = $this->input->post('sub_cat');
		$where = array(
			'tbl_sub_categories.skillName' =>$sub_cat
		);
		$this->db->select();
		$this->db->from('tbl_sub_categories');
		$this->db->where($where);
		$query = $this->db->get();
        
        if($query->num_rows > 0){
            return false;
        } else{
            $data = array(
            'skillName' => $sub_cat,
            );
            $this->db->where('ID', $id);
            $msg = $this->db->update('tbl_sub_categories', $data);
            if($msg){
            return true;
            }else{
            return false;
            }
        }
    }
	
    function add_sub_category()
    {	
		$sub_cat = $this->input->post('sub_cat');
		$where = array(
			'tbl_sub_categories.skillName' =>$sub_cat
		);
		$this->db->select();
		$this->db->from('tbl_sub_categories');
		$this->db->where($where);
		$query = $this->db->get();
	// print_r($sub_cat);
		// exit;
        if($query->num_rows > 0){
            return false;
		}
		else
		{	
			
		 $data = array(
                        'skillName' => $sub_cat
                );
			$query = $this->db->insert('tbl_sub_categories', $data);
			return $query;
		}
	}
 /**
    * show category
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function show_category()
    {
	// $this->db->where('delete', '0');
	$this->db->select('*');
	$this->db->where('tbl_main_categories.delete', '0');
	$query = $this->db->get('tbl_main_categories');
	 if($query->num_rows > 0){
		 return $query->result_array();
		 }else
		 {
			return false;
		 }
    }
    function show_sub_category()
    {
		$this->db->select('*');
		$this->db->from('tbl_sub_categories');
		$this->db->where('tbl_sub_categories.deleted', '0');
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



    /**
    * Delete category
    * @param int $id - category id
    * @return boolean
    */
	function delete_category($id){
		$data = array(
						'delete' => 1
					 );
		$this->db->where('ID', $id);
		$this->db->update('tbl_main_categories',$data); 
	}
	function delete_sub_category($id){
		$data = array(
						'deleted' => 1
					 );
		$this->db->where('ID', $id);
		$this->db->update('tbl_sub_categories',$data); 
	}
	
	function uploadAttachment() 
	{

		$config['upload_path']   = "public/upload/categories/";
		$config['allowed_types'] = "gif|jpg|jpeg|png|tiff|tif|pdf|jpeg|jif|bmp";

		$config['max_size'] = "0";
		$config['max_width'] = "0";
		$config['max_height'] = "0";

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload("fileAttachement"))
		{

			echo $this->upload->display_errors();
		} 
		else 
		{

			$finfo = $this->upload->data("fileAttachement");
			$file_name = $finfo['file_name'];
			return $file_name;
		}
    }
	function deleteAttachFile($filpath) 
	{
		$unlinkUrl ="public/upload/categories/".$filpath;
		if(file_exists($unlinkUrl)){
			unlink($unlinkUrl);
			// echo 'yes';
		}
		else{
			echo $unlinkUrl." is not available";  
			 
		}
			
	}
 
}
?>