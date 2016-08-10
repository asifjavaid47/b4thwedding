<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Inbox extends CI_Controller
{
	public function __construct() {
        parent::__construct();
        $this->load->model('inbox_model');
		$this->load->model('notification_model');
        if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }
    }

	
function sendMessage() 
{			
			
			if($this->input->post('message')!='')
			{
				$data['projectID'] =	$this->input->post('projectID');
				$data['receiverID'] =	$this->input->post('receiverID');
			$lastInsertID = $this->inbox_model->sendMessage($data['projectID'],$data['receiverID'],$this->input->post('message'));
				if ($_FILES['fileAttachement']['name'])
					{
						$this->uploadMessageAttachment($lastInsertID);
					}
				$data["projectDetail"] 	=	$this->inbox_model->getProjectDetail($data['projectID']);
				$data["InboxList"] 		=	$this->inbox_model->getMessage($data['projectID']);
				$data['notificationID'] =	$this->input->post('notificationID');
				
					$emailReceiverInfo		=	$this->inbox_model->getemailReceiverInfo($data['receiverID']);
					$email					=	$emailReceiverInfo[0]['email'];
					$fName					=	$emailReceiverInfo[0]['fName'];
					$lName					=	$emailReceiverInfo[0]['lName'];
					$this->load->library('email');
					$this->email->from('b4wedding@gmail.con', 'Notification');
					$this->email->to($email);
					$this->email->subject('Notification');
					$message = "<table width='850' border='0' cellspacing='0' cellpadding='0' style='background:#eee';>
							  <tr>
								<td style='padding:20px;'>
								<table width='630' border='0' cellspacing='0' cellpadding='0' align='center'>
							  
							  <tr>
								<td align=left style='background:#fff; padding:20px; font-family:Arial, Helvetica, sans-serif; font-size:14px; line-height:25px;'><h3>".$fName." ".$lName."</h3>
							<p>".$this->input->post('message')."</p>
							
							</td>
							  </tr>
							  
							  <tr>
								<td>&nbsp;</td>
							  </tr>
							</table>";
							
					$this->email->message($message);				
					$this->email->send();
				
				
				$data['success'] 		=	"Message successfully Send";
				$data["content"] 		= 	"inbox/inbox_view";			
				$this->load->view('template/template', $data);	
				
			}else
			{
			
			$data['projectID'] 		= 	$this->uri->segment(3);
			$data['receiverID'] 	= 	$this->uri->segment(4);
			$data['notificationID'] =	$this->uri->segment(5);
			if($data['notificationID']!='')
			{
				
			$this->notification_model->updateNotification($data['notificationID']);
			}
			$data["projectDetail"] = $this->inbox_model->getProjectDetail($data['projectID']);
			$data["InboxList"] = $this->inbox_model->getMessage($data['projectID']);
			$data["content"] 	= "inbox/inbox_view";			
			$this->load->view('template/template', $data);	
			}
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
            $this->inbox_model->uploadMessageAttachment($finfo['file_name'], $lastInsertID);
        }
    }
	




}
?>