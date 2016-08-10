<!DOCTYPE>
<html><head>
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
			<link rel="stylesheet" type="text/css" href="<?=base_url();?>public/css/menu.css">
<!--   JS    -->
	<script src="<?=base_url();?>public/js/jquery-1.9.1.min.js.js" type="text/javascript"></script>
	<script src="<?=base_url();?>public/js/bootstrap.js" type="text/javascript"></script>
    	<script type='text/javascript' src='<?=base_url();?>public/js/jquery.simplemodal.js'></script>
		<script type='text/javascript' src='<?=base_url();?>public/js/osx.js'></script>
       	<link rel="stylesheet" href="<?=base_url();?>public/css/selectize.css">	
	<script src="<?=base_url();?>public/js/selectize.js"></script>
	<script src="<?=base_url();?>public/js/index.js"></script>

	<script src="<?=base_url();?>public/js/smartpaginator.js"></script>
       	<link rel="stylesheet" href="<?=base_url();?>public/css/smartpaginator.css">	
        
        
        <script>
		  $(document).ready(function(){
			$('.img-zoom').hover(function() {
				$(this).addClass('img_transition');
 
			}, function() {
				$(this).removeClass('img_transition');
			});
				$('.menu_searchbtn').click(function () {
					$("#searchform").submit();
				});
				$('.search_trigger2').click(function () {
					// $("#searchform").submit();
					$( ".menu_searchbtn" ).trigger( "click" );
				});
				
				// action="<?=base_url();?>project/all_project"
				$('.srchslct').change(function () {
				// alert($( "select option:selected" ).val());
				var select_value = $( "select option:selected" ).val();
				if(select_value == 'freelancer')
				{
					$('#searchform').attr('action' ,'<?=base_url();?>search/searching');
					
				}
				else{
					$('#searchform').attr('action' ,'<?=base_url();?>project/all_project');
					
				}
				});
				
$(window).bind('unload', function(){
            $.ajax({
            type: 'get',
            async: false,
            url: '<?=base_url()?>users/change_user_to_offline'

            });
        });

$(window).bind('load', function(){
            $.ajax({
            type: 'get',
            async: false,
            url: '<?=base_url()?>users/change_user_to_online'

            });
        });

});
		</script>
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/validationScript/stylesheets/jquery.validate.css" />
<script src="<?= base_url(); ?>public/validationScript/javascripts/jquery.validate.js" type="text/javascript"></script>
</head>
<body>
<!-- sign in pop up -->	

    
<div class="top">
    	<div id="wrap">
        	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 pull-left padding_tb7"><a href="<?=base_url();?>"><img src="<?=base_url();?>public/images/logo.png" alt=""></a></div>
          	<div class="col-lg-6 col-md-10 col-sm-8 col-xs-12 toplogin_links">
            	<ul>
                	<li><a href="<?=base_url();?>helpCenter">Help</a></li>
                    <li><a href="<?=base_url();?>notification/getNotification">Inbox 
				    <span id="unreadNotification"></span></a> <span> | </span> </li>
                    <li><a href="#"><?php echo $this->session->userdata('fName') ?> &nbsp;<img src="<?=base_url();?>public/images/arrow_inbox.png" alt=""></a> <span> | </span> 
                    
                    	<ul>
                        	<li><a href="<?=base_url();?>project/my_jobs_c">My jobs</a></li>
                            <li><a href="<?=base_url();?>users/freelancerProfile">Profile</a></li>
                            <li><a href="<?=base_url();?>users/logout">Signout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="contnr">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class=" container_nav padding0">
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 padding0">
            <a class="toggleMenu" href="#">Menu</a>
            
            <ul class="nav">
            
                <li  style="background:#c53d8a;"><a href="<?=base_url()?>project/my_jobs_c"><img src="<?=base_url();?>public/images/home.png" alt=""> MY JOBS</a>
                    
                </li>
				<style type="text/css"> 
				.nav > li > .parent {
					background:none;
					color: #000;
				
				}
				.nav > li > .parent:hover
				{
					color: #fff !important;
				}
				</style>
                <li>
				<!--
                <a href="#">HIRE Weddeding a Specialist</a>
                -->
				   <a href="<?=base_url()?>search/searching">HIRE A WEDDING SPECIALIST</a>
					<ul>
                        <li><a href="<?=base_url();?>users/clientProfile">Client Profile</a></li>
					</ul>
				</li>
                <li><a href="#">FIND WORK</a>
                	<ul>
                       <li><a href="<?=base_url();?>project/all_project">Search Jobs</a></li>
                        <!--<li class="search_trigger2"><a class="search_trigger"  href="javascript:void(0);">Search Jobs</a></li>-->
                    </ul>                
                </li>
                <li><a href="#">MANAGE</a>
                	<ul>
                        <li><a href="<?=base_url();?>account">Financial Accounts</a></li>
                        <li><a href="<?=base_url();?>payment/transaction">Transactions</a></li>
                        <li><a href="<?=base_url();?>payment">Add Funds</a></li>
                        <li><a href="<?=base_url();?>withdraw/">Withdraw</a></li>
                    </ul>                
                </li>
                <!--<li><a href="#">RESOURCES</a></li>-->
               
</ul>
               </div>
               
               <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 padding0">
                <div class="menu_search">
					<form id="searchform" action="<?=base_url();?>project/all_project" method="post">
						
						<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 padding0"><select type="text" class="srchslct" name="searh_types" >
							<option value="jobs">Jobs</option>
							<option value="freelancer" 	<?php if(!empty($selected)){echo $selected; }?>>Contractors</option>
						</select></div>
                        
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"><input type="text" class="srchinpt" style="width:115px !important; margin-right:-12px;" name="search" ></div>
                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 padding0 pull-left">
                        <img class="menu_searchbtn" style="width:22px !important; height:16px !important; float:left !important;" src="<?=base_url();?>public/images/seach_icon.png" alt=""></div>
                    </form>
                </div></div>
                 <a href="<?=base_url()?>project/postProject" class="menu_postbtn col-lg-2 col-md-2 col-sm-6 col-xs-12"
                  style="margin:0 !important; margin-top:7px !important; line-height:21px !important; text-align:center !important;">Post Your Job </a>
                </div></div>
                
            
            
            
            
        </div>
        
    </div>
    
     <script type="text/javascript" src="<?=base_url();?>public/js/script.js"></script>
 
  <script>
	function ajaxd() { 
	 $.ajax({
				type: "POST",
				url: "<?= base_url() ?>notification/getUnreadNotification",
				success: function(html){
					$('#unreadNotification').html('('+html+')');
						//alert(html);
						//$(".chosen-select").chosen();
					//$(".chosen-select").trigger("chosen:updated");
						
				}
			});
	}
			
	 
	
	 
$(document).ready(function() {
	ajaxd();
    //setInterval("ajaxd()",10000);
});

  </script>
    