        
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
<div class="bnr">
		        <article id="slipry">
            <ul>
            <?php
					if(empty($slider)) 
					{	
						echo"<br><h2>Not Slider Images Exit</h2>";
					
					}
					else 
					{					
						foreach($slider as $slider_image)
						{
				?>
                <li><img src="<?=base_url();?>public/upload/sliderImagesUpload/<?php echo $slider_image->imagePath;?>" width="100%">
                    <div class="bnr_txtarea">
                        <div class="col-lg-7 col-md-8 col-sm-10 col-xs-12 bnr_hdng">Wedding Contracting Marketplace</div>
                      <div class="col-lg-6 col-md-8 col-sm-11 col-xs-12 bnr_sbhdng">Plan the Wedding of your Dreams With the #1 Global Wedding Contracting Marketplace. Hire Creative Contractors to Work on all of your Projects for Wedding Planning with ease. Contractors can instantly locate and Bid on Available Projects.</div>
                        <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 bnr_btn">
                            <a class="padding_r10 pull-left" href="<?=base_url()?>search/searching"><img src="<?=base_url();?>public/images/hire_btn.png" width="100%" alt=""></a>
                            <a class="pull-left" href="<?=base_url()?>project/all_project"><img src="<?=base_url();?>public/images/work_btn.png" width="100%" alt=""></a>
                        </div>
                    </div>
                </li>
                <?php
						}
					}
				?>
                <!--<li><img src="<?=base_url();?>public/images/b2.png" width="100%">
                    <div class="bnr_txtarea">
                        <div class="col-lg-7 col-md-8 col-sm-10 col-xs-12 bnr_hdng">Wedding Freelancer Marketplace</div>
                        <div class="col-lg-6 col-md-8 col-sm-11 col-xs-12 bnr_sbhdng">Plan the Wedding of your Dreams With the #1 Wedding  Freelancer Marketplace. Hire Creative Freelancer to Work on all of your Projects for Wedding Planning With ease  Freelancers Instantly Locate and Bid <br> on Available Projects</div>
                        <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 bnr_btn">
 <a class="padding_r10 pull-left" href="<?=base_url()?>search/searching"><img src="<?=base_url();?>public/images/hire_btn.png" width="100%" alt=""></a>
                            <a class="pull-left" href="<?=base_url()?>project/all_project"><img src="<?=base_url();?>public/images/work_btn.png" width="100%" alt=""></a>
                        </div>
                    </div>
                </li>-->
                <!--<li><img src="<?=base_url();?>public/images/b3.png" width="100%">
                    <div class="bnr_txtarea">
                        <div class="col-lg-7 col-md-8 col-sm-10 col-xs-12 bnr_hdng">Wedding Freelancer Marketplace</div>
                        <div class="col-lg-6 col-md-8 col-sm-11 col-xs-12 bnr_sbhdng">Plan the Wedding of your Dreams With the #1 Wedding  Freelancer Marketplace. Hire Creative Freelancer to Work on all of your Projects for Wedding Planning With ease  Freelancers Instantly Locate and Bid <br> on Available Projects</div>
                        <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 bnr_btn">
 <a class="padding_r10 pull-left" href="<?=base_url()?>search/searching"><img src="<?=base_url();?>public/images/hire_btn.png" width="100%" alt=""></a>
                            <a class="pull-left" href="<?=base_url()?>project/all_project"><img src="<?=base_url();?>public/images/work_btn.png" width="100%" alt=""></a>
                        </div>
                    </div>
                </li>-->
                <!--<li><img src="<?=base_url();?>public/images/b4.png" width="100%">
                    <div class="bnr_txtarea">
                        <div class="col-lg-7 col-md-8 col-sm-10 col-xs-12 bnr_hdng">Wedding Freelancer Marketplace</div>
                        <div class="col-lg-6 col-md-8 col-sm-11 col-xs-12 bnr_sbhdng">Plan the Wedding of your Dreams With the #1 Wedding  Freelancer Marketplace. Hire Creative Freelancer to Work on all of your Projects for Wedding Planning With ease  Freelancers Instantly Locate and Bid <br> on Available Projects</div>
                        <div class="col-lg-10 col-md-9 col-sm-12 col-xs-12 bnr_btn">
 <a class="padding_r10 pull-left" href="<?=base_url()?>search/searching"><img src="<?=base_url();?>public/images/hire_btn.png" width="100%" alt=""></a>
                            <a class="pull-left" href="<?=base_url()?>project/all_project"><img src="<?=base_url();?>public/images/work_btn.png" width="100%" alt=""></a>
                        </div>
                    </div>
                </li>-->
            </ul>
        </article>
    
    </div>
    <div class="content">
    	<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content_area">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content_area_hdng head_account">Top Wedding Business Services</div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:center;"><strong>Choose from our most popular services</strong></div>
              <!--<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content_area_sbbhdng">Choose from our most popular services</div>-->
              <div class="content_area_img"><img src="<?=base_url();?>public/images/hdng_btm.png" width="100%" height="3" alt=""></div>
			  
				<?php
					if(empty($categories)) 
					{	
						echo"<br><h2>Not Categories Exit</h2>";
					
					}
					else 
					{	$i=0;				
						foreach($categories as $main_cat)
						{ 
						if($i==12)
						 break;
				?>
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 padding_lr10">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content_area_box">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0 img_hidden">
					<a href="<?=base_url();?>project/all_project/<?php echo $main_cat->ID;?>">
						<img class="img-zoom" src="<?=base_url();?>public/upload/categories/<?php echo $main_cat->imagePath;?>" width="100%" alt="">
					</a></div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content_box_hdng">
                        <?php /*?><a href="<?=base_url();?>project/show_projects_cat_wise/<?php echo $main_cat->ID;?>"> 
                        <?php echo $main_cat->cName;?></a><?php */?>
                        
                        <a href="<?=base_url();?>project/all_project/<?php echo $main_cat->ID;?>"> 
                        <?php echo $main_cat->cName;?></a>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0 content_box_sbbhdng"> <?php echo $main_cat->description; ?></div>
                  </div>
              </div>
			  
			   <?php 
						$i++;} 
					} 
				?>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			  <a href="<?=base_url()?>project/all_project">More Categories</a>
			  </div>
    		  <div class="content_btm">
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding_tb15">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_lr10">
                        <div class="col-lg-12 col-md-8 col-sm-10 col-xs-4 padding0 content_btm_img"><img src="<?=base_url();?>public/images/hire_icon.png" width="124" height="124" alt=""></div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content_btm_hdng">Hire Quickly</div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0 content_btm_sbbhdng">We provide a glorious gateway to the best wedding Contracting source. Register today to begin new projects, connect with talented wedding contractors, and discover jobs.</div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding_tb15">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_lr10">
                        <div class="col-lg-12 col-md-8 col-sm-10 col-xs-4 padding0 content_btm_img"><img src="<?=base_url();?>public/images/get_icon.png" width="124" height="124" alt=""></div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content_btm_hdng">Have your Dream Wedding, Without Breaking the Bank</div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0 content_btm_sbbhdng">Keep within your budget with our bidding features. By naming your own price, our premium contracting marketplace will assist in orchestrating your need on your terms.</div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padding_tb15">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_lr10">
                        <div class="col-lg-12 col-md-8 col-sm-10 col-xs-4 padding0 content_btm_img"><img src="<?=base_url();?>public/images/pay_icon.png" width="124" height="124" alt=""></div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content_btm_hdng">Pay Contractors <br /> Safe and Securely</div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding0 content_btm_sbbhdng">Wedding Preparation is enough to handle, work with ease. Your information is backed with
256-bit Encryption, the powerful SSL encryption available today to protect our members.
</div>
                      </div>
                  </div>
              </div>
              
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content_btns">
              <?php if ($this->session->userdata('logged_in')){ ?>
              	<a href="<?=base_url()?>project/postProject" class="padding_r10"><img src="<?=base_url();?>public/images/post_.png" width="265" height="53" alt=""></a>
              <?php }else{ ?>
              <a href="#" class="padding_r10 post"><img src="<?=base_url();?>public/images/post_.png" width="265" height="53" alt=""></a>
              <?php } ?>
                <a href="#" class="osx"><img src="<?=base_url();?>public/images/register_btn.png" width="265" height="53" alt=""></a>
          	  </div>
          </div>
            
        </div>
    </div>