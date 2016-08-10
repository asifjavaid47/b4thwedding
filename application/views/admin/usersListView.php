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

<?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg'); }?>
<br />

<table class="table table-bordered datatable" id="table-1">
	<thead>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Total Post Project</th>
			<th>Total Bids</th>
			<th>Action</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	// print_r($showUserList);
	// exit;
	if(!empty($showUserList)) {
		
		foreach($showUserList as $showUser)
		{
	?>
		<tr class="odd gradeX">
			<td><?php echo $showUser['fName']; ?></td>
			<td><?php echo $showUser['lName']; ?></td>
			<td><?php echo $showUser['email']; ?></td>
			<td>
			<?php if($showUser['totalPostProject'] > 0) {  ?>
			<a href="<?php echo base_url(); ?>admin/usersList/getProjectOfUser/<?php echo $showUser['ID']; ?>"><?php echo $showUser['totalPostProject']; ?></a>
			<?php
			 } else { echo "0";} 
			?>
			</td>
			<td>
			<?php if($showUser['totalBids'] > 0) {  ?>
			<a href="<?php echo base_url(); ?>admin/usersList/getBidsProjectOfUser/<?php echo $showUser['ID']; ?>"><?php echo $showUser['totalBids']; ?></a>
			<?php
			 } else { echo "0";} 
			?>
			</td>
		
			<!--<td>pending</td>-->
			<td class="center"><a class="userID" id="<?php echo $showUser['ID']; ?>"  href="#" >Delete</a> </td>
			<td class="center">
			<?php 
			if($showUser['active']==1) { echo '<a class="activeLink" id='.$showUser["ID"].'  href="#">active</a>';  }
			else if($showUser['active']==2) { echo '<a class="inactiveLink" id='.$showUser["ID"].'  href="#">In active</a>';  }
			
			
			?>
			
			 </td>
		</tr>
	<?php 
		}
        }
	?>

	</tbody>
<!--	<tfoot>
		<tr>
		<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
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
		
				
		$('.userID').click(function(){
			var txt;
			var r = confirm("Are you sure you want to delete?");
			if (r == true) {
				// txt = "You pressed OK!";
				var userID = $(this).attr('id');
				// alert(userID);
				window.location.href = '<?php echo base_url() . "admin/usersList/delete_user/";?>'+userID;
			} else {
				// alert('you cancel');
			}
		});		
		
		$('.inactiveLink').click(function(){
			var txt;
			var r = confirm("Are you sure you want to active?");
			if (r == true) {
				// txt = "You pressed OK!";
				var userID = $(this).attr('id');
				// alert(userID);
				window.location.href = '<?php echo base_url() . "admin/usersList/active/";?>'+userID;
			} else {
				// alert('you cancel');
			}
		});
		$('.activeLink').click(function(){
			var txt;
			var r = confirm("Are you sure you want to inactive?");
			if (r == true) {
				// txt = "You pressed OK!";
				var userID = $(this).attr('id');
				// alert(userID);
				window.location.href = '<?php echo base_url() . "admin/usersList/inactive/";?>'+userID;
			} else {
				// alert('you cancel');
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