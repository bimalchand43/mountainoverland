<?php 
foreach($query as $row){
	//echo $row->email;
}
?>
<form method="post" action="<?php echo $action; ?>" name="feedbackupdate">
	<div class="data">
	<table border="0" width="600" cellpadding="5" cellspacing="3">
		<tr>
			<th colspan="2" class=\"dhdr\"><h3>Update Record</h3></th>
		</tr>
		<tr>
			<td class="lebl">Name:</td>
			<td class="inpt"><input type="text" name="name" class="text" value="<?php echo $row->name; ?>" /></td>
		</tr>
		<tr>
			<td class="lebl">Email:</td>
			<td class="inpt"><input type="text" name="email" class="text" value="<?php echo $row->email; ?>" /></td>
		</tr>
		<tr>
			<td class="lebl">Remarks:</td>
			<td class="inpt"><input type="text" name="remark" class="text" value="<?php echo $row->remarks; ?>" /></td>
		</tr>
		<tr>
			<th colspan="2" class="lebl"><input type="submit" name="sumbit" value="Update" />
						<input type="button" value="Cancel" onClick="history.go(-1);">
						<input type="hidden" name="id" value="<?php echo $row->cfid; ?>" />
			</th>
		</tr>
	</table>
</div>
</form>