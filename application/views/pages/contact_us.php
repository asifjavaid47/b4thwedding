<style>
.heading_main{ color:#c53d8a; font-size:18px; text-transform:uppercase;}
.line{border: 0; height: 1px; background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -moz-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -ms-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); background-image: -o-linear-gradient(left, rgba(0,0,0,0), rgba(0,0,0,0.75), rgba(0,0,0,0)); }
.subheading{color:#a53474;}
.custom{background: none repeat scroll 0 0 #f5f5f5;}
.small-headings{border-bottom:1px solid #e9e9e9; color:#000; padding:5px;}
.ul-special li{list-style-type:square;}
.ul-special li a{color:#c53d8a;}
.attachment{ background:#f4f4f4; color:#000; -webkit-box-shadow: 2px 2px 2px 0px #9d9d9d;;
-moz-box-shadow: 2px 2px 2px 0px #9d9d9d;
box-shadow: 2px 2px 2px 0px #9d9d9d; border:1px solid #999;}
strong{color:#c53d8a;}
.cnct-info{padding:10px; font-size:16px;}
.sidbar_resources{list-style-image: url('<?=base_url()?>public/images/bullet.png'); list-style-position:inside;}
body{font-size:14px;}
</style>
    <div class="clear20"></div>
    <div class="container custom">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng head_account">Contact Information</div>
            	
            
            <div class="inner_img"><img src="<?=base_url()?>public/images/hdng_btm.png" width="100%" height="3" alt=""></div>
            <br />
           <div class="col-lg-6 pull-left">
	<!--<h3>Contact information</h3>-->
    	<h6 class="cnct-info pull-left"><strong style="color:#c53d8a;">Email:</strong><a href="mailto:support@b4thewedding.com"> support@b4thewedding.com</a>
        <br /><br /><strong style="color:#c53d8a;">Phone:</strong> <span style="color:#3b3b3b;">1-800-474-2081</span></h6>
        <hr />
        <h5 class="cnct-info pull-left" style="color:#3b3b3b;">Mon-Fri, 8:00AM – 5:00PM (Eastern Time)<br /><br /> Sat-Sun, 8:00AM. – 12:00PM (Eastern Time)</h5>
</div>
 <div class="col-lg-4 pull-right">
        	<h2 class="heading_main"> Resources </h2>
            <br />
            	<ul class="sidbar_resources">
                	<li><a href="<?=base_url()?>page/user_agreement">User Agreement</a></li>

                    <li><a href="<?=base_url()?>page/copyRight">Copyright Policy</a></li>

                    <li><a href="<?=base_url()?>page/nda">NDA</a></li>
                 
                    <li><a href="<?=base_url()?>page/independentContractorAgreement">Independent Contractor Agreement</a></li>
                    
                    <li><a href="<?=base_url()?>page/privacyPolicy">Privacy Policy</a></li>
                   
                    <li><a href="#">b4thewedding Payment Protection Policy</a></li>
                    
                    <li><a href="<?=base_url()?>helpCenter">Help</a></li>
                   
                    <li><a href="<?=base_url()?>page/contact_us">Contact Us</a></li>
                </ul>
        </div>  
    
		<div class="col-lg-8 pull-left">
			<h2 class="heading_main"> Submit a Request </h2>
            	<br>
		</div>
        
        <form method="post" action="<?=base_url()?>milestone/add_comment" enctype="multipart/form-data">
      		<div class="col-lg-7 pull-left">
   					 <div class="form-group">
     					 <label for="email">Title</label>
                                         <input type="text" required="" class="form-control" name="title"  placeholder="Type a title here">
                            
                            <br>
                            
                            <br>
   					 <div class="form-group">
     					 <label for="email">Description</label>
                                         <textarea rows="6" required="" class="form-control" name="description" placeholder="Enter message"></textarea>
                            <br>
     					 <label for="email">Add Attachment</label>
                                         <input type="file" class="form-control" name="fileAttachement" placeholder="">
                           
                           
   		    		 </div>
                     <br>
                     <br>

                     
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-11 padding0">
                 
					<!--<a href="#" class="join_btn"> Register </a>-->
                    <input type="submit" value="Send" class="join_btn">
                </div>
           			 </div>
<br>
<br>
<br>
<br>
<br>
      </div>
        </form>
                 
    </div>
    <div class="clear20"></div>
