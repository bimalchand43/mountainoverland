<?php
$CI="";
$CI =& get_instance();
$CI->load->helper('url');
$this->load->helper('form');
$this->load->helper('html');
$this->load->library('session');
$this->load->library('encrypt');

//echo $sales_category=$this->session->userdata('sales_category');

$msg="";
$msg1="";

$msg1.="
	<form name=\"ticket\" method=\"POST\" action\"$action\">
	    <table class=\"tblsearch\" align=\"center\" style=\"border:2px solid #CCC;\">
        <tr class=\"img\">
              <th colspan=5><h3>View Ticket</h3><br></th>
        </tr>
			<tr>
				<td>Ticket No. </td>
				<td> <input type=\"text\" name=\"tnumber\" value=\"\"> </td>
				<td> <input type=\"submit\" name=\"submit\" value=\"Confirm >>\"></td>
			</tr>
		</table>
	</form>
	<hr/>
";
echo $msg1;

if(isset($_POST['submit'])){

  if($tnumber != "" and $tname !=""){
     
	 if($tname != "" and $tcancel !='Y'){
  
		foreach( $query as $row){
			$rate= number_format($row->rate,2);
			$seatnumber= explode(",",$row->seat_no);
		}
		   $totseat= sizeof($seatnumber);
		   $totalAmounts= number_format($row->rate * $totseat,2);
		
		 foreach( $query1 as $rows){
		
		 }
		
		?>
		<html>
		<head>
		<script language="javascript">
		 function printpage()
		  {
		   //window.print();
		 	var url="../admin_booking/printticket/<?php echo $row->sales_id; ?>";
			newwindow=window.open(url,'Print Ticket','height=800,width=850,scrollbars=yes');
			if (window.focus) {newwindow.focus()}
			return false;
		   //url="../admin_booking/printticket/<?php echo $row->sales_id; ?>";
		  }
		</script>
		
		<link href="<?php echo base_url(); ?>res/css/printTicket.css" rel="stylesheet" type="text/css" />
		<title>-:Payas Traves and Tours (P) Ltd :-</title>
		</head>
		<body>
		<!--<text aling="right"><a href="../admin_booking/busSearch">Home</a></text>-->
		<div class="index">
		</div>
		<!-- <a href="../admin_booking/printticket/<?php echo $row->sales_id; ?>" target="new">Print</a>-->
			<div class="main">
		
			   <div class="print_info">
		
				<div class="banner">
		
				<table>
				<tr>
                       <td colspan="1"> Ticket No. :- <?php echo $row->sales_id; ?></td>
                </tr>
                <tr align="left">
                       <td colspan="1"> PNR No. &nbsp; &nbsp;:- <?php echo $row->pnr; ?></td>
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
							<td> ".$row->dept_time." ".$row->ampm."</td>
						</tr>
						<tr>
							<td> Passenger Name:</td>
							<td colspan=\"3\">$row->name_on_ticket </td>
						</tr> ";
				$msg1="
						<tr>
							<td> Persons : </td>
							<td> $totseat </td>
							<td> Rate :</td>
							<td> $rate per seat</td>
						</tr>
						<tr>
							<td> Total Amount :</td>
							<td colspan=\"3\">NRs. $totalAmounts</td>
						</tr>				

					</table>";
							
					$msgPassenger="<table  class=\"tbl\" width=\"100%\" border=1>
									<tr>
										<td colspan=7> <h4>Passenger List : </h4></td>
									</tr>
									<tr>
										<th width=\"10%\"> S.N</th>
										<th width=\"30%\"> Name</th>
                                         <th width=\"12%\"> Nationality</th>
                        <th width=\"13%\"> Passport/ID No</th>
										<th width=\"10%\"> Gender</th>
										<th width=\"10%\"> Age</th>
										<th width=\"10%\"> Seat No.</th>
									</tr>";
					$sn=1;
                    $seatno=0;
                    $age=0;
                    $nty="";
                    $nid="";
					foreach($query1 as $rows){
                            $seatno=$rows->seatno;
                            $age = $rows->age;
                            $nty=$rows->nationality;
                            $nid=$rows->idno;
							   $msgPassenger.="<tr>
										<td width=\"10%\">$sn</td>
										<td width=\"50%\">$rows->fullname</td>
                            <td width=\"10%\">$rows->nationality</td>
                                <td width=\"10%\">$rows->idno</td>
                            <td width=\"20%\"> $rows->gender</td>
										<td width=\"10%\">$rows->age</td>
										<td width=\"10%\">$rows->seatno</td>
									</tr>";
					$sn++;				
					
					}
                    $msgPassenger.="</table>";

                    if($seatno == 0){
                         $msg.="<tr>
					<td> Nationality :</td>
					<td>$nty </td>
                    <td> Passport/ID No :</td>
					<td>$nid </td>
				</tr> ".$msg1;
                    }else{
                        $msg.=$msg1.$msgPassenger;
                    }
					$msg.="
								   <hr>	<div class=\"note\"><u><b>Term and Condition. : </b></u>
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
									
								$msg.="<br/><p align=\"right\" style=\"padding-right:50px;\"> Issued By:(".$row->user.") ".$row->company."</p>
                                <br/><p align=\"right\" style=\"padding-right:50px;\"> Thank You.</p>
									<br/> <h4><center>* HAPPY JOURNEY *</center> <h4>
							<p align=\"right\" style=\"padding-right:50px;\"><input type=\"button\" value=\"Print &gt;&gt;\" onclick=\"printpage();\"/></p>
						</div>
					";
				
			  ?>
		           
				 </div>
			   </div>
		</body>
		</html>
		
		<?php
	}else{
	 $msg.="Cancelled Bill !!";
	}
   }else{
    $msg.="No Record Found!!";
   }
  }
  echo $msg;
?>
