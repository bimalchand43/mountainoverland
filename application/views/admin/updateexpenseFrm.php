<?php
$busnum = "";
$drivername = "";
$route="";
$drivername.="<select name=\"bdid\">";
foreach($explist as $exp){
 foreach($qry_driver as $rows){
    $selected = "";
		    if($exp->bdId == $rows->id)
			$selected="Selected";
			$name=$rows->name;
  $drivername.="<option value=\"$rows->id\" $selected>$name</option>";
 }
}
 $drivername.="</select>";



$route="<select name=\"rootid\">";

 foreach($explist as $exp){

   foreach($qry_route as $row){

			$selected = "";
		    if($exp->route == $row->root_id)
			$selected="Selected";
			$root_name=$row->rFrom.'-'.$row->rTo;
			$route.="<option value=\"$row->root_id\" $selected>$root_name</option>";

   }
 }
 $route.="</select>";

 $busnum.="<select name=\"busno\">";
 foreach($explist as $exp){
    foreach($qry_busnumber as $row){
            $selected = "";
		    if($exp->busid == $row->bus_id)
			$selected="Selected";
			$busNo=$row->busNo;
  //echo $rows->root_id;
  $busnum.="<option value=\"$row->bus_id\" $selected>$busNo </option>";
    }
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
    	<td colspan="2" class="dhdr"><center><h3>Update Expenses Information</h3></center> </td>
    </tr>
    <tr>
       <td class="lebl">Date<span style="color:red">*</span> </td>
    	<td class="inpt"> <input type="text" name="date" onclick="displayDatePicker('date');" value="<?php echo $exp->date; ?>" class="text" size="25">
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
    	<td class="inpt"><?php echo $route; ?> </td>
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
    	<td class="inpt"><textarea name="remarks" cols="20" rows="3" class="text"><?php echo $exp->remarks; ?></textarea></td>
    </tr>
     <tr>
       <td class="lebl">Amount<span style="color:red">*</span> </td>
    	<td class="inpt"><input type="text" name="amount" value="<?php echo $exp->amount; ?>" class="text"></td>
    </tr>
    <tr>
        <th colspan="2" class="lebl"><input type="submit" name="submit" value="Save" />
            <INPUT TYPE="BUTTON" VALUE="Go Back" ONCLICK="history.go(-1)">
            <input type="hidden" name="id" value="<?php echo $exp->id; ?>" />
            <input type="reset" name="reset" value="Reset" />
        </th>
    </tr>
</table>
</div>
</form>
</body>
</html>
