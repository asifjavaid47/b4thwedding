			<ol class="breadcrumb bc-3">
						<li>
				<a href="../../dashboard/main/index.html"><i class="entypo-home"></i>Home</a>
			</li>
					<li>
			
							<a href="../../tables/main/index.html">Tables</a>
					</li>
				<li class="active">
			
							<strong>Projects</strong>
					</li>
					</ol>
			
<h2>Projects</h2>

<br />

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>Project Name</th>
			<!--<th>Description</th>
			<th>Hourly Rate</th>-->
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
        if(!empty($show_projects)){
		foreach($show_projects as $allpro)
		{
			$project_ID = $allpro['ID'];
	?>
		<tr class="odd gradeX">
			<td><a href="<?=base_url();?>admin/admin_projects/show_history/<?php echo $project_ID; ?>"><?php echo $allpro['title']; ?></a></td>
			<!--<td><?php// echo $allpro['description']; ?></td>
			<td><?php// echo $allpro['hourlyRate']; ?></td>-->
<!--			<td>pending</td>-->
			<td class="center"><a onclick="myFunction()" class="projectID"  id="<?php echo $project_ID; ?>"  href2="<?php echo base_url() . "admin/admin_projects/delete_projects/" . $project_ID; ?>" >Delete</a></td>
		</tr>
	<?php 
		}
        }
	?>

	</tbody>
<!--	<tfoot>
		<tr>
			<th>Project Name</th>
			<th>Description</th>
			<th>Hourly Rate</th>
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
		
		
		$('.projectID').click(function(){
			var txt;
			var r = confirm("Are you sure you want to delete?");
			if (r == true) {
				// txt = "You pressed OK!";
				var projectID = $(this).attr('id');
				window.location.href = '<?php echo base_url() . "admin/admin_projects/delete_projects/";?>'+projectID;
			} else {
				//alert('you cancel');
			}
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