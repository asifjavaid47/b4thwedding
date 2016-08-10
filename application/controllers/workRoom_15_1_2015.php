<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class WorkRoom extends CI_Controller
{
	public function __construct() {
        parent::__construct();
        $this->load->model('WorkRoom_model');
        /*if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }*/
    }
	public function message()
	{
		$data['projectID'] 		= 	$this->uri->segment(3);
		$data['receiverID'] 	= 	$this->uri->segment(4);
		if($this->input->post('message')!='')
			{
				$lastInsertID = $this->WorkRoom_model->sendMessage($data['projectID'],$data['receiverID'],$this->input->post('message'));
				if ($_FILES['fileAttachement']['name'])
					{
						$this->uploadMessageAttachment($lastInsertID);
					}
			}
		$data["messageList"] 		=	$this->WorkRoom_model->getMessage($data['projectID']);
		$data["content"] = "workroom/message_view";
		$this->load->view('template/template', $data);
			
		
    }
	public function cancelProjectStepOne()
	{
		$data['projectID'] 		= 	$this->uri->segment(3);
		$data['receiverID'] 	= 	$this->uri->segment(4);
		$checkCancelProjectReq 	= $this->WorkRoom_model->checkCancelProjectReq($data['projectID'],$data['receiverID']);
		if ($checkCancelProjectReq)
		{
			$data["content"] = "workroom/cancelProjectMsg_view";
			$this->load->view('template/template', $data);
		}
		else {
			$data["content"] = "workroom/cancelProjectStepOne_view";
			$this->load->view('template/template', $data);
		}
		
			
		
    }
	public function cancelProjectApproval()
	{
		$data['projectID'] 		= 	$this->uri->segment(3);
		$data['receiverID'] 	= 	$this->uri->segment(4);
			$this->WorkRoom_model->cancelProjectApproval($data['projectID'],$data['receiverID']);
			// $checkCancelProjectReq = $this->WorkRoom_model->checkCancelProjectReq($data['projectID'],$data['receiverID']);
			// if ($checkCancelProjectReq)
			// {
				$data["content"] = "workroom/cancelProjectMsg_view";
				$this->load->view('template/template', $data);
			// }
			// else {
				// $data["content"] = "workroom/cancelProjectStepOne_view";
				// $this->load->view('template/template', $data);
			// }
		
			
		
    }

public function cancelProjectStepFinal()
{
		
		
			 
	$data['projectID'] 		= 	$this->uri->segment(3);
	$data['receiverID'] 	= 	$this->uri->segment(4);
	if((empty($data['projectID'])) || (empty($data['receiverID'])))
	{
		redirect(base_url().'project/my_jobs_c/');
	}
	else
	{
		$data['cancelRefndDsputeStatus'] = $this->input->post('cancelRefndDsputeStatus');
	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cancelRefndDsputeEscrow', 'cancelRefndDsputeEscrow', 'required');
		$this->form_validation->set_rules('cancelRefndDsputeFreelancer', 'cancelRefndDsputeFreelancer', 'required');
		$this->form_validation->set_rules('cancelRefndDsputeReasion', 'cancelRefndDsputeReasion', 'required');
		$this->form_validation->set_rules('cancelRefndDsputeStatus', 'cancelRefndDsputeStatus', 'required');
		$this->form_validation->set_rules('cancelRefndDsputeDescribe', 'cancelRefndDsputeDescribe', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->form_validation->run() == FALSE)
		{
			$checkCancelProjectReq = $this->WorkRoom_model->checkCancelProjectReq($data['projectID'],$data['receiverID']);
			if ($checkCancelProjectReq)
			{
				$data["content"] = "workroom/cancelProjectMsg_view";
				$this->load->view('template/template', $data);
			}
			else {
				$data["content"] = "workroom/cancelProjectStepFinal_view";
				$this->load->view('template/template', $data);	
			}
		}
		
		else
		{			
		
			$cancelProjectStepFinal = $this->WorkRoom_model->cancelProjectStepFinal($data['projectID'],$data['receiverID']);
			if($cancelProjectStepFinal)
			{
				// $this->session->set_flashdata('success', 'Project Add Successfully');
				// redirect(base_url().'project/my_jobs_c/');
				$data["msg"] = "insert sucessfull";
				$data["content"] = "workroom/cancelProjectMsg_view";
				$this->load->view('template/template', $data);					
			}
			else
			{
				$data["content"] = "workroom/cancelProjectStepFinal_view";
				$this->load->view('template/template', $data);	
			
			}
		}
	}
		
}
	
	
	function uploadsFilesList($projectID)
	{
		$userID =$this->session->userdata('userID');
		$data['projectID']= $projectID;
		$data['listwrUploadFile']=$this->WorkRoom_model->getUploadsFilesList($projectID);
						
		$data["content"] = "workroom/uploadsFilesList_view";
		$this->load->view('template/template', $data);	
			
	}
	
	function addUploadFiles($projectID)
	{
			$data['projectID']= $projectID;
		if($this->input->post('title')!='')
		{
			$userID =$this->session->userdata('userID');
			$data= array(
			'wrUploadFileTitle' 		=>$this->input->post('title'),
			'wrUploadFileDescription' 	=>$this->input->post('wrUploadFileDescription'),
			'date' 					=>date('Y-m-d'),
			'projectID' 				=>$projectID,
			'userID' 				=>$userID
			
			);
		$lastInsertID = $this->WorkRoom_model->addUploadFiles($data);
		if ($_FILES['fileAttachement']['name'])
					{
						$this->uploadportfolioAttachment($lastInsertID);
					}
			redirect(base_url().'workroom/uploadsFilesList/'.$projectID);
		}else
		{
		
		$data["content"] = "workroom/addUploadFiles_view";
		$this->load->view('template/template', $data);
		}
						
		
			
	}
	
	
	function deleteUploadsFiles() 
	{
			foreach ($_POST['chk'] as $chk) {
			$this->WorkRoom_model->deleteUploadsFiles($chk);
			}
			redirect(base_url().'workRoom/uploadsFilesList');
	
	}
	
	
	function uploadportfolioAttachment($lastInsertID) {

        $config['upload_path']   = "public/upload/wr_uploadsFiles/";
	    $config['allowed_types'] = "gif|jpg|jpeg|png|tiff|tif|pdf|jpeg|jif|bmp|doc|docx|xls|txt";

        $config['max_size'] = "0";
        $config['max_width'] = "0";
        $config['max_height'] = "0";

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("fileAttachement")) {

            echo $this->upload->display_errors();
        } else {

            $finfo = $this->upload->data("fileAttachement");
            $this->WorkRoom_model->uploadportfolioAttachment($finfo['file_name'], $lastInsertID);
        }
    }
	

	function download($file)
	{
			
		$data = file_get_contents(base_url()."public/upload/wr_uploadsFiles/".$file); // Read the file's contents			
		force_download($file, $data); 	
			
	}
	function showImage($file)
	{
			
		$data = base_url()."public/upload/wr_uploadsFiles/".$file;		
		echo '<img src="'.$data.'">';	
			
	}
	
	
	function uploadMessageAttachment($lastInsertID) {

        $config['upload_path']   = "public/upload/messageUpload/";
	   $config['allowed_types'] = "gif|jpg|jpeg|png|tiff|tif|pdf|jpeg|jif|bmp|doc|docx|xls|txt";

        $config['max_size'] = "0";
        $config['max_width'] = "0";
        $config['max_height'] = "0";

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("fileAttachement")) {

            echo $this->upload->display_errors();
        } else {

            $finfo = $this->upload->data("fileAttachement");
            $this->WorkRoom_model->uploadMessageAttachment($finfo['file_name'], $lastInsertID);
        }
    }



}
?>