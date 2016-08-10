
<script type="text/javascript">

            /* <![CDATA[ */

            jQuery(function(){

                jQuery("#password").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });
				
				jQuery("#current").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });

              jQuery("#password2").validate({
                    expression: "if ((VAL == jQuery('#password').val()) && VAL) return true; else return false;",

                    message: "Confirm password field doesn't match the password field"

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
        
        <?php if(!empty($error)){ ?>
        <div class="alert alert-info">
    		<a href="#" class="close" data-dismiss="alert">&times;</a>
    	<strong>Error!</strong> <?php echo $error; ?>
		</div>
        <?php } ?>
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_sbbhdng" style="margin-top:50px"><strong>Reset Password</strong>
            
           
            </div>
          	          
            <div class="inner_project_form">
            	<?php echo form_open_multipart(base_url().'users/resetPassword/'); ?>
		 			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 padding0 inner_project_form_txt">
                    Enter Current Password
                    	<input type="password" name="current" id="current"  class="frm_inpt2">
                        <div class="erroremail" style="display:none; color:#F00;">This Email already Exist!</div>
                     </div>
                     
                     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	New Password <input type="password" name="password" id="password" class="frm_inpt"  >
                      </div>
                      
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                    	Retype Password 
                        <input type="password" name="password2" id="password2" class="frm_inpt" >
                      </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-11 padding0">
                 
					<!--<a href="#" class="join_btn"> Register </a>-->
                    <input type="submit" class="join_btn" value="Submit">
                    <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_sbbhdng2">We value your privacy. <a href="#">Privacy Policy</a> &nbsp; <img alt="" src="images/lock_icon.png"></div>-->
                </div>
                  <?php echo form_close(); ?>
                </div>
            
        </div>        
    </div>
	