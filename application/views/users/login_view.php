<link rel="stylesheet" type="text/css" href="<?=base_url();?>public/validationScript/stylesheets/jquery.validate.css" />
<link rel="stylesheet" type="text/css" href="<?=base_url();?>public/css/newStyle.css" />
<script src="<?=base_url();?>public/validationScript/javascripts/jquery.validate.js" type="text/javascript"></script>
<script src="<?=base_url();?>public/validationScript/javascripts/jquery.validation.functions.js" type="text/javascript"></script>


        <script type="text/javascript">
            /* <![CDATA[ */
            jQuery(function(){                
                
                jQuery("#email").validate({
                    expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",
                    message: "Please enter a valid Email ID"
                });
                jQuery("#password").validate({
                    expression: "if (VAL.length > 5 && VAL) return true; else return false;",
                    message: "Please enter a valid Password"
                });                          
				
            });
            /* ]]> */
        </script>
<div class="col-xs-12 col-md-12 col-lg-12 content_area_sub">
  <div class="clear20"></div>
  <div class="col-xs-12 col-md-7 col-lg-7 pull-left">
  
  
  <br />
<br />

    <h1 class="h1_signup">Great to see you again!</h1>
    Surely you know the drill by now <br />
    Login with your email and password<br />
    <br />
    In case you have forgotten your password, it ain't a big deal! It happens to the very best of us. <br />Just <a href="<?=base_url();?>login/forgetPassword"><strong>click here</strong></a><br />
    <br />
    Not a SharedCiti  family member yet? <a href="<?=base_url();?>member"><strong>Click here</strong></a> to sign up
<div class="clear10"></div>
  </div>
  <div class="col-xs-12 col-md-5 col-lg-5 pull-right signup_box">
    <h1 class="signup_box_family">Log in</h1>
	<?php 
		$ses_user=$this->session->userdata('User');
		
		if(empty($ses_user))   { 
		echo img(array('src'=>base_url().'public/images/facebookLogin.png','id'=>'facebook','style'=>'cursor:pointer;float:left;margin-left:0px; width:100%;'));
		
		 } /* else {
			
		 echo '<img src="https://graph.facebook.com/'. $ses_user['id'] .'/picture" width="30" height="30"/><div>'.$ses_user['name'].'</div>';	
			echo '<a href="'.$this->session->userdata('logout').'">Logout</a>';
		}*/
	?>
	
    <!--<a href="#" class="btn_facebook_signup">Sign up with Facebook</a>-->
	<div id="fb-root"></div>
    <div class="clear20"></div>
    <div class="col-xs-12 col-md-12 col-lg-12">
      <div class="signup_email_sep col-xs-2 col-md-2 col-lg-3"></div>
      <div class="signup_email col-xs-8 col-md-8 col-lg-6">Or log in with your email</div>
      <div class="signup_email_sep col-xs-2 col-md-2 col-lg-3"></div>
    </div>
	<? if($error){?>
	<div class="col-xs-12 col-md-12 col-lg-12 padding">
	<label style="color:red;"><?php echo $error; ?></label>
	</div>
	<? }?>
    <?php echo form_open(base_url().'login/verifyLogin'); ?>
	<input type="hidden" name="action" id="action" value="1"/>
    <div class="clear10"></div>
    <div class="col-xs-12 col-md-12 col-lg-12 padding">Email address</div>
    <div class="col-xs-12 col-md-12 col-lg-12 padding">
      <input name="email" id="email" class="signup_input" type="text" value="<?php echo set_value('email'); ?>"/>
    </div>
    <div class="clear10"></div>
    <div class="col-xs-12 col-md-12 col-lg-12 padding">Password</div>
    <div class="col-xs-12 col-md-12 col-lg-12 padding">
      <input name="password" id="password" class="signup_input" type="password" />
    </div>
    <div class="clear10"></div>
    <!--<div class="landmark">
      <input type="checkbox" name="remember_me" id="remember_me">
      <label for="remember_me">&nbsp;Remember Me</label>
    </div>-->
    <div class="clear5"></div>
    <div><a href="<?=base_url();?>login/forgetPassword"><strong>Forgot password</strong></a></div>
    <div class="clear20"></div>
      <input type="submit" class="btn_create_account col-xs-12 col-md-12 col-lg-6" name="submit" value="Log in"/>
    <div class="clear10"></div>
  </div>
  </form>
  <div class="clear10"></div>
</div>
<div class="clear"></div>
   <script type="text/javascript">
  window.fbAsyncInit = function() {
	  //Initiallize the facebook using the facebook javascript sdk
     FB.init({ 
       appId:'<?php echo $this->config->item('appID'); ?>', // App ID 
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
 $('#facebook').click(function(e) {
    FB.login(function(response) {
	  if(response.authResponse) {
		  parent.location ='<?php echo base_url(); ?>fbConnect/fblogin';
		  //parent.location ='<?php //echo base_url(); ?>login/fblogin'; //redirect uri after closing the facebook popup
	  }
 },{scope: 'email,read_stream,publish_stream,user_birthday,user_location,user_work_history,user_hometown,user_photos'}); //permissions for facebook
});
   </script>
 