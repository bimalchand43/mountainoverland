<?php
$CI="";
$CI =& get_instance();
$CI->load->helper('url');
$this->load->helper('form');
$this->load->helper('html');
$this->load->library('session');
$this->load->library('encrypt');

$msg1="";
$msg="";
$msg1.="
	<form name=\"ticket\" method=\"POST\" action\"$action\">
		<table class=\"tblsearch\" align=\"center\" style=\"border:2px solid #CCC;\">
        <tr class=\"img\">
              <th colspan=5><h3>Cancel/Change Ticket</h3><br></th>
        </tr>

			<tr>
				<td>Ticket No. </td>
				<td> <input type=\"text\" name=\"tnumber\" value=\"\"> </td>
				<td>Ticket PNR. </td>
				<td> <input type=\"text\" name=\"pnrnumber\" value=\"\"> </td>
				<td> <input type=\"submit\" name=\"submit\" value=\"Confirm >>\"></td>
			</tr>
		</table>
	</form>
	<hr/>
";
echo $msg1;
echo $this->session->flashdata('message');
if(isset($_POST['submit'])){

if($tnumber != "" and $pnrnumber !=""){

    $today=date('Y-m-d');
   $timenow=mktime(date('G'),date('i'),date('s'));
   $ctime=date('G:i:s',$timenow);
   $btime=0;
	 $msg.="
		 	 
		 <form>
				<table border=0 cellspacing=0 cellpadding=5 class=\"ltable\" style=\"border:1 solid #DDDDDD;\" width=\"100%\">
					<h3 style=\"background-color: #DEDEFC; width:98%; text-align: center;\">Selected Ticket Detail for Cancel</h3>
					<tr bgcolor=\"#CCCCCC\">
						<th>S.No</th>
						<th>Sales Id</th>
						<th> Issue Date</th>					
						<th> Dept from</th>
						<th> Dept To </th>
						<th> Name on Ticket</th>
						<th> Bus No.</th>
						<th> Dept. Date </th>
						<th> No. of Seat</th>
						<th> Rate per seat</th>
						<th> Ticket Amount</th>
						<th> Cancel </th>
					</tr>";
					$i=1;
					$tAmt=0.00;
		foreach($query as $rows){
		    $btime = $rows->dept_time." ".$rows->ampm;
            $bustime=date("H:i:s",STRTOTIME($btime));

			$totalAmount=$rows->rate * $rows->no_of_seat;
			$rc="lcb";
			if($i%2==1) $rc="dcb";
			 $msg.="<tr class=\"$rc\">
						<td>$i</td>";
						if($rows->Cancelled == 'Y'){
						 $msg.="<td>$rows->sales_id</td>";
						}else{
						 $msg.="<td>".anchor('admin/admin_booking/report_showticket/'.$rows->sales_id,"$rows->sales_id")."</td>";
						}
						$msg.="<td>$rows->ticket_issue_date</td>
						<td>$rows->sfrom</td>
						<td>$rows->sto</td>
						<td>$rows->name_on_ticket</td>
						<td>$rows->bus_no</td>
						<td>$rows->dept_date</td>
						<td align=\"center\">$rows->no_of_seat</td>
						<td align=\"right\">".number_format($rows->rate,2)."</td>
						<td align=\"right\">".number_format($totalAmount,2)."</td>
						<td>
						";
						if($rows->Cancelled =='Y'){
						    $msg.="<b>Cancelled ] </b>";
						}else{
                            if($rows->dept_date <= $today && $ctime >= $bustime){
						        $msg.="Time Off</td>";
                            }else{
                                $msg.="".anchor('admin/admin_booking/fullticketcancel/'.$rows->sales_id,"Full",array('onClick' =>"return confirm('Are you sure you want to full Cancel this Ticket ?')"))." / ".anchor('admin/admin_booking/partialticketcancel/'.$rows->bus_id.'/'.$rows->dept_date.'/'.$rows->sales_id.'/C',"Partial")."]</td>";
                            }
						}

					$msg.="</tr> ";
			$i++;
			 $tAmt+=$totalAmount;
		}		
					
					
		 $msg.="
		   <tr  bgcolor=\"#C9C9C9\">
				<th colspan=10 align=\"left\"> Total Amount </th>
				<th align=\"right\">Rs. ".number_format($tAmt,2)." </th>
				<th> &nbsp; </th>
		   </tr>
		 
		 </table>
	  </form>
	";
	
	
	
	
}else{
 $msg.="No Record Found!!";
 }
}

echo $msg;
?>
