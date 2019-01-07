<?php
$msg="";
$msg.="

         <form id=\"form1\" name=\"userAdmin\" method=\"POST\" action=\"\"  onSubmit=\"return valis();\">
		 	<div class = \"data\">
		
              <table width=\"600\" border=0   cellpadding=\"1\" cellspacing=\"1\" align=\"center\">

               <tr>
                     <td colspan=2 align=\"center\" class=\"dhdr\"><h3>New User Entry Form  </h3></td>
               </tr>

                 <tr>
			  	    <td class=\"lebl\" valign=\"top\">Fullname<span style=\"color:red;\">*</span> </td>
      				<td width=\"68%\" class=\"inpt\" colspan=\"2\"><input type=\"text\"  class= \"text\" name=\"fname\" size=\"40\" /></td>
                 </tr>
                 <tr>
			  	    <td class = \"lebl\" valign=\"top\">Address<span style=\"color:red;\">*</span> </td>
      				<td class = \"inpt\"><input type=\"text\" class=\"text\"  name=\"address\" size=\"40\" /></td>
                 </tr>
                 <tr>
			  	    <td class=\"lebl\" valign=\"top\">Email <span style=\"color:red;\">*</span></td>
      				<td class=\"inpt\"><input type=\"text\" class=\"text\"  name=\"email\" size=\"25\" /></td>
                 </tr>
                 <tr>
			  	    <td class=\"lebl\" valign=\"top\">Phone<span style=\"color:red;\">*</span> </td>
      				<td class=\"inpt\"><input type=\"text\" class= \"text\"  name=\"phone\" size=\"25\" /></td>
                 </tr>
                <tr>
                	<td class=\"lebl\" valign=\"top\">Username<span style=\"color:red;\">*</span></td>
      				<td class = \"inpt\"><input type=\"text\" class=\"text\"  name=\"uname\" size=\"25\" /></td>
                 </tr>
                 <tr>
                      <td class=\"lebl\" valign=\"top\">Password<span style=\"color:red;\">*</span> </td>
      				<td class=\"inpt\"><input type=\"password\"  name=\"pass\" class= \"text\" size=\"25\" /></td>
                 </tr>

                 <tr>
                      <td class=\"lebl\" valign=\"top\">User Type </td>
                      <td class=\"inpt\"><input type=\"radio\" name=\"chkuser\" class=\"text\" value=\"n\" checked/>&nbsp;Normal User
                      <input type=\"radio\" class=\"text\" name=\"chkuser\" value=\"a\"/>&nbsp; Admin User
                    </td>

                 </tr>
                 <tr>
                      <td class=\"lebl\" valign=\"top\">Status </td>
                      <td class=\"inpt\"><input type=\"radio\" name=\"status\" class=\"text\" value=\"Y\" checked/> &nbsp; Active
                          <input type=\"radio\" name=\"status\" class=\"text\" value=\"N\" /> &nbsp; Suspend </td>
                 </tr>
                <tr>
				  	  <th colspan=\"2\" class=\"lebl\"> <input type=\"submit\" name=\"Submit\" value=\"Submit\"/>
                              <input type = \"reset\" name = \"reset\" value = \"Reset\" />
                              <input type=\"hidden\" name=\"action\" value=\"4\"/>
      				  </th>
      		   </tr>
          </table>
		  </div>
      </form>

           ";
      echo $msg;
	  ?>