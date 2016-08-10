<div id="wrap">
  
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng" style="color:green">Payment Request</div>
            <div class="inner_img"><img src="images/hdng_btm.png" width="100%" height="3" alt=""></div>
             <?php if (!empty($success)){ ?>
				<p class="success" style="color:green"><?php echo $success;  ?></p>

			<?php } ?>
          	          
            <div class="inner_project_form">
            	 <form accept-charset="utf-8" method="post" action="" enctype="multipart/form-data">
				 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_tb39">
					<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12 padding0 inner_project_form_txt">
						description: 
                        <textarea class="frm_inpt" id="title" name="description" required></textarea>
                    </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-11 padding0">
                    <input type="submit" class="join_btn" value="Submit">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_sbbhdng2">We value your privacy. 
                    <a href="#">Privacy Policy</a> &nbsp; <img alt="" src="<?=base_url()?>public/images/lock_icon.png">
                    </div>
                </div>
              </div>
             </form>      
        </div>        
    </div>
  </div>
	
	