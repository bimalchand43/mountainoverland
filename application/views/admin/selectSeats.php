<?php

$CI="";
$CI =& get_instance();
$CI->load->helper('url');
$this->load->helper('form');
$this->load->helper('html');
$sets="";
$tAmolunt="";
//echo $dptdate;
if(isset($_POST['submit'])){
   	$sets =$_POST['seatnum'];
	
   }

	$seatnumbe = explode(",",$sets);

   //echo base_url();

 //echo $sets;
//print_r($seatnumbe);
  foreach($query as $row)
  {
   $fare =number_format($row->fare,2);
   //echo $row->rFrom;
   //echo $row->rTo;
   //echo $row->busNo;
  }
  if(isset($_POST['submit'])){
   	$sets =$_POST['seatnum'];
	 $tAmolunt=number_format($row->fare * $_POST['tpassg'],2);

	 if($tAmolunt == 0){
	   $tAmolunt="";
	 }
   }


  $seatnos="";
  $t=0;
  foreach($query1 as $data)
  {
  	if($t > 0)
		$seatnos.= ",";
  	$seatnos.= $data->seat_no;

    $t++;
  }
    $seatnos;
    $seatnumber= explode(",",$seatnos);

//echo $id;

//$arrseatno = array(2,3,10,11,18,19,26,27,35,1,4,9,12,17,20,25,28,34,33,5,8,13,16,21,24,29,32,6,7,14,15,22,23,30,31);
//$arrseatno = array(1,3,7,11,15,19,23,27,31,2,4,8,12,16,20,24,28,32,33,6,10,14,18,22,26,30,34,5,9,13,17,21,25,29,35);
  $arrseatno = array(1,3,5,7,9,11,13,15,17,2,4,6,8,10,12,14,16,18,19,34,32,30,28,26,24,22,20,35,33,31,29,27,25,23,21);
$k=0;
$selectseatno=0;

echo $this->session->flashdata('message');
$showseat="


<script type=\"text/javascript\">
Array.prototype.remove = function(from, to) {
  var rest = this.slice((to || from) + 1 || this.length);
  this.length = from < 0 ? this.length + from : from;
  return this.push.apply(this, rest);
};

function removeByIndex(arrayName,arrayIndex){
	arrayName.splice(arrayIndex,1);
}

arrseatsel = [];
function showSeatno(seatno,fare){
	<!--alert(\"You Selected Seat No: \"+seatno);-->
     //alert(fare);
	 var totfare=0;
	var seats;
	var sname;
	var tseat='';
	//seats=+seatno.toString()+',';

	//tseat= tseat.toString()+''+seats.toString();
	sname= 'img'+seatno;
	//alert(document.getElementById(sname).src);
 //	var isselect ='http://localhost/busbooking/res/images/selectseat.jpg';
    var isselect ='".base_url()."res/images/selectseat.jpg';
	if(document.getElementById(sname).src == isselect)
	{
		document.getElementById(sname).src = \"".base_url()."res/images/seat.jpg\";
		arrseatsel.splice(arrseatsel.indexOf(seatno), 1);
		/*
		while (arrseatsel.indexOf(seatno) !== -1) {
			arrseatsel.splice(arrseatsel.indexOf(seatno), 1);
		  //delete arrseatsel[arrseatsel.indexOf(seatno)];
		  //delete arrseatsel[seatno];
		 // arrseatsel = reIndexArray(arrseatsel);
		}*/
	}else{
		document.getElementById(sname).src = \"".base_url()."res/images/selectseat.jpg\";
		arrseatsel.push(seatno);
	}


	if(arrseatsel.length > 0)
	{
		//alert(arrseatsel.length);
		for(i=0;i<arrseatsel.length;i++)
		{
			if(i>0){
			tseat+=',';
			//alert(i);
			}
			tseat+=arrseatsel[i].toString();
		}
	}
	 //alert(tseat);

	totfare=fare * arrseatsel.length;
	//alert(totfare);
	document.seat.seatnum.value= tseat;
	document.seat.seatnumb.value= tseat;
	document.getElementById(\"selseat\").innerHTML=tseat;
	document.getElementById(\"tfare\").innerHTML=\"Total Amount:\"+totfare.toFixed(2);
	document.seat.tpassg.value= arrseatsel.length;


}





</script>

<h3 align=\"center\" style=\"padding: 15px;\"> Bus Ticket Booking Form </h3>
<table  border=0 class=\"tbl_border\"  width=\"100%\">
	<tr>
	    <td width=\"20%\" class=\"lebl\"> Bus No.</td>
        <td width=\"20%\" class=\"inpt\"> $row->busNo</td>
		<td width=\"20%\" class=\"lebl\">Departure Time</td>
        <td width=\"20%\" class=\"inpt\"> $row->departure_time</td>
    </tr>
    <tr>
    	<td width=\"20%\" class=\"lebl\">Departure From</td>
        <td width=\"20%\" class=\"inpt\"> $row->rFrom</td>
        <td width=\"20%\" class=\"lebl\"> Going To.</td>
        <td width=\"20%\" class=\"inpt\">$row->rTo</td>
    </tr>
    <tr>
	    <td width=\"20%\" class=\"lebl\">Departure Date</td>
        <td width=\"20%\" class=\"inpt\"> $dptdate</td>
    	<td width=\"20%\" class=\"lebl\">Fare per seat</td>
        <td width=\"20%\" class=\"inpt\">$fare</td>
    </tr>
</table>

<form name=\"seat\" method=\"post\" action=\"$action\">
<table  width=\"100%\" border=\"0\" cellpadding=\"10\" cellspacing=\"10\" align=\"left\" style=\"border:0px solid #CCC;\" >
<tr>
<td width=\"75%\" align=\"left\">
		<table border=\"0\" cellpadding=\"0\" cellspacing=\"5\" align=\"left\" style=\"width:660px; border:3px solid #CCC;\">";
		//echo $fare;
		 for ($i=1; $i<=5; $i++)
		  {
							$showseat.="<tr> ";
							for ($j=1; $j<=9; $j++){

								if($i==3 and ($j>= 1 and $j <= 8)){
									$showseat.="<td align=\"center\" valign=\"middle\">&nbsp;
								 </td>";
								 }else if($i==5and $j == 1){
									$showseat.="<td align=\"center\" valign=\"middle\" >&nbsp;
								 </td>";
								 }else if($i==4and $j == 1){
									$showseat.="<td align=\"center\" valign=\"middle\" >&nbsp;
								 </td>";
								 }else{

								 	for($s=0;$s<sizeof($seatnumber);$s++){

										if($seatnumber[$s] == $arrseatno[$k]){
											$bookedseat=$seatnumber[$s];
											break;
										}else{
											$bookedseat = 0;
										}

									}
									for($t=0;$t<sizeof($seatnumbe);$t++){

										if($seatnumbe[$t] == $arrseatno[$k]){
											$selectseats=$seatnumbe[$t];
											break;
										}else{
											$selectseats = 0;
										}

									}


									//echo $bookedseat;
									if($bookedseat > 0){
										$showseat.="<td align=\"center\" valign=\"middle\">
										 <img id=\"img$arrseatno[$k]\" src=\"".base_url()."res/images/seatsel.jpg\" >$arrseatno[$k]
								  </td>";

								   } else if($selectseats > 0){
                                       if($sets == ""){
      								        $showseat.="<td align=\"center\" valign=\"middle\">
      										 <a href=\"#\" class=\"vtip\" title=\"Seat No: ".$arrseatno[$k]."\" align=\"middle\">
      										 <img id=\"img$arrseatno[$k]\" src=\"".base_url()."res/images/selectseat.jpg\"/></a>$arrseatno[$k]
      								         </td>";
                                        }else{
                                            $showseat.="<td align=\"center\" valign=\"middle\"><img id=\"img$arrseatno[$k]\" src=\"".base_url()."res/images/seatsel.jpg\"/></a>$arrseatno[$k]
      								         </td>";
                                        }

									}else{
                                        if($sets == ""){
    									    $showseat.="<td align=\"center\" valign=\"middle\">
    										 <a href=\"#\" class=\"vtip\" title=\"Seat No: ".$arrseatno[$k]."\" align=\"middle\">
    										 <img id=\"img$arrseatno[$k]\" src=\"".base_url()."res/images/seat.jpg\" onClick=\"showSeatno($arrseatno[$k],$fare);\" /></a>$arrseatno[$k]
    								        </td>";
                                        }else{
                                             $showseat.="<td align=\"center\" valign=\"middle\"><img id=\"img$arrseatno[$k]\" src=\"".base_url()."res/images/seat.jpg\"/></a>$arrseatno[$k]
    								        </td>";
                                        }
								  }

								 $k++;
								 }
							}
							$showseat.="</tr>";

		 }
		$showseat.=" <input type=\"hidden\" id=\"selectseat\" name=\"seatnum\" value=\"\">
					 <input type=\"hidden\" name=\"id\" value=\"$id\">
					 <input type=\"hidden\" name=\"dpdate\" value=\"$dptdate\">
					 <input type=\"hidden\" id=\"selectseat\" name=\"tpassg\" value=\"\">




		</table>
</td>
<td valign=\"top\" width=\"25%\" text-align=\"left\" style=\"background-color : #FDF2BD;\">
        Selected Seat No.:  $sets
        <div id=\"selseat\" >
            <input type=\"hidden\" name=\"seatnumb\" value=\"\">
        </div>

		 ";
        if($sets == ""){
        $showseat.=" <div id=\"tfare\" width=40px> </div>
        <input type=\"submit\" name=\"submit\" value=\"Continue&gt;&gt;\">";
        }else{
            $showseat.="Total Amount : $tAmolunt <div id=\"tfare\" width=40px> </div>";
        }
		$showseat.="<input type=\"submit\" onSubmit=\"window.location.reload();\" value=\"Reset\">
</td>


<tr>
	<td><table border=0 style=\"width:620px;\">
				<tr>
					<td><img src=\"".base_url()."res/images/seat.jpg\"/>  Available Seat </td>
					<td><img src=\"".base_url()."res/images/seatsel.jpg\"/> Booked Seat</td>
					<td><img src=\"".base_url()."res/images/selectseat.jpg\"/> Selected Seat</td>
				</tr>

	 </table>
	 </td>
</tr>
</tr>
</table>

</form>

";

echo $showseat;
?>
<?php
$this->session->set_userdata('CNEC',0);
if(isset($_POST["submit"])){
$totAmolunt="";
$tpass=0;
$i=0;
 $seatnum = explode(",",$_POST['seatnum']);

 foreach($query1 as $rows)
  {
   //echo $rows->rate; die();
  }
  //echo $id;
   $totAmolunt=$row->fare * $_POST['tpassg'];
$tpass=$_POST['tpassg'];

if($tpass !=0){
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


function valis(){
	if(document.forms.seat1.mast_fname.value==""){
		alert ("Please Enter Master passanger name");
		document.forms.seat1.mast_fname.focus();
		return false;
	}
	if(document.forms.seat1.address.value==""){
		alert ("Please Enter Master passanger address");
		document.forms.seat1.address.focus();
		return false;
	}
	if(document.forms.seat1.phone.value==""){
		alert ("Please Enter Master passanger phone");
		document.forms.seat1.phone.focus();
		return false;
	}

	 return true;
 }
</script>

<form  method="post" name="seat1" action="<?php echo $action1; ?>" onSubmit="return valis();">


<table class="tbl_border" width="100%" style="clear:both;">
    <tr bgcolor="#CCCCCC">
        	<td colspan="4" class="dhdr"> Master Passanger Details & Contact Information </td>
        </tr>
	<tr>
        <td class="lebl"> Name(Master Passenger) </td>
    	<td> <input type="text" name="mast_fname" value="" size="50" /></td>
        <td colspan="2">&nbsp; </td>
    </tr>
    <tr>
        	<td class="lebl"> Address : </td>
            <td><input type="text" name="address" value="" size="50"/> </td>
            <td class="lebl"> Email ID : </td>
            <td><input type="text" name="email" value="" size="25"/> </td>

        </tr>

        <tr>
        	<td class="lebl"> Phone No. : </td>
            <td><input type="text" name="phone" value="" size="25"/> </td>
            <td class="lebl">Mobile No. :</td>
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



Fill Passanger List <input type="checkbox" checked onClick="toggle('descr');">
<div id="descr"><table class="ltable" width="100%">
        <tr bgcolor="#CCCCCC">
        	<td colspan="5"> Passanger List Details & Contact Information </td>
        </tr>
        <tr>
        	<th>&nbsp;  </th>
            <th> Fullname </th>
            <th> Nationality</th>
            <th> Passport/ID No</th>
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
        	<td> <?php echo $i; ?></td>
            <td> <input type="text" name="fname[]" value="" size="40"> </td>
            <td> <input type="text" name="nationality[]" value="" size="12"> </td>
            <td> <input type="text" name="idno[]" value="" size="16"> </td>
            <td> <select name="gender[]">
            	<option value="M">Male </option>
                <option value="F">Female</option>
                <option value="O">Other</option>
                </select></td>
            <td> <input type="text" name="age[]" value="" size="3"></td>
            <td><?php echo $seatnum[$k]; ?> <input type="hidden" name="seat[]" value="<?php echo $seatnum[$k];  ?>" /> </td>
        </tr>
        <?php
		$k++;
		}?>



</table>
</div>

<table class="tbl_border" width="100%">
	<tr align="right">
        	<td colspan="8">&nbsp; </td>
            <td colspan="">
            <input type="hidden" name="id" value="<?php echo $id ?>" />
            <input type="hidden" name="dptdate" value="<?php echo $dptdate ?>" />
            <input type="hidden" name="seatn" value="<?php echo $_POST['seatnum']; ?>"/>
            <input type="hidden" name="no_of_seat" value="<?Php  echo $_POST['tpassg']; ?>"/>
            <input type="submit" name="submit1" value="Submit >>"</td>
        </tr>
</table>

</form>

<?php
}
}
?>
