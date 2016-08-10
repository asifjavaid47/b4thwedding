			<ol class="breadcrumb bc-3">
						<li>
				<a href="../../dashboard/main/index.html"><i class="entypo-home"></i>Home</a>
			</li>
					<li>
			
							<a href="../../tables/main/index.html">Tables</a>
					</li>
				<li class="active">
			
							<strong>Withdraw Request</strong>
					</li>
					</ol>
			
<h2>Withdraw Request</h2>

<br />

        <?php 
            if($this->session->flashdata('message'))
            {
                    echo $this->session->flashdata('message');
            }

        ?>


<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Amount</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
        if(!empty($showWithdraw)){
		foreach($showWithdraw as $allpro)
		{
			$transactionHistoryID = $allpro['transactionHistoryID'];
			$userID = $allpro['userID'];
	?>
		<tr class="odd gradeX">
			<td><?php echo $allpro['fName']; ?></td>
			<td><?php echo $allpro['lName']; ?></td>
			<td><?php echo empty($allpro['amount']) ? 0 : $allpro['amount']; ?></td>
			<td><?php if($allpro['status'] == 1) echo 'Approved'; else if($allpro['status'] == 2) echo 'Declined'; else echo 'Pending'; ?></td>
			<td class="center"><a class="paymentRequestID"  id="<?php echo $transactionHistoryID; ?>"  href="<?php echo base_url() . "admin/withdraw/detailWithdraw/".$transactionHistoryID."/".$userID; ?>" >view</a></td>
		</tr>
	<?php 
		}
        }
	?>

	</tbody>
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