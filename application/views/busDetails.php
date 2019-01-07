<?php
  foreach($query as $row)
  {
   // echo $row->from;
  }
?>
<div class="tblbusview">
		<h1><?php echo $title ?></h1>
		<div class="data">
		<table>

			<tr>
				<td valign="top">Name</td>
				<td><?php echo $row->busName; ?></td>
			</tr>
            <tr>
				<td valign="top">Bus No.</td>
				<td><?php echo $row->busNo; ?></td>
			</tr>
            <tr>
				<td valign="top">Departure From</td>
				<td><?php echo $row->from; ?></td>
			</tr>

            <tr>
				<td valign="top">Going To</td>
				<td><?php echo $row->to; ?></td>
			</tr>
            <tr>
				<td valign="top">Available Seats</td>
				<td><?php echo $row->totalSeat; ?></td>
			</tr>
            <tr>
				<td valign="top">Fare</td>
				<td>NRs.<?php echo number_format($row->fare,2); ?></td>
			</tr>
            <tr>
				<td valign="top">Departure Time</td>
				<td><?php echo $row->depTime; ?></td>
			</tr>
            <tr>
                <td><?php  ?> &nbsp; || &nbsp;<?php echo $sltseat; ?>  ||</td>
				<td> &nbsp;</td>

			</tr>
		</table>
		</div>
		<br />

	</div>
