<?php
 echo $this->session->flashdata('message');
$msg="";
$msg.="
     <form>
			<table border=0 cellspacing=0 cellpadding=5 class=\"ltable\" style=\"border:1 solid #DDDDDD;\" width=\"100%\">
				<h3 style=\"background-color: #DEDEFC; width:98%; text-align: center;\">Request For New Agency</h3>
				<tr bgcolor=\"#CCCCCC\">
				    <th>S.No</th>
					<th> Date</th>
					<th>Business Name</th>
					<th> Contact Person name </th>
					<th> Address</th>
					<th> City </th>
					<th> Country</th>
					<th> Phone</th>
					<th> Mobile</th>
					<th> Email</th>
                    <th> Branch</th>
					<th> Action </th>
				</tr>";
				$i=1;
				$tAmt=0.00;
	foreach($query as $rows){
		$rc="lcb";
       if($rows->created == 'N'){		
      	if($i%2==1) $rc="dcb";
		 $msg.="<tr class=\"$rc\">
			        <td>$i</td>
					<td>$rows->submit_date</td>
					<td>$rows->business_name</td>
					<td>$rows->person_name</td>
					<td>$rows->address</td>
					<td>$rows->city</td>
					<td>$country_name</td>
					<td>$rows->phone</td>
					<td>$rows->mobile</td>
					<td align=\"center\">$rows->email</td>
                    <td>$rows->comp_name</td>
					<td>[".anchor('admin/home/newgencydetail/'.$rows->id,"View")."]||
					";
					if($rows->created == 'N'){
					  $msg.="[".anchor('admin/comp_profile/newagency/'.$rows->branchid.'/'.$rows->id,"Create Agency")."]";
					}else{
					  $msg.="[Created]";
					}
			   $msg.="</td> </tr>
			   ";
		$i++;
       }
    }


	 $msg.="
	   <tr  bgcolor=\"#C9C9C9\">
	   		<th colspan=12 align=\"left\"> &nbsp; </th>

	   </tr>

	 </table>
  </form>
";


echo $msg;
?>