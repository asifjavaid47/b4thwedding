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

            });

            /* ]]> */

        </script>
<div id="wrap">

   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">Account</div>
             <div class="inner_img"><img src="images/hdng_btm.png" width="100%" height="3" alt=""></div>
            <?php
				if(sizeof($accountInfo)==0)
				{
					$creditCardNumber = '';
					$creditCardExpiremonth = '';
					$creditCardExpireyear = '';
				}else
				{
					$creditCardNumber = $accountInfo['creditCardNumber'];
					$creditCardExpiremonth =  $accountInfo['creditCardExpiremonth'];
					$creditCardExpireyear =  $accountInfo['creditCardExpireyear'];
				}
			 ?>
            <div class="inner_project_form">
            <?php echo form_open('account/add_credit_card');?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_tb40">
                  	<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    		Credit Card Number <input type="number" name="creditCardNumber" id="creditCardNumber" class="frm_inpt signup_input" value="<?php echo $creditCardNumber; ?>" >
                    </div>
                    
                    
                    
                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Credit Card Expire Month <select name="creditCardExpiremonth"  id="creditCardExpireDate" value="<?php echo set_value('creditCardExpiremonth'); ?>" class="frm_inpt" >
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
                        <option value="14" <?php if($creditCardExpireyear==14){ echo 'selected="selected"';} ?>>14</option>
                        <option value="15" <?php if($creditCardExpireyear==15){ echo 'selected="selected"';} ?>>15</option>
                        <option value="16" <?php if($creditCardExpireyear==16){ echo 'selected="selected"';} ?>>16</option>
                        <option value="17" <?php if($creditCardExpireyear==17){ echo 'selected="selected"';} ?>>17</option>
                        <option value="18" <?php if($creditCardExpireyear==18){ echo 'selected="selected"';} ?>>18</option>
                        <option value="19" <?php if($creditCardExpireyear==19){ echo 'selected="selected"';} ?>>19</option>
                        <option value="20" <?php if($creditCardExpireyear==20){ echo 'selected="selected"';} ?>>20</option>
                        <option value="21" <?php if($creditCardExpireyear==21){ echo 'selected="selected"';} ?>>21</option>
                        <option value="22" <?php if($creditCardExpireyear==22){ echo 'selected="selected"';} ?>>22</option>
                        <option value="23" <?php if($creditCardExpireyear==23){ echo 'selected="selected"';} ?>>23</option>
                        <option value="24" <?php if($creditCardExpireyear==24){ echo 'selected="selected"';} ?>>24</option>
                        <option value="25" <?php if($creditCardExpireyear==25){ echo 'selected="selected"';} ?>>25</option>
                        <option value="26" <?php if($creditCardExpireyear==26){ echo 'selected="selected"';} ?>>26</option>
                        <option value="27" <?php if($creditCardExpireyear==27){ echo 'selected="selected"';} ?>>27</option>
                        <option value="28" <?php if($creditCardExpireyear==28){ echo 'selected="selected"';} ?>>28</option>
                        
                        </select>
                     </div>
                    <div style="clear:both;">
                    </div>
                  <input type="submit" class="inner_btn" value="Continue" />
				
                     <?php echo form_close(); ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_project_form_txt">By clicking, you agree to our <a href="#">Be4 The Wedding Terms of Service</a></div>
                   
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_sbbhdng2">We value your privacy. <a href="#">Privacy Policy</a> &nbsp; <img src="images/lock_icon.png" alt=""></div>
                </div>
            </div>
            
        </div>        
    </div>