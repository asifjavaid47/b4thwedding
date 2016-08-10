<?php
class Account extends CI_Controller {

    /**
    * name of the folder responsible for the views 
    * which are manipulated by this controller
    * @constant string
    */
       /**
    * Responsable for auto load the model
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/account_model');
		if($this->session->userdata('is_logged_in'))
		{
			
        }
		else
		{
        	$this->load->view('admin/login');	
        }
    }
 
    public function changePassword()
	{
		if(($this->input->post('password'))!='')
		{
			
			$userID	= $this->session->userdata('adminID');
			$result = $this->account_model->gettPassword($userID);
			$userPassword	=	$result[0]['pass_word'];
			$current1		= 	$this->input->post('current');
			$current		=	md5($current1);
			if($userPassword==$current)
			{
			$password		= 	$this->input->post('password');	
				$this->account_model->changePassword($userID,md5($password));
				$data["successful_mesg"]	=	'Password Successfully Change';	
			}else
			{
			$data["successful_mesg"]	=	"Current Passwod Do's Match";	
			}
		
		}
		
		$data["content"] = "admin/changePassword_view";
		$this->load->view('admin/template/template', $data);	
	
	}
   
    public function delete_user(){
        
        $id = $this->uri->segment(4);
        $this->users_list_model->getAccountInfo($id);
			$this->session->set_flashdata('msg', 'Delete user');
        redirect(base_url().'admin/show_user_list');
       
  
	}
	
	

}