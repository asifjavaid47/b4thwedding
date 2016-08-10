<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content ">
        <?php if($this->session->flashdata('success'))
			{
			?>
        		<div class="alert alert-success">
    			<a href="#" class="close" data-dismiss="alert">&times;</a>
    			<strong>Success!</strong>  <?php echo $this->session->flashdata('success');?>
				</div>
            <?php } ?>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng head_account">Financial Accounts</div>   
           <strong style="width:100%; text-align:center; display:block;">Default & Backup Payment Account</strong> 
           <div class="inner_img"><img width="100%" height="3" alt="" src="http://raza-pc/wedding/public/images/hdng_btm.png"></div>
        </div> 
        	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 ">
            
            	
               
                <div class="inner_project_form" style="margin-top:0;">
            <?php echo form_open(base_url().'account/addDefaultAccount');?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_tb40">
                  	<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    Select Default Payment Account 
                     <select name="default" id="default" class="frm_inpt signup_input">
                     	<option value="">Select One</option>
                        <?php
						if(sizeof($paypalInfo)>0)
						{
						?>
                        <option value="paypal" 
						<?php if($paypalInfo['default']==1){echo 'selected="selected"';}  ?>>
                        Pay Pal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**<?php echo substr($paypalInfo['paypalEmail'],2);  ?></option>
                        <?php } ?>
                        
                         <?php
						if(sizeof($creditCardInfo)>0)
						{
						?>
                        <option value="creditcard"
                         <?php if($creditCardInfo['default']==1){echo 'selected="selected"';}  ?>>
                         Credit Card &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;******<?php echo substr($creditCardInfo['creditCardNumber'],5);  ?>
                         </option>
                          <?php } ?>
                     </select>
                    </div>
                    
                    
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    Select Backup Payment Account
                     <select name="backup" id="backup" class="frm_inpt signup_input">
                     	<option value="">Select One</option>
                         <?php
						if(sizeof($paypalInfo)>0)
						{
						?>
                        <option value="paypal" <?php if($paypalInfo['backup']==1)
						{echo 'selected="selected"';}  ?>>
                        Pay Pal &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;**<?php echo substr($paypalInfo['paypalEmail'],2);  ?>
                        </option>
                        <?php } ?>
                        
                         <?php
						if(sizeof($creditCardInfo)>0)
						{
						?>
                        <option value="creditcard" 
						<?php if($creditCardInfo['backup']==1){echo 'selected="selected"';}  ?>>
                        Credit Card &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;******<?php echo substr($creditCardInfo['creditCardNumber'],5);  ?>
                        </option>
                          <?php } ?>
                     </select>
                    </div>
                    
                    <div style="clear:both;">
                    </div>
                  <input type="submit" class="inner_btn" value="Save" />
				
                     <?php echo form_close(); ?>
                    
                   
                    
                </div>
            </div>
                
                
            </div>
		<div class="col-lg-12 col-md-10 col-sm-10 col-xs-10 col-lg-offset-1">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 padding0 inner_project_form_txt">
								<a class="btn_account_1" href="<?=base_url();?>account/add_paypal"> Update / Enter New PayPal Account</a>
                                </div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<a  class="btn_account_1" href="<?=base_url();?>account/add_credit_card">Update / Enter  New Credit Card</a>
                                </div>
							</div>
                           <?php /*?> <?php if($userCountry =='United States') { ?><?php */?>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<a  class="btn_account_1" href="<?=base_url()?>account/add_bank_detail">Update / Enter New Bank Account</a>
                                </div>
							</div>
                            <?php /*?><?php } ?><?php */?>
							
					
			
            
        </div>        
        </div>        
    </div>
