
			<ol class="breadcrumb bc-3">
						<li>
				<a href="../../../neon-x/dashboard/main/index.html"><i class="entypo-home"></i>Home</a>
			</li>
					<li>
			
							<a href="../../../neon-x/forms/main/index.html">Forms</a>
					</li>
				<li class="active">
			
							<strong>Skills</strong>
					</li>
					</ol>
			
<h2>Skills</h2>
<br />




<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Add New Skill
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<div class="panel-body">
				
				<form role="form"  method="post" class="form-horizontal form-groups-bordered" action="<?php echo base_url();?>admin/categories/add_sub_category/<?php if(!empty($cat)) echo $cat[0]['ID']?>">
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
						<label for="field-1" class="col-sm-3 control-label">Skill Title</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" value="<?php if(!empty($cat)) echo $cat[0]['skillName']; ?>" id="field-1" name="sub_cat" placeholder="Skill Title">
						</div>
					</div>
					
				
					
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-default">Save Skill</button>
						</div>
					</div>
				</form>
				
			</div>
		
		</div>
	
	</div>
</div>

	
	