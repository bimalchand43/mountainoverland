<?php
$CI="";
$CI =& get_instance();
$CI->load->helper('url');
$this->load->helper('form');
$this->load->helper('html');
$this->load->library('session');
$this->load->library('encrypt');



$busno="<select name=\"tbusno\"><option value=\"\">Select Bus No</option>";
 foreach($query_busno as $rowrbusno){ 
  $busno.="<option value=\"$rowrbusno->busNo\">$rowrbusno->busNo</option>";  
 }
 $busno.="</select>";


$dptime="<select name=\"ttime\"><option value=\"\">Select Time</option>";
 foreach($query_time as $rowtime){
  $dptime.="<option value=\"$rowtime->departure_time\">$rowtime->departure_time</option>";
 }
 $dptime.="</select>";


$route="<select name=\"troute\"><option value=\"\">Select Bus Route</option>";
 foreach($query_route as $rowroute){
  $route.="<option value=\"$rowroute->root_id\">$rowroute->rFrom - $rowroute->rTo </option>";
 }
 $route.="</select>";

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
<form name="ticket" method="POST" action="<?php echo $action; ?>">
	    <table class="tblsearch" align="center" style="border:2px solid #CCC;" width="100%">
        <tr class="img">
              <th colspan=10><h3>Daily Bus Management</h3><br></th>
        </tr>
			<tr>
				<td>Select Date : </td>
				<td><input type="text" name="dept_date" onclick="displayDatePicker('dept_date');" value="<?php echo date('d-m-Y'); ?>"/>
                    <a href="javascript:void(0);" onclick="displayDatePicker('dept_date');"><img src="<?php echo base_url(); ?>res/css/images/calendar.png" alt="calendar" border="0"></a></td>
                <td>Bus No : </td>
				<td> <?php echo $busno; ?> </td>
            </tr><tr>
             <td>Time : </td>
				<td> <?php echo $dptime; ?>
                     <select name="ampm">
                            <option value="AM">AM </option>
                            <option value="PM">PM </option>
                      </select>
             	</td>
                <td>Route : </td>
                <td> <?php echo $route; ?>   </td>
                </tr><tr>
				<td colspan="4" align=center> <input type="submit" name="submit" value="Search >>"></td>
			</tr>
		</table>
	</form>
	<hr/>
<?php
	if(isset($_POST["submit"]))
	{
		$msg="<script language='JavaScript'>
                 function printpage(urls)
		  {
		   //window.print();
		 	var url= urls;
			newwindow=window.open(url,'Print Ticket','height=800,width=850,scrollbars=yes');
			if (window.focus) {newwindow.focus()}
			return false;
		  }
        </script>
     <form>
			<table align=\"center\" border=0 cellspacing=0 cellpadding=5 class=\"ltable\" style=\"border:1 solid #DDDDDD;\" width=\"100%\">
				<tr bgcolor=\"#CCCCCC\">
				    <th>S.No</th>
					<th> Bus No</th>
					<th> Departure Date</th>
                    <th> Departure Time</th>
					<th> Route </th>
					<th>Action</th>
				</tr>";
				$i=1;
	foreach($query as $rows){
		$rc="lcb";
      	if($i%2==1) $rc="dcb";
           $link="chalani/$rows->bus_no/$rows->root_id/$rows->dept_time/$rows->dept_date";

		 $msg.="<tr class=\"$rc\">
			        <td>$i</td>
					<td>".$rows->bus_no."</td>
					<td>".$rows->dept_date."</td>
                    <td>".$rows->dept_time." " .$rows->ampm."</td>
					<td align=\"center\">".$rows->sfrom." - ".$rows->sto."</td>
         		<td align=\"right\"><a href=\"javascript:void(0);\" onClick=\"printpage('$link');\">Chalani</a></td>
			    </tr>
			   ";
		$i++;
    }


	 $msg.="
	 </table>
  </form>
</table>
";


echo $msg;
	}
?>
