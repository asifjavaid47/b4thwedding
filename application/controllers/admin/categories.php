<?php
class Categories extends CI_Controller {

    /**
    * author	:raza malik <eminentdeveloper69@gmail.com>
    * date		:2 janury 2015
    * @constant string
    */
    const VIEW_FOLDER = 'admin/categories';
 
    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/categories_model');

        if(!$this->session->userdata('is_logged_in')){
            redirect(base_url().'admin');
        }
		else
			$this->load->helper('date');
    }
 
    /**
    * Load the main view with all the current model model's data.
    * @return void
    */
    
	public function add_category()
	{
		$id = $this->uri->segment(4);
		// print_r($id);
		// exit();	
		$this->load->library('form_validation');
			$this->form_validation->set_rules('cName', 'cName', 'trim|required');
			$this->form_validation->set_rules('description', 'description', 'trim|required');
			$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
			
		if(empty($id))
		{
		
			if($this->form_validation->run() == FALSE)
			{
					$data["content"] = "admin/addCategoryView";
					$this->load->view('admin/template/template', $data);						
			}
			
			else
			{
							
				if($this->categories_model->add_category())
				{	
					$data["successful_mesg"] = "Category inserted Successfully!";
					$data["content"] = "admin/addCategoryView";
					$this->load->view('admin/template/template', $data);					
				}
				else
				{
						 $data['duplicat_mesg'] = "Category Already Exists";
						$data["content"] = "admin/addCategoryView";
						$this->load->view('admin/template/template', $data);		
				}
			}
		}
		else
		{		
			if($this->form_validation->run() == FALSE)
			{
					$data['cat'] = $this->categories_model->get_category_by_id($id);
					$data["content"] = "admin/addCategoryView";
					$this->load->view('admin/template/template', $data);						
			}
			
			else
			{	
				$query = $this->categories_model->update_category($id);
				if($query)
				{	$data['cat'] = $this->categories_model->get_category_by_id($id);
					$data["successful_mesg"] = "Category updated Successfully";
					$data["content"] = "admin/addCategoryView";
					$this->load->view('admin/template/template', $data);					
				}
				else
				{
						$data['cat'] = $this->categories_model->get_category_by_id($id);
						$data['duplicat_mesg'] = "error";
						$data["content"] = "admin/addCategoryView";
						$this->load->view('admin/template/template', $data);		
				}
			}			
		
		
		}
	
	}
	public function add_sub_category()
	{
		$id = $this->uri->segment(4);
		$data['showCategory'] = $this->categories_model->show_sub_category();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('sub_cat', 'sub_cat', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if(empty($id))
		{
                        if($this->form_validation->run() == FALSE)
                        {
                                        $data["content"] = "admin/addSubCategoryView";
                                        $this->load->view('admin/template/template', $data);
                        }
                        else {
                            if($this->categories_model->add_sub_category())
                            {
                                    $data["successful_mesg"] = "Skill Inserted Successfully!";
                                    $data["content"] = "admin/addSubCategoryView";
                                    $this->load->view('admin/template/template', $data);					
                            }
                            else
                            {
                                             $data['duplicat_mesg'] = "Skill Alread Exists!";
                                            $data["content"] = "admin/addSubCategoryView";
                                            $this->load->view('admin/template/template', $data);		
                            }
                        }
		}
                else
		{
			if($this->form_validation->run() == FALSE)
			{
                                        $data['cat'] = $this->categories_model->get_sub_category_by_id($id);
                                        $data["content"] = "admin/addSubCategoryView";
                                        $this->load->view('admin/template/template', $data);
			}
			
			else
			{	
				$query = $this->categories_model->update_sub_category($id);
				if($query)
				{	$data['cat'] = $this->categories_model->get_sub_category_by_id($id);
					$data["successful_mesg"] = "Skill updated Successfully";
					$data["content"] = "admin/addSubCategoryView";
					$this->load->view('admin/template/template', $data);					
				}
				else
				{
						$data['cat'] = $this->categories_model->get_sub_category_by_id($id);
						$data['duplicat_mesg'] = "error";
						$data["content"] = "admin/addSubCategoryView";
						$this->load->view('admin/template/template', $data);		
				}
			}			
		
		}
	
	}
	
	public function show_category()
	{
		$data['showCategory'] = $this->categories_model->show_category();
		$data["content"] = "admin/categoryView";
		$this->load->view('admin/template/template', $data);	
	
	}
	public function show_sub_category()
	{
		$data['showCategory'] = $this->categories_model->show_sub_category();
		$data["content"] = "admin/subCategoryListView";
		$this->load->view('admin/template/template', $data);	
	
	}
	    /**
    * Delete cat by his id
    * @return void
    */
    public function delete_category($ID)
    {	
        $id = $this->uri->segment(4);
		$this->categories_model->delete_category($id);
		redirect(base_url().'admin/show_category');
    }
    public function delete_sub_category($ID)
    {	
        $id = $this->uri->segment(4);
		$this->categories_model->delete_sub_category($id);
		redirect(base_url().'admin/show_sub_category');
    }
	public function add_category2()
	{
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('cName', 'Category Name', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
			$datestring = "%Y-%m-%d";
			$time = time();
			$date = mdate($datestring, $time); 
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array(
                    'cName' => $this->input->post('cName'),
					'description' => $this->input->post('description'),
					'startDate' => $date,
                );
                //if the insert has returned true then we show the flash message
                if($this->categories_model->store_category($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
				
		$data["content"] = "admin/addCategoryView";
		$this->load->view('admin/template/template', $data);		
	}

    public function add()
    {
		
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('cName', 'Category Name', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
			$datestring = "%Y-%m-%d";
			$time = time();
			$date = mdate($datestring, $time); 
            //if the form has passed through the validation
            if ($this->form_validation->run())
            {
                $data_to_store = array(
                    'cName' => $this->input->post('cName'),
					'startDate' => $date,
                );
                //if the insert has returned true then we show the flash message
                if($this->categories_model->store_category($data_to_store)){
                    $data['flash_message'] = TRUE; 
                }else{
                    $data['flash_message'] = FALSE; 
                }

            }

        }
        //load the view
        $data['main_content'] = 'admin/categories/add';
        $this->load->view('includes/template_changed', $data);  
    }       

    /**
    * Update item by his id
    * @return void
    */
    public function update()
    {
		 $id = $this->uri->segment(4);
		 print_r($id);
		 exit();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cName', 'cName', 'trim|required');
		$this->form_validation->set_rules('description', 'description', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->form_validation->run() == FALSE)
		{
				$data["content"] = "admin/addCategoryView";
				$this->load->view('admin/template/template', $data);						
		}
		
		else
		{
						
			if($this->categories_model->add_category())
			{	
				$data["successful_mesg"] = "successful insert";
				$data["content"] = "admin/addCategoryView";
				$this->load->view('admin/template/template', $data);					
			}
			else
			{
					 $data['duplicat_mesg'] = "category alread Exit";
					$data["content"] = "admin/addCategoryView";
					$this->load->view('admin/template/template', $data);		
			}
		}
	
	}
    public function update2()
    {
        //product id 
        $id = $this->uri->segment(4);
  
        //if save button was clicked, get the data sent via post
        if ($this->input->server('REQUEST_METHOD') === 'POST')
        {
            //form validation
            $this->form_validation->set_rules('cName', 'Category Name', 'required');
            $this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
            //if the form has passed through the validation
			$datestring = "%Y-%m-%d";
			$time = time();
			$date = mdate($datestring, $time); 
            if ($this->form_validation->run())
            {
    
                $data_to_store = array(
                    'cName' => $this->input->post('cName'),
					'updateDate' => $date,
                );
                //if the insert has returned true then we show the flash message
                if($this->categories_model->update_category($id, $data_to_store) == TRUE){
                    $this->session->set_flashdata('flash_message', 'updated');
                }else{
                    $this->session->set_flashdata('flash_message', 'not_updated');
                }
                redirect(base_url().'admin/categories/update/'.$id.'');

            }//validation run

        }

        //if we are updating, and the data did not pass trough the validation
        //the code below wel reload the current data

        //product data 
        $data['categories'] = $this->categories_model->get_category_by_id($id);
        //load the view
        $data['main_content'] = 'admin/categories/edit';
        $this->load->view('includes/template_changed', $data);            

    }//update

    /**
    * Delete product by his id
    * @return void
    */
    public function delete()
    {
        //category id 
        $id = $this->uri->segment(4);
        $this->categories_model->delete_category($id);
        redirect(base_url().'admin/categories');
    }//edit

}