<div id="wrap">
  <style>
  input[readonly='readonly']
{
	cursor:not-allowed; 
	background:#f5f5f5;
	
}
  </style>
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
        <?php if(!empty($message)){ ?>
        <div class="alert alert-info">
    		<a href="#" class="close" data-dismiss="alert">&times;</a>
    		<strong>Error!</strong> <?php echo $message; ?>
		</div>
        <?php } ?>
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng head_account">
                Payments
            </div>
            <div class="inner_img"><img src="<?=base_url()?>public/images/hdng_btm.png" width="100%" height="3" alt=""></div>
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:right;">
            	Your current available balance is 
                <span style="color:#5cb85c; font-weight:bold">$<?php echo number_format($clientBalance,2); ?> </span>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 inner_hdng" style="float:right; text-align:left">
            	<?php echo $projectInfo[0]['title']; ?>
            </div>
            
      <?php echo $sidebar; ?>
            <div class="inner_project_form">
            	 <?php echo form_open(base_url().'projectPayment/releasePayment/'.$projectID.'/'.$receiverID.'/'.$amountTorelease.'/'.$milestoneID.'');?>
				 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_tb39">
					<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
					 
                        Amount: <input type="number" class="frm_inpt" id="amountTorelease" name="amountTorelease" value="<?php echo $amountTorelease; ?>" readonly="readonly" required>
                    </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-11 padding0">
                    <input type="submit" class="join_btn" value="Submit" onclick="return confirmFunction();">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_sbbhdng2">We value your privacy. 
                    <a href="#">Privacy Policy</a> &nbsp; <img alt="" src="<?=base_url()?>public/images/lock_icon.png">
                    </div>
                </div>
              </div>
             </form>      
        </div>        
    </div>
  </div>
	<script>
	function confirmFunction()
	{
		var r = confirm("Are You Sure To Perform This Action ?");
		if (r == true) {
    	return true;
	} else {
    		return false;
		}
	}
	</script>
	