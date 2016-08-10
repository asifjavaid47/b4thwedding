			<ol class="breadcrumb bc-3">
						<li>
				<a href="#"><i class="entypo-home"></i>Home</a>
			</li>
					<li>
			
							<a href="#">Tables</a>
					</li>
				<li class="active">
			
							<strong>Cancel Reason</strong>
					</li>
					</ol>
			
<h2>Skills</h2>

<br />
<a href="<?php echo base_url(); ?>admin/addCencellationReason" class="btn btn-primary">
	<i class="entypo-plus"></i>
	Add New Cancel Reason
</a>

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>Cancel Reason Name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php 
        if(!empty($showCencellationReason)){
		foreach($showCencellationReason as $cancelReason)
		{
	?>
		<tr class="odd gradeX">
			<td><?php echo $cancelReason['cancelReasonName']; ?></td>
			<td class="center"><a href="<?php echo base_url() . "admin/cencellationReason/deleteCencellationReason/" . $cancelReason['cancelReasonID']; ?>" >Delete</a> / <a href="<?php echo base_url() . "admin/cencellationReason/addCencellationReason/" . $cancelReason['cancelReasonID']; ?>" >Update</a></td>
		</tr>
	<?php 
		}
        }
	?>

	</tbody>
<!--	<tfoot>
		<tr>
				<th>Category Name</th>
			<th>Sub Category Name</th>
			<th>Action</th>
		</tr>
	</tfoot>-->
</table>

<script type="text/javascript">
	jQuery(document).ready(function($)
	{
		$("#table-1").dataTable({
			"sPaginationType": "bootstrap",
			"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
			"bStateSave": true
		});
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
</script>


<script type="text/javascript">
jQuery(window).load(function()
{
	$("#table-2").dataTable({
		"sPaginationType": "bootstrap",
		"sDom": "t<'row'<'col-xs-6 col-left'i><'col-xs-6 col-right'p>>",
		"bStateSave": false,
		"iDisplayLength": 8,
		"aoColumns": [
			{ "bSortable": false },
			null,
			null,
			null,
			null
		]
	});
	
	$(".dataTables_wrapper select").select2({
		minimumResultsForSearch: -1
	});
	
	// Highlighted rows
	$("#table-2 tbody input[type=checkbox]").each(function(i, el)
	{
		var $this = $(el),
			$p = $this.closest('tr');
		
		$(el).on('change', function()
		{
			var is_checked = $this.is(':checked');
			
			$p[is_checked ? 'addClass' : 'removeClass']('highlight');
		});
	});
	
	// Replace Checboxes
	$(".pagination a").click(function(ev)
	{
		replaceCheckboxes();
	});
});
	
// Sample Function to add new row
var giCount = 1;

function fnClickAddRow() 
{
	$('#table-2').dataTable().fnAddData(['<div class="checkbox checkbox-replace"><input type="checkbox" /></div>', giCount+".2", giCount+".3", giCount+".4", giCount+".5" ]);
	
	replaceCheckboxes(); // because there is checkbox, replace it
	
	giCount++;
}
</script><!-- Footer -->
		<link rel="stylesheet" href="<?=base_url();?>public/admin/assets/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="<?=base_url();?>public/admin/assets/js/select2/select2.css"  id="style-resource-2">

	<script src="<?=base_url();?>public/admin/assets/js/jquery.dataTables.min.js" id="script-resource-7"></script>
	<script src="<?=base_url();?>public/admin/assets/js/dataTables.bootstrap.js" id="script-resource-8"></script>
	<script src="<?=base_url();?>public/admin/assets/js/select2/select2.min.js" id="script-resource-9"></script>