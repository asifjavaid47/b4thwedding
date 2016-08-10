
			<ol class="breadcrumb bc-3">
						<li>
				<a href="#"><i class="entypo-home"></i>Home</a>
			</li>
				
				<li class="active">
			
							<strong>Cancel Reason</strong>
					</li>
					</ol>
			
<h2>Cancel Reason</h2>
<br />




<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Add Cancel Reason 
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<div class="panel-body">
				
				<form role="form"  method="post" class="form-horizontal form-groups-bordered" action="<?php echo base_url();?>admin/cencellationReason/addCencellationReason/<?php if(!empty($cancelReason)) echo $cancelReason[0]['cancelReasonID']?>">
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
						<label for="field-1" class="col-sm-3 control-label">Cancel Reason Name</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" value="<?php if(!empty($cancelReason)) echo $cancelReason[0]['cancelReasonName']; ?>" id="field-1" name="cancelReasonName" placeholder="Cancel Reason Name">
						</div>
					</div>
					
				
					
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-default">Save Cancel Reason</button>
						</div>
					</div>
				</form>
				
			</div>
		
		</div>
	
	</div>
</div>

	
	