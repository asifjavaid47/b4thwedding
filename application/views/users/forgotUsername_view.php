<?php echo validation_errors(); ?>
<div id="wrap">
  
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
            
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_sbbhdng" style="margin-top:100px"><strong>Retrieve Username</strong><br />
            
            If you forgot your username, please enter your email address. You will receive your username in an email.
            </div>
             <?php if (!empty($success)){ ?>

<p class="success" style="color:green"><?php echo $success;  ?></p>

<?php } ?>
          	          
            <div class="inner_project_form">
            	<?php echo form_open_multipart(base_url().'users/forgotUsername/'); ?>
		 			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt">
                    Email Address
                    	<input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" class="frm_inpt2" required>
                        <div class="erroremail" style="display:none; color:#F00;">This Email already Exist!</div>
                     </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-11 padding0">
                 
					<!--<a href="#" class="join_btn"> Register </a>-->
                    <input type="submit" class="join_btn" value="Submit">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_sbbhdng2">We value your privacy. <a href="#">Privacy Policy</a> &nbsp; <img alt="" src="images/lock_icon.png"></div>
                </div>
                  <?php echo form_close(); ?>
                </div>
            
        </div>        
    </div>
	