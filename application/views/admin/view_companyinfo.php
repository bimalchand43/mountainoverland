<?php
  foreach(  $compdata as $row)
  {
     //echo $row->comp_name;
  }

?>
   <h2>Company Details</h2>
  <table border=0>
			<tr>
				<td width="30%">ID</td>
				<td><?php echo $row->id; ?></td>

                <td valign="top">Company Name</td>
				<td><?php echo $row->comp_name; ?></td>
			</tr>
			<tr>
			    <td valign="top">Address</td>
				<td><?php echo $row->address; ?></td>

                <td valign="top">City</td>
				<td><?php echo $row->city; ?></td>
			</tr>
            <tr>
                <td valign="top">Country</td>
				<td><?php echo $row->country; ?></td>

                <td valign="top">Phone</td>
				<td><?php echo $row->phoneNo; ?></td>
			</tr>
            <tr>
                 <td valign="top">Fax</td>
				 <td><?php echo $row->faxNo; ?></td>

                <td valign="top">Email</td>
				<td><?php echo $row->email; ?></td>
			</tr>


		</table>


