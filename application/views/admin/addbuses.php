<?php
$msg="<select name=\"rootid\">";
 foreach($query as $rows){  
  //echo $rows->root_id;
  $msg.="<option value=\"$rows->root_id\">$rows->rFrom - $rows->rTo </option>";	
  
 }
 $msg.="</select>";
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
    	<td colspan="2" class=\"dhdr\"><center><h3>Add new Bus</h3></center> </td>
    </tr>
    <tr>
        <td valign="top" class="lebl"> Select Company Name<span style="color:red;">*</span> </td>
    	<td class="inpt"><select name="compid">
        	<option value="10001">Mountain Overland Travels & Tours (P). Ltd</option> 
            </select>        
         </td>
    </tr>
    <tr>
        <td class="lebl">Select Root<span style="color:red;">*</span> </td>
    	<td class="inpt"> <?php echo $msg; ?>   </td> 
     </tr>
    <tr>
    	<td class="lebl"> Bus No. </td>
        <td class="inpt"><input type="text" name="busno" value="" class="text" size="25"> </td>
    </tr>
    
     <tr>  
       <td class="lebl">Ticket Amount per seat<span style="color:red">*</span> </td>
    	<td class="inpt"> <input type="text" name="rate" value="" class="text" size="25"></td>           
    </tr>
    <tr>
    	<td class="lebl"> Departure Time <span style="color:red">*</span></td>
        <td class="inpt"><input type="text" name="deptime" value="" class="text" size="15">
        	<select name="ampm">
            	<option value="AM">AM </option>
                <option value="PM">PM </option>
            </select> 
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