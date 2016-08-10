<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class WorkRoom extends CI_Controller
{
	public function __construct() {
        parent::__construct();
        $this->load->model('workroom_model');
        $this->load->model('milestone_model');
        $this->load->model('projects_model');
       if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }
    }
	public function message()
	{
		$data['projectID'] 		= 	$this->uri->segment(3);
		$data['receiverID'] 	= 	$this->uri->segment(4);
		if($this->input->post('message')!='')
			{
				$lastInsertID = $this->workroom_model->sendMessage($data['projectID'],$data['receiverID'],$this->input->post('message'));
				if ($_FILES['fileAttachement']['name'])
					{
						$this->uploadMessageAttachment($lastInsertID);
					}
			}
		$data["messageList"] 		=	$this->workroom_model->getMessage($data['projectID']);
                $data['project']   	= $this->projects_model->get_project_detail($data['projectID']);
                $data['awarded'] 	= $this->milestone_model->getAwardedDetail($data['projectID']);
//                $udata = $data['awarded'];
                if(!empty($data['awarded'])){
                    foreach($data['awarded'] as $udata){
    //                    echo $udata['client_last_login']; exit;
                        if($udata['client_last_login'] > 0)
                            $udata['client_last_login'] = $this->projects_model->get_timeago(strtotime($udata['client_last_login']));
                        else
                            $udata['client_last_login'] = 'First Time Login';
                        if($udata['freelancer_last_login'] > 0)
                            $udata['freelancer_last_login'] = $this->projects_model->get_timeago(strtotime($udata['freelancer_last_login']));
                        else
                            $udata['freelancer_last_login'] = 'First Time Login';

                        $data['awarded'] = $udata;
                    }
                }
//                echo "<pre>"; print_r($data['messageList']); echo "</pre>"; exit;
		$data["active_class"] = 'messages';
		$data["sidebar"] = $this->load->view('template/side_bar', $data , true);
		$data["content"] = "workroom/message_view";
		$this->load->view('template/template', $data);
			
		
    }
	
public function cancelProjectStepOne()
{
		 
	$data['projectID'] 		= 	$this->uri->segment(3);
	$data['receiverID'] 	= 	$this->uri->segment(4);
	$checkExitDispute = $this->workroom_model->checkExitDispute($data['projectID'],$data['receiverID']);
	if ($checkExitDispute)
	{
		$data['disputeShow'] = $this->workroom_model->disputeShow($data['projectID'] ,$data['receiverID']);
	
		$data["getProject"] = $this->workroom_model->getProject($data['projectID']);
                $data["active_class"] = 'cancel';
                $data["sidebar"] = $this->load->view('template/side_bar', $data , true);
		$data["content"] = "workroom/showDetailDispute_view";
		$this->load->view('template/template', $data);	
	
	}
	else
	{	

                $data["active_class"] = 'cancel';
                $data["sidebar"] = $this->load->view('template/side_bar', $data , true);
                $data["content"] = "workroom/cancelProjectStepOne_view";
                $this->load->view('template/template', $data);	
	
	}	
}
    
   
public function cancelProjectStepFinal()
{
		 
	$data['projectID'] 		= 	$this->uri->segment(3);
	$data['receiverID'] 	= 	$this->uri->segment(4);
	
	$checkExitDispute = $this->workroom_model->checkExitDispute($data['projectID'],$data['receiverID']);
	if ($checkExitDispute)
	{
		$data['disputeShow'] = $this->workroom_model->disputeShow($data['projectID'] ,$data['receiverID']);
	
		$data["getProject"] = $this->workroom_model->getProject($data['projectID']);	
                $data["active_class"] = 'cancel';
                $data["sidebar"] = $this->load->view('template/side_bar', $data , true);
		$data["content"] = "workroom/showDetailDispute_view";
		$this->load->view('template/template', $data);	
	
	}
	else
	{	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cancelRefndDsputeEscrow', 'cancelRefndDsputeEscrow', 'required');
		$this->form_validation->set_rules('cancelRefndDsputeFreelancer', 'cancelRefndDsputeFreelancer', 'required');
		// $this->form_validation->set_rules('cancelRefndDsputeReasion', 'cancelRefndDsputeReasion', 'required');
		$this->form_validation->set_rules('cancelRefndDsputeStatus', 'cancelRefndDsputeStatus', 'required');
		$this->form_validation->set_rules('cancelRefndDsputeDescribe', 'cancelRefndDsputeDescribe', 'required');
		$this->form_validation->set_error_delimiters('<div class="alert alert-error"><a class="close" data-dismiss="alert">×</a><strong>', '</strong></div>');
		
		if($this->form_validation->run() == FALSE)
		{
			$data["getProjectDetailPrice"] = $this->workroom_model->getProjectDetailPrice($data['projectID']);
				//$data['cancellationReasonList'] = $this->workroom_model->cancellationReasonList();
	
                        $data["active_class"] = 'cancel';
                        $data["sidebar"] = $this->load->view('template/side_bar', $data , true);
			$data["content"] = "workroom/cancelProjectStepFinal_view";
			$this->load->view('template/template', $data);

		}		
		else
		{	//insert Request
	
		$senderID =$this->session->userdata('userID');  
				if($_FILES['fileAttachementdispute']['name'])
				{
					$file_name = $this->uploadAttachmentDispute();
							// $insert_data_files = array(
		// 'projectID' 	=> $data['projectID'],
		// 'senderID' 	=> $senderID,
		// 'receiverID' 	=> $data['receiverID'] ,
		// 'disputeFilesName' 		=> 'req creater',
		// 'disputeFilesDescription' 	=> 'req creater',			
		// 'disputeFilesimagePath' 		=> $file_name,
		// 'userName' 		=> 'req creater'		
	// );
	

					
						$insert_data = array(
									'projectID' 	=> $data['projectID'],
									'senderID' 	=> $senderID,
									'receiverID' 	=> $data['receiverID'],
									'cancelReqBy' 	=> $senderID,
									'cancelRefndDsputeEscrow' 		=> $this->input->post('cancelRefndDsputeEscrow'),
									'cancelRefndDsputeFreelancer' 	=> $this->input->post('cancelRefndDsputeFreelancer'),			
									'cancelRefndDsputeReasion' 		=> $this->input->post('cancelRefndDsputeReasion'),
									'cancelRefndDsputeStatus' 		=> $this->input->post('cancelRefndDsputeStatus'),					
									'cancelRefndDsputeDescribe' 	=> $this->input->post('cancelRefndDsputeDescribe'),
								'disputeFilesimagePath' 		=> $file_name,
									'cancelRefndDsputeDate'			=> date("Y-m-d H:i:s")			
								);
				}
			$cancelProjectStepFinal = $this->workroom_model->cancelProjectStepFinal($data['projectID'],$data['receiverID'],$insert_data);
			if($cancelProjectStepFinal)
			{
			
				$data["getProject"] = $this->workroom_model->getProject($data['projectID']);
				
				
                                $data["active_class"] = 'cancel';
                                $data["sidebar"] = $this->load->view('template/side_bar', $data , true);
				$data["content"] = "workroom/showDetailDispute_view";
				$this->load->view('template/template', $data);					
			}
			else
			{
                                $data["active_class"] = 'cancel';
                                $data["sidebar"] = $this->load->view('template/side_bar', $data , true);
				$data["content"] = "workroom/cancelProjectStepFinal_view";
				$this->load->view('template/template', $data);	
			
			}
		} 
	
	}	
}

	public function cancelProjectApproval()
	{
		$data['projectID'] 		= 	$this->uri->segment(3);
		$data['receiverID'] 	= 	$this->uri->segment(4);
		
		$checkCancelProjectReq = $this->workroom_model->cancelProjectApproval($data['projectID'],$data['receiverID']);
		if ($checkCancelProjectReq)
		{
			$data['disputeShow'] = $this->workroom_model->disputeShow($data['projectID'] ,$data['receiverID']);
	
			$data["getProject"] = $this->workroom_model->getProject($data['projectID']);	
                        $data["active_class"] = 'cancel';
                        $data["sidebar"] = $this->load->view('template/side_bar', $data , true);
			$data["content"] = "workroom/showDetailDispute_view";
			$this->load->view('template/template', $data);
			redirect(base_url().'workRoom/cancelProjectStepOne/'.$data['projectID'].'/'.$data['receiverID']);
		}
		else
		{
			$data['disputeShow'] = $this->workroom_model->disputeShow($data['projectID'] ,$data['receiverID']);
	
			$data["getProject"] = $this->workroom_model->getProject($data['projectID']);
                        $data["active_class"] = 'cancel';
                        $data["sidebar"] = $this->load->view('template/side_bar', $data , true);
			$data["content"] = "workroom/showDetailDispute_view";
			$this->load->view('template/template', $data);
		}
		
    } 
	
	
public function disputeProjectApproval()
{
		$data['projectID'] 		= 	$this->uri->segment(3);
		$data['receiverID'] 	= 	$this->uri->segment(4);
		
		$senderID =$this->session->userdata('userID');  
		$userName =$this->session->userdata('fName');  
	if($_FILES['fileAttachementdispute']['name'])
		{
			$file_name = $this->uploadAttachmentDispute();
				$insert_data = array(
		'projectID' 	=> $data['projectID'],
		'senderID' 	=> $senderID,
		'receiverID' 	=> $data['receiverID'] ,
		'disputeFilesName' 		=> $this->input->post('disputeFilesName'),
		'disputeFilesDescription' 	=> $this->input->post('disputeFilesDescription'),			
		'disputeFilesimagePath' 		=> $file_name,
		'userName' 		=> $userName		
	);
	
	$checkCancelProjectReq = $this->workroom_model->disputeProjectApproval($insert_data,$data['projectID'],$data['receiverID']);
		if ($checkCancelProjectReq)
			{
					$data['disputeShow'] = $this->workroom_model->disputeShow($data['projectID'] ,$data['receiverID']);
	
				$data["disputeapprovalOk"] = $this->workroom_model->disputeapprovalOk($data['projectID']);
				$data["getProject"] = $this->workroom_model->getProject($data['projectID']);	
				$data["content"] = "workroom/showDetailDispute_view";
				$this->load->view('template/template', $data);
				redirect(base_url().'workRoom/cancelProjectStepOne/'.$data['projectID'].'/'.$data['receiverID']);
			}
			else {
					$data['disputeShow'] = $this->workroom_model->disputeShow($data['projectID'] ,$data['receiverID']);
	
				$data["disputeapprovalOk"] = $this->workroom_model->disputeapprovalOk($data['projectID']);
				$data["getProject"] = $this->workroom_model->getProject($data['projectID']);
                        $data["active_class"] = 'cancel';
                        $data["sidebar"] = $this->load->view('template/side_bar', $data , true);
				$data["content"] = "workroom/showDetailDispute_view";
				$this->load->view('template/template', $data);
			}
	}
		
		
			
		
} 	
	
	
	
	function uploadsFilesList($projectID)
	{
		$userID =$this->session->userdata('userID');
		$data['projectID']= $projectID;
		$data['listwrUploadFile']=$this->workroom_model->getUploadsFilesList($projectID);
						
		$data['projectID'] 		= 	$this->uri->segment(3);
		$data['receiverID'] 	= 	$this->uri->segment(4);
                        $data["active_class"] = 'files';
                        $data["sidebar"] = $this->load->view('template/side_bar', $data , true);
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
		$lastInsertID = $this->workroom_model->addUploadFiles($data);
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
			$this->workroom_model->deleteUploadsFiles($chk);
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
            $this->workroom_model->uploadportfolioAttachment($finfo['file_name'], $lastInsertID);
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
            $this->workroom_model->uploadMessageAttachment($finfo['file_name'], $lastInsertID);
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