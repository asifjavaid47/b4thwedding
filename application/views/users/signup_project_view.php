<script type="text/javascript">

            /* <![CDATA[ */

            jQuery(function(){

                jQuery("#fName").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });

				jQuery("#lName").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });

                jQuery("#userName").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });

                jQuery("#email").validate({

                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",

                    //message: "Please enter a valid Email ID"

                });

              jQuery("#password").validate({

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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">Create a Wedding Client Account</div>
            <div class="inner_img"><img src="images/hdng_btm.png" width="100%" height="3" alt=""></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_sbbhdng">Already have an account? <a href="#" class="post">Sign In</a>. Looking to hire? <a href="<?= base_url()?>users/signup/freelancer">Register as a Freelancer</a>.</div>
          	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_txt">Use my info from: </div>
             <?php echo validation_errors(); ?>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_social"><a href="javascript:" class="facebookSignup"><img src="<?= base_url(); ?>public/images/fb_icon2.png" alt=""></a> &nbsp;&nbsp;<a href="#"><img src="<?= base_url(); ?>public/images/in_icon2.png" alt=""></a></div>
            
            <div class="inner_project_form">
            <form action="<?=base_url();?>users/create_project_user" method="post" enctype="multipart/form-data">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_tb40">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                  	Email Address <input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>" class="frm_inpt2"  onblur="isEmailExistAjax(this.value);" >
                        <div class="erroremail" style="display:none; color:#F00;">This Email already Exist!</div>
                   </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                  	First Name <input type="text" name="fName" id="fName" class="frm_inpt" >
                    </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                  	Last Name <input type="text" name="lName" id="lName" class="frm_inpt"  >
                    </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                  	Username <input type="text" name="userName" id="userName" class="frm_inpt2" value="<?php echo set_value('userName'); ?>"  onblur="isUserExistAjax(this.value);" >
                      <div class="erroruser" style="display:none; color:#F00;">This user name already Exist!</div>
                    </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                  	Password <input type="password" name="password" id="password" class="frm_inpt" >
                    </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
                  	Retype Password <input type="password" name="password2" id="password2" class="frm_inpt" >
                    </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt">
                  	Country <select type="text" name="country" class="frm_slct"  >
               
                        <?php 
							foreach($countries as $con)
							{?>
							<option value="<?php echo $con->countryName;?>"><?php echo $con->countryName;?></option>
							<?php }?>
						
                    </select>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt">
                    	Account Type
                        </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt2">
                  	How do you want to represent yourself to clients on be4thewedding?
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 padding0">
                    	<input type="radio" name="accountType" class="frm_inpt"  >&nbsp; Individual 
                     </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 padding0">
                    	<input type="radio" name="accountType" class="frm_inpt"  >&nbsp; Company 
                     </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt">
                  	Display Name <input type="text" class="frm_inpt2"  >
                   </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 padding0">
                  	<input type="checkbox" class="frm_inpt" >&nbsp; Display last initial only. 
                    </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0 inner_project_form_txt">
                  	How did you hear about us? 
                    <select type="text" name="hearAbout" class="frm_slct"  >
                    	<option value="facebook">Facebook</option>
                    </select>
                    </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-11 padding0">
                  	<input type="checkbox" class="frm_inpt" required >&nbsp; I have read and accept the be4thewedding Terms of Service and agree to receive all payments from be4thewedding clients using ONLY the be4theweddingPayment system.
                    </div>
					<!--<a href="#" class="join_btn"> Register </a>-->
                    <input type="submit" value="Register" class="join_btn">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_sbbhdng2">We value your privacy. <a href="<?=base_url()?>page/privacyPolicy">Privacy Policy</a> &nbsp; <img src="<?=base_url() ?>public/images/lock_icon.png" alt=""></div>
                </div>
                <?php echo form_close(); ?>
            </div>
            
        </div>        
    </div>
  <script>
function isUserExistAjax(val){	
		
		var userName    = val;
		
		if(userName == ''){
			return false;
		}else{
			//$('#ajaxResponseMess').html('<div align="center" style="margin-top:5px;"><img src="<?= base_url() ?>/public/images/ajax_loader_gray_32.gif"></div>');
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>users/isUserExistAjax/",
				data: "userName="+userName,
				success: function(html){
					
						if(html=='yes'){
							
							$('.erroruser').show();
						}else{
							
							$('.error').hide();
						}
				}
			});
		}	
	}
function isEmailExistAjax(val){	
		
		var email    = val;
		
		if(email == ''){
			return false;
		}else{
			//$('#ajaxResponseMess').html('<div align="center" style="margin-top:5px;"><img src="<?= base_url() ?>/public/images/ajax_loader_gray_32.gif"></div>');
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>users/isEmailExistAjax/",
				data: "email="+email,
				success: function(html){
					
						if(html=='yes'){
							
							$('.erroremail').show();
						}else{
							
							$('.erroremail').hide();
						}
				}
			});
		}	
	}
	
	</script>
     <script type="text/javascript">
  window.fbAsyncInit = function() {
	  //Initiallize the facebook using the facebook javascript sdk
     FB.init({ 
       appId:'550018661800194', // App ID 
	   cookie:true, // enable cookies to allow the server to access the session
       status:true, // check login status
	   xfbml:true, // parse XFBML
	   oauth : true //enable Oauth 
     });
   };
   //Read the baseurl from the config.php file
   (function(d){
           var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement('script'); js.id = id; js.async = true;
           js.src = "//connect.facebook.net/en_US/all.js";
           ref.parentNode.insertBefore(js, ref);
         }(document));
	//Onclick for fb login
 $('.facebookSignup').click(function(e) {
	
    FB.login(function(response) {
	  if(response.authResponse) {
				  parent.location ='<?php echo base_url(); ?>fbConnect/fblogin'; //redirect uri after closing the facebook popup				  					
	  }
 },{scope: 'email,read_stream,publish_stream,user_birthday,user_location,user_work_history,user_hometown,user_photos'}); //permissions for facebook
});
</script>  