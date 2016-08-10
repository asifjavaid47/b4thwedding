<script type="text/javascript">
            $(function () {

                $('.delete').click(function (e) {

                    if ($("input:checked").length > 0) {
                       if(confirm('Do you want to Delete?'))
					   {
                        $('#act').val("delete");
                        $('#submitForm').submit();
					   }else
					   {
						   return;
					   }
                 
                    }else{
                        alert("Please Select a row");
                    }
                });


                
            });
			
			
$(document).ready(function() {
    $('#selecctall').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.chk').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }else{
            $('.chk').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
    });
    
});
        </script>
       
 
<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng">Portfolios</div>
            <div class="inner_img"><img src="<?=base_url()?>public/images/hdng_btm.png" width="100%" height="3" alt=""></div>
            
            
            
            <div class="col-lg-10 col-md-7 col-sm-12 col-xs-12 padding_tb40">
            	
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inboxmiddle_hdng">
<!--                	<select class="inboxmiddle_slct" name=""><option>Select one</option></select>
-->                    <input type="checkbox" class="inbox_middleckbox" id="selecctall" name="chekbox" />
                    <div class="col-lg-3 col-md-6 col-sm-8 col-xs-12 inbox_middletop">
                   
                        <a href="<?=base_url()?>portfolio/addPortfolio" class=" inbox_middlelink border_lr">Add New</a>
                        <a href="#" class="inbox_middlelink delete" style="margin-right:50px;">Delete</a>
                        
                    </div>
                    
                </div>
                
            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_middle">
                	<ul>
                    
			
<form method="post" id="submitForm" action="<?=base_url(); ?>portfolio/deletePortfolio">
 <?php
 if(!empty($listPortfolio))
 {
 foreach($listPortfolio as $list){ ?>
                        <li>
                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_hdng2">
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                            <?php
								$src_file_name = $list->portfolioImage;
								$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));						
								if($ext == 'gif' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
									?>
									<a href="<?=base_url()?>portfolio/showImage/<?php echo $list->portfolioImage; ?>" target="_parent">
                                    <img src="<?=base_url()?>public/upload/portfolio/<?php echo $list->portfolioImage; ?>" class="img-responsive edit_thumb">
                                    
                                    </a> 
									<?php
								}else if($ext == 'pdf'){
									?>
									<a href="<?=base_url()?>portfolio/download/<?php echo $list->portfolioImage; ?>" target="_new"><img src="<?=base_url()?>public/images/pdf.jpg" class="img-responsive edit_thumb"></a> 
									<?php
								}else if($ext == 'docx'){
									?>
									<a href="<?=base_url()?>portfolio/download/<?php echo $list->portfolioImage; ?>" target="_new"><img src="<?=base_url()?>public/images/word.png"class="img-responsive edit_thumb"></a> 
									<?php
								}else if($ext == 'xls'){
									?>
									<a href="<?=base_url()?>portfolio/download/<?php echo $list->portfolioImage; ?>" target="_new"><img src="<?=base_url()?>public/images/excel.png"class="img-responsive edit_thumb"></a>
									<?php
								}else{
									?>
									<a href="<?=base_url()?>portfolio/download/<?php echo $list->portfolioImage; ?>" target="_new"><img src="<?=base_url()?>public/images/download.jpg"class="img-responsive edit_thumb"></a> 
									<?php
								}
							?>
                            <?php /*?><img src="<?=base_url()?>public/upload/portfolio/<?php echo $list->portfolioImage; ?>" width="170" height="150" /><?php */?>
                            </div>
                            <h4 style="text-transform:capitalize;">
                            	<?php echo $list->portfolioTitle; ?>
							</h4>
                            
                            <p style="color:#666; font-weight:200;">
                            	<?php echo $list->portfolioDescription; ?>
							</p>
                            </div>
                            <span class="inbox_icon" style="background:#F5DE00;"> &nbsp; </span>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 padding0" ><?php echo $list->date; ?> </div>
                            <input type="checkbox" class="inbox_middleckbox chk" name="chk[]" 
                            value="<?php echo $list->portfolioID; ?>" /><?php /*?><a href="<?=base_url();?>project/detail_project/<?php echo $list->portfolioID;?>/<?php echo $list->portfolioID; ?>" class="inbox_middleview">View Detail  &nbsp;|</a><?php */?>
                          
                        
                        </li>
                        <?php } ?>
                        <?php }else{ ?>
                       <h5>No Propsal Found</h5>
                         <?php } ?>
                         
                        <?php echo form_close(); ?>
                       
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_middleresult">( <?php echo sizeof($listPortfolio); ?> Result )</div>
                    </ul>
                   
                    
                    
                </div>
                
            </div>
            
            
            
            
        </div>        
    </div>