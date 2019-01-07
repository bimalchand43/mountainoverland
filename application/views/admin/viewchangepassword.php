<?php
$user="<select name=\"users\">";
 foreach($query as $rows){
  //echo $rows->root_id;
  $user.="<option value=\"$rows->aid\">$rows->username</option>";
 //$aid = $rows->aid;
 }
 $user.="</select>";

 //echo $user; die();
$msg="";
$errMsg="";
$act = $action;
 echo $this->session->flashdata('message');
$msg.="
     <script language=\"JavaScript\">
        function valis(){
        var error=0;
        var errmsg=\"\";
        
        if(document.forms.changeecpin.fnecpin.value==\"\"){
            document.getElementById(\"jf_necpin\").innerHTML=\"<font color='red'>Enter New Password</font>\";
            errmsg+=\"<li>New Password should not be blank.</li>\";
            error++
        }else{
            document.getElementById(\"jf_necpin\").innerHTML=\"Enter New Password\";
        }
        if(document.forms.changeecpin.frenecpin.value==\"\"){
            document.getElementById(\"jf_renecpin\").innerHTML=\"<font color='red'>Re-eter New Password</font>\";
            errmsg+=\"<li>Re-enter New Password should not be blank.</li>\";
            error++
        }else{
            document.getElementById(\"jf_renecpin\").innerHTML=\"Re-enter New Password\";
        }
        if(document.forms.changeecpin.fnecpin.value!=document.forms.changeecpin.frenecpin.value){
            document.getElementById(\"jf_necpin\").innerHTML=\"<font color='red'>Enter New Password</font>\";
            document.getElementById(\"jf_renecpin\").innerHTML=\"<font color='red'>Re-enter New Password</font>\";
            document.forms.changeecpin.fnecpin.value=\"\";
            document.forms.changeecpin.frenecpin.value=\"\";
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

     <form name =\"changeecpin\" method =\"POST\" action=\"$act\" onsubmit=\"return valis();\" style=\" padding:5px;\">
        <div class=\"data\">
            <table cellpadding=\"0\" cellspacing=\"1\" class=\"edt_form\" width=\"500px\" align=\"center\">

            <tr>
    	          <td colspan=\"2\" class=\"dhdr\"><center><h3>Change Password Request</h3></center> </td>
            </tr>
            <tr>
                    <td align=\"left\" colspan=\"2\" style=\"color:#ff0000; font-size:15px;\" id=\"showerror\">
					   <ul>$errMsg</ul>
                    </td>
            </tr>
            <tr>
                <td id=\"jf_cecpin\" valign=\"top\" class=\"lebl\">Select Users:<span style=\"color:red;\">*</span></td>
                <td class=\"inpt\">$user</td>
            </tr>
            <tr>
                <td id=\"jf_necpin\" valign=\"top\" class=\"lebl\">Enter New Password<span style=\"color:red;\">*</span></td>
                <td class=\"inpt\"><input type=\"password\" class=\"text\" name=\"fnecpin\" size=\"30\"></td>
            </tr>
            <tr>
                <td id=\"jf_renecpin\" valign=\"top\" class=\"lebl\">Re-enter New Password<span style=\"color:red;\">*</span></td>
                <td class=\"inpt\"><input type=\"password\" class=\"text\" name=\"frenecpin\" size=\"30\"></td>
            </tr>
            <tr>
                <td colspan=\"2\" class=\"dhdr\" align=\"center\">
                <input type=\"submit\" name=\"submit\" value=\"Confirm>>\" ><input type=\"hidden\" name=\"\" value=\"\"> </td>
            </tr>
           </table>

    </form> ";

    echo $msg;

    ?>
