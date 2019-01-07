<?php

 $routefrom="<select name=\"routefrom\">";
 $routefrom.="<option value=\"\">Select Departure From </option>";
 foreach($query as $rows){ 	
    $routefrom.="<option value=\"$rows->city_name\">$rows->city_name</option>";	
}
 $routefrom.="</select>";
 
 $routeto="<select name=\"routeto\">";
 $routeto.="<option value=\"\">Select Departure To</option>";
 foreach($query as $row){ 
   
    $routeto.="<option value=\"$row->city_name\">$row->city_name</option>";	
}
 $routeto.="</select>";
?>
<html>
<head>
<title> </title>
</head>
<body>
<form name="" action="../admin_rout/parseNewRout" method="post" />
<div class="data">
<table width="600" border=0   cellpadding="2" cellspacing="5" align="center">
	<tr>
    	<td colspan="2" class=\"dhdr\"><center><h3>Add new Route</h3></center> </td>
    </tr>
   
    <tr>
    	<td class="lebl" valign="top"> Departure From </td>
        <td class="inpt"><?php echo $routefrom; ?></td>
    </tr> 
    <tr>
    	<td class="lebl" valign="top"> Departure To </td>
        <td class="inpt"><?php echo $routeto; ?></td>
    </tr>     
     <tr>
        <th class="lebl" colspan="2"><input type="submit" name="submit" value="Save" /> 
            <input type="reset" name="reset" value="Reset" />
        </th>
    </tr>
</table>
</div>
</form>
</body>
</html>