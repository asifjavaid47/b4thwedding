
			<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>public/validationScript/stylesheets/jquery.validate.css" />
<script src="<?= base_url(); ?>public/validationScript/javascripts/jquery.validate.js" type="text/javascript"></script>
			<script type="text/javascript">

            /* <![CDATA[ */

            jQuery(function(){

                jQuery("#password").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });
				
				jQuery("#current").validate({

                    expression: "if (VAL) return true; else return false;",

                    //message: "Please enter the Required field"

                });

              jQuery("#password2").validate({
                    expression: "if ((VAL == jQuery('#password').val()) && VAL) return true; else return false;",

                    message: "Confirm password field doesn't match the password field"

                });       
				
              

            });

            /* ]]> */

        </script>
            <ol class="breadcrumb bc-3">
						<li>
				<a href="../../../neon-x/dashboard/main/index.html"><i class="entypo-home"></i>Home</a>
			</li>
					<li>
			
							<a href="../../../neon-x/forms/main/index.html">Forms</a>
					</li>
				<li class="active">
			
							<strong>Password</strong>
					</li>
					</ol>
			
<h2>Change Password</h2>
<br />
<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Change Password
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<div class="panel-body">

				<form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url();?>admin/account/changePassword" method="post" enctype="multipart/form-data">
						
					<div class="form-group">
						<?php 
							if(!empty($successful_mesg))
							{
								echo $successful_mesg;
							}
							
							// if(!empty($cat))
							// {
								// foreach($get_category_by_id as $cat)
								// {
						?>
					</div>
						
                    <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" >Current Password</label>
						
						<div class="col-sm-5">
							<input type="password" class="form-control" id="current" name="current" value="">
						</div>
					</div>
                    
                    <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" >New Password</label>
						
						<div class="col-sm-5">
							<input type="password" class="form-control" id="password" name="password" value="">
						</div>
					</div>
                    
                    <div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" >Retype Password </label>
						
						<div class="col-sm-5">
							<input type="password" class="form-control" id="password2" name="password2" value="">
						</div>
					</div>
					
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-default" >Save</button>
						</div>
					</div>
					<?php 
						 // } 
					// } 
					?>
				</form>
				
			</div>
		
		</div>
	
	</div>
</div>




	
	