<?php
$cboFrom="";
$cboTo="";
$cdate=date('d-m-Y');
if(isset($_POST["cboFrom"]))
   $cboFrom =$_POST["cboFrom"];

if(isset($_POST["cboTo"]))
   $cboTo =$_POST["cboTo"];

if(isset($_POST["dept_date"]))
   $cdate =$_POST["dept_date"];

$routefrom="<select name=\"cboFrom\">";
 foreach($query_city as $rows){
    $selected="";
    if($cboFrom ==$rows->city_name)
        $selected="selected";
    $routefrom.="<option value=\"$rows->city_name\" $selected>$rows->city_name</option>";
}
 $routefrom.="</select>";

 $routeto="<select name=\"cboTo\">";
 foreach($query_city as $row){
    $selected="";
    if($cboTo ==$row->city_name)
        $selected="selected";
    $routeto.="<option value=\"$row->city_name\" $selected>$row->city_name</option>";
}
 $routeto.="</select>";
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
    <form name="" method="post" action="../admin_booking/busSearch">
            <table class='tblsearch' width=100% border=0 cellpadding="5" cellspacing="2">
                <tr class="img">
                    <th colspan=9><h3>Online Bus Tickets Booking</h3></th>
                </tr>
                <tr>
                    <td>Departure From </td>
                     <td><?php echo $routefrom; ?></td>
                    <td>Arrival To</td>
                     <td><?php echo $routeto; ?></td>
                    <td colspan=2>Departure date</td>
                    <td colspan="2"><input type="text" name="dept_date" onclick="displayDatePicker('dept_date');" value="<?php echo $cdate; ?>"/>
                    <a href="javascript:void(0);" onclick="displayDatePicker('dept_date');"><img src="<?php echo base_url(); ?>res/css/images/calendar.png" alt="calendar" border="0"></a></td>
                  <td align="left"><input type="submit" name="submit" value="Search >>" /></td>  
                    
                </tr>
                
            </table>
       </form>
       <hr/>
<?php

if(isset($_POST['submit'])){

$msg="";
//$busnumber="";
$busnumber="";
foreach($buslist as $rows){
$busnumber=$rows->busNo;
}
if($busnumber==""){
$msg="";
}else{
$msg.="<form>
      <table class=\"tbl_border\"  cellspacing=2 cellpadding=3 bgcolor=\"\" width=\"100%\">
      <tr>
          <td colspan=7 class=\"img\"><h3><center>From $rows->rFrom  To $rows->rTo  for Date: $dptdate</h3></td>
      </tr>
      <tr bgcolor=\"#CCCCCC\">
            <th>No</th>            
            <th>Bus No.</th>            
            <th>AVL Seat</th>
            <th>Fare</th>
            <th>Dept.Time</th>
            <th>Action</th>
        </tr>
        ";
   $i=1;
   $today=date('Y-m-d');
   $timenow=mktime(date('G'),date('i'),date('s'));
   $ctime=date('G:i:s',$timenow);
   $btime=0;
   foreach($buslist as $row){
   //echo $row->busName;
        $btime = $row->departure_time." ".$row->ampm;
        $bustime=date("H:i:s",STRTOTIME($btime));
        $msg.="<tr>
                    <td align=\"center\"> $i </td>
                    <td align=\"center\">".$row->busNo." </td>
					<input type=\"hidden\" name=\"dptdate\" value=\"$dptdate\"/>
                    <td align=\"center\">".$row->totalSeat." </td>
                    <td align=\"right\"> NRs.".number_format($row->fare,2)."</td>
                    <td align=\"center\">".$row->departure_time." ".$row->ampm."</td>";
        if($dptdate <= $today && $ctime >= $bustime){
            $msg.="<td id='selectButn' align=\"center\">Bus Moved</td></tr> ";

        }else{
            $msg.="<td id='selectButn' align=\"center\">".anchor('admin/admin_booking/selectSeats/'.$row->bus_id.'/'.$dptdate,'Select Seat')."</td>
               </tr> ";
        }

         $i++;
   }
   $msg.=" </table>
</form>
 ";
 }
 echo $msg;
 }
 
 ?>
