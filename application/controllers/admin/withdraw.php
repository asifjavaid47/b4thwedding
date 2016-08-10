<?php
class Withdraw extends CI_Controller {

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
        $this->load->model('admin/withdraw_model');

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
	
	public function showWithdraw()
	{
		$data['showWithdraw'] = $this->withdraw_model->showWithdraw();
		$data["content"] = "admin/showWithdrawView";
		$this->load->view('admin/template/template', $data);	
	
	}
	
	public function detailWithdraw($transactionID,$userID,$message='')
	{
		$data['showWithdraw'] = $this->withdraw_model->getTransaction($transactionID);
                $transaction_data = $data['showWithdraw'];
		$data['detailTransaction'] = $this->withdraw_model->detailWithdraw($userID , $transaction_data[0]['type']);
		$data['transactionID'] =$transactionID;
		$data['successful_mesg']	=	$message;
		$data["content"] = "admin/detailWithdrawView";
		$this->load->view('admin/template/template', $data);	
	
	}
	public function approveWithdraw($transactionID , $userID)
	{
            $status = $this->input->post('final_status');
            if($this->withdraw_model->approveTransaction($transactionID))
            {
                    $datanotification = array(
                    'receiverID' 	=> $userID,
                    'msgTypes' 		=> 'addBalance',
                    'message' 		=> 'Success! Your Withdarw Amount Aprroved by Admin.',
                    'sendDate'		=>	date("Y-m-d H:i:s")
                    );
                    $this->db->insert('tbl_notification', $datanotification);
                if($status == 1)
                    $msg = 'Withdraw Transaction Approved Successfully!';
                else 
                    $msg = 'Withdraw Transaction Declined Successfully!';
                    $this->session->set_flashdata('message', $msg);
                    redirect(base_url().'admin/withdraw/showWithdraw');
            }else
            {
                    $this->session->set_flashdata('message', 'Withdraw Transaction Was Not Approved!');
                    redirect(base_url().'admin/withdraw/showWithdraw');
            }
	
	}
	
   
}