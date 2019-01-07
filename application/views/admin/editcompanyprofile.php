<?php
foreach($query as $row){
}
$selectnepal="";
$selectindia="";
$selectother="";
if($row->country == 'Nepal') $selectnepal='selected';
if($row->country == 'India') $selectindia='selected';
if($row->country == 'Others') $selectother='selected';

$msg="";
$msg.="<br/><br/>

  	  <form method=\"post\" action=\"$action\">
		<div class=\"data\">

				<table width=\"800\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
            <tr>
				<td colspan=\"6\" class=\"dhdr\"> :: Edit Company Information </td>
			</tr>
			<tr>
				<td valign=\"top\" class=\"lebl\">Company name :<span style=\"color:red;\">*</span></td>
				<td colspan=4 class=\"inpt\"><input type=\"text\" name=\"c_name\" value=\"$row->comp_name\" size=\"100\" readonly></td>
			<tr>
				<td valign=\"top\" class=\"lebl\">Address :<span style=\"color:red;\">*</span></td>
				<td  class=\"inpt\"><input type=\"text\" name=\"c_address\" value=\"$row->address\" size=\"30\" /></td>
			
				<td valign=\"top\" class=\"lebl\">City<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"c_city\" value=\"$row->city\" size=\"30\" /></td>
			<tr>
				<td valign=\"top\" class=\"lebl\">Country :<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\">
                     <select name=\"c_country\">
                        <option value=\"Nepal\"$selectnepal>Nepal</option>
                        <option value=\"India\" $selectindia>India</option>
						<option value=\"Others\" $selectother>Others</option>
                    </select></td>
			
				<td valign=\"top\" class=\"lebl\">Phone No :<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"c_phone\" value=\"$row->phoneNo\" size=\"30\"/></td>
			<tr>
				<td valign=\"top\" class=\"lebl\">Fax No :<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"c_fax\" value=\"$row->faxNo\" size=\"30\" /></td>
			
				<td valign=\"top\" class=\"lebl\">Email Address :<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"c_email\" value=\"$row->email\" size=\"30\" /></td>
			<tr>
				<td valign=\"top\" class=\"lebl\">Contact Person :<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"c_cnt_person\" value=\"$row->contact_person\" size=\"30\"/></td>
			
				<td valign=\"top\" class=\"lebl\">Designation :<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"c_desination\" value=\"$row->desination\" size=\"30\"/></td>
			<tr>
				<td valign=\"top\" class=\"lebl\">Phone No. :<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"c_cnt_phone\" value=\"$row->cnt_phone\" size=\"30\"/></td>
			
				<td valign=\"top\" class=\"lebl\">Mobile No. :<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"c_cnt_mobile\" value=\"$row->cnt_mobile\" size=\"30\"/>
			</td>
			</tr>
			
			<tr>
				<th class=\"lebl\" colspan=\"6\">
                    <input type=\"submit\" value=\"Save\"/>
				    <input type=\"hidden\" name=\"id\" value=\"$row->id\"/>
					<input type=\"hidden\" name=\"user\" value=\"branchuser\"/>
				    <input type=\"reset\" value=\"Reset\"/>
                </th>
			</tr>
		</table>
		</div>
		</form>";
echo $msg;
		

