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
					$cvv					= '';
					$fName					= '';
					$lName					= '';
					$creditCardNumber 		= '';
					$creditCardExpiremonth 	= '';
					$creditCardExpireyear 	= '';
				}else
				{
					$cvv					= $accountInfo['cvv'];
					$fName					= $accountInfo['fName'];
					$lName					= $accountInfo['lName'];
					$creditCardNumber = $accountInfo['creditCardNumber'];
					$creditCardExpiremonth =  $accountInfo['creditCardExpiremonth'];
					$creditCardExpireyear =  $accountInfo['creditCardExpireyear'];
				}
			 ?>
            <div class="inner_project_form">
            <?php echo form_open(base_url().'account/add_paypal'); ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_tb40">
                
                	 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
						First Name: 
                        <input type="text" class="frm_inpt" id="fName" name="fName" value="<?php echo $fName; ?>">
					</div>
                    
                    
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
						Last Name: 
                        <input type="text" class="frm_inpt" id="lName" name="lName" value="<?php echo $lName; ?>" >
					</div>
                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    		Credit Card Number <input type="number" name="creditCardNumber" id="creditCardNumber" class="frm_inpt signup_input" value="<?php echo $creditCardNumber;?>" >
                    </div>
                   
                    
                    
                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Credit Card Expire Month <select name="creditCardExpiremonth"  id="creditCardExpireDate"  class="frm_inpt" >
                        <option value="">MM</option>
                       <option value="1" <?php if($creditCardExpiremonth==1){ echo 'selected="selected"';} ?>>1</option>
                        <option value="2"  <?php if($creditCardExpiremonth==2){ echo 'selected="selected"';} ?>>2</option>
                        <option value="3"  <?php if($creditCardExpiremonth==3){ echo 'selected="selected"';} ?>>3</option>
                        <option value="4"  <?php if($creditCardExpiremonth==4){ echo 'selected="selected"';} ?>>4</option>
                        <option value="5"  <?php if($creditCardExpiremonth==5){ echo 'selected="selected"';} ?>>5</option>
                        <option value="6"  <?php if($creditCardExpiremonth==6){ echo 'selected="selected"';} ?>>6</option>
                        <option value="7"  <?php if($creditCardExpiremonth==7){ echo 'selected="selected"';} ?>>7</option>
                        <option value="8"  <?php if($creditCardExpiremonth==8){ echo 'selected="selected"';} ?>>8</option>
                        <option value="9"  <?php if($creditCardExpiremonth==9){ echo 'selected="selected"';} ?>>9</option>
                        <option value="10"  <?php if($creditCardExpiremonth==10){ echo 'selected="selected"';} ?>>10</option>
                        <option value="11"  <?php if($creditCardExpiremonth==11){ echo 'selected="selected"';} ?>>11</option>
                        <option value="12"  <?php if($creditCardExpiremonth==12){ echo 'selected="selected"';} ?>>12</option>
                        </select>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Credit Card Expire Year <select  name="creditCardExpireyear"  id="creditCardExpireyear" value="<?php echo set_value('creditCardExpireyear'); ?>" class="frm_inpt" >
                        
                        <option value="">YY</option>
                       
                        <option value="2015" <?php if($creditCardExpireyear==2015){ echo 'selected="selected"';} ?>>2015</option>
                        <option value="2016" <?php if($creditCardExpireyear==2016){ echo 'selected="selected"';} ?>>2016</option>
                        <option value="2017" <?php if($creditCardExpireyear==2017){ echo 'selected="selected"';} ?>>2017</option>
                        <option value="2018" <?php if($creditCardExpireyear==2018){ echo 'selected="selected"';} ?>>2018</option>
                        <option value="2019" <?php if($creditCardExpireyear==2019){ echo 'selected="selected"';} ?>>2019</option>
                        <option value="2020" <?php if($creditCardExpireyear==2020){ echo 'selected="selected"';} ?>>2020</option>
                        <option value="2021" <?php if($creditCardExpireyear==2021){ echo 'selected="selected"';} ?>>2021</option>
                     
                        
                        </select>
                     </div>
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
						CCV: 
                        <input type="text" class="frm_inpt" id="cvv" name="cvv" value="<?php echo $cvv; ?>" >
					</div>
                    <div style="clear:both;">
                    </div>
                  <input type="submit" class="inner_btn" value="Continue" />
				
                     <?php echo form_close(); ?>
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_project_form_txt">By clicking,you agree to  <a href="<?=base_url()?>page/independentContractorAgreement">B4TheWedding's Terms of service</a></div>
                   
                    
                </div>
            </div>
            
        </div>        
    </div>