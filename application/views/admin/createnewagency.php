<?php
//echo $brid;
foreach($query as $rows){}
//echo $rows->country;
$country="<select name=\"country\">
        
";
 $cselected="";
 foreach($countries as $row){
  //echo $rows->root_id;
  if($rows->country == $row->countries_id){
   //echo $row->countries_id;
   $cselected="selected";
   $country.="<option value=\"$row->countries_id\" $cselected>$row->countries_name</option>";
  }  
  $country.="<option value=\"$row->countries_id\" >$row->countries_name</option>";
 //$aid = $rows->aid;
 }
 $country.="</select>";


$msg="";
 $msg.="
      <br/><br/>
      <form method=\"post\" action=\"$action\">
		<div class=\"data\">

		<table align=\"center\" cellspacing=\"0\" cellpadding=\"0\">
            <tr>
				<td colspan=\"4\" class=\"dhdr\">:: Create New Agency </center></td>
			</tr>
			<tr>
				<td valign=\"top\" class=\"lebl\">Branch Name<span style=\"color:red;\">*</span></td>
				<td colspan=\"3\" class=\"inpt\"><input type=\"text\" name=\"cname\" class=\"text\" value=\"$rows->business_name\" size=\"70\"/>

				</td>

			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\"> Address<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"caddress\" class=\"text\" value=\"$rows->address\"/>

				</td>
                <td valign=\"top\" class=\"lebl\">City<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"city\" class=\"text\" value=\"$rows->city\"/>

				</td>


			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\">Country<span style=\"color:red;\">*</span></td>
                <td class=\"inpt\">$country</td>
			    <td valign=\"top\" class=\"lebl\">Phone No.<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"cphone\" class=\"text\" value=\"$rows->phone\"/>

				</td>

			</tr>
            <tr>
                <td valign=\"top\" class=\"lebl\">Fax No.<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"cfax\" class=\"text\" value=\"\"/>

				</td>
			    <td valign=\"top\" class=\"lebl\">Email<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"email\" class=\"text\" value=\"$rows->email\"/>

				</td>

			</tr>
            <tr>
                <td valign=\"top\" class=\"lebl\">Contact Person<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"cperson\" class=\"text\" value=\"$rows->person_name\"/></td>
			    <td valign=\"top\" class=\"lebl\">Desination<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"cpdesination\" class=\"text\" value=\"Agency manager\"/></td>
            </tr>
            <tr>
                <td valign=\"top\" class=\"lebl\">Phone No.<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"cpphone\" class=\"text\" value=\"$rows->phone\"/>

				</td>
			    <td valign=\"top\" class=\"lebl\">Mobile No.<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"cpmobile\" class=\"text\" value=\"$rows->mobile\"/>

				</td>
            </tr>        
			<tr>
				<th colspan=\"4\"  class=\"lebl\">
                    <input type=\"submit\" name=\"submit\" value=\"Confirm >>\"/>
					<input type=\"hidden\" name=\"brid\" value=\"$brid\">
					<input type=\"hidden\" name=\"id\" value=\"$id\">
				     <input type=\"reset\" value=\"Reset\"/>
                </th>
			</tr>
		</table>
		</div>
		</form>";

echo $msg;
?>		