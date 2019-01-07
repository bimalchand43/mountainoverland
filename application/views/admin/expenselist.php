<form name="feedback" method="post" action="">
	<table border=0 cellspacing=0 cellpadding=5 class="ltable" style="border:1 solid #DDDDDD;" width="100%">
        <h3 style="background-color: #DEDEFC; width:98%; text-align: center;">Expenses List</h3>
		<tr style="background:#999999">
            <th>S.N.</th>
			<th>Date</th>
			<th>Driver Name</th>
            <th>Bus Number</th>
			<th>Expense By</th>
			<th>Route</th>
            <th>Remarks</th>
            <th>Amount</th>
			<th>Action</th>

		</tr>
		<?php
		$i=1;
        $expBy = "";
		foreach($query as $row){
            if($row->expBy=='D'){
                $expBy = "Driver";
            }else{
                $expBy = "Bus";
            }
		$rc="lcb";
      	if($i%2==1) $rc="dcb";

		?>
		<tr>
            <td><?php echo $i; ?></td>
			<td><?php echo $row->date; ?></td>
			<td><?php echo $row->name; ?></td>
            <td><?php echo $row->busNo; ?></td>
			<td><?php echo $expBy; ?></td>
			<td><?php echo $row->rFrom.'-'.$row->rTo ; ?></td>
            <td><?php echo $row->remarks; ?></td>
            <td><?php echo $row->amount; ?></td>
			<td colspan="3"><?php echo anchor('admin/driver_management/updateExplist/'.$row->id,'Update'); ?>||<?php echo anchor('admin/driver_management/ExpList_delete/'.$row->id.'','Delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure want to delete this record?')"));?></td>
		</tr>
	<?php
        $i++;
     } ?>
     <tr  bgcolor="#C9C9C9">
	   		<th colspan=9 align="left"> </th>
	   </tr>
	</table>
</form>
