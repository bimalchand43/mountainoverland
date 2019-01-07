<?php
$msg="";

$msg.="
	<form name=\"\" method=\"POST\">
    <div id=\"shli\"> 
	      <div>".anchor('admin/comp_profile/view_agency/agencylist/','Agency List')."</div>         
          <div>".anchor('admin/comp_profile/view_agency/newagency/','New Agency')."</div>
          
    </div>
	</form>";

if($comname=="agencylist"){
   echo $this->session->flashdata('message');
	$msg.="<br /><br />
	  <h3> Agency List </h3>
  	   <form>
  		<table width=\"100%\" cellspacing=\"0\" class=\"ltable\">

			<tr>
				<th>S.N </th>
				<th>Agency Name </th>
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
				<td>
                ||
				".anchor('admin/comp_profile/view_agency/agencylist/newagncyuser/'.$rows->id,'Create User')." ||
                ".anchor('admin/comp_profile/view_agency/agencylist/agencylistuser/'.$rows->id,'List User')." ||
				".anchor('admin/comp_profile/view_agency/agencylist/aprofile/'.$rows->id,'View Profile')." ||
                ".anchor('admin/comp_profile/statusFun/agencyliststst/'.$rows->id.'/'.$rows->status,$stats)."|| 

                </td>
	  		</tr>
	  ";

	$i++;
	}
	$msg.="</table>
	</form>
";

}

if($comname=='newagency'){
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
				     <input type=\"hidden\" name=\"id\" value=\"bid\"/>					 
				     <input type=\"reset\" value=\"Reset\"/>
                </th>
			</tr>
		</table>
		</div>
		</form>";
 }
 if ($comname2 == "0") $comname2 = "";
 if($comname=='agencylist' and $comname2=='newagncyuser'){
   $msg.="<br/><br/>

  	  <form method=\"post\" action=\"$action_aguser\">
		<div class=\"data\">

		<table cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
            <tr>
				<td colspan=\"4\" class=\"dhdr\"> :: Create Agency User </td>
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
				    <input type=\"hidden\" name=\"id\" value=\"$comnid3\"/>
					<input type=\"hidden\" name=\"action\" value=\"agency\"/>
				    <input type=\"reset\" value=\"Reset\"/>
                </th>
			</tr>
		</table>
		</div>
		</form>";
 
 }
 
if ($comname2 == "0") $comname2 = "";
if($comname=='agencylist' and $comname2=='agencylistuser'){
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
                ".anchor('admin/comp_profile/view_agency/agencylist/viewAgencyProfile/'.$rows->aid,'View Profile')." ||
                ".anchor('admin/comp_profile/view_agency/editAgencyProfile/agencylist/'.$rows->aid,'Edit Profile')." ||
                ".anchor('admin/comp_profile/view_agency/agencyPass/'.$rows->aid,'Change Password')." ||
                ".anchor('admin/comp_profile/statusFun/agencyuserstsuser/'.$rows->aid.'/'.$rows->status,$stats)."  ||
                </td>
	  ";

	$i++;

	}
	$msg.="</table>
	</form>
";
}

if($comname=='agencyPass'){
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
				                                  <input type=\"hidden\" name=\"id\" value=\"$comname2\">
												  <input type=\"hidden\" name=\"user\" value=\"$user\">
					                              <input type=\"reset\"  value=\"Reset\"/>
				</th>
			</tr>	
	    </table>
	</form>
  </div>
  ";
 
 }
 
 if ($comname2 == "0") $comname2 = "";
if($comname=='agencylist' and $comname2 == 'viewAgencyProfile'){
 foreach($query_agencyusersprofile as $rows){
   //echo $rows->fullname;
   //echo $rows->userType;
   if($rows->usertype =='s') $usertype="Super User";
   if($rows->usertype =='a') $usertype="Admin User";
   if($rows->usertype =='n') $usertype="Normal User";

   if($rows->status =='Y') $status ="Disable";
   if($rows->status =='N') $status ="Enabled";

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
				  	  <th colspan=\"2\" class=\"lebl\"></th>
      		   </tr>
          </table>
		  </div>

           ";
     }
  }
 
 
// if ($comname2 == "0") $comname2 = "";
if($comname=='editAgencyProfile' and $comname2 == 'agencylist'){
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
				<td colspan=\"4\" class=\"dhdr\"> :: Edit User Profile</td>
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
                <span class=\"checkUsera\" ></span>
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
					<input type=\"hidden\" name=\"user\" value=\"agencylistuser\"/>
				    <input type=\"reset\" value=\"Reset\"/>
                </th>
			</tr>
		</table>
		</div>
		</form>";

}

if ($comname2 == "0") $comname2 = "";
 if($comname=='agencylist' and $comname2=='aprofile'){
 
 foreach($query_aprofle as $rows){
 
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
		[".anchor('admin/comp_profile/view_agency/agencylist/editaprofile/'.$rows->id,'Edit')."]
        </td>
    </tr>

</table>
</div>
</form> ";
 
}
if ($comname2 == "0") $comname2 = "";
 if($comname=='agencylist' and $comname2=='editaprofile'){
 foreach($query_aprofle as $row){

}
$selectnepal="";
$selectindia="";
$selectother="";
if($row->country == 'Nepal') $selectnepal='selected';
if($row->country == 'India') $selectindia='selected';
if($row->country == 'Others') $selectother='selected';


$msg.="<br/><br/>

  	  <form method=\"post\" action=\"$action_editaprofile\">
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

echo $msg;
?>
