			<ol class="breadcrumb bc-3">
						<li>
				<a href="../../dashboard/main/index.html"><i class="entypo-home"></i>Home</a>
			</li>
					<li>
			
							<a href="../../tables/main/index.html">Tables</a>
					</li>
				<li class="active">
			
							<strong>Users</strong>
					</li>
					</ol>
			
<h2>Users</h2>

<br />

<table class="table table-bordered datatable" id="table-1">
	<thead>
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
	</thead>
	<tbody>
	<?php 
	if(!empty($cancel_dispute)) {
		
		foreach($cancel_dispute as $showUser)
		{
	?>
		<tr class="odd gradeX">
			<td><?php echo $showUser['projectID']; ?></td>
			<td><?php echo $showUser['senderID']; ?></td>
			<td><?php echo $showUser['cancelRefndDsputeFreelancer']; ?></td>
			<td><?php echo $showUser['cancelRefndDsputeReasion']; ?></td>
			<td><?php echo $showUser['cancelRefndDsputeDescribe']; ?></td>
			<td><?php echo $showUser['cancelRefndDsputeDate']; ?></td>
			<td><?php if($showUser['disputeByAdmin']==1){echo "Done";} else { echo "pendding"; }  ?></td>
			<!--<td>pending</td>-->
			<td class="center"><a class="userID" id="<?php echo $showUser['cancelRefndDsputeID']; ?>"  href="<?php echo base_url() . "admin/adminDispute/cancel_dispute_detail/";?><?php echo $showUser['cancelRefndDsputeID']; ?>" >View Detail</a> </td>
		</tr>
	<?php 
		}
        }
	?>

	</tbody>
	<tfoot>
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
	</tfoot>
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
</script><!-- Footer -->
		<link rel="stylesheet" href="<?=base_url();?>public/admin/assets/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="<?=base_url();?>public/admin/assets/js/select2/select2.css"  id="style-resource-2">

	<script src="<?=base_url();?>public/admin/assets/js/jquery.dataTables.min.js" id="script-resource-7"></script>
	<script src="<?=base_url();?>public/admin/assets/js/dataTables.bootstrap.js" id="script-resource-8"></script>
	<script src="<?=base_url();?>public/admin/assets/js/select2/select2.min.js" id="script-resource-9"></script>