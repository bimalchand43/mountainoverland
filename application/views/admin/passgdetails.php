<?php
$CI="";
$totAmolunt="";
$CI =& get_instance();
$CI->load->helper('url');
$this->load->helper('form');
$this->load->helper('html');

//echo $_POST['id'];
//echo $_POST['seatnum'];
 $seatnum = explode(",",$_POST['seatnum']);
//$arrseat = new array();

$i=0;
/*foreach($seatnum as $seat)
{
	$arrseat[$i] = $seat;

	$i++;
}*/

//$arrseat = array($seatnum);
//echo $_POST['tpassg'];


 foreach($query as $row)
  {
   //echo $row->fare; 
  }
  //echo $id;
   $totAmolunt=$row->fare * $_POST['tpassg'];
  
?>

<script language="javascript">
function toggle(divId) {
	var divArray = document.getElementsByTagName("div");
	for(i = 0; i < divArray.length; i++){
		if(divArray[i].id == divId){
			if(divArray[i].style.display != 'none'){
				divArray[i].style.display = 'none';
			}else{
				divArray[i].style.display = '';
			}
		}
	}
}
</script>


<table  border=0 class="tbl_border"  width="78%">
    <tr bgcolor="#CCCCCC">
    	<td colspan="4"><?Php  echo $_POST['tpassg']; ?> Bus Ticket(s) from <?Php  echo $row->rFrom; ?> to <?Php  echo $row->rTo; ?>  </td>
        <td colspan="2"> Total fare : NRs. <?Php echo number_format($totAmolunt,2); ?></td>        
        
    </tr>
	<tr>
    	<td width=20%>Bus Name</td>
        <td width=5%>:</td>
        <td width=20%> <?Php  echo $row->busName; ?></td>
        <td width=20%> Bus No.</td>
        <td width=5%> :</td>
        <td width=20%> <?Php  echo $row->busNo; ?></td>
    </tr>
    <tr>
    	<td width=20%>Departure From</td>
        <td width=5%>:</td>
        <td width=20%> <?Php  echo $row->rFrom; ?></td>
        <td width=20%> Going To.</td>
        <td width=5%> :</td>
        <td width=20%> <?Php  echo $row->rTo; ?></td>
    </tr>
    <tr>
    	<td width=20%>No. of Passengers</td>
        <td width=5%>:</td>
        <td width=20%> <?Php  echo $_POST['tpassg']; ?></td>
        <td width=20%>Departure Time</td>
        <td width=5%> :</td>
        <td width=20%> <?Php  echo $row->departure_time; ?></td>
    </tr>
</table>
<br/>
<br/>




<form  method="post" action="<?php echo $action; ?>">
<div  id="non-descript">
<table class="tbl_border" width="78%">
    <tr bgcolor="#CCCCCC">
        	<td colspan="5"> Master Passanger Details & Contact Information </td>
        </tr>
	<tr>
        <td> Name(Master Passenger) </td>
    	<td> <input type="text" name="mast_fname" value="" size="50" /></td>
        <td colspan="2">&nbsp; </td>
    </tr>
    <tr>
        	<td> Address : </td>
            <td><input type="text" name="address" value="" size="50"/> </td>
            <td> Email ID : </td>
            <td><input type="text" name="email" value="" size="25"/> </td>
            
        </tr>
        
        <tr>
        	<td> Phone No. : </td>
            <td><input type="text" name="phone" value="" size="25"/> </td>
            <td>Mobile No. :</td>
             <td><input type="text" name="mobile" value="" size="25"/> </td>
        </tr>
         <tr>
        	<td class="lebl"> Nationality : </td>
            <td><input type="text" name="mnationality" value="" size="25"/> </td>
            <td class="lebl">Passport/ID No :</td>
             <td><input type="text" name="midno" value="" size="25"/> </td>
        </tr>
        <tr>
        	<td class="lebl"> Age : </td>
            <td><input type="text" name="mage" value="" size="25"/> </td>
            <td class="lebl">Gender :</td>
             <td><select name="mgender">
            	<option value="M">Male </option>
                <option value="F">Female</option>
                <option value="O">Other</option>
                </select></td>
        </tr>
</table>
</div>
Fill Passanger List <input type="checkbox" checked onClick="toggle('descr');">
<div id="descr" ><table class="tbl_border" width="78%">
		<tr bgcolor="#CCCCCC">
        	<td colspan="5"> Passanger List Details & Contact Information </td>
        </tr>
        <tr>
        	<th>&nbsp;  </th>
            <th> Fullname </th>
            <th> Nationality </th>
            <th> Passport/ID No. </th>
            <th> Gender </th>
            <th> Age </th>
            <th> Seat No. </th>
        </tr>
        <?php
		$k=0;
		$tpass=$_POST['tpassg'];
		for($i=1; $i<= $tpass; $i++)
		{
		?>
        <tr>
        	<td> Passanger <?php echo $i; ?></td>
            <td> <input type="text" name="fname[]" value="" size="50"> </td>
            <td> <input type="text" name="nationality[]" value="" size="12"> </td>
            <td> <input type="text" name="idno[]" value="" size="16"> </td>
            <td> <select name="gender[]">
            	<option value="M">Male </option>
                <option value="F">Female</option>
                <option value="O">Other</option>
                </select></td>
            <td> <input type="text" name="age[]" value="" size="5"></td>
            <td><?php echo $seatnum[$k]; ?> <input type="hidden" name="seat[]" value="<?php echo $seatnum[$k];  ?>" /> </td>
        </tr>
        <?php
		$k++;
		}?>



</table>
</div>
<table>
	<tr align="right">
        	<td colspan="2">&nbsp; </td>
            <td colspan="2">&nbsp; </td>
            <td colspan="3">
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <input type="hidden" name="dptdate" value="<?php echo $dptdate ?>" />
            <input type="hidden" name="seatn" value="<?php echo $_POST['seatnum']; ?>"/>
            <input type="hidden" name="no_of_seat" value="<?Php  echo $_POST['tpassg']; ?>"/>
            <input type="submit" name="submit" value="Submit >>"</td>
        </tr>
</table>

</form>
