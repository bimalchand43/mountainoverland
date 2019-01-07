<?php
$msg="";
 echo $this->session->flashdata('message');
 
 foreach($query as $rows){

}

$msg.="
 <form name=\"\" action=\"$action\" method=\"post\" />
<div class=\"data\">
<table width=\"800\" border=0   cellpadding=\"2\" cellspacing=\"5\" align=\"center\">
	<tr>
    	<td colspan=\"4\" class=\"dhdr\"><center><h3>Company Profile</h3></center> </td>
    </tr>
    <tr>
        <td valign=\"top\" class=\"lebl\" width=\"200\"> company Name : </td>
    	<td class=\"inpt\" colspan=\"3\">$rows->comp_name</td>
    </tr>
    <tr>
        <td valign=\"top\" class=\"lebl\"> Address : </td>
    	<td class=\"inpt\">$rows->address</td>
    
        <td valign=\"top\" class=\"lebl\"> City : </td>
    	<td class=\"inpt\">$rows->city</td>
    </tr>
    <tr>
        <td valign=\"top\" class=\"lebl\"> Country : </td>
    	<td class=\"inpt\">$rows->country</td>
    
        <td valign=\"top\" class=\"lebl\"> Phone No : </td>
    	<td class=\"inpt\">$rows->phoneNo</td>
    </tr>
    <tr>
        <td valign=\"top\" class=\"lebl\"> Fax No : </td>
    	<td class=\"inpt\">$rows->faxNo</td>
    
        <td valign=\"top\" class=\"lebl\"> Email Address: </td>
    	<td class=\"inpt\">$rows->email</td>
    </tr>
     <tr>
        <td valign=\"top\" class=\"lebl\"> Contact Person: </td>
    	<td class=\"inpt\">$rows->contact_person</td>
    
        <td valign=\"top\" class=\"lebl\"> Designation: </td>
    	<td class=\"inpt\">$rows->desination</td>
    </tr>
    <tr>
        <td valign=\"top\" class=\"lebl\"> Phone No.: </td>
    	<td class=\"inpt\">$rows->cnt_phone</td>
    
        <td valign=\"top\" class=\"lebl\"> Mobile No: </td>
    	<td class=\"inpt\">$rows->cnt_mobile</td>
    </tr>
    	
	<tr>
    	<td colspan=\"4\" class=\"dhdr\" align=\"center\">
        	<input type=\"submit\" name=\"submit\" value=\"Edit\"/>
            <input type=\"hidden\" name=\"id\" value=\"$rows->id; \"/>
        </td>
    </tr>

</table>
</div>
</form> ";
echo $msg; 
 ?>

