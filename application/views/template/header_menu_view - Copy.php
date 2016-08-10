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

<title></title>

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
        <script>
			$(function() {
				var demo1 = $("#slipry").slippry({
					transition: 'fade',
					useCSS: true,
					speed: 1000,
					pause: 3000,
					auto: true,
					preload: 'visible'
				});

				$('.stop').click(function () {
					demo1.stopAuto();
				});

				$('.start').click(function () {
					demo1.startAuto();
				});

				$('.prev').click(function () {
					demo1.goToPrevSlide();
					return false;
				});
				$('.next').click(function () {
					demo1.goToNextSlide();
					return false;
				});
				$('.reset').click(function () {
					demo1.destroySlider();
					return false;
				});
				$('.reload').click(function () {
					demo1.reloadSlider();
					return false;
				});
				$('.init').click(function () {
					demo1 = $("#slipry").slippry();
					return false;
				});
			});
		</script>
        
        <script>
		  $(document).ready(function(){
			$('.img-zoom').hover(function() {
				$(this).addClass('img_transition');
 
			}, function() {
				$(this).removeClass('img_transition');
			});
		  });
		</script>

</head>
<body>
<!-- sign in pop up -->	

    
<div class="top">
    	<div id="wrap">
        	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 pull-left padding_tb7"><a href="<?=base_url();?>"><img src="<?=base_url();?>public/images/logo.png" alt=""></a></div>
            <div class="col-lg-1 col-md-10 col-sm-8 col-xs-12 padding0 pull-left">
             <a href="<?=base_url()?>project/my_jobs_c " class="top_btn">My Jobs</a>
             </div>
          	<div class="col-lg-9 col-md-10 col-sm-8 col-xs-12 padding0 pull-right">
           
            	<a href="<?=base_url()?>project/postProject" class="top_btn">Post your Job ( <span> FREE </span> )</a>
                <a href="#" class="top_link">How it Works</a>
                
                
               
               
                <div id='osx-modal-content' class="popup">
                    <div class="join_hdng">Create an Account</div>
                    <div class="popup_sep"><img src="<?=base_url();?>public/images/popup_sep.png" width="100%" alt=""></div>
                    <div class="join">
                        <div class="join_txt">I want to hire a Wedding Freelancer    
                            <input type="radio" name="option" class="ckbx" >
                        </div>
                        <div class="join_txt">I want to work on Wedding Projects    
                            <input type="radio" name="option" class="ckbx" >
                        </div>
                        
                        <a href="<?=base_url();?>users/signup" class="join_btn"> Continue </a><img class="join_lock" src="<?=base_url();?>public/images/lock_icon.png" alt="">
                    </div>
                    <div class="popup_sep"><img src="<?=base_url();?>public/images/popup_sep.png" width="100%" alt=""></div>
                    <div class="join_sbbhdng"> Sign Up With:</div>
                    <div class="join_social"><a href="#"><img src="<?=base_url();?>>public/images/popup_fb_icon.png" alt=""></a></div>
                    <div class="join_social"><a href="#"><img src="<?=base_url();?>public/images/popup_in_icon.png" alt=""></a></div>
                </div>
                
                
                
                <!--<div id='osx-modal'><input type='button' name='osx' value='sign out' onClick="<?=base_url();?>users/logout" class='osx demo top_sign'/> </div>-->
              		 <a href="<?=base_url();?>project/all_project" class="osx-modal  demo top_sign">View Projects</a>
                      <a href="<?=base_url();?>project/job_inbox_c" class="top_sign">Inbox</a>
               		<a href="<?=base_url();?>users/logout" class="osx-modal  demo top_sign">sign out</a>
                   
             
               
                
               <input type="text" class="top_search" placeholder="Search Freelancers">
                <a href="#" class="top_search_btn"> GO </a>
            </div>
        </div>
    </div>
    
    
 
    