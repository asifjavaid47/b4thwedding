<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- ************************************************************************ !-->
    <!-- *****                                                              ***** !-->
    <!-- *****       ¤ Designed and Developed by  LEADconcept               ***** !-->
    <!-- *****               http://www.leadconcept.com                     ***** !-->
    <!-- *****                                                              ***** !-->
    <!-- ************************************************************************ !-->
<link rel="shortcut icon" type="image/png" href="<?=base_url();?>public/images/favicon.png"/>
<title> <?php echo !empty($title) ? $title : 'b4thewedding'; ?></title>

<!--   CSS    -->
	<link href="<?=base_url();?>public/css/style.css" rel="stylesheet" type="text/css" />   
    <link href="<?=base_url();?>public/css/bootstrap.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url();?>public/css/fonts.css">
    	<link rel="stylesheet" href="<?=base_url();?>public/css/slippry.css">
        	<link type='text/css' href='<?=base_url();?>public/css/osx.css' rel='stylesheet' media='screen' />

<!--   JS    -->
	<script src="<?=base_url();?>public/js/jquery-1.9.1.min.js.js" type="text/javascript"></script>
	<script src="<?=base_url();?>public/js/bootstrap.js" type="text/javascript"></script>
    	<script type='text/javascript' src='<?=base_url();?>public/js/jquery.simplemodal.js'></script>
		<script type='text/javascript' src='<?=base_url();?>public/js/osx.js'></script>
        
    	<script src="<?=base_url();?>public/js/slippry.min.js"></script>
        
        
<!--validation-->
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/validationScript/stylesheets/jquery.validate.css" />
<script src="<?= base_url(); ?>public/validationScript/javascripts/jquery.validate.js" type="text/javascript"></script>
<!--validation End-->
       
	<script src="<?=base_url();?>public/js/smartpaginator.js"></script>
       	<link rel="stylesheet" href="<?=base_url();?>public/css/smartpaginator.css">	
        
        <script>
		  $(document).ready(function(){
			$('.img-zoom').hover(function() {
				$(this).addClass('img_transition');
 
			}, function() {
				$(this).removeClass('img_transition');
			});
			/* enter then trigger signin button */
			$("#passwordhd").keyup(function(event){
				if(event.keyCode == 13){
					$(".popup_pink_btn").click();
				}
			});
			/* searchform trigger click on go button */
				$('.top_search_btn').click(function () {
					$("#searchform").submit();
				});
			
		  });
		</script>


</head>
<body>
<!-- sign in pop up -->	

    
<div class="top">
    	<div id="wrap">
        	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 pull-left padding_tb7"><a href="<?=base_url();?>"><img src="<?=base_url();?>public/images/logo.png" alt=""></a></div>
          	<div class="col-lg-9 col-md-10 col-sm-8 col-xs-12 padding0 pull-right">
            	<a href="#" class="top_btn post" id="osx-modal">Post your Job ( <span> FREE </span> )</a>
                <a href="<?=base_url()?>project/all_project" class="top_link">Find Projects</a>
                
                
                <div id='osx-modal'><a href="#" class="top_link osx demo">Register Now ( <span> FREE </span> )</a></div>
               
                <div id='osx-modal-content' class="popup">
                <div class="clear10"></div>
                    <div class="join_hdng">Create an Account</div>
                    <div class="popup_sep"><img src="<?=base_url();?>public/images/popup_sep.png" width="100%" alt=""></div>
                    <form id="checksignup" method="post">
                    <div class="join">
                        <div class="join_txt">I want to hire a Wedding Contractor    
                            <input type="radio" value="client" name="option" checked required class="ckbx" >
                        </div>
                        <div class="join_txt">I want to work on Wedding Projects    
                            <input type="radio" name="option" value="project" required class="ckbx" >
                        </div>
                        
                        <input type="submit" value="Continue" class="join_btn"><img class="join_lock" src="<?=base_url();?>public/images/lock_icon.png" alt="">
                    </div>
                    </form>
                    <div class="popup_sep"><img src="<?=base_url();?>public/images/popup_sep.png" width="100%" alt=""></div>
                    <div class="join_sbbhdng"> Sign Up With:</div>
                    <div class="join_social"><a href="javascript:" class="facebookSignup"><img src="<?=base_url();?>public/images/popup_fb_icon.png" alt=""></a></div>
                    <div class="join_social"><a href="#"><img src="<?=base_url();?>public/images/popup_in_icon.png" alt=""></a></div>
                </div>
                
                
                
                <div id='osx-modal'><input type='button' name='osx' value='Sign in' class='osx demo top_sign'/> </div>
               
                 <!-- sign in popup -->
<div style='display:none'>
<form id="goLogin" >
                <div id="osx-modal-content1" class="popup" style="overflow:hidden">
                	<div class="close"><a href="#" class="simplemodal-close">x</a></div>
                	<div class="popup_top">
                        <div class="popup_hdng">Sign In</div>
                        <div class="popup_sbbhdng">OR Sign In:</div>
                        <div class="popup_social"><a href="javascript:" class="facebookSignup"><img src="<?=base_url();?>public/images/popup_fb_icon.png" alt=""></a></div>
                        <div class="popup_social"><a href="<?=base_url();?>liConnect/lilogin"><img src="<?=base_url();?>public/images/popup_in_icon.png" alt=""></a></div>
                        <div class="popup_social"><a href="<?=base_url();?>gconnect/glogin" data-redirecturi="postmessage"><img src="<?=base_url();?>public/images/popup_ggl_icon.png" alt=""></a></div>
                    </div>
                    <div class="popup_sep"><img src="<?=base_url();?>public/images/popup_sep.png" width="100%" alt=""></div>
                     <div class="popup_txt" id="error_show"></div>
                    <div class="popup_txt">Enter Username
                        <input class="inpt" type="text" name="userName" id="userNamehd" value="<?php if(get_cookie('username')){ echo get_cookie('username'); } ?>"  required><a href="<?=base_url();?>users/forgotUsername">Forgot?</a>
                    </div>
                     <div class="popup_txt">Password
                        <input class="inpt" type="password" name="password" id="passwordhd" value="<?php if(get_cookie('password')){ echo get_cookie('password'); } ?>" required><a href="<?=base_url();?>users/forgotPassword">Forgot?</a>
                    </div>
                    <div class="popup_txt">Keep me signed in <!--<span style="color:#AA93AA">for 2 weeks</span>-->
						<input name="rememberme" class="ckbx"  id="rememberme" type="checkbox" />
                    </div>
                    <input type="submit"  name="submit" class="popup_pink_btn" onClick="goLogin();"  value="Sign in"><img class="popup_lock" src="<?=base_url();?>public/images/lock_icon.png" alt=""> 
                   <!-- <a href="#" class="popup_pink_btn"> Sign in</a><img class="popup_lock" src="<?=base_url();?>public/images/lock_icon.png" alt=""> -->
                </div>
           </form>
  </div>
   <!-- END sign in popup -->
                
                	
                 
				<form id="searchform" action="<?=base_url();?>project/all_project" method="post">
					<input type="text" name="search"  class="top_search" placeholder="Search">
					<a href="#" class="top_search_btn"> GO </a>
			   </form>
				
            </div>
        </div>
    </div>
    
    
    <script>
	function goLogin(){	
	$('#error_show').hide();
	var rememberme = '';
		if ($('#rememberme').prop('checked')==true){ 
		   
		    rememberme = 'rememberme';
		}			
		var userName    = document.getElementById('userNamehd').value;			
		var password 	= document.getElementById('passwordhd').value;
		 
						
		if(userName == '' || password == ''){
			$('#goLogin').submit();	
			
		}else{
			$('#error_show').show().html('<div align="center" style="margin-top:5px;"><img src="<?= base_url() ?>/public/images/ajax-loader.gif"></div>');
			$.ajax({
				type: "POST",
				url: "<?= base_url() ?>users/validate/",
				data: "userName="+userName+"&password="+password+"&rememberme="+rememberme,
				success: function(html){
					//alert(html);
						if(html == 'login'){
							window.location.href = '<?=base_url();?>project/my_jobs_c';
							
						}else if(html=='inactive'){
							var c = confirm('You are Not Active Yet! Would You like to activate now?');
							if(c){
								$.ajax({
									type: "POST",
									url: "<?= base_url() ?>users/resendEmail/",
									data: "userName="+userName+"&password="+password+"&rememberme="+rememberme,
									success: function(html){										
										$('#error_show').show().html("Check your email and follow instructions");										
									}
								});
								
							} else {
								$('#goLogin').hide();
								return;
							}							
						}else
						{
							$('#error_show').show().html("<div align='center' style='margin-top:5px; color:red'>User name and/or password doesn't match</div>");
							/*$('#error_show').show().html(html);*/
							
						}
				}
			});
		}	
	}
	
	
	</script>
 
  <script type="text/javascript">

            /* <![CDATA[ */

            jQuery(function(){

                jQuery("#userNamehd").validate({

                    expression: "if (VAL) return true; else return false;",

                   // message: "Please enter the Required field"

                });
				jQuery("#passwordhd").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });



            });

            /* ]]> */

        </script>
        
<script>
 $('.join_btn').click(function(e){
	 e.preventDefault();
	 var option = ($("input[name=option]:checked").val());
	 var url="<?php echo base_url();?>";
	 window.location = url+"users/signup/"+option;
	
	
	 })
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