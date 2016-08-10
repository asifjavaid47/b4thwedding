
			<ol class="breadcrumb bc-3">
						<li>
				<a href="../../../neon-x/dashboard/main/index.html"><i class="entypo-home"></i>Home</a>
			</li>
					<li>
			
							<a href="../../../neon-x/forms/main/index.html">Forms</a>
					</li>
				<li class="active">
			
							<strong>Basic Elements</strong>
					</li>
					</ol>
			
<h2>Basic Form Elements</h2>
<br />




<div class="row">
	<div class="col-md-12">
		
		<div class="panel panel-primary" data-collapsed="0">
		
			<div class="panel-heading">
				<div class="panel-title">
					Default Form Inputs
				</div>
				
				<div class="panel-options">
					<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
					<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
					<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
					<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
				</div>
			</div>
			
			<div class="panel-body">
				
				<form role="form"  method="post" class="form-horizontal form-groups-bordered" action="<?php echo base_url();?>admin/categories/add_sub_category">
					<div class="form-group">
						<label class="col-sm-3 control-label">Select List</label>
						
						<div class="col-sm-5">
							<select class="form-control" name="main_cat">
							<?php foreach($showCategory as $mainCat) {?>
								<option value="<?php echo $mainCat['ID']; ?>"><?php echo $mainCat['cName']; ?></option>
								
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label">Category Title</label>
						
						<div class="col-sm-5">
							<input type="text" class="form-control" id="field-1" name="sub_cat" placeholder="Placeholder">
						</div>
					</div>
					
				
					
					
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-default">Sign in</button>
						</div>
					</div>
				</form>
				
			</div>
		
		</div>
	
	</div>
</div>



<!-- Footer -->
<footer class="main">
	
		<div class="pull-right">
		<a href="http://themeforest.net/item/neon-bootstrap-admin-theme/6434477" target="_blank"><strong>Purchase this theme for $21</strong></a>
	</div>
		
	&copy; 2013 <strong>Neon</strong> Admin Theme by <a href="http://laborator.co/" target="_blank">Laborator</a>
	
</footer>	</div>
	
	