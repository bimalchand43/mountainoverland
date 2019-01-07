<?php
$this->session->set_userdata('APPL',0);

$blist="<select name=\"branch\">";
 foreach($companyinfo as $rows){
  $blist.="<option value=\"$rows->id\">$rows->comp_name</option>";
 }
 $blist.="</select>";

 $country="<select name=\"country\">
        <option value=\"149\">Nepal</option>
";
 foreach($countries as $rows){
  //echo $rows->root_id;
  $country.="<option value=\"$rows->countries_id\">$rows->countries_name</option>";
 //$aid = $rows->aid;
 }
 $country.="</select>";
?>
<html>
<head>
<title> </title>

<script language="javascript">
function valis(){
	if(document.forms.seat1.binss_name.value==""){
		alert ("Please Enter Business name");
		document.forms.seat1.binss_name.focus();
		return false;
	}
	if(document.forms.seat1.contact_name.value==""){
		alert ("Please Enter Contact Person Name");
		document.forms.seat1.contact_name.focus();
		return false;
	}
	if(document.forms.seat1.address.value==""){
		alert ("Please Enter correct address");
		document.forms.seat1.address.focus();
		return false;
	}
	if(document.forms.seat1.phone.value==""){
		alert ("Please Enter correct mobile Number or phone Number");
		document.forms.seat1.phone.focus();
		return false;
	}
	
	 return true;
 }
</script>

</head>
<body>
<form name="seat1" action="<?php echo base_url(); ?>main/parse_application" method="post"  onSubmit="return valis();"/>
<div style="margin-left:10px; background-image:url(<?php echo base_url(); ?>res/images/title-banner.png); background-repeat: no-repeat; height:37px; color:#FFF; font-size:24px; padding:5px 0 0 15px;"> Request for Agency</div>

<div class="data">
<table width="700" style="border:1px solid #EEEEEE;"  class="tbl" align="center">
	<tr>
    	<td colspan="2" class="dhdr">
    	<div style=" font-family:arial; font-size:13pt; color:#014F83; padding-left:20px; text-align:justify;">

    	   Mountain overland Pvt. Ltd. is looking for business partners as agencies. Your interested to do business joining hand with us will be highly appriciated. 
    	   <br />
    	   Please feel free to make request for agency with Mountain Overland Pvt. Ltd. 
    	   
    	   <br />
    	   </div>
    	</td>
    </tr>
    <tr>
        <td valign="top" class="lebl"> Business Name<span style="color:red;">*</span> </td>
    	<td class="inpt"><input type="text" name="binss_name" value="" class="text" size="40"> </td>
    </tr>
    <tr>
        <td valign="top" class="lebl"> Contact Person Name<span style="color:red;">*</span> </td>
    	<td class="inpt"><input type="text" name="contact_name" value="" class="text" size="40"> </td>
    </tr>
    <tr>
        <td valign="top" class="lebl"> Address<span style="color:red;">*</span> </td>
    	<td class="inpt"><input type="text" name="address" value="" class="text" size="40"> </td>
    </tr>
    <tr>
        <td valign="top" class="lebl"> City<span style="color:red;">*</span> </td>
        <td class="inpt"><input type="text" name="city" value="" class="text" size="40"> </td>
    </tr>
    <tr>
        <td valign="top" class="lebl"> Country<span style="color:red;">*</span> </td>
    	<td class="inpt"><?php echo $country; ?></td>
    </tr>
    <tr>
        <td valign="top" class="lebl"> Phone<span style="color:red;">*</span> </td>
    	<td class="inpt"><input type="text" name="phone" value="" class="text" size="25"> </td>
    </tr>
    <tr>
        <td valign="top" class="lebl">Mobile<span style="color:red;">*</span> </td>
    	<td class="inpt"><input type="text" name="mobile" value="" class="text" size="25"> </td>
    </tr>
    <tr>
        <td valign="top" class="lebl"> Email<span style="color:red;">*</span> </td>
    	<td class="inpt"><input type="text" name="email" value="" class="text" size="40"> </td>
    </tr>
    <tr>
        <td valign="top" class="lebl"> Requested Branch<span style="color:red;">*</span> </td>
    	<td class="inpt"><?php echo $blist;?> </td>
    </tr>

    <tr>
        <th colspan="2" class="lebl"><input type="submit" name="submit" value="Apply" />
            <input type="reset" name="reset" value="Reset" />
        </th>
    </tr>
</table>
</div>
</form>
</body>
</html>