    <div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-3 col-md-offset-3 padding_tb40">
            		<?php
					if(sizeof($show_projects_cat_wise) >0)
					{
            		foreach($show_projects_cat_wise as $ProjectList){ 					
					?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_hdng">
					<a href="<?=base_url(); ?>propsal/postbids/<?php echo $ProjectList['ID']; ?>"><?php echo $ProjectList['title']; ?></a>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_sbbhdng"><strong>Price:$<?php echo $ProjectList['hourlyRate']; ?>/hour    </strong> |  Posted: <?php echo date('m-d-Y:H-i-s',strtotime($$ProjectList['postDate'])); ?>  |  Ends: <?php echo $ProjectList['lettime']; ?>  |  <?php echo $ProjectList['propsalTotal']; ?> Proposals</div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_txt">
						<?php echo $ProjectList['description']; ?>
					  
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_txt2">
                        <span>Category: </span> <?php echo $ProjectList['cName'] ; ?> <span>Skills: </span> 
                     
                      <?php $skill = $ProjectList['skills']; 
					foreach($skill as $sk)
					{
                    echo $sk['skillName'].' '; 
						
					} ?>
						
                    </div>
                    <div class="detail_dot">
                        <ul>
                            <li><span> &nbsp; </span></li>
                            <li> &nbsp; </li>
                            <li> &nbsp; </li>
                            <li> &nbsp; </li>
                        </ul>
                    </div>
               
                </div>
				<?php } ?>
				<?php }else { ?>
                <h5>No Record Found!</h5>
                
                <?php } ?>
            </div>
        </div>        
    </div>

