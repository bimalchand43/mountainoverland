<?php

$msg="";
$msg="
     <form>
			<table border=0 cellspacing=0 cellpadding=5 class=\"ltable\" style=\"border:1 solid #DDDDDD;\" width=100%>
				<h3 style=\"background-color: #DEDEFC; width:98%;\">Rout List </h3>
				<tr bgcolor=\"#CCCCCC\">
				    <th>S.N</th>
					<th>Departure From</th>
					<th> Departure To </th>
					<th> Action </th>
				</tr>";
				$i=1;
	foreach($query as $row){
	    $rout =$row->rFrom.'-'.$row->rTo; 
		$rc="lcb";
      	if($i%2==1) $rc="dcb";
		 $msg.="<tr  class=\"$rc\">
			        <td>$i</td>
					<td>$row->rFrom</td>
					<td>$row->rTo</td>
					<td align=\"center\">".anchor('admin/admin_rout/updateRoute/'.$row->root_id,'Edit')." </td>
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