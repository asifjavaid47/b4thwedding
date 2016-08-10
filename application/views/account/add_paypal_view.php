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
				
				 jQuery("#creditCardExpireyear").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });
				
				jQuery("#fName").validate({

				expression: "if (VAL) return true; else return false;",

				//message: "Please enter the Required field"

                });
				
				jQuery("#lName").validate({

				expression: "if (VAL) return true; else return false;",

				//message: "Please enter the Required field"

                });

            });
                                                                 
            /* ]]> */

        </script>
                                                                                                                                                                                                                                             <div id="wrap">

   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
        <?php if(!empty($message)){ ?>
        <div class="alert alert-success">
    		<a href="#" class="close" data-dismiss="alert">&times;</a>
    		<strong>Success!</strong> <?php echo $message; ?>
		</div>
        <?php } ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">Add PayPal Info</div>
             <div class="inner_img"><img src="images/hdng_btm.png" width="100%" height="3" alt=""></div>
            <?php
				if(sizeof($accountInfo)==0)
				{
					$paypalEmail					= '';
					// $cvv					= '';
					// $fName					= '';
					// $lName					= '';
					// $creditCardNumber 		= '';
					// $creditCardExpiremonth 	= '';
					// $creditCardExpireyear 	= '';
				}else
				{
					$paypalEmail = $accountInfo['paypalEmail'];
					// $cvv					= $accountInfo['cvv'];
					// $fName					= $accountInfo['fName'];
					// $lName					= $accountInfo['lName'];
					// $creditCardNumber = $accountInfo['creditCardNumber'];
					// $creditCardExpiremonth =  $accountInfo['creditCardExpiremonth'];
					// $creditCardExpireyear =  $accountInfo['creditCardExpireyear'];
				}
			 ?>
            <div class="inner_project_form">
            <?php echo form_open(base_url().'account/add_paypal'); ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_tb40">
                
                	 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
						Paypal Email: 
                        <input type="text" class="frm_inpt" id="paypalEmail" name="paypalEmail" value="<?php echo $paypalEmail; ?>">
					</div>
                    
                    
                   
                    
           
                    <div style="clear:both;">
                    </div>
                  <input type="submit" class="inner_btn" value="Continue" />
				
                     <?php echo form_close(); ?>
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_project_form_txt">By clicking,you agree to  <a href="<?=base_url()?>page/independentContractorAgreement">b4thewedding User Agreement</a></div>
                   
                    
                </div>
            </div>
            
        </div>        
    </div>