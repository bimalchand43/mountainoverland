<html>
<head>
<title><?php echo $title; ?></title>
<script language="JavaScript">
         fucntion checkDate(dates){
            var d1=new Date();
            d1.toString('dd-mm-yyyy');
            alert();
         }
</script>
<link href="<?php echo base_url(); ?>res/css/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>res/js/calendar.js"></script>
</head>
<body>
<form name="" action="<?php echo $action; ?>" method="post" />
<div class="data">
<table width="600" border=0   cellpadding="2" cellspacing="5" align="center">
	<tr>
    	<td colspan="2" class="dhdr"><center><h3>Add Driver Information</h3></center> </td>
    </tr>
    <tr>
        <td valign="top" class="lebl">Driver's Name<span style="color:red;">*</span> </td>
    	<td class="inpt"><input type="text" name="drivername" value="" class="text" size="25"></td>
    </tr>
    <tr>
        <td class="lebl">Address<span style="color:red;">*</span> </td>
    	<td class="inpt"> <input type="text" name="address" value="" class="text" size="25"> </td>
     </tr>
    <tr>
    	<td class="lebl"> Mobile No.</td>
        <td class="inpt"><input type="text" name="mobileno" value="" class="text" size="25"> </td>
    </tr>

     <tr>
       <td class="lebl">Age<span style="color:red">*</span> </td>
    	<td class="inpt"> <input type="text" name="age" value="" class="text" size="25"></td>
    </tr>
      <tr>
       <td class="lebl">Join Date<span style="color:red">*</span> </td>
    	<td class="inpt"> <input type="text" name="jdate" onclick="displayDatePicker('jdate');" value="" class="text" size="25">
        <a href="javascript:void(0);" onclick="displayDatePicker('jdate');"><img src="<?php echo base_url(); ?>res/css/images/calendar.png" alt="calendar" border="0"></a>
        </td>
    </tr>
    <tr>
       <td class="lebl">Left Date<span style="color:red">*</span> </td>
    	<td class="inpt"> <input type="text" name="ldate" onclick="displayDatePicker('ldate');" value="" class="text" size="25">
        <a href="javascript:void(0);" onclick="displayDatePicker('ldate');"><img src="<?php echo base_url(); ?>res/css/images/calendar.png" alt="calendar" border="0"></a>
        </td>
    </tr>

    <tr>
        <th colspan="2" class="lebl"><input type="submit" name="submit" value="Save" />
            <input type="reset" name="reset" value="Reset" />
        </th>
    </tr>
</table>
</div>
</form>
</body>
</html>
