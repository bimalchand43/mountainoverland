<?php
$CI="";
$CI =& get_instance();
$CI->load->helper('url');
$this->load->helper('form');
$this->load->helper('html');
$this->load->library('session');
$this->load->library('encrypt');

//echo $sales_category=$this->session->userdata('sales_category');

foreach( $query as $row){
	$rate= number_format($row->rate,2);
	$seatnumber= explode(",",$row->seat_no);
}
   $totseat= sizeof($seatnumber);
   $fare= number_format($row->rate / $totseat,2);

 foreach( $query1 as $rows){

}



?>

<html>
<head>
<script language="javascript">
 function printpage()
  {
   window.print();
  }
</script>

<link href="<?php echo base_url(); ?>res/css/printTicket.css" rel="stylesheet" type="text/css" />
<title>-:Payas Traves and Tours (P) Ltd :-</title>
</head>
<body>
<!--<text aling="right"><a href="../admin_booking/busSearch">Home</a></text>-->
<div class="index">
</div>
 <a href="" target="new">Print</a>
	<div class="main">

       <div class="print_info">

		<div class="banner">

        <table>
        <tr>
               <td colspan="2"> Ticket No. :-<?php echo $row->sales_id; ?></td>
        </tr>
        <tr>
        		<td>
                    <a href="../admin_booking/busSearch">
                        <img src="/res/images/logo.jpg"/>
                    </a>
                 </td>
                 <td>


<?php
      $this->load->view('ticketHeader.php');
?>
                  </td>
          </tr>
         </table>

		</div>

		<div class="border">

        <?php

			$msg="

			<table class=\"tbl\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\" align=\"center\">
				<tr>
					<td>&nbsp;</td>
					<td> &nbsp; </td>
					<td> Issued Date :</td>
					<td> $row->ticket_issue_date</td>
				</tr>
				<tr>
					<td> Departure from : </td>
					<td> $row->sfrom</td>
					<td> Departure to :</td>
					<td> $row->sto </td>
				</tr>
				<tr>
					<td> Bus No. : </td>
					<td> $row->bus_no</td>
					<td> Seat No. :</td>
					<td> $row->seat_no </td>
				</tr>
				<tr>
					<td> Departure Date : </td>
					<td> $row->dept_date </td>
					<td> Departure Time :</td>
					<td> $row->dept_time</td>
				</tr>
				<tr>
					<td> Mr/Mrs/Miss :</td>
					<td colspan=\"3\">$row->name_on_ticket </td>
				</tr>
				<tr>
					<td> Persons : </td>
					<td> $totseat </td>
					<td> Rate :</td>
					<td> $fare per seat</td>
				</tr>
				<tr>
					<td> Total Amount :</td>
					<td colspan=\"3\">NRs. $rate</td>
				</tr>				
			
			</table>";
					
			$msg.="<table  class=\"tbl\" width=\"100%\" border=1>
							<tr>
								<td colspan=4> <h4>Passenger List : </h4></td>
							</tr>
							<tr>
								<th width=\"10%\"> S.N</th>
								<th width=\"60%\"> Name</th>
								<th width=\"20%\"> Gender</th>
								<th width=\"10%\"> Age</th>
							</tr>";
			$sn=1;				
			foreach($query1 as $rows){				
			           $msg.="<tr>
								<td width=\"10%\">$sn</td>
								<td width=\"60%\">$rows->fullname</td>
								<td width=\"20%\"> $rows->gender</td>
								<td width=\"10%\">$rows->age</td>
							</tr>";
			$sn++;				
			
			}
			$msg.="</table>	
	                        <div class=\"note\"><u><b>Term and Condition. : </b></u>
							<table> 
							
							";
							$l=1;
							foreach($tc_query as $rw){
								 $msg.="
								      <tr>
								        <td>$l.  </td>
										<td> $rw->tc_desc</td> 
									  </tr>";
								$l++;	
									}
						   			
					$msg.=" 
					       </table>
						";	
							
						$msg.="	<br/><p align=\"right\"> Thank You.</p>
							<br/> <h4><center>* HAPPY JOURNEY *</center> <h4>
					<p align=\"right\"><input type=\"button\" value=\"Print &gt;&gt;\" onclick=\"printpage();\"/></p>
				</div>
            ";
        echo $msg;
      ?>

         </div>
	   </div>
</body>
</html>
