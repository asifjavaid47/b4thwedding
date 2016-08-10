    <div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3 padding_tb40">
            		<?php foreach($allProjectList as $ProjectList){ ?>					
				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_hdng">
					<a href="<?=base_url(); ?>propsal/postbids/<?php echo $ProjectList['ID']; ?>"><?php echo $ProjectList['title']; ?></a>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_sbbhdng"><strong>Price:<?php echo $ProjectList['hourlyRate']; ?>$/hour    </strong> |  Posted: <?php echo $ProjectList['postDate']; ?>  |  Ends: <?php echo $ProjectList['lettime']; ?>  |  <?php echo $ProjectList['propsalTotal']; ?> Proposals</div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_txt">
						<?php echo $ProjectList['description']; ?>
					  
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_txt2">
                        <span>Category: </span> <?php echo $ProjectList['cName'] ; ?> <span>Skills: </span> 
                        <?php
							  foreach ( $ProjectList['skills'] as $key => $value ) {
 
    									echo $value[0].','; 
   
								  }
								
						?>
						
                    </div>
                    <div class="detail_dot">
                        <ul>
                            <li><span> &nbsp; </span></li>
                            <li> &nbsp; </li>
                            <li> &nbsp; </li>
                            <li> &nbsp; </li>
                        </ul>
                    </div>
                    <!--<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 detail_txt3">
                        <span> | </span> <a href="#"> B****ERS </a>
                    </div>-->
                </div>
				<?php } ?>
				<!--
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_tb16">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_hdng">Lead Manager</div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_sbbhdng"><strong>Fixed Price: Less than $500  </strong> |  Posted: 23 minutes ago  |  Ends: 14d, 23h  |   0 Proposals</div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_txt">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac scelerisque nunc, ut convallis urna. 
                        Nulla pulvinar ipsum sit amet magna iaculis, ac porttitor urna venenatis. 
                        Vivamus ac urna ut dolor aliquam scelerisque sed sit amet neque. Nunc fermentum arcu tincidunt ligula iaculis aliquam.
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_txt2">
                        <span>Category: </span> Website Design &nbsp; &nbsp; <span>Skills: </span> <a href="#">Adobe Photoshop</a><a href="#">Adobe Illustrator</a>
                    </div>
                    <div class="detail_dot">
                        <ul>
                            <li><span> &nbsp; </span></li>
                            <li> &nbsp; </li>
                            <li> &nbsp; </li>
                            <li> &nbsp; </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 detail_txt3">
                        <span> | </span> <a href="#"> B****ERS </a>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_tb16">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_hdng">Lead Manager</div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_sbbhdng"><strong>Fixed Price: Less than $500  </strong> |  Posted: 23 minutes ago  |  Ends: 14d, 23h  |   0 Proposals</div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_txt">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac scelerisque nunc, ut convallis urna. 
                        Nulla pulvinar ipsum sit amet magna iaculis, ac porttitor urna venenatis. 
                        Vivamus ac urna ut dolor aliquam scelerisque sed sit amet neque. Nunc fermentum arcu tincidunt ligula iaculis aliquam.
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_txt2">
                        <span>Category: </span> Website Design &nbsp; &nbsp; <span>Skills: </span> <a href="#">Adobe Photoshop</a><a href="#">Adobe Illustrator</a>
                    </div>
                    <div class="detail_dot">
                        <ul>
                            <li><span> &nbsp; </span></li>
                            <li> &nbsp; </li>
                            <li> &nbsp; </li>
                            <li> &nbsp; </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 detail_txt3">
                        <span> | </span> <a href="#"> B****ERS </a>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding_tb16">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_hdng">Lead Manager</div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_sbbhdng"><strong>Fixed Price: Less than $500  </strong> |  Posted: 23 minutes ago  |  Ends: 14d, 23h  |   0 Proposals</div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_txt">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac scelerisque nunc, ut convallis urna. 
                        Nulla pulvinar ipsum sit amet magna iaculis, ac porttitor urna venenatis. 
                        Vivamus ac urna ut dolor aliquam scelerisque sed sit amet neque. Nunc fermentum arcu tincidunt ligula iaculis aliquam.
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_txt2">
                        <span>Category: </span> Website Design &nbsp; &nbsp; <span>Skills: </span> <a href="#">Adobe Photoshop</a><a href="#">Adobe Illustrator</a>
                    </div>
                    <div class="detail_dot">
                        <ul>
                            <li><span> &nbsp; </span></li>
                            <li> &nbsp; </li>
                            <li> &nbsp; </li>
                            <li> &nbsp; </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 detail_txt3">
                        <span> | </span> <a href="#"> B****ERS </a>
                    </div>
                </div>
                
				
				-->
            </div>
        </div>        
    </div>

