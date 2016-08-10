
			<ol class="breadcrumb bc-3">
						<li>
				<a href="../../../neon-x/dashboard/main/index.html"><i class="entypo-home"></i>Home</a>
			</li>
					
				<li class="active">
			
							<strong>	Project Of user</strong>
					</li>
					</ol>
			
<h2>	Project Of user</h2>
<br />

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>Project Title</th>
		</tr>
	</thead>
	<tbody>
<?php 
					// print_r($cancel_dispute_detail);
					// exit;
					if(empty($getProjectOfUser))
					{
						echo 'Record Not Found';
					}else
					{
		
						
							if($this->session->flashdata('message'))
							{
								//echo $this->session->flashdata('message');
							}
						
								foreach($getProjectOfUser as $userProject)
								{
								
			
				$projectID 				= $userProject['ID'];
				$title 				= $userProject['title'];
				$description 				= $userProject['description'];
				$hourlyRate 				= $userProject['hourlyRate'];
				$fixedBudget 				= $userProject['fixedBudget'];
				$duration 				= $userProject['duration']; 
				
			
	?>

					
				
		<tr class="odd gradeX">
			<td><a href="<?php echo base_url();?>admin/admin_projects/show_history/<?php echo $projectID; ?>"><?php echo $title; ?></a></td>
		</tr>
	<?php 
		}
        }
	?>

	</tbody>
	<!--<tfoot>
		<tr>
			<th>Project ID</th>
			<th>Sender ID</th>
			<th>Refund Freelancer</th>
			<th>Reasion</th>
			<th>Describe</th>
			<th>Dispute Date</th>
			<th>dispute By Admin</th>
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
		
				
		/* $('.userID').click(function(){
			var txt;
			var r = confirm("Are you sure you want to delete?");
			if (r == true) {
				// txt = "You pressed OK!";
				var userID = $(this).attr('id');
				// alert(userID);
				//window.location.href = '<?php echo base_url() . "admin/adminDispute/cancel_dispute_detail/";?>'+userID;
			} else {
				// alert('you cancel');
			}
		}); */
		
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
</script>
