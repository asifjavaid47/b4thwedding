<style>
.error{
	color:#F00;
	}
</style>

<script type="text/javascript">

            /* <![CDATA[ */

            jQuery(function(){

                jQuery("#creditCardNumber").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });

				jQuery("#amount").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });

                jQuery("#creditCardExpireDate").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });
				
				 jQuery("#creditCardExpiremonth_paypal").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });

            });

            /* ]]> */

        </script>
        <script>
			$(document).ready(function(){
				$('.paymentMethodRadio').click(function(){
					var value = $(this).val();
					
					if(value=='paypal')
						{
							
							$('.braintreeFormHolder').hide();
							$('.paypalFormHolder').show();
								
						}else
						{
							$('.braintreeFormHolder').show();
							$('.paypalFormHolder').hide();
						}
					})
					
					
					$('.selectPayment').click(function(){
					var value = $(this).val();
					if(value=='currentaccountHolder')
						{
							
							$('.paymentMethodHolder').hide();
							$('.currentaccountHolder').show();
								
						}else
						{
							$('.paymentMethodHolder').show();
							$('.currentaccountHolder').hide();
						}
					})
				})
		</script>
<style>
input[readonly='readonly']
{
	cursor:not-allowed; 
	background:#f5f5f5;
	
}
</style>
<div id="wrap">

   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
       <?php if($this->session->flashdata('message')){ ?>
      <div class="alert alert-info">
    		<a href="#" class="close" data-dismiss="alert">&times;</a>
    		<strong>Error!</strong> <?php echo $this->session->flashdata('message'); ?>
		</div>
        <?php } ?>
        
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng head_account">
                Payments
            </div>
            <div class="inner_img"><img src="<?=base_url()?>public/images/hdng_btm.png" width="100%" height="3" alt=""></div>
      <?php echo $sidebar; ?>
             <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 padding0">
             <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12 col-lg-offset-3 padding0">
             	<input name="selectPayment" type="radio" checked="checked" class="selectPayment" value="currentaccountHolder" />
                Payment Current Account
             </div>
             <div class="col-lg-3 col-md-3 col-sm-2 col-xs-12 padding0">
             	<input name="selectPayment" type="radio" value="paymentMethodHolder" class="selectPayment" />
                Add New Payment
             </div>
             
             	
             </div>
             
             
             
             <div class="currentaccountHolder">
             <?php
			 	if(empty($clientBalance))
				{
					$clientBalance = 0;
				}
			 ?>
             <div class="inner_project_form">

		<?php echo form_open(base_url().'projectPayment/AddPaymentPreviousAccount/'.$projectID.'/'.$receiverID.'');?>
                    
                   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                   
						Current Balance <input type="text" name="currentBalance" id="currentBalance" class="frm_inpt signup_input" value="<?php echo $clientBalance; ?>" readonly="readonly" >
                    </div>
					 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 padding0 inner_project_form_txt">
						Amount: <input type="number" class="frm_inpt" id="amountToAdd" name="amountToAdd" value="<?php echo $leftAmount; ?>" required>
				   </div>
									   
                   
					
                    <input type="submit" class="inner_btn" value="Continue" onclick="return confirmFunction();" />
                </form> 
            
                </div>
             </div>
             
             <!--radiobutton-->
             <div class="paymentMethodHolder" style="display:none;">
              <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 inner_hdng"  style="font-size:22px;">
              	Select Payment Method
              </div>
             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 inner_hdng  col-lg-offset-2">
             	<div class="paypalholder" style="margin:0 auto; height:60px">
                        <div style="float:left; text-align:left">
                            <img src="<?=base_url()?>public/images/paypal.png" alt="">
                        </div>
                        <div style="float:right; margin-top:10px;">
                            <input type="radio" name="checkbutton"  class="paymentMethodRadio" value="paypal" checked="checked"/>
                        </div>
                  </div>
                  
                  
                  <div class="paypalholder" style="margin:0 auto; height:60px">
                        <div style="float:left; text-align:left">
                            <img src="<?=base_url()?>public/images/credit_icon.png" alt="">
                        </div>
                        <div style="float:right; margin-top:10px;">
                           <input type="radio" name="checkbutton"  class="paymentMethodRadio" value="braintree" />
                        </div>
                  </div>
             
             </div>
           
             	
             <!---radion button End-->
             
            <?php
				if(sizeof($paypalInfo)==0)
				{
					$paypalEmail							= '';
					
				}else
				{
					$paypalEmail							=  $paypalInfo['paypalEmail'];
					
				}
			 ?>
             <div class="paypalformHolder">
             <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 inner_hdng" style="font-size:22px;">Payment With Paypal</div>
             <?php
				if(empty($paypalEmail))
				{?>
                <div class="inner_project_form">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                          <a href="<?=base_url()?>account/add_paypal">Add Paypal Info</a>
                           
                         </div>
                  </div>
				<?php }else
					{
				?>
            <div class="inner_project_form">

			  <form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post' name='frmPayPal1'>
                    <input type='hidden' name='business' value='bilal@leadconcept.com'>
                    <input type='hidden' name='login_email' value='<?php echo $paypalEmail;?>'>
                    <input type='hidden' name='item_name' value='add amount'>
                   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
						Email <input type="text" name="creditCardNumber" id="creditCardNumber" class="frm_inpt signup_input" value="<?php echo $paypalEmail;?>" readonly="readonly" >
                    </div>
					 <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 padding0 inner_project_form_txt">
						Amount: <input type="number" class="frm_inpt" id="title" name="amount" value="<?php echo $leftAmount; ?>" required>
				   </div>
									   
                    <input type='hidden' name='cancel_return' value='<?=base_url()?>project/my_jobs_c'>
                    <input type='hidden' name='return' value='<?php echo base_url(); ?>projectPayment/index/<?php echo $projectID; ?>/<?php echo $receiverID?>'>
             

					
					 <input type='hidden' name='cmd' value='_xclick'>

                  <input type='hidden' name='item_number' value='2'>

                     <input type='hidden' name='no_shipping' value='1'>
                    <input type='hidden' name='currency_code' value='USD'>
                    <input type='hidden' name='handling' value='0'>
					
					<div style="clear:both;"></div>
                    <input type="submit" class="inner_btn" value="Continue" onclick="return confirmFunction();" />
                </form> 
            
                </div>
            
            <?php } ?>
          </div>
            
  <!--CreditCard--> 
   
  <div class="braintreeFormHolder" style="display:none;">
  <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 inner_hdng" style="font-size:22px;">Payment With Credit Card</div>
  
  
   <?php
				if(sizeof($creditcardInfo)==0)
				{
					$creditCardNumber_credit = '';
					$creditCardExpiremonth_credit= '';
					$creditCardExpireyear_credit = '';
				}else
				{
					$creditCardNumber_credit 		= $creditcardInfo['creditCardNumber'];
					$creditCardExpiremonth_credit	=  $creditcardInfo['creditCardExpiremonth'];
					$creditCardExpireyear_credit 	=  $creditcardInfo['creditCardExpireyear'];
				}
			 ?>      
            
         <?php
				if(sizeof($creditcardInfo)==0)
				{?>
                <div class="inner_project_form">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                          <a href="<?=base_url()?>account/add_credit_card">Add CrditCard Number</a>
                           
                         </div>
                  </div>
				<?php }else
					{
				?>
            <div class="inner_project_form">
            <?php echo form_open(base_url().'projectPayment/AddPaymentwithBraintree/'.$projectID.'/'.$receiverID.'');?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_tb40">
                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    		Credit Card Number <input type="text" name="creditCardNumber" id="creditCardNumber" class="frm_inpt signup_input" value="<?php echo $creditCardNumber_credit;?>" readonly="readonly" >
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
										Amount: <input type="number" class="frm_inpt" id="title" name="amount" value="<?php echo $leftAmount; ?>" required>
									   </div>
                    
                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Credit Card Expire Month 
                        <input type="text" name="creditCardExpiremonth" id="creditCardExpireDate" class="frm_inpt signup_input" value="<?php echo $creditCardExpiremonth_credit;?>" readonly="readonly" >
                     </div>
                     
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Credit Card Expire Year 
                        
                         <input type="text" name="creditCardExpireyear" id="creditCardExpireyear" class="frm_inpt signup_input" value="<?php echo $creditCardExpireyear_credit;?>" readonly="readonly" >
                     </div>
                    <div style="clear:both;">
                    </div>
                  <input type="submit" class="inner_btn" value="Continue" onclick="return confirmFunction();" />
				
                     <?php echo form_close(); ?>
                    
                </div>
            </div>
            <?php } ?>
            </div>
            
             </div>
            </div>
        </div>        
    </div>
    <div class="clear10"></div>
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