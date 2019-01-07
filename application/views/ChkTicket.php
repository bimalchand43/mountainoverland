<?php
$CI="";
$CI =& get_instance();
$CI->load->helper('url');
$this->load->helper('form');
$this->load->helper('html');
$this->load->library('session');
$this->load->library('encrypt');


$msg="
     <script language=\"javascript\">
		 function printpage()
		  {
		   //window.print();

            var pnr = document.forms.pnrform.tnumber.value;
            if(pnr != ''){
            var url=\"../main/printticket/\"+pnr;
			newwindow=window.open(url,'Print Ticket','height=800,width=850,scrollbars=yes');
			if (window.focus) {newwindow.focus()}
			return false;

            }else{
             alert('Please Insert PNR !!');
            }

		  }


		</script>";




$msg.="

       <form name=\"pnrform\" action=\"\">
	    <table class=\"tblsearch\" align=\"center\" style=\"border:2px solid #CCC;\">
        <tr class=\"img\">
              <th colspan=5><h3>View Ticket</h3><br></th>
        </tr>
			<tr>
				<td>PNR No. </td>
				<td> <input type=\"text\" name=\"tnumber\" value=\"\"> </td>
				<td> <input type=\"button\" name=\"submit\" value=\"Confirm >>\" onClick=\"printpage();\"></td>
			</tr>
		</table>
        </form>
	<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

";
echo $msg;

 ?>

