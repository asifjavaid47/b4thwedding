<script>
 $(document).ready(function(){
     var id_active = "";
     $('.all_remove_clas').removeClass('active_new');
      id_active = "active_<?php echo $id ; ?>";
	$("."+id_active).addClass("active_new");
 	var showChar = 300;
    var ellipsestext = "...";
    var moretext = "<b>View More</b>";
    var lesstext = "<b>View Less</b>";
    $('.more , .detailMore').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {	
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar-1, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ ' </span><span class="morecontent"><span style="display:none;">' + h + '</span>  <a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext); 
			$(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
        var total_projects = $( "div.project_listing" ).length;
        if(total_projects > 0){
           $('#smart-paginator').smartpaginator({ totalrecords: total_projects, recordsperpage: 8,controlsalways: false,datacontainer: 'pagination-content',dataelement: 'div.project_listing', initval:0 , next: '>', prev: '<', first: '<<', last: '>>',display: 'single',length: 1, theme: 'purpol'
 
         });
     } else {
            $('#smart-paginator').css("display", "none");
     }
 
//         function onChange(newPageValue) {
//             alert(newPageValue);
//         }
    
});
 </script>
 
    <div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content">
        <div class="inbox_left col-lg-3 col-md-2 col-sm-4 col-xs-12">
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
                   <li class="all_remove_clas active_<?php echo $main_cat->ID;?>"><a href="<?=base_url();?>project/all_project/<?php echo $main_cat->ID;?>"><span class="inbox_icon" style="background:#904EC0;"> &nbsp; </span><span><?php echo $main_cat->cName;?></span></a></li>
					
						<?php
					
					}
					}
					
				?>
                </ul>
            </div>
                <div class="col-lg-7 col-md-8 col-sm-12 col-xs-12 padding_tb40" style="margin-left:10px;" id="pagination-content">
            		<?php
					if(empty($allProjectList))
					{
						echo"<h3>No Result Found</h3>";
					}
					else {
					foreach($allProjectList as $ProjectList){ ?>					
				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 project_listing">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_hdng">
					<a href="<?=base_url(); ?>propsal/postbids/<?php echo $ProjectList['ID']; ?>" style="color:000"><?php echo $ProjectList['title']; ?></a>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_sbbhdng">
                    	<?php if($ProjectList['workType']!="fixedPrice")
							{?>
                            <strong>Price:
                            $<?php
							echo number_format($ProjectList['hourlyRate'], 2, '.', ''); 
							?>/hour 
                        <?php }else {?>
                        	<strong>Budget:
                            $<?php
                        	echo number_format($ProjectList['fixedBudget'], 2, '.', ''); 
							?>
                           <?php } ?>  
                        </strong> |  Posted: <?php echo $ProjectList['postDate']; ?>  
                        |  Ends: <?php echo $ProjectList['lettime']; ?>  |  
                        <?php echo $ProjectList['propsalTotal']; ?> Proposals</div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_txt">
                        	<div class="detailMore">
                            <?php echo $ProjectList['description']; ?>
                            </div>
					  
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 detail_txt2">
                        <span>Category: </span> <?php echo $ProjectList['cName'] ; ?> <span>Skills: </span> 
                     
                      <?php $skill = $ProjectList['skills'];
					if(!empty($skill))
					{ 
						foreach($skill as $sk)
						{
						echo $sk['skillName'].' '; 
							
						} 
					}
					?>
						
                    </div>
                    
                   <!-- <div class="detail_dot">
                    <div class="rateit2" id="rateit92">
                    <div class="input select rating-f">
                            <select class="example-f" name="rating">
                                <option value="1" <?php if($ProjectList['rating']==1){ echo 'selected="selected"';} ?> >1</option>
                                <option value="2"  <?php if($ProjectList['rating']==2){ echo 'selected="selected"';} ?>>2</option>
                                <option value="3" <?php if($ProjectList['rating']==3){ echo 'selected="selected"';} ?>>3</option>
                                <option value="4" <?php if($ProjectList['rating']==4){ echo 'selected="selected"';} ?>>4</option>
                                <option value="5" <?php if($ProjectList['rating']==5){ echo 'selected="selected"';} ?>>5</option>
                            </select>
        				</div>
                        </div>
                    
                    
                    </div>-->
                    <!--<div class="detail_dot">
                        <ul>
                            <li><span> &nbsp; </span></li>
                            <li> &nbsp; </li>
                            <li> &nbsp; </li>
                            <li> &nbsp; </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 detail_txt3">
                        <span> | </span> <a href="#"> B****ERS </a>
                    </div>-->
                </div>
				<?php } } ?>
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
            <?php //$total_rec =  count_all_projects($id);
            //if(!(empty($total_rec)) && $total_rec > 2){
            ?>
<!--            <ul class="pagination">
                <li><a href="#">&laquo;</a></li>
                <?php //for($i = 1; $i<$total_rec; $i++){  ?>
                <li><a href="#" onclick="pagenation('<?php //echo $i; ?>');"><?php //echo $i; ?></a></li>
            <?php// } ?>
                <li><a href="#">&raquo;</a></li>
            </ul>-->
            <?php //} ?>
<div class="col-lg-9 pull-right col-md-12 col-sm-12 col-xs-12 pager purpol" id="smart-paginator"> </div>
                
        </div>
    </div>
 <link href="<?=base_url();?>public/css/examples.css" rel="stylesheet" type="text/css"/>
 
    <script src="<?=base_url();?>public/js/jquery_barrating.js"></script>
    <script>
        $(function(){
			 $('.example-f').barrating({ showSelectedRating:false,readonly:true });
           
        });
    </script>

    
    
    