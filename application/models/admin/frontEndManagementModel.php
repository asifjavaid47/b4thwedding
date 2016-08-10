<?php
class FrontEndManagementModel extends CI_Model {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_mainSliderImages_by_id($id)
    {
		$this->db->select('*');
		$this->db->from('tbl_main_slider');
		$this->db->where('ID', $id);
		$query = $this->db->get(); 
		
						if ($query->num_rows() > 0)
						{
							$rows = $query->result_array();
						   				$data = array(
												"ID"            => $rows[0]['ID'],
												"cName"            => $rows[0]['cName'],
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

	 /**
    * add category
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function addMainSliderImages(){
		$cName = $this->input->post('cName');
		$description = $this->input->post('description');
		$this->db->where('cName', $cName);
		$query = $this->db->get('tbl_main_slider');

        if($query->num_rows > 0)
		{
		}
		else
		{	
			if ($_FILES['fileAttachement']['name'])
			{
					$file_name = $this->uploadAttachment();
					// print_r($file_name);
					// exit;
				 $data = array(
                    'cName' => $cName,
					'description' => $description,
					'imagePath' => $file_name
                );
				$query = $this->db->insert('tbl_main_slider', $data);
				return $query;
				
			}
		}
	}
	
	    /**
    * Update category
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function update_mainSliderImages($id){
		$cName = $this->input->post('cName');
		$description = $this->input->post('description');
		$imagePath = $this->input->post('imagePath');
		
			if ($_FILES['fileAttachement']['name'])
			{
					$deleteAttachFile = $this->deleteAttachFile($imagePath);
				$file_name = $this->uploadAttachment();
					// print_r($file_name);
					// exit;
				$data = array(
								'cName' => $cName,
								'description' => $description,
								'imagePath' => $file_name
							);
		
				$this->db->where('id', $id);
				$msg = $this->db->update('tbl_main_slider', $data);
				if($msg){
					return true;
				}else{
					return false;
				}
				
			}
		

	}
 /**
    * show category
    * @param array $data - associative array with data to store
    * @return boolean
    */
    function showMainSliderImages(){	
	$this->db->select('*');
	$query = $this->db->get('tbl_main_slider');
	 if($query->num_rows > 0){
		 return $query->result_array();
		 }else
		 {
			return false;
		 }
	}
	
    function deleteMainSliderImages($id){
		// $data = array(
						// 'delete' => 1
					 // );
		$this->db->where('ID', $id);
		$this->db->delete('tbl_main_slider'); 
	}
	
    function uploadAttachment(){

		$config['upload_path']   = "public/upload/sliderImagesUpload/";
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
    function deleteAttachFile($filpath){
		$unlinkUrl ="public/upload/sliderImagesUpload/".$filpath;
		if(file_exists($unlinkUrl)){
			unlink($unlinkUrl);
			echo 'yes';
		}
		else{
			echo $unlinkUrl." is not available";  
			 
		}
			
	}
 
}

?>