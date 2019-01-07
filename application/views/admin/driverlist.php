<form name="feedback" method="post" action="">
	<table border=0 cellspacing=0 cellpadding=5 class="ltable" style="border:1 solid #DDDDDD;" width="100%">
        <h3 style="background-color: #DEDEFC; width:98%; text-align: center;">Driver List</h3>
		<tr style="background:#999999">
            <th>S.N.</th>
			<th>Driver Name</th>
			<th>Address</th>
			<th>Mobile No</th>
			<th>Age</th>
            <th>Join Date</th>
            <th>Left Date</th>
			<th>Action</th>

		</tr>
		<?php
		$i=1;
		foreach($query as $row){

		$rc="lcb";
      	if($i%2==1) $rc="dcb";
		?>
		<tr>
            <td><?php echo $i; ?></td>
			<td><?php echo $row->name; ?></td>
			<td><?php echo $row->address; ?></td>
			<td><?php echo $row->mobile; ?></td>
			<td><?php echo $row->age; ?></td>
            <td><?php echo $row->joinDate; ?></td>
            <td><?php echo $row->leftDate; ?></td>
			<td colspan="3"><?php echo anchor('admin/driver_management/updatedriverlist/'.$row->id.'','Update'); ?>||<?php echo anchor('admin/driver_management/Driver_delete/'.$row->id.'','Delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this record?')"));?></td>
		</tr>
	<?php
        $i++;
     } ?>
     <tr  bgcolor="#C9C9C9">
	   		<th colspan=8 align = "left"> </th>
	   </tr>
	</table>
</form>
