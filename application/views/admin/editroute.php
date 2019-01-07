<?php
$routefrom="<select name=\"routefrom\">";

 foreach($query as $rows){
   foreach($query1 as $row){ 
		  
			$selected = "";
		    if($rows->rFrom == $row->city_name)
			$selected="Selected"; 
			$city_name=$row->city_name;
			$routefrom.="<option value=\"$rows->rFrom\" $selected>$city_name</option>";	
		  
   }
 }
 $routefrom.="</select>";
 
 $routeto="<select name=\"routeto\">";

 foreach($query as $rows){
   foreach($query1 as $row){ 
		  
			$selected = "";
		   if($rows->rTo == $row->city_name)
			$selected="Selected"; 
			$city_name=$row->city_name;
			$routeto.="<option value=\"$rows->rTo\" $selected>$city_name</option>";	
		  
   }
 }
 $routeto.="</select>";
 ?>
<html>
<head>
<title> </title>
</head>
<body>
<form name="" action="<?php echo $action ?>" method="post" />
	<div class = "data">
<table width="600" border=0   cellpadding="2" cellspacing="5" align="center">
	<tr>
    	<td colspan="2" class="dhdr"><center><h3>Edit Route</h3></center> </td>
    </tr>
    
    <tr>
        <td valign="top" class="lebl">Select Departure From </td>
    	<td class="inpt"> <?php echo $routefrom; ?>   </td> 
     </tr>
    <tr>
        <td valign="top" class="lebl">Select Departure To </td>
    	<td class="inpt"> <?php echo $routeto; ?>   </td> 
     </tr>
    
    <tr>
        <th class="lebl" colspan="2"><input type="submit" name="submit" value="Save" /> 
            <input type="reset" name="reset" value="Reset" />
            <input type="hidden" name="id" value="<?php echo $rows->root_id ?>" />
        </th>
    </tr>
</table>
</div>
</form>
</body>
</html>