<?php
   echo $this->session->flashdata('message');
?>
<html>
    <head>
        <title>Feedback</title>
    <script language="javascript">
    function valis(){
	if(document.forms.feedback.name.value==""){
		alert ("Please Enter user name");
		document.forms.feedback.name.focus();
		return false;
	}
	if(document.forms.feedback.email.value==""){
		alert ("Please Enter email address");
		document.forms.feedback.email.focus();
		return false;
	}
	if(document.forms.feedback.remark.value==""){
		alert ("Please Enter remarks");
		document.forms.feedback.remark.focus();
		return false;
	}
	 return true;
 }
</script>
    </head>
<body>

<form method="POST" name="feedback" action="<?php echo base_url(); ?>main/parse_feedback" onSubmit="return valis();">
<div style="margin-left:10px; background-image:url(<?php echo base_url(); ?>res/images/title-banner.png); background-repeat: no-repeat; height:37px; color:#FFF; font-size:24px; padding:5px 0 0 15px;"> Feedback </div>

<div class="data">
 <table width="600" style="border:1px solid #DDD;"  class="tbl" align="center">
 <tr>
    	<td colspan="2" class=\"dhdr\">
    	   Your personal and valuable feedback, customer experience will be is the key asset for us for the future developement of Mountain Overalnd Pvt. Ltd.. 
    	   <br />
    	   Please feel free to send us your comments and suggestions.
    	
    	 </td>
    </tr>
  <tr>
        <td valign="top" class="lebl">Name<span style="color:red;">*</span> :</td>
        <td class="inpt"><input type="text" name="name" size="50" value="" /></td>
  </tr>
  <tr>
        <td valign="top" class="lebl">Email<span style="color:red;">*</span> :</td>
        <td class="inpt"><input type="text" name="email" size="50" value="" /></td>
  </tr>
  <tr>
        <td valign="top" class="lebl">Remarks <span style="color:red;">*</span> :</td>
        <td><textarea type="text" name="remark" rows="10" cols="50"></textarea></td>
  </tr>
  <tr>
  	<td colspan="2"><?php /*echo $image; */?></td>
  </tr>

  <tr>
  	<td valign="top" class="lebl">Code<span style="color:red;">*</span> :</td>
	<td class="inpt"><input type="text" name="word"  /></td>
  </tr>

  <tr>
        <td colspan="2" class="inpt"><input type="submit" name="submit" value="submit"  /></div></td>

  </tr>
 </table>
 </div>
 </form>
</body>
</html>




