<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Milestone extends CI_Controller{
	public function __construct() {
            
            parent::__construct();
            $this->load->model('milestone_model');
            $this->load->model('projects_model');
        }

        public function detail($projectid=null , $recieverid = null){
            if (($this->session->userdata('logged_in') == "")) {
                 redirect(base_url() . 'home', 'refresh');
            }
            
            $data['project']   	= $this->projects_model->get_project_detail($projectid);
//            print_r($data['project']); exit;
            $data['propsal'] 	= $this->projects_model->getPropsal($projectid);
            $data['milestones'] 	= $this->milestone_model->getMilestone($projectid);
            $data['awarded'] 	= $this->milestone_model->getAwardedDetail($projectid);

//            echo "<pre>";print_r($data['awarded']);echo "</pre>"; exit;
            $data['projectID'] = $projectid;
            $data['receiverID'] = $recieverid;
            $data["active_class"] = 'milestone';
            $data["sidebar"] = $this->load->view('template/side_bar', $data , true);
            $data["content"] = "milestone/milestone_view";
            $this->load->view('template/template', $data);	
            
        }
        
    public function addmilestone(){
            if (($this->session->userdata('logged_in') == "")) {
                 redirect(base_url() . 'home', 'refresh');
            }

        $this->load->library('form_validation');
        $projectid = $this->input->post('projectid');
        $recieverid = $this->input->post('recieverid');

        // field name, error message, validation rules
        if($query = $this->milestone_model->add_milestone($this->session->userdata('userID')))
        {
        $milestoneID = $this->input->post('milestoneid');
            
if($milestoneID)
    $message = ' You Recieve updated milestone';
else 
    $message = ' You Recieve new milestone';
    
 $data = array(
  'projectID'  => $projectid,
  'senderID'   => $this->session->userdata('userID'),   
  'receiverID'  => $recieverid,
  'msgTypes'   => 'milestone',     
  'message'   => $message,
  'sendDate'  => date("Y-m-d H:i:s")   
 );
 $this->db->insert('tbl_notification', $data);
 
            
            redirect(base_url().'milestone/detail/'.$projectid.'/'.$recieverid);
        }
        else
        {
            redirect(base_url().'milestone/detail/'.$projectid.'/'.$recieverid);
        }
    }
    
    public function approve(){
            if (($this->session->userdata('logged_in') == "")) {
                 redirect(base_url() . 'home', 'refresh');
            }
        
        $projectid = $this->input->post('projectid');
        $recieverid = $this->input->post('recieverid');

        // field name, error message, validation rules
        if($query = $this->milestone_model->approve_milestone($this->session->userdata('userID')))
        {
    $message = ' Your Milestone Approved';
    
 $data = array(
  'projectID'  => $projectid,
  'senderID'   => $this->session->userdata('userID'),   
  'receiverID'  => $recieverid,
  'msgTypes'   => 'milestone',     
  'message'   => $message,
  'sendDate'  => date("Y-m-d H:i:s")   
 );
 $this->db->insert('tbl_notification', $data);
 
            echo 'ok';
        }
        else
        {
            echo 'fail';
        }
        exit;
        
    }
    
    public function delete(){
        
            if (($this->session->userdata('logged_in') == "")) {
                 redirect(base_url() . 'home', 'refresh');
            }
        $projectid = $this->input->post('projectid');
        $recieverid = $this->input->post('recieverid');

        // field name, error message, validation rules
        if($query = $this->milestone_model->delete_milestone($this->session->userdata('userID')))
        {
    $message = ' Your Milestone Deleted';
    
 $data = array(
  'projectID'  => $projectid,
  'senderID'   => $this->session->userdata('userID'),   
  'receiverID'  => $recieverid,
  'msgTypes'   => 'milestone',     
  'message'   => $message,
  'sendDate'  => date("Y-m-d H:i:s")   
 );
 $this->db->insert('tbl_notification', $data);
            echo 'ok';
        }
        else
        {
            echo 'fail';
        }
        exit;
        
    }

    function addagreement_document() {
        
            if (($this->session->userdata('logged_in') == "")) {
                 redirect(base_url() . 'home', 'refresh');
            }
        $projectid = $this->input->post('projectid');
        $recieverid = $this->input->post('recieverid');

        // field name, error message, validation rules
//        if($query = $this->milestone_model->add_milestone($this->session->userdata('userID')))
//        {
//            redirect(base_url().'milestone/detail/'.$projectid.'/'.$recieverid);
//        }
//        else
//        {
//            redirect(base_url().'milestone/detail/'.$projectid.'/'.$recieverid);
//        }

        $config['upload_path']   = "public/upload/project_uploads/agreement";
        $config['allowed_types'] = "tiff|tif|pdf|bmp|doc|docx|xls|txt";
//        $config['allowed_types'] = "gif|jpg|jpeg|png|tiff|tif|pdf|jpeg|jif|bmp|doc|docx|xls|txt";

        $config['max_size'] = "0";
        $config['max_width'] = "0";
        $config['max_height'] = "0";

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload("fileAttachement")) {

            echo $this->upload->display_errors();
        } else {

            $finfo = $this->upload->data("fileAttachement");
            $this->milestone_model->add_project_agreement($finfo['file_name'], $projectid);
            redirect(base_url().'milestone/detail/'.$projectid.'/'.$recieverid);
        }
    }
    
    public function add_comment()
    {
        if(@$_FILES['fileAttachement']['name'] && @$_FILES['fileAttachement']['name'] != ''){
            $config['upload_path']   = "public/upload/contact_us/";
                 $config['allowed_types'] = "gif|jpg|jpeg|png|tiff|tif|pdf|jpeg|jif|bmp|doc|docx|xls|txt";

            $config['max_size'] = "0";
            $config['max_width'] = "0";
            $config['max_height'] = "0";

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload("fileAttachement")) {

                echo $this->upload->display_errors();
            } else {

                $finfo = $this->upload->data("fileAttachement");

//                $this->milestone_model->add_comment($finfo['file_name']);
            }
        }
        $this->milestone_model->add_comment(!empty($finfo['file_name']) ? $finfo['file_name']: '');
        
        redirect(base_url().'page/contact_us');
 
    }
    
    public function update_amount(){
            if (($this->session->userdata('logged_in') == "")) {
                 redirect(base_url() . 'home', 'refresh');
            }
        
        $projectid = $this->input->post('project_ID');
        $recieverid = $this->input->post('reciever_ID');
        $update_amount = $this->input->post('update_amount');

        // field name, error message, validation rules

        if($this->milestone_model->update_amount($update_amount)){
        $message = ' You have new price for your project!';
    
 $data = array(
  'projectID'  => $projectid,
  'senderID'   => $this->session->userdata('userID'),   
  'receiverID'  => $recieverid,
  'msgTypes'   => 'milestone',     
  'message'   => $message,
  'sendDate'  => date("Y-m-d H:i:s")   
 );
$this->db->insert('tbl_notification', $data);
redirect(base_url().'milestone/detail/'.$projectid.'/'.$recieverid);
        } else {
redirect(base_url().'milestone/detail/'.$projectid.'/'.$recieverid);
        }
        
    }

    

    public function update_amount_approve(){
            if (($this->session->userdata('logged_in') == "")) {
                 redirect(base_url() . 'home', 'refresh');
            }
        
        $projectid = $this->input->post('project_ID');
        $recieverid = $this->input->post('reciever_ID');
        $update_amount = $this->input->post('update_amount');

        // field name, error message, validation rules

        if($this->milestone_model->update_amount_approve($update_amount)){
        $message = ' Your new price for your project approved!';
    
 $data = array(
  'projectID'  => $projectid,
  'senderID'   => $this->session->userdata('userID'),   
  'receiverID'  => $recieverid,
  'msgTypes'   => 'milestone',     
  'message'   => $message,
  'sendDate'  => date("Y-m-d H:i:s")   
 );
$this->db->insert('tbl_notification', $data);
redirect(base_url().'milestone/detail/'.$projectid.'/'.$recieverid);
        } else {
redirect(base_url().'milestone/detail/'.$projectid.'/'.$recieverid);
        }
        
    }

    
    
}
?>