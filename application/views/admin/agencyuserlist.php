<?php
$msg="";
$msg.="<script language=\"JavaScript\">
        function valis(){
        var error=0;
        var errmsg=\"\";
        if(document.forms.bruser.fname.value==\"\"){
            document.getElementById(\"fname\").innerHTML=\"<font color='red'> Enter Your Full name!! </font>\";
            errmsg+=\"<li>Fullname should not be blank.</li>\";
            error++
        }else{
            document.getElementById(\"fname\").innerHTML=\" Enter Your Fullname!! \";
        }
        if(document.forms.bruser.address.value==\"\"){
            document.getElementById(\"address\").innerHTML=\"<font color='red'>Enter Your Address!!</font>\";
            errmsg+=\"<li>Address should not be blank.</li>\";
            error++
        }else{
            document.getElementById(\"address\").innerHTML=\"Enter Your Address!!\";
        }
        if(document.forms.bruser.email.value==\"\"){
            document.getElementById(\"email\").innerHTML=\"<font color='red'>Enter Your Email Address!!</font>\";
            errmsg+=\"<li>Email should not be blank.</li>\";
            error++
        }else{
            document.getElementById(\"email\").innerHTML=\"Enter Your Email Address!!\";
        }
        if(document.forms.bruser.phone.value==\"\"){
            document.getElementById(\"phone\").innerHTML=\"<font color='red'>Enter Your phone number!!</font>\";
            errmsg+=\"<li>phone should not be blank.</li>\";
            error++
        }else{
            document.getElementById(\"phone\").innerHTML=\"Enter Your phone number!!\";
        }
        if(document.forms.bruser.uname.value==\"\"){
            document.getElementById(\"usernames\").innerHTML=\"<font color='red'>Enter Your username!!</font>\";
            errmsg+=\"<li>username should not be blank.</li>\";
            error++
        }else{
            document.getElementById(\"usernames\").innerHTML=\"Enter Your username!!\";
        }
        if(document.forms.bruser.pass.value==\"\"){
            document.getElementById(\"password\").innerHTML=\"<font color='red'>Enter Your password!!</font>\";
            errmsg+=\"<li>password should not be blank.</li>\";
            error++
        }else{
            document.getElementById(\"password\").innerHTML=\"Enter Your password!!\";
        }


        if(error>=1){
            errmsg=\"<ul>\"+errmsg+\"</ul>\";
            document.getElementById(\"showerror\").innerHTML=errmsg;
            return false;
        }else{
            return true;
            }
        }
    </script>";

$msg.="
	<form name=\"\" method=\"POST\">
    <div id=\"shli\"> 
	      <div>".anchor('admin/comp_profile/view_agency_user/branchuserlist/','Agency User List')."</div>         
          <div>".anchor('admin/comp_profile/view_agency_user/newbranchuser/','Create New User')."</div>
          
    </div>
	</form>";


   echo $this->session->flashdata('message');
if($p1 == 'branchuserlist'){	
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
                ".anchor('admin/comp_profile/view_agency_user/branchuserlist/viewprofile/'.$rows->aid,'View Profile')." ||
                ".anchor('admin/comp_profile/view_agency_user/branchuserlist/editprofile/'.$rows->aid,'Edit Profile')." ||
                ".anchor('admin/comp_profile/view_agency_user/branchuserlist/chngpass/'.$rows->aid,'Change Password')." ||
                ".anchor('admin/comp_profile/statusFun/agencyuserlist/'.$rows->aid.'/'.$rows->status,$stats)."  ||
                </td>
	  ";

	$i++;

	}
	$msg.="</table>
	</form>
";
}


if($p1=='newbranchuser'){
//echo $bid;
   $msg.="<br/><br/>



  	  <form method=\"post\" name=\"bruser\" action=\"$action_bguser\" onsubmit=\"return valis();\" style=\" padding:5px;\">
		<div class=\"data\">

		<table cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
            <tr>
				<td colspan=\"4\" class=\"dhdr\"> :: Create Agency User </td>
			</tr>
             <tr>
                    <td align=\"left\" colspan=\"2\" style=\"color:#ff0000; font-size:15px;\" id=\"showerror\">
                    </td>
            </tr>
			<tr>
				<td id=\"fname\" valign=\"top\" class=\"lebl\">User Fullname<span style=\"color:red;\">*</span></td>
				<td colspan=3 class=\"inpt\"><input type=\"text\" name=\"fname\" class=\"text\" value=\"\" size=\"70\"/></td>

			</tr>
			<tr>
                <td id=\"address\" valign=\"top\" class=\"lebl\"> Address<span style=\"color:red;\">*</span></td>
				<td colspan=\"3\" class=\"inpt\"><input type=\"text\" name=\"address\" class=\"text\" value=\"\" size=\"70\"/></td>

			</tr>
			<tr>
                <td id=\"email\" valign=\"top\" class=\"lebl\">Email ID<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"email\" class=\"text\" value=\"\"/></td>
			    <td id=\"phone\" valign=\"top\" class=\"lebl\">Phone No.<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"phone\" class=\"text\" value=\"\"/></td>

			</tr>
            <tr>
                <td id=\"usernames\" valign=\"top\" class=\"lebl\">Username<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"uname\" id=\"username\" class=\"text\" value=\"\"/>
                 <span class=\"checkUser\" ></span>
                <input type=\"hidden\" class=\"hiddenUrl\"/>
				</td>
			    <td id=\"password\" valign=\"top\" class=\"lebl\">Password<span style=\"color:red;\">*</span></td>
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
				    <input type=\"hidden\" name=\"id\" value=\"\"/>
					<input type=\"hidden\" name=\"action\" value=\"agency\"/>
				    <input type=\"reset\" value=\"Reset\"/>
                </th>
			</tr>
		</table>
		</div>
		</form>";
}

if($p1=='branchuserlist' and $p2 == 'viewprofile'){
 foreach($query_branchusersprofile as $rows){
 }
      
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
				  	  <th colspan=\"2\" class=\"lebl\"></th>
      		   </tr>
          </table>
		  </div>

           ";
     }
	 
  if($p1=='branchuserlist' and $p2 == 'editprofile'){ 
	foreach($query_editprofile as $row){
	  
	}
	
	$adminuser="";
	$normaluser="";
	
	if($row->usertype == 'a') $adminuser='selected';
	if($row->usertype == 'n') $normaluser='selected';
	 $msg.="
  	  <form method=\"post\" name=\"bruser\" onsubmit=\"return valis();\" style=\" padding:5px;\" action=\"$action_editUsers\">
		<div class=\"data\">

		<table cellspacing=\"0\" cellpadding=\"0\" align=\"center\">
            <tr>
				<td colspan=\"4\" class=\"dhdr\"> :: Edit User profile </td>
			</tr>
             <tr>
                    <td align=\"left\" colspan=\"2\" style=\"color:#ff0000; font-size:15px;\" id=\"showerror\">
                    </td>
            </tr>
			<tr>
				<td id=\"fname\" valign=\"top\" class=\"lebl\">User Fullname<span style=\"color:red;\">*</span></td>
				<td colspan=3 class=\"inpt\"><input type=\"text\" name=\"fname\" class=\"text\" value=\"$row->fullname\" size=\"70\"/>

				</td>

			</tr>
			<tr>
                <td id=\"address\" valign=\"top\" class=\"lebl\"> Address<span style=\"color:red;\">*</span></td>
				<td colspan=\"3\" class=\"inpt\"><input type=\"text\" name=\"address\" class=\"text\" value=\"$row->Address\" size=\"70\"/></td>

			</tr>
			<tr>
                <td id=\"email\" valign=\"top\" class=\"lebl\">Email ID<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"email\" class=\"text\" value=\"$row->email\"/></td>
			    <td id=\"phone\" valign=\"top\" class=\"lebl\">Phone No.<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"phone\" class=\"text\" value=\"$row->phone\"/>

				</td>

			</tr>
            <tr>
                <td id=\"usernames\" valign=\"top\" class=\"lebl\">Username<span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"><input type=\"text\" name=\"uname\" id=\"usernamea\" class=\"text\" value=\"$row->username\" readonly/>
                <span class=\"checkUsera\" ></span>
                <input type=\"hidden\" class=\"hiddenUrl\"/>
				</td>
			    <td id=\"password\" valign=\"top\" class=\"lebl\">Password<span style=\"color:red;\">*</span></td>
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
   
 if($p1=='branchuserlist' and $p2 == 'chngpass'){
   $msg.="
   <script language=\"JavaScript\">
        function valis(){
        var error=0;
        var errmsg=\"\";

        if(document.forms.chngpass.pass.value==\"\"){
            document.getElementById(\"pass\").innerHTML=\"<font color='red'>Enter New Password</font>\";
            errmsg+=\"<li>New Password should not be blank.</li>\";
            error++
        }else{
            document.getElementById(\"pass\").innerHTML=\"Enter New Password\";
        }
        if(document.forms.chngpass.rpass.value==\"\"){
            document.getElementById(\"rpass\").innerHTML=\"<font color='red'>Re-eter New Password</font>\";
            errmsg+=\"<li>Re-enter New Password should not be blank.</li>\";
            error++
        }else{
            document.getElementById(\"rpass\").innerHTML=\"Re-enter New Password\";
        }
        if(document.forms.chngpass.pass.value!=document.forms.chngpass.rpass.value){
            document.getElementById(\"pass\").innerHTML=\"<font color='red'>Enter New Password</font>\";
            document.getElementById(\"rpass\").innerHTML=\"<font color='red'>Re-enter New Password</font>\";
            document.forms.chngpass.pass.value=\"\";
            document.forms.chngpass.rpass.value=\"\";
            errmsg+=\"<li>New Password and Re-enter New Password doesn't match.</li>\";
            error++
        }
        if(error>=1){
            errmsg=\"<ul>\"+errmsg+\"</ul>\";
            document.getElementById(\"showerror\").innerHTML=errmsg;
            return false;
        }else{
            return true;
        }
        }
    </script>
  <div class=\"data\">

  	<form name=\"chngpass\" method=\"POST\" action=\"$action_chngPass\" onsubmit=\"return valis();\" style=\" padding:5px;\">
		<table align=\"center\" width=\"50%\" cellspacing=\"0\" cellpadding=\"0\">
		    <tr>
				<td colspan=\"2\" class=\"dhdr\"> :: Change Password Form </td>
			</tr>
            <tr>
                    <td align=\"left\" colspan=\"2\" style=\"color:#ff0000; font-size:15px;\" id=\"showerror\">
                    </td>
            </tr>
			<tr>
				<td id=\"pass\" valign=\"top\" class=\"lebl\"> New Password <span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"> <input type=\"password\" name=\"pass\" size=\"35\"/></td>
			</tr>
			<tr>
				<td id=\"rpass\" valign=\"top\" class=\"lebl\"> Re Enter New Password <span style=\"color:red;\">*</span></td>
				<td class=\"inpt\"> <input type=\"password\" name=\"rpass\" size=\"35\"/></td>
			</tr>
			<tr>

				<th class=\"lebl\" colspan=\"2\"> <input type=\"submit\" name=\"submit\" value=\"Save\"/>
				                                  <input type=\"hidden\" name=\"id\" value=\"$p3\">
												  <input type=\"hidden\" name=\"user\" value=\"\">
					                              <input type=\"reset\"  value=\"Reset\"/>
				</th>
			</tr>
	    </table>
	</form>
  </div>
  ";
  } 

echo $msg;
?>
