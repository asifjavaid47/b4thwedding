<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Notification extends CI_Controller
{
	public function __construct() {
        parent::__construct();
        $this->load->model('notification_model');
        if (($this->session->userdata('logged_in') == "")) {
            redirect(base_url() . 'home', 'refresh');
        }
    }

	
function getNotification() 
{			
			$filter = $this->uri->segment(3);
			$data["notificationList"] = $this->notification_model->getNotification($filter);
			$data["content"] 	= "notification/notification_view";			
			$this->load->view('template/template', $data);	
			
}
function delete_notification() 
	{
			foreach ($_POST['chk'] as $chk) {
			$this->notification_model->delete_notification($chk);
			}
			redirect(base_url() . 'notification/getNotification/');
	
	}
public function getUnreadNotification()
{
	$unreadNotification	= $this->notification_model->getUnreadNotification();
	echo $unreadNotification; 	
}
	




}
?>