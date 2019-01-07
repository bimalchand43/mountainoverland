<?php
$routefrom="<select name=\"cboFrom\">";
 foreach($query_city as $rows){ 	
    $routefrom.="<option value=\"$rows->city_name\">$rows->city_name</option>";	
}
 $routefrom.="</select>";
 
 $routeto="<select name=\"cboTo\">";
 foreach($query_city as $row){ 
   
    $routeto.="<option value=\"$row->city_name\">$row->city_name</option>";	
}
 $routeto.="</select>";
?>

<link href="<?php echo base_url(); ?>res/css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>res/css/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>res/js/calendar.js"></script>
    <form name="" method="post" action="../onlinebooking/busSearch">
            <table class='tblsearch' width=100% border=0 cellpadding="5" cellspacing="2">
                <tr class="img">
                    <th colspan="7"><h3>Online Bus Tickets Booking</h3></th>
                </tr>
                <tr>
                    <td>Departure From </td>
                     <td><?php echo $routefrom; ?></td>
                    <td>Arrival To</td>
                     <td><?php echo $routeto; ?></td>
                    <td colspan=2>Departure date</td>
                     <td colspan="2"><input type="text" name="dept_date" onclick="displayDatePicker('dept_date');" value="<?php echo date('d-m-Y') ?>"/>
                    <a href="javascript:void(0);" onclick="displayDatePicker('dept_date');"><img src="<?php echo base_url(); ?>res/css/images/calendar.png" alt="calendar" border="0"></a></td>
                    <td align="left"><input type="submit" name="submit" value="Search >>" /></td>
                </tr>
                
            </table>
       </form>
       <hr/>


<?php


if(isset($_POST['submit'])){


$busnumber="";
$busnum="A";

foreach($buseslist as $data){
//echo $data->busno;
$busnum =$busnum.','.$data->busno;
 
}
$busnmb = explode(",",$busnum); 
//print_r($busnmb);



$busnumb="A";
foreach($buslist as $row){
 //echo $row->busNo;
$busnumb =$busnumb.','.$row->busNo;
 }
$busn = explode(",",$busnumb);  
//print_r($busn);


$msg="<form>
      <table class=\"tbl_border\"  cellspacing=2 cellpadding=3 bgcolor=\"\" width=\"100%\">
	  <tr>
	  	  	<td colspan=7>  </td>
	  </tr>
      <tr>
          	<td colspan=7 class=\"img\"><h3><center>From $data->rfrom  To $data->rto  for Date: $dptdate</h3></td>
      </tr>
      <tr bgcolor=\"#CCCCCC\">

            <th>S.N.</th>
            <th>Bus No.</th>
            <th>AVL Seat</th>
            <th>Fare</th>
            <th>Dept.Time</th>
            <th>Action</th>
        </tr>
        ";


   $busno="";
   $i=1;
   $j=0;
   $totlseat=0;
   $today=date('Y-m-d');
   $timenow=mktime(date('G'),date('i'),date('s'));
   $ctime=date('G:i:s',$timenow);
   $btime=0;
  foreach($buseslist as $rows){
  //echo $rows->seats;
	   $seatnumber= explode(",",$rows->seats);
	  // print_r($seatnumber);
	   $totlseat=sizeof($seatnumber);
       $totseat = $rows->tseat - $totlseat;
       $btime = $row->departure_time." ".$row->ampm;
       $bustime=date("H:i:s",STRTOTIME($btime));
			$msg.="<tr>

						<td align=\"center\"> $i </td>
						<td align=\"center\">".$rows->busno." </td>
						<td align=\"center\">".$totseat." </td>
						<td align=\"right\"> NRs.".number_format($rows->fare,2)." </td>
						<td align=\"center\">".$rows->dept_time." ".$rows->ampm."</td>";
            if($dptdate <= $today && $ctime >= $bustime){
                $msg.="<td id='selectButn' align=\"center\">Bus Moved</td></tr> ";

            }else{
                $msg.="<td id='selectButn' align=\"center\">".anchor('onlinebooking/selectSeats/'.$rows->bus_id.'/'.$dptdate,'Select Seat')."</td>
               </tr> ";
            }
				   $j=0;
				   $i++;

		}


    foreach($buslist as $row){
		$hasBooked=false;
		foreach($buseslist as $rows)
		{
			 if($row->busNo == $rows->busno){
			 	$hasBooked = true;
				break;
			 }
		}
   	 if(!$hasBooked){
	     $msg.="<tr>

                    <td align=\"center\"> $i </td>
                    <td align=\"center\">".$row->busNo."
					<input type=\"hidden\" name=\"dptdate\" value=\"$dptdate\"/>
					</td>

                    <td align=\"center\">".$row->totalSeat." </td>
                    <td align=\"right\"> NRs.".number_format($row->fare,2)." </td>
                    <td align=\"center\">".$row->departure_time." ". $row->ampm."</td>";
                  if($dptdate <= $today && $ctime >= $bustime){
                      $msg.="<td id='selectButn' align=\"center\">Bus Moved</td></tr> ";

                  }else{
                      $msg.="<td id='selectButn' align=\"center\">".anchor('onlinebooking/selectSeats/'.$row->bus_id.'/'.$dptdate,'Select Seat')."</td>
                     </tr> ";
                  }
		}

   }

   $msg.=" </table>
</form>    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
 ";
 }
 echo $msg;

?>
