<?php

$msg="";
$msg="
     <form>
			<table border=0 cellspacing=0 cellpadding=5 class=\"ltable\" style=\"border:1 solid #DDDDDD;\" width=100%>
				<h3 style=\"background-color: #DEDEFC; width:98%; text-align: center;\">Bus List</h3>
				<tr bgcolor=\"#CCCCCC\">
				    <th>S.No</th>
					<th>Bus No</th>
					<th> Rout </th>
					<th> Fare </th>
					<th> Departure Time </th>
					<th> Action </th>
				</tr>";
				$i=1;
	foreach($query as $row){
	    $rout =$row->rFrom.'-'.$row->rTo; 
		$dpt_time=$row->departure_time ." ". $row->ampm;
		$rc="lcb";
      	if($i%2==1) $rc="dcb";
		 $msg.="<tr class=\"$rc\">
			        <td>$i</td>
					<td>$row->busNo</td>
					<td>$rout </td>
					<td>$row->fare </td>
					<td> $dpt_time </td>
					<td>".anchor('admin/create_bus/updateBuses/'.$row->bus_id,'Edit')." </td>
			    </tr>				
			   ";
		$i++;	  
    }		
				
				
	 $msg.="
	 
	 </table>
  </form>
";


echo $msg;
?>