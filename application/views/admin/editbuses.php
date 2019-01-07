<?php
$selectedAM="";
$selectedPM="";
$msg="<select name=\"rootid\">";

 foreach($query as $rows){
   foreach($query1 as $row){ 
		  
			$selected = "";
		    if($rows->root_id == $row->root_id)
			$selected="Selected"; 
			$root_name=$row->rFrom.'-'.$row->rTo;
			$msg.="<option value=\"$row->root_id\" $selected>$root_name</option>";	
		  
   }
 } 
 $msg.="</select>";
 //echo $rows->ampm;
 if($rows->ampm == "AM") $selectedAM = "Selected";
 if($rows->ampm == "PM") $selectedPM = "Selected";
 
 ?>
<html>
<head>
<title> </title>
</head>
<body>
<form name="" action="<?php echo $action ?>" method="post" />
<div class="data">
<table width="600" border=0   cellpadding="2" cellspacing="5" align="center">
	<tr>
    	<td colspan="2" class="dhdr"><center><h3>Edit Bus</h3></center> </td>
    </tr>
    <tr>
        <td class="lebl"> Select Company Name </td>
    	<td class="inpt"><select name="compid">
        	<option value="10001">Payas Travels & Tours (P). Ltd</option> 
            </select>        
         </td>
    </tr>
    <tr>
        <td class="lebl">Select Root </td>
    	<td class="inpt"> <?php echo $msg; ?>   </td> 
     </tr>
    <tr>
    	<td class="lebl"> Bus No. </td>
        <td class="inpt"><input type="text" name="busno" class="text" value="<?php echo $rows->busNo ?>" size="25"> </td>
    </tr>
    
     <tr>  
       <td class="lebl">Ticket Amount per seat </td>
    	<td class="inpt"> <input type="text" name="rate" class="text" value="<?php echo $rows->fare ?>" size="25"></td>           
    </tr>
    <tr>
    	<td class="lebl"> Departure Time </td>
        <td class="inpt"><input type="text" name="deptime" class="text" value="<?php echo $rows->departure_time ?>" size="15">
            <select name="ampm">
            	<option value="AM" <?php echo $selectedAM; ?>>AM </option>
                <option value="PM" <?php echo $selectedPM; ?>>PM </option>
            </select>
         </td>
    </tr>
    
    <tr>
        <th class="lebl" colspan="2"><input type="submit" name="submit" value="Save" /> 
            <input type="reset" name="reset" value="Reset" />
            <input type="hidden" name="id" value="<?php echo $rows->bus_id ?>" />
        </th>
    </tr>
</table>
</div>
</form>
</body>
</html>