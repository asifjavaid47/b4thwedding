<style>
.error{
	color:#F00;
	}
</style>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/validationScript/stylesheets/jquery.validate.css" />
<script src="<?= base_url(); ?>public/validationScript/javascripts/jquery.validate.js" type="text/javascript"></script>

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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">Payment</div>
             <div class="inner_img"><img src="images/hdng_btm.png" width="100%" height="3" alt=""></div>
             
             
             <!--radiobutton-->
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">
              	Select Payment Method
              </div>
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">
             	<div class="paypalholder" style="margin:0 auto; width:29%; height:60px">
                        <div style="float:left; text-align:left">
                            Paypal
                        </div>
                        <div style="float:right; margin-top:10px;">
                            <input type="radio" name="checkbutton"  class="paymentMethodRadio" value="paypal" checked="checked"/>
                        </div>
                  </div>
                  
                  
                  <div class="paypalholder" style="margin:0 auto; width:29%; height:60px">
                        <div style="float:left; text-align:left">
                            Credit Card
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
					$fName							= '';
					$lName							= '';
					$cvv							= '';
					$creditCardNumber_paypal 		= '';
					$creditCardExpiremonth_paypal	= '';
					$creditCardExpireyear_paypal 	= '';
				}else
				{
					$fName							=  $paypalInfo['fName'];
					$lName							=  $paypalInfo['lName'];
					$cvv							=  $paypalInfo['cvv'];
					$creditCardNumber_paypal 		=  $paypalInfo['creditCardNumber'];
					$creditCardExpiremonth_paypal	=  $paypalInfo['creditCardExpiremonth'];
					$creditCardExpireyear_paypal 	=  $paypalInfo['creditCardExpireyear'];
				}
			 ?>
             <div class="paypalformHolder">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">Payment With Paypal</div>
             <?php
				if(sizeof($paypalInfo)==0)
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
            <?php echo form_open(base_url().'paypal');?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_tb40">
                
                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    		Credit Card Number <input type="text" name="creditCardNumber" id="creditCardNumber" class="frm_inpt signup_input" value="<?php echo $creditCardNumber_paypal;?>" readonly="readonly" >
                    </div>
                    
                    
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
						First Name: 
                        <input type="text" class="frm_inpt" id="fName" name="fName" value="<?php echo $fName; ?>" readonly="readonly">
					</div>
                    
                    
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
						Last Name: 
                        <input type="text" class="frm_inpt" id="lName" name="lName" value="<?php echo $lName; ?>" readonly="readonly" >
					</div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
										C v v: <input type="text" class="frm_inpt" id="cvv" name="cvv" value="<?php echo $cvv; ?>"  required readonly="readonly">
									   </div>
                    
                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Credit Card Expire Month 
                        <input type="text" class="frm_inpt" id="creditCardExpiremonth" name="creditCardExpiremonth" value="<?php echo $creditCardExpiremonth_paypal; ?>"  readonly="readonly">
                     </div>
                     
                     
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Credit Card Expire Year 
                        
                        <input type="text" class="frm_inpt" id="creditCardExpireyear" name="creditCardExpireyear" value="<?php echo $creditCardExpireyear_paypal; ?>"  readonly="readonly">
                     </div>
					  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 padding0 inner_project_form_txt">
										Amount: <input type="number" class="frm_inpt" id="title" name="amount" value="" required>
									   </div>
                    <div style="clear:both;">
                    </div>
                  <input type="submit" class="inner_btn" value="Continue" />
				
                     <?php echo form_close(); ?>
                    
                   
                    
                </div>
            </div>
            <?php } ?>
           </div>
            
  <!--CreditCard-->  
  <div class="braintreeFormHolder" style="display:none;">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">Payment With Credit Card</div>
  
  
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
            <?php echo form_open(base_url().'payment/AddPaymentwithBraintree');?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_tb40">
                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    		Credit Card Number <input type="text" name="creditCardNumber" id="creditCardNumber" class="frm_inpt signup_input" value="<?php echo $creditCardNumber_credit;?>" readonly="readonly" >
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
										Amount: <input type="number" class="frm_inpt" id="title" name="amount" value="" required>
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
                  <input type="submit" class="inner_btn" value="Continue" />
				
                     <?php echo form_close(); ?>
                    
                </div>
            </div>
            <?php } ?>
            </div>
            
        </div>        
    </div>