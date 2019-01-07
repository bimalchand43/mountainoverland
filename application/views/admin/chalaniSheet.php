<table align="center"><tr><td><img src="/res/images/logo.jpg"/></td><td><h3><span>Mountain Overland Travels and Tours (P) Ltd.</span>
                                    <br />Lakeside, Pokhara (Nepal)
                                    <br />info@mountainoverland.com         </h3>
                    </td></tr></table>
<?php
$CI="";
$CI =& get_instance();
$CI->load->helper('url');
$msgHeader="";
$msgscript="
<style type=\"text/css\">
				@media print {
					input#btnPrint {
						display: none;
					}
				}
			</style>

		<script language=\"javascript\">
		 function printpage()
		  {
		   window.print();
		  }
		</script>";
$msg="    <link href=\"".base_url()."res/css/style.css\" rel=\"stylesheet\" type=\"text/css\" />
     <form>
			<table align=\"center\" border=0 cellspacing=0 cellpadding=5 class=\"ltable\" style=\"border:1px solid #DDDDDD;\" width=\"100%\">
				<tr bgcolor=\"#CCCCCC\">
				    <th width=\"2%\">S.No</th>
					<th> Passenger Name</th>
                    <th> Address</th>
					<th width=\"3%\"> Age </th>
					<th width=\"3%\"> Gender</th>
					<th width=\"4%\"> Seat Number</th>
					<th width=\"13%\"> Total Amount</th>
                    <th> Remarks</th>
				</tr>";
				$i=1;
				$tAmt=0.00;
	foreach($query as $rows){
		$rc="lcb";
        $amount=0;

        if($i==1){
            $msgHeader="<table align=\"center\" border=0 cellspacing=0 cellpadding=5 style=\"border:1px solid #DDDDDD;\" width=\"100%\">
            <tr><td colspan=\"6\"><h3 style=\"background-color: #DEDEFC; width:98%; text-align: center;\">Chalani Sheet</h3></td></tr>
                <tr><td width=\"65\">Bus No</td><td>:</td><td>".$rows->bus_no."</td><td align=\"right\">Departure Date</td><td>:</td><td>".$rows->dept_date."</td></tr>
                <tr><td>Route</td><td>:</td><td>".$rows->sfrom." - ".$rows->sto."</td><td align=\"right\">Departure Time</td><td>:</td><td>".$rows->dept_time." ".$rows->ampm."</td></tr>
                <tr><td>Driver</td><td>:</td><td colspan=3></td></tr>
                </table>";
        }
        if($rows->seatno==0)
        {
            $age="-";
            $gender="-";
            $seatno=$rows->allseats;
            $amount= $rows->no_of_seat*$rows->rate;
        }else{
            $age=$rows->age;
            $gender=$rows->gender;
            $seatno=$rows->seatno;
            $amount= $rows->rate;
            if($seatno == 0)
               $seatno="-";
            if($age == 0)
               $age="-";
        }
        $tAmt += $amount;

      	if($i%2==1) $rc="dcb";
		 $msg.="<tr class=\"$rc\">
			        <td>$i</td>
					<td>".$rows->fullname."</td>
                    <td>".$rows->address."</td>
					<td align=\"center\">".$age."</td>
                    <td align=\"center\">".$gender."</td>
                    <td align=\"center\">".$seatno."</td>
					<td align=\"right\">".number_format($amount,2)."</td>
					<td align=\"right\">&nbsp;</td>
			    </tr>
			   ";
		$i++;
    }


	 $msg.="
	   <tr  bgcolor=\"#C9C9C9\">
	   		<th colspan=6 align=\"left\"> Total </th>
			<th align=\"right\">Rs. ".number_format($tAmt,2)." </th>
            <th> &nbsp;</th>
	   </tr>

	 </table>
  </form>";
  $msg_cancel="";
  if(sizeof($query1) > 0){
    $msg_cancel=" <table align=\"center\" border=0 cellspacing=0 cellpadding=5 class=\"ltable\" style=\"border:1px solid #DDDDDD;\" width=\"100%\">
        <tr><td colspan=\"4\"> Ticket Status</td></tr>
        <tr><th>Ticket No</th>
            <th>Date</th>
            <th>User</th>
            <th>Remarks</th>
        </th></tr>";
  foreach($query1 as $rows1){
        $msg_cancel.="
        <tr>
            <td>".$rows1->sales_id."</td>
            <td>".$rows1->date."</td>
            <td>".$rows1->user."</td>
            <td>".$rows1->remarks."</td>
        </tr>";


  }
    $msg_cancel.="</tr></table><hr>";
  }
  $msg.=$msg_cancel." 
  <br><br><br>
  <table width=\"100%\">
  <tr><td>____________</td><td align=right>___________</td></tr>
  <tr><td>Prepared By</td><td align=right>Approved By</td></tr>
  <tr><td colspan=\"2\" align=\"center\"><p style=\"padding-right:50px;\"><input type=\"button\" id=\"btnPrint\" value=\"Print &gt;&gt;\" onclick=\"printpage();\"/></p>
</td></tr>
</table>
";


echo $msgscript.$msgHeader.$msg;
?>
