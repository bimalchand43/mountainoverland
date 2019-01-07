<?php
//echo $comname;
//foreach($query as $rows){
//echo $rows->address;
$this->load->library('session');
$this->load->library('encrypt');
//}
$msg="";

$msg.="
	<form name=\"\" method=\"POST\">
    <div id=\"shli\">
          <div>".anchor('admin/comp_profile/view_company/branchlist','Show Branches')."</div>
          <div>".anchor('admin/comp_profile/view_company/showusers','Show Users')."</div>
          <div>".anchor('admin/comp_profile/view_company/newbranch','New Branch')."</div>
          <div>".anchor('admin/comp_profile/view_company/newuser','New User')."</div>
    </div>
	</form>";

 if($comname=="branchlist"){
 	 echo $this->session->flashdata('message');
  $msg.="<br/><br/>
     <h3>Branch List </h3>
  	 <form>
  		<table width=100% cellspacing=\"0\" class=\"ltable\">

			<tr>
				<th>S.N </th>
				<th>Branch Name </th>
				<th> Address</th>
				<th>Phone No</th>
				<th> Fax No</th>
				<th> Contact Person</th>
				<th>Action </th>
			</tr>";
	$i=1;

	foreach($query as $rows){
	 if($rows->status == 'Y'){
	   $stats="Disable";
	 }else{
	   $stats="Enable";
	 }

	  $rc="lcb";
      if($i%2==1) $rc="dcb";
	  $msg.="<tr class=\"$rc\">
	  			<td>$i </td>
				<td>$rows->comp_name </td>
				<td>$rows->address </td>
				<td>$rows->phoneNo </td>
				<td>$rows->faxNo </td>
				<td>$rows->contact_person </td>
				<td align=\"center\">
                ".anchor('admin/comp_profile/view_company/agencylist/'.$rows->brid,'<img src="'.WEBSITE.'/res/images/list_agency_icon.png" alt="List Agency" title="List of Agency">')." &nbsp;
				".anchor('admin/comp_profile/view_company/branchlist/newagency/'.$rows->brid,'<img src="'.WEBSITE.'/res/images/new_agency_icon.png" alt="Create Agency" title="Create New Agency">')."&nbsp;
                ".anchor('admin/comp_profile/view_company/branchlist/showbranchusers/'.$rows->id,'<img src="'.WEBSITE.'/res/images/list_users_ico.png" alt="List Users" title="List Branch Users">')." &nbsp;
                ".anchor('admin/comp_profile/view_company/branchlist/newuser/'.$rows->id,'<img src="'.WEBSITE.'/res/images/new_user.png" alt="New User" title="Create Branch User">')." &nbsp;
				".anchor('admin/comp_profile/statusFun/branchlist/'.$rows->id.'/'.$rows->status,$stats)." || 
				".anchor('admin/comp_profile/view_company/branchlist/bprofile/'.$rows->id,'View Profile')." ||
				
                </td>
	  ";

	$i++;

	}
	$msg.="</table>
	</form>";

}

if ($agname == "0") $agname = "";
if($comname=='branchlist' and $agname == 'bprofile'){
foreach($query_bprofle as $rows){

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
		[".anchor('admin/comp_profile/view_company/branchlist/editbprofile/'.$rows->id,'Edit')."]
        </td>
    </tr>

</table>
</div>
</form> ";
}

if ($agname == "0") $agname = "";
if($comname=='branchlist' and $agname == 'editbprofile'){
foreach($query_bprofle as $row){

}
$selectnepal="";
$selectindia="";
$selectother="";
if($row->country == 'Nepal') $selectnepal='selected';
if($row->country == 'India') $selectindia='selected';
if($row->country == 'Others') $selectother='selected';


$msg.="<br/><br/>

  	  <form method=\"post\" action=\"$action_editbprofile\">
		<div class=\"data\">

		<table width=\"800\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
            <tr>
				<td colspan=\"6\" class=\"dhdr\"> :: Edit Company Information </td>
			</tr>
			<tr>
				<td valign=\"top\" class=\"lebl\">Company name :<span style=\"color:red;\">*</span></td>
				<td colspan=4 class=\"inpt\"><input type=\"text\" name=\"c_name\" value=\"$row->comp_name\" size=\"100\"/></td>
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

}


if($comname=='newbranch'){
  $msg.="
      <br/><br/>
      <form method=\"post\" action=\"$action\">
		<div class=\"data\">

		<table align=\"center\" cellspacing=\"0\" cellpadding=\"0\">
            <tr>
				<td colspan=\"4\" class=\"dhdr\">:: Create New Branch </center></td>
			</tr>
			<tr>
				<td valign=\"top\" class=\"lebl\">Branch Name<span style=\"color:red;\">*</span></td>
				<td colspan=\"3\" class=\"inpt\"><input type=\"text\" name=\"cname\" class=\"text\" value=\"\" size=\"70\"/>

				</td>

			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\"> Address<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"caddress\" class=\"text\" value=\"\"/>

				</td>
                <td valign=\"top\" class=\"lebl\">City<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"city\" class=\"text\" value=\"\"/>

				</td>


			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\">Country<span style=\"color:red;\">*</span></td>
                <td class=\"inpt\"> <select name=\"country\">
                        <option>Nepal</option>
                        <option>India</option>
                        <option>others</option>
                    </select></td>
			    <td valign=\"top\" class=\"lebl\">Phone No.<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"cphone\" class=\"text\" value=\"\"/>

				</td>

			</tr>
            <tr>
                <td valign=\"top\" class=\"lebl\">Fax No.<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"cfax\" class=\"text\" value=\"\"/>

				</td>
			    <td valign=\"top\" class=\"lebl\">Email<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"email\" class=\"text\" value=\"\"/>

				</td>

			</tr>
            <tr>
                <td valign=\"top\" class=\"lebl\">Contact Person<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"cperson\" class=\"text\" value=\"\"/></td>
			    <td valign=\"top\" class=\"lebl\">Desination<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"cpdesination\" class=\"text\" value=\"\"/></td>
            </tr>
            <tr>
                <td valign=\"top\" class=\"lebl\">Phone No.<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"cpphone\" class=\"text\" value=\"\"/>

				</td>
			    <td valign=\"top\" class=\"lebl\">Mobile No.<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"cpmobile\" class=\"text\" value=\"\"/>

				</td>
            </tr>


         <!--   <tr>
                <td valign=\"top\">Status<span</span></td>
                <td> <select name=\"status\">
                        <option value=\"y\" selected>Active</option>
                        <option value=\"n\">Inactive</option>
                    </select></td>

                <td valign=\"top\">Category<span </span></td>
                <td> <select name=\"category\">
                        <option value=\"B\">Branch</option>
                    </select></td>
            </tr>-->
			<tr>
				<th colspan=\"4\"  class=\"lebl\">
                    <input type=\"submit\" name=\"submit\" value=\"Save\"/>
					<input type=\"hidden\" name=\"brname\" value=\"branch\"/>
				     <input type=\"reset\" value=\"Reset\"/>
                </th>
			</tr>
		</table>
		</div>
		</form>";
}

if($comname=='showusers'){
 echo $this->session->flashdata('message');
 $msg.="
     <br/><br/>
     <h3> Admin Users List </h3>
  	 <form>
  		<table width=\"100%\" cellspacing=\"0\" class=\"ltable\">

			<tr>
				<th>S.N </th>
				<th>Fullname </th>
				<th> Address</th>
				<th>Phone No</th>
				<th> Email</th>
				<th> Username</th>
				<th>Action </th>
			</tr>";
	$i=1;

	foreach($query_admin as $rows){
	 if($rows->status == 'Y'){
	   $stats="Disable";
	 }else{
	   $stats="Enable";
	 }

	  $rc="lcb";
      if($i%2==1) $rc="dcb";
	  $msg.="<tr class=\"$rc\">
	  			<td>$i </td>
				<td>$rows->fullname </td>
				<td>$rows->Address </td>
				<td>$rows->phone </td>
				<td>$rows->email </td>
				<td>$rows->username </td>
				<td align=\"center\">||
                ".anchor('admin/comp_profile/view_company/showusers/viewAdminProfile/'.$rows->aid,'View Profile')." ||
                ".anchor('admin/comp_profile/view_company/showusers/editAdminProfile/'.$rows->aid,'Edit Profile')." ||
                ".anchor('admin/comp_profile/view_company/adminUserPass/'.$rows->aid,'Change Password')."||
                ".anchor('admin/comp_profile/statusFun/showusers/'.$rows->aid.'/'.$rows->status,$stats)."  ||
                </td>
	  ";

	$i++;

	}
	$msg.="</table>
	</form>
";
}


if ($agname == "0") $agname = "";
if($comname=='branchlist'  and $agname=='showbranchusers'){
 $msg.="
     <br/><br/>
     <h3> Branch Users List </h3>
  	 <form>
  		<table width=\"100%\" cellspacing=\"0\" class=\"ltable\">

			<tr>
				<th>S.N </th>
				<th>Fullname </th>
				<th> Address</th>
				<th>Phone No</th>
				<th> Email</th>
				<th> Username</th>
				<th>Action </th>
			</tr>";
	$i=1;

	foreach($query_branch_user as $rows){
	 if($rows->status == 'Y'){
	   $stats="Disable";
	 }else{
	   $stats="Enable";
	 }

	  $rc="lcb";
      if($i%2==1) $rc="dcb";
	  $msg.="<tr class=\"$rc\">
	  			<td>$i </td>
				<td>$rows->fullname </td>
				<td>$rows->Address </td>
				<td>$rows->phone </td>
				<td>$rows->email </td>
				<td>$rows->username </td>
				<td align=\"center\">||
                ".anchor('admin/comp_profile/view_company/branchlist/viewBranchProfile/'.$rows->aid,'View Profile')."  ||
                ".anchor('admin/comp_profile/view_company/branchlist/editBranchProfile/'.$rows->aid,'Edit Profile')."  ||
                ".anchor('admin/comp_profile/view_company/branchUserPass/'.$rows->aid,'Change Password')."||
                ".anchor('admin/comp_profile/statusFun/branchusers/'.$rows->aid.'/'.$rows->status,$stats)."  ||
                </td>
	  ";

	$i++;

	}
	$msg.="</table>
	</form>
";
}




if($comname=='newuser'){
   $msg.="

   <br/><br/>
<!--<script type=\"text/javascript\">
var please_wait = \"Please Wait...\";
var xmlHttp;
function checkDuplicate()
{
	  var uname = document.createuser.username.value;
      //alert(uname);
      var url='http://local.busbooking.com/admin/comp_profile/getResultfromdb/'+uname;
      //alert(url);
      xmlHttp=GetXmlHttpObject()
      if (xmlHttp==null)
      {
      		alert (\"Browser does not support HTTP Request\");
      		return;
      }

      var e = document.getElementById(\"checkUser\");
      //alert(e);
      if(!e) return false;
      if(please_wait) e.innerHTML = please_wait;

      xmlHttp.onreadystatechange=function()
      {
            //alert(\"hello1\");
      			if(xmlHttp.readyState==4)
      			{
                       //alert(xmlHttp.responseText);
                        var msg = xmlHttp.responseText;
                        var messg=msg.replace(/\s/g,\"\");
                        alert(\"hello\"+messg);
                        if(messg==\"userOk\"){
                            //document.write(msg);
                            e.innerHTML = \"<font color = 'green'>User Ok</font>\";
                        }
                        if(messg==\"userNo\"){
                            e.innerHTML =  \"<font color = 'red'>User No</font>\";
                            }






      			}
      }
      xmlHttp.open(\"POST\",url,true);
      xmlHttp.send();
}
function GetXmlHttpObject()
{
		var objXMLHttp=null
		if (window.XMLHttpRequest)
		{
				objXMLHttp=new XMLHttpRequest()
		}
		else if (window.ActiveXObject)
		{
				objXMLHttp=new ActiveXObject(\"Microsoft.XMLHTTP\")
		}
		return objXMLHttp
}
</script>-->
  	  <form name = \"createuser\" method=\"post\" action=\"$action_adminuser\">
		<div class=\"data\">

		<table cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
			<tr>
				<td colspan=\"4\" class=\"dhdr\">:: Create User </td>
			</tr>
			<tr>
				<td valign=\"top\" class=\"lebl\">User Fullname<span style=\"color:red;\">*</span></td>
				<td colspan=\"3\"  class=\"inpt\">
                    <input type=\"text\" name=\"fname\" class=\"text\" value=\"\" size=\"70\" />
				</td>

			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\"> Address<span style=\"color:red;\">*</span></td>
				<td colspan=\"3\"  class=\"inpt\"><input type=\"text\" name=\"address\" class=\"text\" value=\"\" size=\"70\"/></td>
			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\">Email ID<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"email\" class=\"text\" value=\"\"/></td>
			    <td valign=\"top\" class=\"lebl\">Phone No.<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\">
                    <input type=\"text\" name=\"phone\" class=\"text\" value=\"\"/>
				</td>
			</tr>
            <tr>
                <td valign=\"top\" class=\"lebl\">Username<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\">
                    <input type=\"text\" name=\"uname\" id=\"username\" class=\"text\" value=\"\"/>
                    <span class=\"checkUser\" ></span>
                    <input type=\"hidden\" class=\"hiddenUrl\"/>
				</td>
			    <td valign=\"top\" class=\"lebl\">Password<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\">
                    <input type=\"password\" name=\"pass\" class=\"text\" value=\"\"/>
				</td>

			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\">User Type<span></span></td>
                <td class=\"inpt\">
                   <select name=\"usertype\">
                        <option value=\"a\">Admin User</option>
						<option value=\"n\">Normal User</option>
                    </select>
                </td>
			</tr>

			<tr>
				<th colspan=\"4\" class=\"lebl\">
                    <input type=\"submit\" value=\"Save\"/>
				    <input type=\"hidden\" name=\"id\" value=0/>
				    <input type=\"reset\" value=\"Reset\"/>
                </th>
			</tr>
		</table>
		</div>
		</form>";
}
if ($agname == "0") $agname = "";
if($comname=='branchlist'  and $agname == "newuser"){
//echo $bid;
   $msg.="<br/><br/>

  	  <form method=\"post\" action=\"$action_adminuser\">
		<div class=\"data\">

		<table cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
            <tr>
				<td colspan=\"4\" class=\"dhdr\"> :: Create Branch User </td>
			</tr>
			<tr>
				<td valign=\"top\" class=\"lebl\">User Fullname<span style=\"color:red;\">*</span></td>
				<td colspan=3 class=\"inpt\"><input type=\"text\" name=\"fname\" class=\"text\" value=\"\" size=\"70\"/>

				</td>

			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\"> Address<span style=\"color:red;\">*</span></td>
				<td colspan=\"3\" class=\"inpt\"><input type=\"text\" name=\"address\" class=\"text\" value=\"\" size=\"70\"/></td>

			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\">Email ID<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"email\" class=\"text\" value=\"\"/></td>
			    <td valign=\"top\" class=\"lebl\">Phone No.<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"phone\" class=\"text\" value=\"\"/>

				</td>

			</tr>
            <tr>
                <td valign=\"top\" class=\"lebl\">Username<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"uname\" id=\"username\" class=\"text\" value=\"\"/>
                 <span class=\"checkUser\" ></span>
                 <input type=\"hidden\" class=\"hiddenUrl\"/>
				</td>
			    <td valign=\"top\" class=\"lebl\">Password<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"password\" name=\"pass\" class=\"text\" value=\"\"/>

				</td>

			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\">User Type<span</span></td>
                <td class=\"inpt\"> <select name=\"usertype\">
                        <option value=\"a\">Admin User</option>
						<option value=\"n\">Normal User</option>
                    </select></td>
			</tr>

          <!--  <tr>
                <td valign=\"top\">Status<span</span></td>
                <td> <select name=\"status\">
                        <option value=\"y\" selected>Active</option>
                        <option value=\"n\">Inactive</option>
                    </select></td>

                <td valign=\"top\">Category<span </span></td>
                <td> <select name=\"category\">
                        <option value=\"a\">Agency</option>
                    </select></td>
            </tr>-->
			<tr>
				<th class=\"lebl\" colspan=\"4\">
                    <input type=\"submit\" value=\"Save\"/>
				    <input type=\"hidden\" name=\"id\" value=\"$bid\"/>
					<input type=\"hidden\" name=\"action\" value=\"branch\"/>
				    <input type=\"reset\" value=\"Reset\"/>
                </th>
			</tr>
		</table>
		</div>
		</form>";
}

//if ($agname == "0") $agname = "";
//echo $agname;
if($comname=="agencylist"){

	$msg.="<br /><br />
	<h3> Agency List </h3>
  	 <form>
  		<table width=\"100%\" cellspacing=\"0\" class=\"ltable\">

			<tr>
				<th>S.N </th>
				<th>Agency Name </th>
				<th>Address</th>
				<th>Phone No</th>
				<th>Fax No</th>
				<th>Contact Person</th>
				<th>Action </th>
			</tr>";
	$i=1;
	foreach($query1 as $rows){

	 if($rows->status == 'Y'){
	   $stats="Disable";
	 }else{
	   $stats="Enable";
	 }

	 $rc="lcb";
      if($i%2==1) $rc="dcb";
	  $msg.="<tr class=\"$rc\">
	  			<td>$i </td>
				<td>$rows->comp_name </td>
				<td>$rows->address </td>
				<td>$rows->phoneNo </td>
				<td>$rows->faxNo </td>
				<td>$rows->contact_person </td>
				<td>
                ||
				".anchor('admin/comp_profile/view_company/newagncyuser/agencylist/'.$rows->id,'Create User')." ||
                ".anchor('admin/comp_profile/view_company/newagncyuser/agencylistuser/'.$rows->id,'List User')." ||
                ".anchor('admin/comp_profile/statusFun/agencylist/'.$rows->id.'/'.$rows->status,$stats)."||
				".anchor('admin/comp_profile/view_company/branchlist/bprofile/'.$rows->id,'View Profile')."||

                </td>
	  		</tr>
	  ";

	$i++;
	}
	$msg.="</table>
	</form>
";

}

 if($comname=='branchlist' and $agname=='newagency'){
  $msg.="<br /><br />

  	  <form method=\"post\" action=\"$action\">
		<div class=\"data\">

		<table align=\"center\" cellspacing=\"0\" cellpadding=\"0\">
            <tr>
				<td colspan=\"4\" class=\"dhdr\"> :: Create New Agency Form </td>
			</tr>
			<tr>
				<td valign=\"top\" class=\"lebl\">Agency Name<span style=\"color:red;\">*</span></td>
				<td colspan=\"3\" class=\"inpt\"><input type=\"text\" name=\"cname\" class=\"text\" value=\"\" size=\"70\" /></td>
			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\"> Address<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"caddress\" class=\"text\" value=\"\"/>

				</td>
                <td valign=\"top\" class=\"lebl\">City<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"city\" class=\"text\" value=\"\" /></td>
			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\">Country<span style=\"color:red;\">*</span></td>
                <td class=\"inpt\">
                     <select name=\"country\">
                        <option>Nepal</option>
                        <option>India</option>
                        <option>others</option>
                    </select></td>
			    <td valign=\"top\" class=\"lebl\">Phone No.<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"cphone\" class=\"text\" value=\"\"/></td>

			</tr>
            <tr>
                <td valign=\"top\" class=\"lebl\">Fax No.<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"cfax\" class=\"text\" value=\"\"/>

				</td>
			    <td valign=\"top\" class=\"lebl\">Email<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"email\" class=\"text\" value=\"\"/>

				</td>

			</tr>
            <tr>
                <td valign=\"top\" class=\"lebl\">Contact Person<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"cperson\" class=\"text\" value=\"\"/></td>
			    <td valign=\"top\" class=\"lebl\">Desination<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"cpdesination\" class=\"text\" value=\"\"/></td>
            </tr>
            <tr>
                <td valign=\"top\" class=\"lebl\">Phone No.<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"cpphone\" class=\"text\" value=\"\"/></td>
			    <td valign=\"top\" class=\"lebl\">Mobile No.<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"cpmobile\" class=\"text\" value=\"\"/></td>
            </tr>


          <!--  <tr>
                <td valign=\"top\">Status<span</span></td>
                <td> <select name=\"status\">
                        <option value=\"y\" selected>Active</option>
                        <option value=\"n\">Inactive</option>
                    </select></td>

                <td valign=\"top\">Category<span </span></td>
                <td> <select name=\"category\">
                        <option value=\"a\">Agency</option>
                    </select></td>
            </tr>-->
			<tr>
				<th colspan=\"4\" class=\"lebl\">
                     <input type=\"submit\" value=\"Save\"/>
				     <input type=\"hidden\" name=\"id\" value=\"$bid\"/>
				     <input type=\"reset\" value=\"Reset\"/>
                </th>
			</tr>
		</table>
		</div>
		</form>";
 }

 if($comname=='adminUserPass' or $comname=='branchUserPass' or $comname=='agencyUserPass'){
 echo $this->session->flashdata('message');
  $msg.="<br /><br /><br /><br />
  <div class=\"data\">

  	<form name=\"chngpass\" method=\"POST\" action=\"$action_chngPass\">
		<table align=\"center\" width=\"50%\" cellspacing=\"0\" cellpadding=\"0\">
		    <tr>
				<td colspan=\"2\" class=\"dhdr\"> :: Change Password Form </td>
			</tr>
			<tr>
				<td valign=\"top\" class=\"lebl\"> Old Password <span style=\"color:red;\">*</span> </td>
				<td class=\"inpt\"> <input type=\"text\" name=\"oldpass\" size=\"35\"/></td>
			</tr>
			<tr>
				<td valign=\"top\" class=\"lebl\"> New Password <span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"> <input type=\"password\" name=\"pass\" size=\"35\"/></td>
			</tr>
			<tr>
				<td valign=\"top\" class=\"lebl\"> Re Enter New Password <span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"> <input type=\"password\" name=\"rpass\" size=\"35\"/></td>
			</tr>
			<tr>

				<th class=\"lebl\" colspan=\"2\"> <input type=\"submit\" name=\"submit\" value=\"Save\"/>
				                                  <input type=\"hidden\" name=\"id\" value=\"$agname\">
												  <input type=\"hidden\" name=\"user\" value=\"$user\">
					                              <input type=\"reset\"  value=\"Reset\"/>
				</th>
			</tr>
	    </table>
	</form>
  </div>
  ";

 }

 if ($agname == "0") $agname = "";
if($comname=='newagncyuser'  and $agname == "agencylist"){
//echo $bid;
   $msg.="<br/><br/>

  	  <form method=\"post\" action=\"$action_adminuser\">
		<div class=\"data\">

		<table cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
            <tr>
				<td colspan=\"4\" class=\"dhdr\"> :: Create Agency User </td>
			</tr>
			<tr>
				<td valign=\"top\" class=\"lebl\">User Fullname<span style=\"color:red;\">*</span></td>
				<td colspan=3 class=\"inpt\"><input type=\"text\" name=\"fname\" class=\"text\" value=\"\" size=\"70\"/></td>

			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\"> Address<span style=\"color:red;\">*</span></td>
				<td colspan=\"3\" class=\"inpt\"><input type=\"text\" name=\"address\" class=\"text\" value=\"\" size=\"70\"/></td>

			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\">Email ID<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"email\" class=\"text\" value=\"\"/></td>
			    <td valign=\"top\" class=\"lebl\">Phone No.<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"phone\" class=\"text\" value=\"\"/></td>

			</tr>
            <tr>
                <td valign=\"top\" class=\"lebl\">Username<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"uname\" id=\"username\" class=\"text\" value=\"\"/>
                <span class=\"checkUser\" ></span>
                <input type=\"hidden\" class=\"hiddenUrl\"/>
				</td>
			    <td valign=\"top\" class=\"lebl\">Password<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"password\" name=\"pass\" class=\"text\" value=\"\"/></td>

			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\">User Type<span</span></td>
                <td class=\"inpt\"> <select name=\"usertype\">
                        <option value=\"a\">Admin User</option>
						<option value=\"n\">Normal User</option>
                    </select></td>
			</tr>

          <!--  <tr>
                <td valign=\"top\">Status<span</span></td>
                <td> <select name=\"status\">
                        <option value=\"y\" selected>Active</option>
                        <option value=\"n\">Inactive</option>
                    </select></td>

                <td valign=\"top\">Category<span </span></td>
                <td> <select name=\"category\">
                        <option value=\"a\">Agency</option>
                    </select></td>
            </tr>-->
			<tr>
				<th class=\"lebl\" colspan=\"4\">
                    <input type=\"submit\" value=\"Save\"/>
				    <input type=\"hidden\" name=\"id\" value=\"$bid\"/>
					<input type=\"hidden\" name=\"action\" value=\"agency\"/>
				    <input type=\"reset\" value=\"Reset\"/>
                </th>
			</tr>
		</table>
		</div>
		</form>";
}


 if ($agname == "0") $agname = "";
if($comname=='newagncyuser'  and $agname == "agencylistuser"){
$msg.="
     <br/><br/>
     <h3> Agency Users List </h3>
  	 <form>
  		<table width=\"100%\" cellspacing=\"0\" class=\"ltable\">

			<tr>
				<th>S.N </th>
				<th>Fullname </th>
				<th> Address</th>
				<th>Phone No</th>
				<th> Email</th>
				<th> Username</th>
				<th>Action </th>
			</tr>";
	$i=1;

	foreach($query_agencyusers as $rows){
	 if($rows->status == 'Y'){
	   $stats="Disable";
	 }else{
	   $stats="Enable";
	 }

	  $rc="lcb";
      if($i%2==1) $rc="dcb";
	  $msg.="<tr class=\"$rc\">
	  			<td>$i </td>
				<td>$rows->fullname </td>
				<td>$rows->Address </td>
				<td>$rows->phone </td>
				<td>$rows->email </td>
				<td>$rows->username </td>
				<td align=\"center\">||
                ".anchor('admin/comp_profile/view_company/branchlist/viewBranchProfile/'.$rows->aid,'View Profile')."  ||
                ".anchor('admin/comp_profile/view_company/branchlist/editBranchProfile/'.$rows->aid,'Edit Profile')." ||
                ".anchor('admin/comp_profile/view_company/agencyUserPass/'.$rows->aid,'Change Password')." ||
                ".anchor('admin/comp_profile/statusFun/branchusers/'.$rows->aid.'/'.$rows->status,$stats)."  ||
                </td>
	  ";

	$i++;

	}
	$msg.="</table>
	</form>
";
}
 if ($agname == "0") $agname = "";
if($comname=='showusers' and $agname == 'viewAdminProfile'){
 foreach($query_adminProfile as $rows){
   //echo $rows->fullname;
   //echo $rows->userType;
   if($rows->usertype =='s') $usertype="Super User";
   if($rows->usertype =='a') $usertype="Admin User";
   if($rows->usertype =='n') $usertype="Normal User";

   if($rows->status =='Y') $status ="Enabled";
   if($rows->status =='N') $status ="Disabled";

  $msg.="


		 	<div class = \"data\">

              <table width=\"600\" border=0   cellpadding=\"2\" cellspacing=\"5\" align=\"center\">

               <tr>
                     <td colspan=2 align=\"center\" class=\"dhdr\"><h3>User Profile  </h3></td>
               </tr>

                 <tr>
			  	    <td class=\"lebl\" valign=\"top\">Fullname </td>
      				<td class=\"inpt\" colspan=\"2\">$rows->fullname</td>
                 </tr>
                 <tr>
			  	    <td class = \"lebl\" valign=\"top\">Address </td>
      				<td class = \"inpt\">$rows->Address</td>
                 </tr>
                 <tr>
			  	    <td class=\"lebl\" valign=\"top\">Email</td>
      				<td class=\"inpt\">$rows->email</td>
                 </tr>
                 <tr>
			  	    <td class=\"lebl\" valign=\"top\">Phone </td>
      				<td class=\"inpt\">$rows->phone</td>
                 </tr>
                <tr>
                	<td class=\"lebl\" valign=\"top\">Username</td>
      				<td class = \"inpt\">$rows->username</td>
                 </tr>

                 <tr>
                      <td class=\"lebl\" valign=\"top\">User Type </td>
                      <td class=\"inpt\">$usertype</td>

                 </tr>
                 <tr>
                      <td class=\"lebl\" valign=\"top\">Status </td>
                      <td class=\"inpt\">$status</td>
                 </tr>
                <tr>
				  	  <th colspan=\"2\" class=\"lebl\">
                            ||
                            Edit Profile ||
                            ".anchor('admin/comp_profile/view_company/branchUserPass/'.$rows->aid,'Change Password')."||
                            ".anchor('admin/comp_profile/statusFun/branchusers/'.$rows->aid.'/'.$rows->status,$stats)."  ||
                      </th>
      		   </tr>
          </table>
		  </div>

           ";

 }
}

if ($agname == "0") $agname = "";
if($comname=='branchlist' and $agname == 'viewBranchProfile'){
 foreach($query_branchProfile as $rows){
   //echo $rows->fullname;
   //echo $rows->userType;
   if($rows->usertype =='s') $usertype="Super User";
   if($rows->usertype =='a') $usertype="Admin User";
   if($rows->usertype =='n') $usertype="Normal User";

   if($rows->status =='Y') $status ="Enabled";
   if($rows->status =='N') $status ="Disabled";

  $msg.="


		 	<div class = \"data\">

              <table width=\"600\" border=0   cellpadding=\"2\" cellspacing=\"5\" align=\"center\">

               <tr>
                     <td colspan=2 align=\"center\" class=\"dhdr\"><h3>User Profile  </h3></td>
               </tr>

                 <tr>
			  	    <td class=\"lebl\" valign=\"top\">Fullname </td>
      				<td class=\"inpt\" colspan=\"2\">$rows->fullname</td>
                 </tr>
                 <tr>
			  	    <td class = \"lebl\" valign=\"top\">Address </td>
      				<td class = \"inpt\">$rows->Address</td>
                 </tr>
                 <tr>
			  	    <td class=\"lebl\" valign=\"top\">Email</td>
      				<td class=\"inpt\">$rows->email</td>
                 </tr>
                 <tr>
			  	    <td class=\"lebl\" valign=\"top\">Phone </td>
      				<td class=\"inpt\">$rows->phone</td>
                 </tr>
                <tr>
                	<td class=\"lebl\" valign=\"top\">Username</td>
      				<td class = \"inpt\">$rows->username</td>
                 </tr>

                 <tr>
                      <td class=\"lebl\" valign=\"top\">User Type </td>
                      <td class=\"inpt\">$usertype</td>

                 </tr>
                 <tr>
                      <td class=\"lebl\" valign=\"top\">Status </td>
                      <td class=\"inpt\">$status</td>
                 </tr>
                <tr>
				  	  <th colspan=\"2\" class=\"lebl\">
                            ||
                           ".anchor('admin/comp_profile/view_company/branchlist/editBranchProfile/'.$rows->aid,'Edit Profile')." ||
                            ".anchor('admin/comp_profile/view_company/branchUserPass/'.$rows->aid,'Change Password')."||
                            ".anchor('admin/comp_profile/statusFun/branchusers/'.$rows->aid.'/'.$rows->status,$stats)."  ||
                      </th>
      		   </tr>
          </table>
		  </div>

           ";
     }
  }


if ($agname == "0") $agname = "";
if($comname=='showusers' and $agname == 'editAdminProfile'){
	foreach($query_editAdmin as $row){
	  
	}
	$superuser="";
	$adminuser="";
	$normaluser="";
	if($row->usertype == 's') $superuser='selected';
	if($row->usertype == 'a') $adminuser='selected';
	if($row->usertype == 'n') $normaluser='selected';
	$msg.="<br/><br/>

  	  <form method=\"post\" action=\"$action_editUsers\">
		<div class=\"data\">

		<table cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
            <tr>
				<td colspan=\"4\" class=\"dhdr\"> :: Edit Admin User </td>
			</tr>
			<tr>
				<td valign=\"top\" class=\"lebl\">User Fullname<span style=\"color:red;\">*</span></td>
				<td colspan=3 class=\"inpt\"><input type=\"text\" name=\"fname\" class=\"text\" value=\"$row->fullname\" size=\"70\"/>

				</td>

			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\"> Address<span style=\"color:red;\">*</span></td>
				<td colspan=\"3\" class=\"inpt\"><input type=\"text\" name=\"address\" class=\"text\" value=\"$row->Address\" size=\"70\"/></td>

			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\">Email ID<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"email\" class=\"text\" value=\"$row->email\"/></td>
			    <td valign=\"top\" class=\"lebl\">Phone No.<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"phone\" class=\"text\" value=\"$row->phone\"/>

				</td>

			</tr>
            <tr>
                <td valign=\"top\" class=\"lebl\">Username<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"uname\" id=\"usernamea\" class=\"text\" value=\"$row->username\" readonly/>
                <span class = \"checkUsera\" ></span>
                <input type=\"hidden\" class=\"hiddenUrl\"/>
				</td>
			    <td valign=\"top\" class=\"lebl\">Password<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"password\" name=\"pass\" class=\"text\" value=\"$row->password\"/>

				</td>

			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\">User Type<span</span></td>
                <td class=\"inpt\"> <select name=\"usertype\">
                        <option value=\"a\" $adminuser>Admin User</option>
						<option value=\"n\" $normaluser>Normal User</option>
                    </select></td>
			</tr>

			<tr>
				<th class=\"lebl\" colspan=\"4\">
                    <input type=\"submit\" value=\"Save\"/>
				    <input type=\"hidden\" name=\"id\" value=\"$row->aid\"/>
					<input type=\"hidden\" name=\"user\" value=\"adminuser\"/>
				    <input type=\"reset\" value=\"Reset\"/>
                </th>
			</tr>
		</table>
		</div>
		</form>";

}

if ($agname == "0") $agname = "";
if($comname=='branchlist' and $agname == 'editBranchProfile'){
	foreach($query_editAdmin as $row){
	  
	}
	$superuser="";
	$adminuser="";
	$normaluser="";
	if($row->usertype == 's') $superuser='selected';
	if($row->usertype == 'a') $adminuser='selected';
	if($row->usertype == 'n') $normaluser='selected';
	$msg.="<br/><br/>

  	  <form method=\"post\" action=\"$action_editUsers\">
		<div class=\"data\">

		<table cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
            <tr>
				<td colspan=\"4\" class=\"dhdr\"> :: Edit User Profile </td>
			</tr>
			<tr>
				<td valign=\"top\" class=\"lebl\">User Fullname<span style=\"color:red;\">*</span></td>
				<td colspan=3 class=\"inpt\"><input type=\"text\" name=\"fname\" class=\"text\" value=\"$row->fullname\" size=\"70\"/>

				</td>

			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\"> Address<span style=\"color:red;\">*</span></td>
				<td colspan=\"3\" class=\"inpt\"><input type=\"text\" name=\"address\" class=\"text\" value=\"$row->Address\" size=\"70\"/></td>

			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\">Email ID<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"email\" class=\"text\" value=\"$row->email\"/></td>
			    <td valign=\"top\" class=\"lebl\">Phone No.<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"phone\" class=\"text\" value=\"$row->phone\"/>

				</td>

			</tr>
            <tr>
                <td valign=\"top\" class=\"lebl\">Username*:<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"uname\" id=\"usernamea\" class=\"text\" value=\"$row->username\" readonly/>
                <span class = \"checkUsera\" ></span>
                <input type=\"hidden\" class=\"hiddenUrl\"/>
				</td>
			    <td valign=\"top\" class=\"lebl\">Password<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"password\" name=\"pass\" class=\"text\" value=\"$row->password\"/>

				</td>

			</tr>
			<tr>
                <td valign=\"top\" class=\"lebl\">User Type<span</span></td>
                <td class=\"inpt\"> <select name=\"usertype\">
                        <option value=\"a\" $adminuser>Admin User</option>
						<option value=\"n\" $normaluser>Normal User</option>
                    </select></td>
			</tr>

          <!--  <tr>
                <td valign=\"top\">Status<span</span></td>
                <td> <select name=\"status\">
                        <option value=\"y\" selected>Active</option>
                        <option value=\"n\">Inactive</option>
                    </select></td>

                <td valign=\"top\">Category<span </span></td>
                <td> <select name=\"category\">
                        <option value=\"a\">Agency</option>
                    </select></td>
            </tr>-->
			<tr>
				<th class=\"lebl\" colspan=\"4\">
                    <input type=\"submit\" value=\"Save\"/>
				    <input type=\"hidden\" name=\"id\" value=\"$row->aid\"/>
					<input type=\"hidden\" name=\"user\" value=\"branchuser\"/>
				    <input type=\"reset\" value=\"Reset\"/>
                </th>
			</tr>
		</table>
		</div>
		</form>";

}


echo $msg;
?>
