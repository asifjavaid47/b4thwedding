<?php
class CencellationReason extends CI_Controller {

    /**
    * author	:raza malik <eminentdeveloper69@gmail.com>
    * date		:2 janury 2015
    * @constant string
    */

    /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/cencellationReason_model');

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
    
public function addCencellationReason()
{
		$id = $this->uri->segment(4);
		$data['showCencellationReason'] = $this->cencellationReason_model->showCencellationReason();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cancelReasonName', 'cancelReasonName', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if(empty($id))
		{
                        if($this->form_validation->run() == FALSE)
                        {
                                        $data["content"] = "admin/addCencellationReason_view";
                                        $this->load->view('admin/template/template', $data);
                        }
                        else {
                            if($this->cencellationReason_model->addCencellationReason())
                            {
                                    $data["successful_mesg"] = "Skill Inserted Successfully!";
                                    $data["content"] = "admin/addCencellationReason_view";
                                    $this->load->view('admin/template/template', $data);					
                            }
                            else
                            {
                                             $data['duplicat_mesg'] = "Skill Alread Exists!";
                                            $data["content"] = "admin/addCencellationReason_view";
                                            $this->load->view('admin/template/template', $data);		
                            }
                        }
		}
                else
		{
			if($this->form_validation->run() == FALSE)
			{
				$data['cancelReason'] = $this->cencellationReason_model->get_cancelReasonName_by_id($id);
				$data["content"] = "admin/addCencellationReason_view";
				$this->load->view('admin/template/template', $data);
			}
			
			else
			{	
				$query = $this->cencellationReason_model->updateCencellationReason($id);
				if($query)
				{	$data['cancelReason'] = $this->cencellationReason_model->get_cancelReasonName_by_id($id);
					$data["successful_mesg"] = "Skill updated Successfully";
					$data["content"] = "admin/addCencellationReason_view";
					$this->load->view('admin/template/template', $data);					
				}
				else
				{
						$data['cancelReason'] = $this->cencellationReason_model->get_cancelReasonName_by_id($id);
						$data['duplicat_mesg'] = "error";
						$data["content"] = "admin/addCencellationReason_view";
						$this->load->view('admin/template/template', $data);		
				}
			}			
		
		}
	
	}
	

	public function showCencellationReason()
	{
		$data['showCencellationReason'] = $this->cencellationReason_model->showCencellationReason();
		$data["content"] = "admin/showCencellationReason_view";
		$this->load->view('admin/template/template', $data);	
	
	}
	    /**
    * Delete cat by his id
    * @return void
    */

    public function deleteCencellationReason($ID)
    {	
        $id = $this->uri->segment(4);
		$this->cencellationReason_model->deleteCencellationReason($id);
		redirect(base_url().'admin/showCencellationReason');
    }


}