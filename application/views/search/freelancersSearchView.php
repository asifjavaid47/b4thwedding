   <div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
        <div class="inbox_left col-lg-3 col-md-3 col-sm-4 col-xs-12" style="margin-top:20px;">
                <ul>
                    <li class="active"><a href="<?=base_url()?>project/all_project"><span class="inbox_icon" style="background:#fff;"> &nbsp; </span>Categories</a></li>
                   
                   <!-- <li>
                    <a href=""><span class="inbox_icon" style="background:#0A9AD1;"> &nbsp; </span>
                    <span>Messages</span></a>
                    </li>-->
						<?php
						
					if(empty($categories)) 
					{	
						echo"<br><h2>Not Categories Exit</h2>";
					
					}
					else 
					{					
						foreach($categories as $main_cat)
						{
						
				?>
                    <li><a href="<?=base_url();?>search/searching/<?php echo $main_cat->ID;?>"><span class="inbox_icon" style="background:#904EC0;"> &nbsp; </span><span><?php echo $main_cat->cName;?></span></a></li>
					
						<?php
					
					}
					}
					
				?>
                </ul>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 padding_tb20" id="pagination-content">
            		<?php
					if(empty($allProjectList))
					{
						echo"<h3>No Result Found</h3>";
					}
					else {
				
					foreach($allProjectList as $ProjectList){
					
					?>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 freelnacer_listing">
                    
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<?php
						if(!empty($ProjectList['image'])) {
					?>
					
					<img src="<?=base_url(); ?>public/upload/profile/thumbnail/<?php echo $ProjectList['image']; ?>" style="height:100px !important; width:100%" class="img-responsive" alt="" />					
				<?php
				
				} else { ?>
				<img src="<?=base_url(); ?>public/images/no-photo.png" class="img-responsive" alt="" />	
					<?php
				
				} ?>
				</div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 detail_hdng">
					<a href="<?=base_url(); ?>users/freelancerPublicView/<?php echo $ProjectList['ID']; ?>"><?php echo $ProjectList['fName']; ?></a>
                    
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_sbbhdng">
                    	
                            <?php
                        	echo $ProjectList['country']; 
							?>
                         
                        </strong> |  Rate: <?php echo $ProjectList['hourlyRate']; ?>  
                        |
                        <?php echo $ProjectList['totaljobs']; ?> Jobs</div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_txt">
                            <?php echo $ProjectList['overview']; ?>
					  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_txt2">
                        <span>Category: </span> <?php echo $ProjectList['cName'] ; ?> <span>Skills: </span> 
                     
                      <?php 
					echo $ProjectList['userSkill'];
					?>
						
                    </div>
                    
                    </div>
                    <div class="clear20"></div>
                    </div>
                    <div class="clear20"></div>
                    
                    
                    
                    <!--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 detail_txt3">
                        <span> | </span> <a href="#"> B****ERS </a>
                    </div>-->
                </div>
				<?php } } ?>

<div class="col-lg-9 pull-right col-md-12 col-sm-12 col-xs-12 pager purpol" id="smart-paginator"></div>


            </div>
        </div>        
    </div>

<script type="text/javascript">
    $(document).ready(function(){
                var total_projects = $( "div.freelnacer_listing" ).length;
            if(total_projects > 0){
           $('#smart-paginator').smartpaginator({ totalrecords: total_projects, recordsperpage: 8,controlsalways: false,datacontainer: 'pagination-content',dataelement: 'div.freelnacer_listing', initval:0 , next: '>', prev: '<', first: '<<', last: '>>',display: 'single',length: 1, theme: 'purpol'
 
         });
     } else {
            $('#smart-paginator').css("display", "none");
     }

    });
</script>

