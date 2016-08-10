<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_hdng head_account">Files</div>
            <div class="inner_img"><img src="<?=base_url()?>public/images/hdng_btm.png" width="100%" height="3" alt=""></div>
      <?php echo $sidebar; ?>
            
            	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 inbox_middle">
                	<ul>
                    
			
<form method="post" id="submitForm" action="<?=base_url(); ?>workRoom/deleteUploadsFiles">
<input type="hidden" name="projectID" value="<?php echo $projectID; ?>" />
 <?php
 if(!empty($listwrUploadFile)) { ?>
 						<?php if($listwrUploadFile['projectFile']!='')
							{
						 ?>
                        <li>
                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_hdng2">
                            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                            <?php
								$src_file_name = $listwrUploadFile['projectFile'];
								$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));						
								if($ext == 'gif' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
									?>
									<a href="#" target="_parent"><img src="<?=base_url()?>public/upload/project_uploads/<?php echo $src_file_name; ?>"  class="img-responsive edit_thumb" ></a> 
									<?php
								}else if($ext == 'pdf'){
									?>
									<a href="<?=base_url()?>public/upload/project_uploads/<?php echo $src_file_name;?>" target="_new"><img src="<?=base_url()?>public/images/pdf.jpg"  class="img-responsive edit_thumb" ></a> 
									<?php
								}else if($ext == 'docx'){
									?>
									<a href="<?=base_url()?>public/upload/project_uploads/<?php echo $src_file_name;?>" target="_new"><img src="<?=base_url()?>public/images/word.png"  class="img-responsive edit_thumb" ></a> 
									<?php
								}else if($ext == 'xls'){
									?>
									<a href="<?=base_url()?>public/upload/project_uploads/<?php echo $src_file_name;?>" target="_new"><img src="<?=base_url()?>public/images/excel.png"  class="img-responsive edit_thumb" ></a>
									<?php
								}else{
									?>
									<a href="<?=base_url()?>public/upload/project_uploads/<?php echo $src_file_name;?>" target="_new"><img src="<?=base_url()?>public/images/download.jpg"  class="img-responsive edit_thumb" ></a> 
									<?php
								}
							?>
                           
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            	<?php echo $listwrUploadFile['projectFile']; ?>
                            </div>
								
                            </div>
                            <span class="inbox_icon" style="background:#F5DE00;"> &nbsp; </span>
                            
                            
                        
                        </li>
                       		<?php } 
							
                            if($listwrUploadFile['propsalFile']!='') 
							
							{
							$propsalFile2	=	$listwrUploadFile['propsalFile'];	
							?>
								<li>
                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_hdng2">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <?php
								$src_file_name = $propsalFile2;
								$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));						
								if($ext == 'gif' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
									?>
									<a href="<?=base_url()?>public/upload/propsal_upload/<?php echo $src_file_name;?>" target="_parent"><img src="<?=base_url()?>public/upload/propsal_upload/<?php echo $src_file_name; ?>" class="img-responsive edit_thumb" ></a> 
									<?php
								}else if($ext == 'pdf'){
									?>
									<a href="<?=base_url()?>public/upload/propsal_upload/<?php echo $src_file_name;?>" target="_new"><img src="<?=base_url()?>public/images/pdf.jpg" class="img-responsive edit_thumb" ></a> 
									<?php
								}else if($ext == 'docx'){
									?>
									<a href="<?=base_url()?>public/upload/propsal_upload/<?php echo $src_file_name;?>" target="_new"><img src="<?=base_url()?>public/images/word.png" class="img-responsive edit_thumb" ></a> 
									<?php
								}else if($ext == 'xls'){
									?>
									<a href="<?=base_url()?>public/upload/propsal_upload/<?php echo $src_file_name;?>" target="_new"><img src="<?=base_url()?>public/images/excel.png" class="img-responsive edit_thumb" ></a>
									<?php
								}else{
									?>
									<a href="<?=base_url()?>public/upload/propsal_upload/<?php echo $src_file_name;?>" target="_new"><img src="<?=base_url()?>public/images/download.jpg" class="img-responsive edit_thumb" ></a> 
									<?php
								}
							?>
                           
                            </div>
                            <h4 style="text-transform:capitalize;">
                            	<?php echo $src_file_name; ?>
                            </h4>

                            	<!--<p style="color:#666; font-weight:200;">
                               	 	<?php //echo $listwrUploadFile['wrUploadFileDescription']; ?>
                                </p>-->
								
                            <br class="clear5" />
                            <span class="inbox_icon" style="background:#F5DE00;"> &nbsp; </span>
                            
                            
                        
                        </li>
							<?php }?>
                            
                             <?php if($listwrUploadFile['privateMessageFile']!='') 
							 		{
										$privateMessageFile	=	$listwrUploadFile['privateMessageFile'];
										foreach($privateMessageFile as $privateMessage)
										if($privateMessage['attachFiles']!='')
										{
										{ ?>
											<li>
                        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inbox_hdng2">
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <?php
								$src_file_name = $privateMessage['attachFiles'];
								$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));						
								if($ext == 'gif' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
									?>
									<a href="<?=base_url()?>public/upload/messageUpload/<?php echo $src_file_name;?>" target="_parent"><img src="<?=base_url()?>public/upload/messageUpload/<?php echo $src_file_name; ?>" class="img-responsive edit_thumb" ></a> 
									<?php
								}else if($ext == 'pdf'){
									?>
									<a href="<?=base_url()?>public/upload/messageUpload/<?php echo $src_file_name;?>" target="_new"><img src="<?=base_url()?>public/images/pdf.jpg" class="img-responsive edit_thumb" ></a> 
									<?php
								}else if($ext == 'docx'){
									?>
									<a href="<?=base_url()?>public/upload/messageUpload/<?php echo $src_file_name;?>" target="_new"><img src="<?=base_url()?>public/images/word.png" class="img-responsive edit_thumb" ></a> 
									<?php
								}else if($ext == 'xls'){
									?>
									<a href="<?=base_url()?>public/upload/messageUpload/<?php echo $src_file_name;?>" target="_new"><img src="<?=base_url()?>public/images/excel.png" class="img-responsive edit_thumb" ></a>
									<?php
								}else{
									?>
									<a href="<?=base_url()?>public/upload/messageUpload/<?php echo $src_file_name;?>" target="_new"><img src="<?=base_url()?>public/images/download.jpg" class="img-responsive edit_thumb" ></a> 
									<?php
								}
							?>
                           
                            </div>
                            <h4 style="text-transform:capitalize;">
                            	<?php echo $privateMessage['attachFiles']; ?>
                            </h4>
								
                            
                            <br class="clear5" />
                            <span class="inbox_icon" style="background:#F5DE00;"> &nbsp; </span>
                            
                            
                        
                        </li>
									<?php }
										}
									}
							 ?>
							
                        <?php }else{ ?>
                       <h5>No File Found</h5>
                         <?php } ?>
                    </ul>
                </div>
                
            </div>
    </div>