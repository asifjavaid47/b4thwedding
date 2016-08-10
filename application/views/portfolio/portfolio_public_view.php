<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">Portfolio</div>
            <div class="inner_img"><img src="images/hdng_btm.png" width="100%" height="3" alt=""></div>
            
            
            
            <div class="col-lg-10 col-md-7 col-sm-12 col-xs-12 padding_tb40">
            	
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inboxmiddle_hdng">
                	
                        
                    </div>
                    
                </div>
                
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_middle">
                	<ul>
                    
 <?php
 if(!empty($listPortfolio))
 {
 foreach($listPortfolio as $list){ ?>
                        <li>
                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_hdng2">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <?php
								$src_file_name = $list->portfolioImage;
								$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));						
								if($ext == 'gif' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
									?>
									<a href="<?=base_url()?>portfolio/showImage/<?php echo $list->portfolioImage; ?>" target="_parent"><img src="<?=base_url()?>public/upload/portfolio/<?php echo $list->portfolioImage; ?>" width="170" height="150" ></a> 
									<?php
								}else if($ext == 'pdf'){
									?>
									<a href="<?=base_url()?>portfolio/download/<?php echo $list->portfolioImage; ?>" target="_new"><img src="<?=base_url()?>public/images/pdf.jpg" width="170" height="150" ></a>
									<?php
								}else if($ext == 'docx'){
									?>
									<a href="<?=base_url()?>portfolio/download/<?php echo $list->portfolioImage; ?>" target="_new"><img src="<?=base_url()?>public/images/word.png" width="170" height="150" ></a>
									<?php
								}else if($ext == 'xls'){
									?>
									<a href="<?=base_url()?>portfolio/download/<?php echo $list->portfolioImage; ?>" target="_new"><img src="<?=base_url()?>public/images/excel.png" width="170" height="150" ></a>
									<?php
								}else{
									?>
									<a href="<?=base_url()?>portfolio/download/<?php echo $list->portfolioImage; ?>" target="_new"><img src="<?=base_url()?>public/images/download.jpg" width="170" height="150" ></a>
									<?php
								}
							?>
                            <?php /*?><img src="<?=base_url()?>public/upload/portfolio/<?php echo $list->portfolioImage; ?>" width="170" height="150" /><?php */?>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            	<?php echo $list->portfolioTitle; ?>
                            </div>
								
                            </div>
                            <span class="inbox_icon" style="background:#F5DE00;"> &nbsp; </span>
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 padding0" ><?php echo $list->date; ?> </div>
                           
                        
                        </li>
                        <?php } ?>
                       <?php }else{ ?>
                       <h5>No Propsal Found</h5>
                         <?php } ?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_middleresult">( <?php echo sizeof($listPortfolio); ?> Result )</div>
                    </ul>
                   
                    
                    
                </div>
                
            </div>
            
            
            
            
        </div>        
    </div>