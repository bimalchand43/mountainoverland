<?php

 foreach($query as $rows){  
 
 }
 ?>
<html>
<head>
<title> </title>
</head>
<body>
<form name="" action="../create_bus/parseNewBus" method="post" />
<div class="data">
<table width="600" border=0   cellpadding="2" cellspacing="5" align="center">
	<tr>
    	<td colspan="2" class=\"dhdr\"><center><h3>New Agency Request View Detail</h3></center> </td>
    </tr>
    <tr>
        <td valign="top" class="lebl" width="200"> Submited Date : </td>
    	<td class="inpt"><?php echo $rows->submit_date;?></td>
    </tr>
    <tr>
        <td valign="top" class="lebl"> Business Name : </td>
    	<td class="inpt"><?php echo $rows->business_name;?></td>
    </tr>
    <tr>
        <td valign="top" class="lebl"> Contact Person Name : </td>
    	<td class="inpt"><?php echo $rows->person_name;?></td>
    </tr>
    <tr>
        <td valign="top" class="lebl"> Contact Address : </td>
    	<td class="inpt"><?php echo $rows->address;?></td>
    </tr>
    <tr>
        <td valign="top" class="lebl"> Country : </td>
    	<td class="inpt"><?php echo $rows->country;?></td>
    </tr>
    <tr>
        <td valign="top" class="lebl"> City : </td>
    	<td class="inpt"><?php echo $rows->city;?></td>
    </tr>
    <tr>
        <td valign="top" class="lebl"> Phone No.: </td>
    	<td class="inpt"><?php echo $rows->phone;?></td>
    </tr>
    <tr>
        <td valign="top" class="lebl"> Mobile No.: </td>
    	<td class="inpt"><?php echo $rows->mobile;?></td>
    </tr>
    <tr>
        <td valign="top" class="lebl"> Email Address: </td>
    	<td class="inpt"><?php echo $rows->email;?></td>
    </tr>
     <tr>
        <td valign="top" class="lebl"> Branch Name: </td>
    	<td class="inpt"><?php echo $rows->comp_name;?></td>
    </tr>
    <tr>
    	<td colspan="2" class=\"dhdr\"><h3>&nbsp;</h3></td>
    </tr>
    
</table>
</div>
</form>
</body>
</html>
