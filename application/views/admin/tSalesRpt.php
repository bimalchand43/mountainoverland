<?php
$salbill="";
$salname="";
$chkd="checked";
$chkdept="";
$datefrom="";
$dateto="";
if(isset($_POST["submit"])){
	$salbill=$salebill;
	$salname=$salename;
	
	if($chekissu == "issuedate"){
	   $chkd="checked";
	   $chkdept="";
	}else{
	   $chkdept="checked";
	   $chkd="";
	}
	
   $datefrom = $dt_from;
   $dateto = $dt_to;	
	   
}

$selbusno="";
$selbusnos="";

$busno="<select name=\"tbusno\">
        <option value=\"\">Select Bus No</option>";
 foreach($query_busno as $rowrbusno){ 
 
  if($busnum == $rowrbusno->busNo){
    $selbusno="Selected";	
    $busno.="<option value=\"$rowrbusno->busNo\" $selbusno>$rowrbusno->busNo</option>";  
  }else{
   $busno.="<option value=\"$rowrbusno->busNo\">$rowrbusno->busNo</option>";
  }	
 }
 $busno.="</select>";
 
 $busnos="<select name=\"tbusnos\">
        <option value=\"\">Select Bus No</option>";
 foreach($query_busno as $rowrbusno){ 
 
  if($busnums == $rowrbusno->busNo){
    $selbusnos="Selected";	
    $busnos.="<option value=\"$rowrbusno->busNo\" $selbusnos>$rowrbusno->busNo</option>";  
  }else{
   $busnos.="<option value=\"$rowrbusno->busNo\">$rowrbusno->busNo</option>";
  }	
 }
 $busnos.="</select>";
 
 
$selroot="";
$selroots="";
$route="<select name=\"troute\">
 <option value=\"\">Select Bus Route</option>";
 
 foreach($query_route as $rowroute){
	 if($troot == $rowroute->root_id){
		 $selroot="Selected";
		$route.="<option value=\"$rowroute->root_id\" $selroot>$rowroute->rFrom - $rowroute->rTo </option>";
	 }else{ 
	  $route.="<option value=\"$rowroute->root_id\">$rowroute->rFrom - $rowroute->rTo </option>";
	 }
 }
 $route.="</select>";
 
 $routes="<select name=\"troutes\">
 <option value=\"\">Select Bus Route</option>";
 
 foreach($query_route as $rowroute){
	 if($troots == $rowroute->root_id){
		 $selroots="Selected";
		$routes.="<option value=\"$rowroute->root_id\" $selroots>$rowroute->rFrom - $rowroute->rTo </option>";
	 }else{ 
	  $routes.="<option value=\"$rowroute->root_id\">$rowroute->rFrom - $rowroute->rTo </option>";
	 }
 }
 $routes.="</select>";



?>
<script language="JavaScript">
         fucntion checkDate(dates){
            var d1=new Date();
            d1.toString('dd-mm-yyyy');
            alert();
         }

		</script>
<link href="<?php echo base_url(); ?>res/css/style.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url(); ?>res/css/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>res/js/calendar.js"></script>

<form name="ticket" method="POST" action="<?php echo $action; ?> ">
	    <table class="tblsearch" align="center" style="border:2px solid #CCC;" width="100%">
        <tr class="img">
              <th colspan=10><h3>Sales Management</h3><br></th>
        </tr>
			<tr>
                <td> Sales Bill No. :</td>
                <td><input type="text" name="salesbill" value="<?php echo $salbill; ?>"/></td>	
                <td align="left"> Or </td>		
                <td>Name on Ticket  :</td>
                <td><input name="nameonticket" type="text" value="<?php echo $salname; ?>"/></td>
            </tr>
            
            <tr>    
                <td> Or Select Bus No : </td>
				<td> <?php echo $busnos; ?> </td>
                 <td align="left"> Or </td>
                <td>   Select Route : </td>
                <td> <?php echo $routes; ?> </td>
            </tr>
            <tr>    
				<td colspan="5" align="right"> 
                     <input type="submit" name="submit" value="Search >>" />
                     <input type="submit" onSubmit="window.location.reload();" value="Reset">
                     <input type="hidden" name="single" value="S" />
                </td>
			</tr>
            
		</table>
	</form>
    
 
 
 
 
 <form name="" method="POST" action="<?php echo $action; ?> ">
	    <table class="tblsearch" align="center" style="border:2px solid #CCC;" width="100%">
        
			<tr>                
            	<td><input type="radio" name="chkdate" value="issuedate"<?php echo $chkd; ?>/>Issue Date </td> 
                <td><input type="radio" name="chkdate" value="deptdate"<?php echo $chkdept; ?> />Departure Date </td>
            </tr>
            <tr>
                <td colspan="4">&nbsp;  </td>
            </tr>
           
            <tr>                
				<td>Date From : </td>
				<td><input type="text" name="date_from" onclick="displayDatePicker('date_from');" value="<?php echo $datefrom; ?>"/>
                    <a href="javascript:void(0);" onclick="displayDatePicker('date_from');"><img src="<?php echo base_url(); ?>res/css/images/calendar.png" alt="calendar" border="0"></a></td>
                    
                <td>Date To : </td>                
				<td><input type="text" name="date_to" onclick="displayDatePicker('date_to');" value="<?php echo $dateto; ?>"/>
                    <a href="javascript:void(0);" onclick="displayDatePicker('date_to');"><img src="<?php echo base_url(); ?>res/css/images/calendar.png" alt="calendar" border="0"></a></td>    
            </tr>
            <tr>    
                <td> Select Bus No : </td>
				<td> <?php echo $busno; ?> </td>
                <td> Or  Select Route : </td>
                <td> <?php echo $route; ?> </td>
            </tr>
            <tr>
				<td colspan="4" align="right">
                	<input type="submit" name="submit" value="Search >>">
                    <input type="submit" onSubmit="window.location.reload();" value="Reset">
                    <input type="hidden" name="single" value="M" />
                </td>
			</tr>
		</table>
	</form>   
<?php    
$msg="";
if(isset($_POST["submit"])){
$msg="
     <form>
			<table border=0 cellspacing=0 cellpadding=5 class=\"ltable\" style=\"border:1 solid #DDDDDD;\" width=\"100%\">
				<h3 style=\"background-color: #DEDEFC; width:98%; text-align: center;\">Total Sale List Detail</h3>
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
					<th> Action </th>
				</tr>";
				$i=1;
				$tAmt=0.00;
	foreach($query as $rows){

	    $totalAmount=$rows->rate * $rows->no_of_seat;
		$rc="lcb";
      	if($i%2==1) $rc="dcb";
		 $msg.="<tr class=\"$rc\">
			        <td>$i</td>
					<td>".anchor('admin/admin_booking/report_showticket/'.$rows->sales_id,"$rows->sales_id")."</td>
					<td>$rows->ticket_issue_date</td>
					<td>$rows->sfrom</td>
					<td>$rows->sto</td>
					<td>$rows->name_on_ticket</td>
					<td>$rows->bus_no</td>
					<td>$rows->dept_date</td>
					<td align=\"center\">$rows->no_of_seat</td>
					<td align=\"right\">".number_format($rows->rate,2)."</td>
					<td align=\"right\">".number_format($totalAmount,2)."</td>
					<td>[".anchor('admin/admin_booking/report_showticket/'.$rows->sales_id,"View")."]";
					  if($rows->paid =="N"){
                        $msg.="[<b>Unpaid] </b>";
                        /*
                         $sales_category=$this->session->userdata('sales_category');
                            if($sales_category == 'ad'){
								$msg.="
									[".anchor('admin/admin_booking/paidunpaid/admin/'.$rows->sales_id,"Unpaid")."]
							  ";
							}else{
							  $msg.="
									[".anchor('admin/admin_booking/paidunpaid/branch/'.$rows->sales_id,"Unpaid")."]
							  ";
							}
						*/
					 }else{
					   $msg.="[<b>Paid] </b>";
					 }
					$msg.="</td>
			    </tr>
			   ";
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
}

echo $msg;
?>
