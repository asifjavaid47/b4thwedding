
			<ol class="breadcrumb bc-3">
						<li>
				<a href="../../../neon-x/dashboard/main/index.html"><i class="entypo-home"></i>Home</a>
			</li>
					<li>
			
							<a href="../../../neon-x/forms/main/index.html">Forms</a>
					</li>
				<li class="active">
			
							<strong>Slider Images</strong>
					</li>
					</ol>
			
<h2>Add Slider Image</h2>
<br />
<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Add New Slider Image
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<div class="panel-body">

				<form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url();?>admin/frontEndManagement/addMainSliderImages/<?php if(!empty($cat)) echo $cat[0]['ID']?>" method="post" enctype="multipart/form-data">
						
					<div class="form-group">
						<?php 
							if(!empty($successful_mesg))
							{
								echo $successful_mesg;
							}
							if(!empty($duplicat_mesg))
							{
								echo $duplicat_mesg;
							}
							// if(!empty($cat))
							// {
								// foreach($get_category_by_id as $cat)
								// {
						?>
					</div>
						<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label" >Image Title</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="field-1" name="cName" value="<?php if(!empty($cat)) echo $cat[0]['cName']; ?>" placeholder="Image Title">
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-ta" class="col-sm-3 control-label">Image Description</label>
						
						<div class="col-sm-5">
							<textarea class="form-control" id="field-ta" placeholder="Image Description"  name="description"><?php if(!empty($cat)) echo $cat[0]['description']; ?></textarea>
						</div>
					</div>
					
							<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Image File</label>
						
						<div class="col-sm-5">
							<input type="file" class="form-control" id="field-file" placeholder="Image File" name="fileAttachement">
							<?php if(!empty($cat)) { ?> 
							<input type="hidden" name="imagePath" value="<?php  echo $cat[0]['imagePath']; ?>"/>
							<img style="width: 50%;" src="<?php echo base_url(); ?>public/upload/sliderImagesUpload/<?php  echo $cat[0]['imagePath']; ?>" alt="" />
							<?php } ?>
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-default" >Save Image</button>
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




	
	