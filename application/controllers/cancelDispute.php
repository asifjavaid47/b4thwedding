<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class CancelDispute extends CI_Controller
{
	public function __construct() {
        parent::__construct();
        $this->load->model('canceldispute_model');
        $this->load->model('milestone_model');
        $this->load->model('projects_model');
       if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }
    }
public function cancelProjectStepFinal()
{
		 
		$data['projectID'] 		= 	$this->uri->segment(3);
		$data['receiverID'] 	= 	$this->uri->segment(4);

		$this->load->library('form_validation');
		// $this->form_validation->set_rules('cancelRefndDsputeEscrow', 'cancelRefndDsputeEscrow', 'required');
		$this->form_validation->set_rules('cancelRefndDsputeFreelancer', 'cancelRefndDsputeFreelancer', 'required');
		// $this->form_validation->set_rules('cancelRefndDsputeReasion', 'cancelRefndDsputeReasion', 'required');
		$this->form_validation->set_rules('cancelRefndDsputeStatus', 'cancelRefndDsputeStatus', 'required');
		$this->form_validation->set_rules('cancelRefndDsputeDescribe', 'cancelRefndDsputeDescribe', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->form_validation->run() == FALSE)  /*  by default */
		{
			$data["getCancelDisputeDetail"] = $this->canceldispute_model->getCancelDisputeDetail($data['projectID']);
			if($data["getCancelDisputeDetail"]) {
				
			}
			else 
			{
				$data["getProjectDetail"] = $this->canceldispute_model->getProjectDetail($data['projectID']);
			}
			$data["active_class"] = 'cancel';
			$data["sidebar"] = $this->load->view('template/side_bar', $data , true);
			$data["content"] = "cancelDispute/cancelProjectStepFinal_view";
			$this->load->view('template/template', $data);

		}		
		else
		{	/*insert Request*/
	
			$senderID =$this->session->userdata('userID');  
			
			if($_FILES['fileAttachementdispute']['name'])
			{
				$file_name = $this->uploadAttachmentDispute();
			}
			$cancelProjectStepFinal = $this->canceldispute_model->cancelProjectStepFinal($data['projectID'],$data['receiverID'],$file_name);
			if($cancelProjectStepFinal)
			{
			
				// $data["getProject"] = $this->canceldispute_model->getProject($data['projectID']);
				
				
				$data["active_class"] = 'cancel';
				$data["sidebar"] = $this->load->view('template/side_bar', $data , true);
				$data["content"] = "cancelDispute/cancelProjectStepFinal_view";
				$this->load->view('template/template', $data);					
			}
			else
			{
				$data["active_class"] = 'cancel';
				$data["sidebar"] = $this->load->view('template/side_bar', $data , true);
				$data["content"] = "cancelDispute/cancelProjectStepFinal_view";
				$this->load->view('template/template', $data);	
			
			}
		} 
	
	
}


public function disputeReply()
{
		$data['projectID'] 		= 	$this->uri->segment(3);
		$data['receiverID'] 	= 	$this->uri->segment(4);

		$this->load->library('form_validation');
		$this->form_validation->set_rules('cancelRefndDsputeDescribe', 'cancelRefndDsputeDescribe', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->form_validation->run() == FALSE)  /*  by default */
		{
			$data["active_class"] = 'cancel';
			$data["sidebar"] = $this->load->view('template/side_bar', $data , true);
			$data["content"] = "cancelDispute/cancelProjectStepFinal_view";
			$this->load->view('template/template', $data);

		}		
		else
		{	/*insert Request*/
	
			$senderID =$this->session->userdata('userID');  
			
			if($_FILES['fileAttachementdispute']['name'])
			{
				$file_name = $this->uploadAttachmentDispute();
			}
			$disputeReply = $this->canceldispute_model->disputeReply($data['projectID'],$data['receiverID'],$file_name);
			if($disputeReply)
			{
				$data["active_class"] = 'cancel';
				$data["sidebar"] = $this->load->view('template/side_bar', $data , true);
				redirect(base_url().'cancelDispute/cancelProjectStepFinal/'.$data['projectID'].'/'.$data['receiverID']);
				// $data["content"] = "cancelDispute/cancelProjectStepFinal_view";
				// $this->load->view('template/template', $data);					
			}
			else
			{
				$data["active_class"] = 'cancel';
				$data["sidebar"] = $this->load->view('template/side_bar', $data , true);
				redirect(base_url().'cancelDispute/cancelProjectStepFinal/'.$data['projectID'].'/'.$data['receiverID']);
				// $data["content"] = "cancelDispute/cancelProjectStepFinal_view";
				// $this->load->view('template/template', $data);	
			
			}
		} 
		
		
			
		
} 	

	public function cancelProjectApproval()
	{
		$data['projectID'] 		= 	$this->uri->segment(3);
		$data['receiverID'] 	= 	$this->uri->segment(4);
		
		$checkCancelProjectReq = $this->canceldispute_model->cancelProjectApproval($data['projectID'],$data['receiverID']);
		if ($checkCancelProjectReq)
		{
		
			
                        $data["active_class"] = 'cancel';
                        $data["sidebar"] = $this->load->view('template/side_bar', $data , true);
			// $data["content"] = "cancelDispute/cancelProjectStepFinal_view";
			// $this->load->view('template/template', $data);
			redirect(base_url().'cancelDispute/cancelProjectStepFinal/'.$data['projectID'].'/'.$data['receiverID']);
		}
		
		
    } 
	





	
	
public function cancelProjectStepOne()
{
		 
	$data['projectID'] 		= 	$this->uri->segment(3);
	$data['receiverID'] 	= 	$this->uri->segment(4);
	
$data["getCancelDisputeDetail"] = $this->canceldispute_model->getCancelDisputeDetail($data['projectID']);
			if($data["getCancelDisputeDetail"]) {
				redirect(base_url().'cancelDispute/cancelProjectStepFinal/'.$data['projectID'].'/'.$data['receiverID']);
			}
			else 
			{
				$data["getProjectDetail"] = $this->canceldispute_model->getProjectDetail($data['projectID']);
			
                $data["active_class"] = 'cancel';
                $data["sidebar"] = $this->load->view('template/side_bar', $data , true);
                $data["content"] = "cancelDispute/cancelProjectStepOne_view";
                $this->load->view('template/template', $data);	
			}
		
}
    
   

	public function cancelProjectApproval_222()
	{
		$data['projectID'] 		= 	$this->uri->segment(3);
		$data['receiverID'] 	= 	$this->uri->segment(4);
		
		$checkCancelProjectReq = $this->canceldispute_model->cancelProjectApproval($data['projectID'],$data['receiverID']);
		if ($checkCancelProjectReq)
		{
			$data['disputeShow'] = $this->canceldispute_model->disputeShow($data['projectID'] ,$data['receiverID']);
	
			$data["getProject"] = $this->canceldispute_model->getProject($data['projectID']);	
                        $data["active_class"] = 'cancel';
                        $data["sidebar"] = $this->load->view('template/side_bar', $data , true);
			$data["content"] = "cancelDispute/showDetailDispute_view";
			$this->load->view('template/template', $data);
			redirect(base_url().'cancelDispute/cancelProjectStepOne/'.$data['projectID'].'/'.$data['receiverID']);
		}
		else
		{
			$data['disputeShow'] = $this->canceldispute_model->disputeShow($data['projectID'] ,$data['receiverID']);
	
			$data["getProject"] = $this->canceldispute_model->getProject($data['projectID']);
                        $data["active_class"] = 'cancel';
                        $data["sidebar"] = $this->load->view('template/side_bar', $data , true);
			$data["content"] = "cancelDispute/showDetailDispute_view";
			$this->load->view('template/template', $data);
		}
		
    } 
	
	

	
	
	function uploadsFilesList($projectID)
	{
		$userID =$this->session->userdata('userID');
		$data['projectID']= $projectID;
		$data['listwrUploadFile']=$this->canceldispute_model->getUploadsFilesList($projectID);
						
		$data['projectID'] 		= 	$this->uri->segment(3);
		$data['receiverID'] 	= 	$this->uri->segment(4);
                        $data["active_class"] = 'files';
                        $data["sidebar"] = $this->load->view('template/side_bar', $data , true);
		$data["content"] = "cancelDispute/uploadsFilesList_view";
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
		$lastInsertID = $this->canceldispute_model->addUploadFiles($data);
		if ($_FILES['fileAttachement']['name'])
					{
						$this->uploadportfolioAttachment($lastInsertID);
					}
			redirect(base_url().'cancelDispute/uploadsFilesList/'.$projectID);
		}else
		{
		
		$data["content"] = "cancelDispute/addUploadFiles_view";
		$this->load->view('template/template', $data);
		}
						
		
			
	}
	
	
	function deleteUploadsFiles() 
	{
			foreach ($_POST['chk'] as $chk) {
			$this->canceldispute_model->deleteUploadsFiles($chk);
			}
			redirect(base_url().'cancelDispute/uploadsFilesList');
	
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
            $this->canceldispute_model->uploadportfolioAttachment($finfo['file_name'], $lastInsertID);
        }
    }
	

	// function download($file)
	// {
			
		// $data = file_get_contents(base_url()."public/upload/wr_uploadsFiles/".$file); // Read the file's contents			
		// force_download($file, $data); 	
			
	// }
	// function showImage($file)
	// {
			
		// $data = base_url()."public/upload/wr_uploadsFiles/".$file;		
		// echo '<img src="'.$data.'">';	
			
	// }
	function download($file)
	{
			
		$data = file_get_contents(base_url()."public/upload/dispute/".$file); // Read the file's contents			
		force_download($file, $data); 	
			
	}
	function showImage($file)
	{
			
		$data = base_url()."public/upload/dispute/".$file;		
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
            $this->canceldispute_model->uploadMessageAttachment($finfo['file_name'], $lastInsertID);
        }
    }

			function uploadAttachmentDispute() 
	{

		$config['upload_path']   = "public/upload/dispute/";
		$config['allowed_types'] = "gif|jpg|jpeg|png|tiff|tif|pdf|jpeg|jif|bmp";

		$config['max_size'] = "0";
		$config['max_width'] = "0";
		$config['max_height'] = "0";

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload("fileAttachementdispute"))
		{

			echo $this->upload->display_errors();
		} 
		else 
		{

			$finfo = $this->upload->data("fileAttachementdispute");
			$file_name = $finfo['file_name'];
			return $file_name;
		}
    }
	function deleteAttachFileDispute($filpath) 
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

public function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 365 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60  =>  'month',
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second'
                );
    $a_plural = array( 'year'   => 'years',
                       'month'  => 'months',
                       'day'    => 'days',
                       'hour'   => 'hours',
                       'minute' => 'minutes',
                       'second' => 'seconds'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
        }
    }
}  


      

}
?>