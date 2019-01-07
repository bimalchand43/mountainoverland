<?php 
foreach($query as $row){
}
 ?>
<h3 style="background-color: #DEDEFC; width:580px;">Reply Message</h3>
<form name="replaymessage" method="post" action="<?php echo $action; ?>">
<div class="data">
	<table border="0" cellpadding="5" cellspacing="2" width="600">
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
			<td class="inpt"><textarea name="remark" class="text" cols="20" rows="5"><?php echo $row->remarks; ?></textarea></td>
		</tr>
		<tr>
			<td class="lebl">Verify:</td>
			<td class="inpt"><input type="radio" name="verify" checked="checked" value="y" />Yes<input type="radio" name="verify" value="n" />No</td>
		</tr>
		
		<tr>
			<td class="lebl">Replay:</td>
			<td class="inpt"><input type="radio" name="replay" checked="checked" value="y" />Yes<input type="radio" name="replay" value="n" />No</td>
		</tr>
		<tr>
			<td class="lebl">Messages:</td>
			<td class="inpt"><textarea cols="25" rows="5" name="message"></textarea></td>
		</tr>
		<tr>
			<th colspan="2" class="lebl"><input type="submit" name="submit" value="Reply Message" /><input type="hidden" name="id" value="<?php echo $row->cfid; ?>" /><input type="button" value="Cancel" onClick="history.go(-1);"></th>
		</tr>
	</table>
	</div>
</form>