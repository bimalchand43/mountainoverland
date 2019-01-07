<?php
$CI="";
$CI =& get_instance();
$CI->load->helper('url');
?>
<form name="feedback" method="post" action="">
	<table border=0 cellspacing=0 cellpadding=5 class="ltable" style="border:1 solid #DDDDDD;" width="100%">
        <h3 style="background-color: #DEDEFC; width:98%; text-align: center;">Feedback List</h3>
		<tr style="background:#999999">
			<th>Date/Time</th>
			<th>Name</th>
			<th>Email</th>
			<th>Remarks</th>
			<th>Action</th>
		</tr>
		<?php 
		$i=1;
		foreach($query as $row){ 
		
		$rc="lcb";
      	if($i%2==1) $rc="dcb";
		?>
		<tr>
			<td><?php echo $row->date_time; ?></td>
			<td><?php echo $row->name; ?></td>
			<td><?php echo $row->email; ?></td>
			<td><?php echo $row->remarks; ?></td>
			<td colspan="3"><?php echo anchor('admin/feedback_mgmt/updateFeedbacklist/'.$row->cfid.'','Update'); ?>||<?php echo anchor('admin/feedback_mgmt/feedback_delete/'.$row->cfid.'','Delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this record?')"));?>||<?php echo anchor('admin/feedback_mgmt/viewFeedback/'.$row->cfid.'','View'); ?></td>
		</tr>
	<?php } ?>	
	</table>
</form>
