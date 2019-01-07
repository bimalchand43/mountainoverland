<?php
$drivername = "";
$msg="";
$busnum = "";
$drivername.="<select name=\"bdid\">";
 foreach($qry_driver as $rows){
  $drivername.="<option value=\"$rows->id\">$rows->name</option>";
 }
 $drivername.="</select>";

 $msg.="<select name=\"rootid\">";
 foreach($qry_route as $row){
  //echo $rows->root_id;
  $msg.="<option value=\"$row->root_id\">$row->rFrom - $row->rTo </option>";

 }
 $msg.="</select>";

 $busnum.="<select name=\"busno\">";
 foreach($qry_busnumber as $row){
  //echo $rows->root_id;
  $busnum.="<option value=\"$row->bus_id\">$row->busNo </option>";

 }
 $busnum.="</select>";
?>
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
    	<td colspan="2" class="dhdr"><center><h3>Add Expenses Information</h3></center> </td>
    </tr>
    <tr>
       <td class="lebl">Date<span style="color:red">*</span> </td>
    	<td class="inpt"> <input type="text" name="date" onclick="displayDatePicker('date');" value="" class="text" size="25">
        <a href="javascript:void(0);" onclick="displayDatePicker('date');"><img src="<?php echo base_url(); ?>res/css/images/calendar.png" alt="calendar" border="0"></a>
        </td>
    </tr>
    <tr>
        <td valign="top" class="lebl">Driver's Name<span style="color:red;">*</span> </td>
    	<td class="inpt"><?php echo $drivername; ?></td>
    </tr>
    <tr>
        <td valign="top" class="lebl">Bus Number<span style="color:red;">*</span> </td>
    	<td class="inpt"><?php echo $busnum; ?></td>
    </tr>
    <tr>
        <td class="lebl">Route<span style="color:red;">*</span> </td>
    	<td class="inpt"><?php echo $msg; ?> </td>
     </tr>
    <tr>
    	<td class="lebl">Expense By<span style="color:red;">*</span></td>
        <td class="inpt">
        <select name="expenseby" class="text" >
        <option value="D">Driver</option>
        <option value="B">Bus</option>
        </select></td>
    </tr>

     <tr>
       <td class="lebl">Remarks<span style="color:red">*</span> </td>
    	<td class="inpt"><textarea name="remarks" cols="20" rows="3" class="text"></textarea></td>
    </tr>
     <tr>
       <td class="lebl">Amount<span style="color:red">*</span> </td>
    	<td class="inpt"><input type="text" name="amount" value="" class="text"></td>
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

