<div id="wrap">
   	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inner_content" style="padding:70px;">
         <?php if(!empty($success)){ ?>
        <div class="alert alert-success">
    		<a href="#" class="close" data-dismiss="alert">&times;</a>
    		<strong>Success!</strong> <?php echo $success; ?>
		</div>
        <?php } ?>
        
        <?php if(!empty($error)){ ?>
        <div class="alert alert-info">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Note!</strong><?php echo $error; ?>
		</div>
          <?php } ?>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container custom"><p class="inner_txt" style="color:#8a2a60;">
        	Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
ut labore et dolore magna aliqua.</p>

<div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 pull-left">
        	<strong>My rating for this job</strong>
        </div>
       <div class="col-lg-4 col-md-4 col-xs-8 col-sm-8 pull-left"><h5>Freelancer: Abnova</h5></div>
    <div class="clear15"></div>
    <div class="rateit2" id="rateit92">
    <div class="col-lg-3 col-md-3 col-xs-6 col-sm-6 pull-left">
    <strong class="pull-right">5.5</strong>
                           <div class="input select rating-f">
                            <select id="example-f" name="rating">
                                <option value="1" <?php //if($rating==1){ echo 'selected="selected"';} ?>></option>
                                <option value="2" <?php //if($rating==2){ echo 'selected="selected"';} ?>>2</option>
                                <option value="3" <?php //if($rating==3){ echo 'selected="selected"';} ?>>3</option>
                                <option value="4" <?php //if($rating==4){ echo 'selected="selected"';} ?>>4</option>
                                <option value="5" <?php //if($rating==5){ echo 'selected="selected"';} ?>>5</option>
                            </select>
                            
        				</div>           
                    
            
    </div>
    <div class="col-lg-8 col-md-8 col-xs-12 col-sm-12 pull-left">
    	<h5>October 22, 2014 &nbsp; | Private &nbsp; | &nbsp; Website Design &nbsp; | &nbsp; Job Cancelled &nbsp; | &nbsp; Job Details</h5>
    </div>
    <br>
    <div class="clear20"></div>
    <div class="col-lg-3 col-md-3 ol-xs-12 col-sm-12 pull-left">
    	<div class="rating-enable input select rating-c">
                            <div class="pull-left">
                            <select id="example-c" name="quality" style="margin-right:50px;">
                                <option value=""></option>
                                <option value="1" <?php //if($quality==1){ echo 'selected="selected"';} ?>>1</option>
                                <option value="2" <?php //if($quality==2){ echo 'selected="selected"';} ?>>2</option>
                                <option value="3" <?php //if($quality==3){ echo 'selected="selected"';} ?>>3</option>
                                <option value="4" <?php //if($quality==4){ echo 'selected="selected"';} ?>>4</option>
                                <option value="5" <?php //if($quality==5){ echo 'selected="selected"';} ?>>5</option>
                            </select>
                            </div>
                            <h5 class="col-lg-2 pull-right">Quality</h5>
                         </div>        	
    </div>
    <div class="clear5"></div>
    <div class="col-lg-3 col-md-3 ol-xs-12 col-sm-12 pull-left">
    	<div class="rating-enable input select rating-c">
                            <div class="pull-left">
                            <select id="example-c" name="expertise" style="margin-right:50px;">
                                <option value=""></option>
                                <option value="1" <?php //if($quality==1){ echo 'selected="selected"';} ?>>1</option>
                                <option value="2" <?php //if($quality==2){ echo 'selected="selected"';} ?>>2</option>
                                <option value="3" <?php //if($quality==3){ echo 'selected="selected"';} ?>>3</option>
                                <option value="4" <?php //if($quality==4){ echo 'selected="selected"';} ?>>4</option>
                                <option value="5" <?php //if($quality==5){ echo 'selected="selected"';} ?>>5</option>
                            </select>
                            </div>
                            <h5 class="col-lg-2 pull-right">Expertise</h5>
                         </div>        	
    </div>
    <div class="clear5"></div>
   <div class="col-lg-3 col-md-3 ol-xs-12 col-sm-12 pull-left">
    	<div class="rating-enable input select rating-c">
                            <div class="pull-left">
                            <select id="example-c" name="cost" style="margin-right:50px;">
                                <option value=""></option>
                                <option value="1" <?php //if($quality==1){ echo 'selected="selected"';} ?>>1</option>
                                <option value="2" <?php //if($quality==2){ echo 'selected="selected"';} ?>>2</option>
                                <option value="3" <?php //if($quality==3){ echo 'selected="selected"';} ?>>3</option>
                                <option value="4" <?php //if($quality==4){ echo 'selected="selected"';} ?>>4</option>
                                <option value="5" <?php //if($quality==5){ echo 'selected="selected"';} ?>>5</option>
                            </select>
                            </div>
                            <h5 class="col-lg-2 pull-right">Cost</h5>
                         </div>        	
    </div>
    
    <div class="clear5"></div>
    <div class="col-lg-3 col-md-3 ol-xs-12 col-sm-12 pull-left">
    	<div class="rating-enable input select rating-c">
                            <div class="pull-left">
                            <select id="example-c" name="schedule" style="margin-right:50px;">
                                <option value=""></option>
                                <option value="1" <?php //if($quality==1){ echo 'selected="selected"';} ?>>1</option>
                                <option value="2" <?php //if($quality==2){ echo 'selected="selected"';} ?>>2</option>
                                <option value="3" <?php //if($quality==3){ echo 'selected="selected"';} ?>>3</option>
                                <option value="4" <?php //if($quality==4){ echo 'selected="selected"';} ?>>4</option>
                                <option value="5" <?php //if($quality==5){ echo 'selected="selected"';} ?>>5</option>
                            </select>
                            </div>
                            <h5 class="col-lg-2 pull-right">Schedule</h5>
                         </div>        	
    </div>

    <div class="clear5"></div>
    <div class="col-lg-3 col-md-3 ol-xs-12 col-sm-12 pull-left">
    	<div class="rating-enable input select rating-c">
                            <div class="pull-left">
                            <select id="example-c" name="response" style="margin-right:50px;">
                                <option value=""></option>
                                <option value="1" <?php //if($quality==1){ echo 'selected="selected"';} ?>>1</option>
                                <option value="2" <?php //if($quality==2){ echo 'selected="selected"';} ?>>2</option>
                                <option value="3" <?php //if($quality==3){ echo 'selected="selected"';} ?>>3</option>
                                <option value="4" <?php //if($quality==4){ echo 'selected="selected"';} ?>>4</option>
                                <option value="5" <?php //if($quality==5){ echo 'selected="selected"';} ?>>5</option>
                            </select>
                            </div>
                            <h5 class="col-lg-2 pull-right">Response</h5>
                         </div>        	
    </div>
   

    <div class="clear5"></div>
    <div class="col-lg-3 col-md-3 ol-xs-12 col-sm-12 pull-left">
    	<div class="rating-enable input select rating-c">
                            <div class="pull-left">
                            <select id="example-c" name="professional" style="margin-right:50px;">
                                <option value=""></option>
                                <option value="1" <?php //if($quality==1){ echo 'selected="selected"';} ?>>1</option>
                                <option value="2" <?php //if($quality==2){ echo 'selected="selected"';} ?>>2</option>
                                <option value="3" <?php //if($quality==3){ echo 'selected="selected"';} ?>>3</option>
                                <option value="4" <?php //if($quality==4){ echo 'selected="selected"';} ?>>4</option>
                                <option value="5" <?php //if($quality==5){ echo 'selected="selected"';} ?>>5</option>
                            </select>
                            </div>
                            <h5 class="col-lg-2 pull-right">Professional</h5>
                         </div>        	
    </div>

    <div class="clear5"></div>   
     </div>
     
     <hr class="clear5" style="border-bottom:1px solid grey;" />
    </div>

        </div>        
    </div>
    <link href="<?=base_url();?>public/css/examples.css" rel="stylesheet" type="text/css"/>
 
    <script src="<?=base_url();?>public/js/jquery_barrating.js"></script>
    <script type="text/javascript">
        $(function () {
            $('.rating-enable').click(function () {
                $('#example-a').barrating();

                $('#example-b').barrating('show', {
                    readonly:true
                });

                $('#example-c,#example-c1, #example-c2,#example-c3,#example-c4,#example-d').barrating('show', {
                    showValues:false,
                    showSelectedRating:false
                });

                         $('#example-f').barrating({ showSelectedRating:true,readonly:true });

                $('#example-g').barrating('show', {
                    showSelectedRating:true,
                    reverse:true
                });

                $(this).addClass('deactivated');
                $('.rating-disable').removeClass('deactivated');
            });

            $('.rating-disable').click(function () {
                $('select').barrating('destroy');
                $(this).addClass('deactivated');
                $('.rating-enable').removeClass('deactivated');
            });

            $('.rating-enable').trigger('click');
        });
    </script>
