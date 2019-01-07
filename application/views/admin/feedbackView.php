<?php
foreach($query as $row){
	//echo $row->email;
}
?>
<form method="post" action="" name="feedbackupdate">
<div class="data">
	<table border="0" width="600" cellpadding="5" cellspacing="3">
		<tr style="background:#999999">
			<td colspan="2" align="center"><h3>View Feedback</h3></td>
		</tr>
		<tr>
			<td class="lebl">Name:</td>
			<td class="inpt"><?php echo $row->name; ?></td>
		</tr>
		<tr>
			<td class="lebl">Email:</td>
			<td class="inpt"><?php echo $row->email; ?></td>
		</tr>
		<tr>
			<td class="lebl">Remarks:</td>
			<td class="inpt"><?php echo $row->remarks; ?></td>
		</tr>
		
		<tr>
			<th colspan="2" class="lebl"><?php echo anchor('admin/feedback_mgmt/replymessage/'.$row->cfid.'','Verify Message'); ?>
						<input type="button" value="Cancel" onClick="history.go(-1);">
						<input type="hidden" name="id" value="<?php echo $row->cfid; ?>" />
			</th>
		</tr>
	</table>
	</div>
</form>
