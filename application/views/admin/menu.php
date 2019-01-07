<?php
$CI="";
$CI =& get_instance();
$CI->load->helper('url');
$this->load->library('session');
$this->load->library('encrypt');

$companyid = $this->session->userdata('compid');
$usertype =$this->session->userdata('usertype');
$sales_category=$this->session->userdata('sales_category');
$brid = $this->session->userdata('brid');
//echo $sales_category;
//echo $usertype;
if($sales_category == 'ad' and $usertype == 'a'){


$leftContent="
<UL>
      <b><font color=\"#FFFF99\">General Management</font></b>
	  <ul>
		 <LI>".anchor('admin/home','Home')."</LI>
		 <LI>".anchor('admin/home/companyprofile/'.$companyid.'','Profile')."</LI>
		 <LI>".anchor('admin/create_bus/add_new_bus','Add New Bus')." </LI>
		 <LI>".anchor('admin/create_bus/viewBusDetails','View Bus List')." </LI>
		 <LI>".anchor('admin/home/getdata_for_agency','Request New Agency')." </LI>
         <LI>".anchor('admin/home/changepassword','Change Password')." </LI>
         <LI>".anchor('admin/home/changepasswordrequest','Change Password Request')." </LI>
	 </ul>
     <b><font color=\"#FFFF99\">Ticket Management</font></b>
     <ul>
        <!-- <LI>".anchor('admin/admin_booking/busSearch','Issue Ticket')." </LI>-->
         <LI>".anchor('admin/admin_booking/showticket','Show Ticket')." </LI>
     </ul>
	 <!-- <b><font color=\"#FFFF99\">Ticket Cancel Management</font></b>
     <ul>
        <LI>".anchor('admin/admin_booking/busSearch','Partial Ticket Cancel')." </LI>
         <LI>".anchor('admin/admin_booking/fullticketcancel','Full Ticket Cancel')." </LI>
     </ul>-->
     <b><font color=\"#FFFF99\">Rout Management</font></b>
        <UL>
             <LI>".anchor('admin/admin_rout/createRout','Create Rout')."</LI>
             <LI>".anchor('admin/admin_rout/viewBusRoutDetails','View Rout')."</LI>
        </UL>


      <b><font color=\"#FFFF99\">Branch Management</font></b>
        <UL>
             <!--<LI>".anchor('admin/comp_profile/create_company','New Branch')."</LI>-->
             <LI>".anchor('admin/comp_profile/view_company/'.'branchlist','View Branch')."</LI>
        </UL>

     <b><font color=\"#FFFF99\">Driver Expenses Management</font></b>
        <UL>
             <LI>".anchor('admin/driver_management/add_driver','Driver Entry')."</LI>
             <LI>".anchor('admin/driver_management/','Driver List')."</LI>
             <LI>".anchor('admin/driver_management/expenseentryfrm','Expenses Entry')."</LI>
             <LI>".anchor('admin/driver_management/expenseslist','Expenses List')."</LI>
        </UL>
	 <b><font color=\"#FFFF99\">Feedback Management</font></b>
        <UL>
             <LI>".anchor('admin/feedback_mgmt/feedbackList','List Feedback')."</LI>

        </UL>
		<b><font color=\"#FFFF99\">Sales Report Management</font></b>
		<UL>
		     <LI>".anchor('admin/sales_report/totalSalesReport','Total Sales Reports')."</LI>
			 <LI>".anchor('admin/sales_report/total_sales_by_branch','Branch wise Total Sales')."</LI>
             <LI>".anchor('admin/sales_report/periodicSalesReport/period','Periodic Sales Reports')."</LI>
             <LI>".anchor('admin/collection_sheet/collection_from_branch','Collection Sheet')."</LI>
			 <LI>".anchor('admin/bus_mgmt/dbmgmt','Daily Bus Management')."</LI>
             <LI>".anchor('admin/driver_management/expense_report','Expense Reports')."</LI>

        </UL>

	    <UL>
     		<LI>".anchor('logout_admin','Logout')."</LI>
		</UL>
</UL>

";
}
if($sales_category == 'ad' and $usertype == 'n'){
$leftContent="
<UL>
      <b><font color=\"#FFFF99\">General Management</font></b>
	  <ul>
		 <LI>".anchor('admin/home','Home')."</LI>
		 <LI>".anchor('admin/home/companyprofile/'.$companyid.'','Profile')."</LI>		 
         <LI>".anchor('admin/home/changepassword','Change Password')." </LI>
        
	 </ul>
     
	    <UL>
     		<LI>".anchor('logout_admin','Logout')."</LI>
		</UL>
</UL>

";

}


if($sales_category == 'br' and $usertype == 'a'){
 
$leftContent="
<UL>
    <b><font color=\"#FFFF99\">General Management</font></b>
	  <ul>
		 <LI>".anchor('admin/home','Home')."</LI>
		 <LI>".anchor('admin/home/companyprofile/'.$companyid.'','Profile')."</LI>
		 <LI>".anchor('admin/admin_booking/busSearch','Issue Ticket')." </LI>
          <LI>".anchor('admin/home/getdata_for_agency/'.$companyid.'','Request New Agency')." </LI>
		  <LI>".anchor('admin/home/changepassword','Change Password')." </LI>
	 </ul>
	 <b><font color=\"#FFFF99\">Ticket Cancel Management</font></b>
     <ul>
         <LI>".anchor('admin/admin_booking/fticketcancelled/','Ticket Cancel/Change')." </LI>
     </ul>


     <b><font color=\"#FFFF99\">Agency Management</font></b>
        <UL>
		    <LI>".anchor('admin/comp_profile/view_agency/agencylist/','View Agency')."</LI>
			<LI>".anchor('admin/comp_profile/view_branch_user/branchuserlist/','View Branch User List')."</LI>
        </UL>
     <b><font color=\"#FFFF99\">Sales Management</font></b>
      <UL>
	    <LI>".anchor('admin/sales_report/totalSalesReport/','Total Sales Reports')."</LI>
		<LI>".anchor('admin/sales_report/total_sales_by_agency/'.$companyid.'/'.$brid,'Agency wise Sales Reports')."</LI>
      	<LI>".anchor('admin/branch_sales_report/periodicSalesReport/period','Periodic Sales Reports')."</LI>
        <LI>".anchor('admin/collection_sheet/collection_from_agency','Collection Sheet')."</LI>
        <LI>".anchor('admin/bus_mgmt/dbmgmt','Daily Bus Management')."</LI>
      </UL>
	  <UL>
     		<LI>".anchor('logout_admin','Logout')."</LI>
	  </UL>

</UL>

";
}

if($sales_category == 'br' and $usertype == 'n'){
$leftContent="
<UL>
    <b><font color=\"#FFFF99\">General Management</font></b>
	  <ul>
		 <LI>".anchor('admin/home','Home')."</LI>
		 <LI>".anchor('admin/home/companyprofile/'.$companyid.'','Profile')."</LI>
		 <LI>".anchor('admin/admin_booking/busSearch','Issue Ticket')." </LI>
          <LI>".anchor('admin/home/getdata_for_agency/'.$companyid.'','Request New Agency')." </LI>
		  <LI>".anchor('admin/home/changepassword','Change Password')." </LI>
	 </ul>
	 <b><font color=\"#FFFF99\">Ticket Cancel Management</font></b>
     <ul>
         <LI>".anchor('admin/admin_booking/fticketcancelled/','Ticket Cancel/Change')." </LI>
     </ul>
     
	  <UL>
     		<LI>".anchor('logout_admin','Logout')."</LI>
	  </UL>

</UL>

";
}

if($sales_category == 'ag' and $usertype == 'a'){
$leftContent="
<UL>
    <b><font color=\"#FFFF99\">General Management</font></b
	  <ul>
		 <LI>".anchor('admin/home','Home')."</LI>
		 <LI>".anchor('admin/home/companyprofile/'.$companyid.'','Profile')."</LI>
		 <LI>".anchor('admin/home/changepassword','Change Password')." </LI>
		 <LI>".anchor('admin/admin_booking/busSearch','Issue Ticket')." </LI>

	 </ul>
	 <b><font color=\"#FFFF99\">Ticket Cancel Management</font></b>
     <ul>
         <LI>".anchor('admin/admin_booking/fticketcancelled/','Ticket Cancel/Change')." </LI>
     </ul>
	 <b><font color=\"#FFFF99\">Agency Management</font></b>
        <UL>		    
			<LI>".anchor('admin/comp_profile/view_agency_user/branchuserlist/','View User List')."</LI>
        </UL>
	 
<b><font color=\"#FFFF99\">Sales Management</font></b>
      <UL>
	    <LI>".anchor('admin/sales_report/totalSalesReport/','Total Sales Reports')."</LI>          		
      	<LI>".anchor('admin/branch_sales_report/periodicSalesReport/period','Periodic Sales Reports')."</LI>
      </UL>		 
     <UL>
     	<LI>".anchor('logout_admin','Logout')."</LI>
	 </UL>	
</UL>

";
}
if($sales_category == 'ag' and $usertype == 'n'){
$leftContent="
<UL>
    <b><font color=\"#FFFF99\">General Management</font></b
	  <ul>
		 <LI>".anchor('admin/home','Home')."</LI>
		 <LI>".anchor('admin/home/companyprofile/'.$companyid.'','Profile')."</LI>
		 <LI>".anchor('admin/home/changepassword','Change Password')." </LI>
		 <LI>".anchor('admin/admin_booking/busSearch','Issue Ticket')." </LI>

	 </ul>
	 <b><font color=\"#FFFF99\">Ticket Cancel Management</font></b>
     <ul>
         <LI>".anchor('admin/admin_booking/fticketcancelled/','Ticket Cancel/Change')." </LI>
     </ul>
	 
     <UL>
     	<LI>".anchor('logout_admin','Logout')."</LI>
	 </UL>	
</UL>

";

}
echo $leftContent;



?>
