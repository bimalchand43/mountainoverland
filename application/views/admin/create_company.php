

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<title>SIMPLE CRUD APPLICATION</title>

<link href="<?php echo base_url(); ?>res/css/style.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url(); ?>res/css/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>res/js/calendar.js"></script>

</head>
<body>
	<div class="content">
		<h2><?php echo $title; ?></h1>
		<?php //echo $message;
        ?>
		<form method="post" action="<?php echo $action; ?>/<?php echo $id; ?> ">
		<div class="data">

		<table>

			<tr>
				<td valign="top">Company Name<span style="color:red;">*</span></td>
				<td colspan=3><input type="text" name="cname" class="text" value="<?php echo set_value('cname',$this->form_data->cname); ?>" size=50/>
                    <?php echo form_error('cname'); ?>
				</td>

			</tr>
			<tr>
                <td valign="top">Company Address<span style="color:red;">*</span></td>
				<td><input type="text" name="caddress" class="text" value="<?php echo set_value('caddress',$this->form_data->caddress); ?>"/>
                    <?php echo form_error('caddress'); ?>
				</td>
                <td valign="top">City<span style="color:red;">*</span></td>
				<td><input type="text" name="city" class="text" value="<?php echo set_value('city',$this->form_data->city); ?>"/>
                     <?php echo form_error('city'); ?>
				</td>


			</tr>
			<tr>
                <td valign="top">Country<span style="color:red;">*</span></td>
                <td> <select name='country'>
                        <option>Select Country</option>
                        <option>Nepal</option>
                        <option>India</option>
                        <option>others</option>
                    </select></td>
			    <td valign="top">Phone No.<span style="color:red;">*</span></td>
				<td><input type="text" name="cphone" class="text" value="<?php echo set_value('cphone',$this->form_data->cphone); ?>"/>
                    <?php echo form_error('cphone'); ?>
				</td>

			</tr>
            <tr>
                <td valign="top">Fax No.<span style="color:red;">*</span></td>
				<td><input type="text" name="cfax" class="text" value="<?php echo set_value('cfax',$this->form_data->cfax); ?>"/>
                     <?php echo form_error('cfax'); ?>
				</td>
			    <td valign="top">Email<span style="color:red;">*</span></td>
				<td><input type="text" name="email" class="text" value="<?php echo set_value('email',$this->form_data->email); ?>"/>
                    <?php echo form_error('email'); ?>
				</td>

			</tr>
            <tr>
                 <td valign="top">Contact Person<span style="color:red;">*</span></td>
				<td><input type="text" name="cperson" class="text" value="<?php echo set_value('cperson',$this->form_data->cperson); ?>"/>
                     <?php echo form_error('cperson'); ?>
				</td>
			    <td valign="top">Desination<span style="color:red;">*</span></td>
				<td><input type="text" name="cpdesination" class="text" value="<?php echo set_value('cpdesination',$this->form_data->cpdesination); ?>"/>
                    <?php echo form_error('cpdesination'); ?>
				</td>
            </tr>
            <tr>
                <td valign="top">Phone No.<span style="color:red;">*</span></td>
				<td><input type="text" name="cpphone" class="text" value="<?php echo set_value('cpphone',$this->form_data->cpphone); ?>"/>
                     <?php echo form_error('cpphone'); ?>
				</td>
			    <td valign="top">Mobile No.<span style="color:red;">*</span></td>
				<td><input type="text" name="cpmobile" class="text" value="<?php echo set_value('cpmobile',$this->form_data->cpmobile); ?>"/>
                    <?php echo form_error('cpmobile'); ?>
				</td>
            </tr>
            <tr>
                <td valign="top">Password<span style="color:red;">*</span></td>
				<td><input type="password" name="pass" class="text" value="<?php echo set_value('pass',$this->form_data->pass); ?>"/>
                     <?php echo form_error('pass'); ?>
				</td>
                <td valign="top">Re-type Password<span style="color:red;">*</span></td>
				<td><input type="password" name="rpass" class="text" value="<?php echo set_value('rpass',$this->form_data->rpass); ?>"/>
                     <?php echo form_error('rpass'); ?>
				</td>
            </tr>
            <tr>
                <td valign="top">Pin No.<span style="color:red;">*</span></td>
				<td><input type="password" name="pin" maxlength="4" class="text" value="<?php echo set_value('pin',$this->form_data->pin); ?>"/>
                     <?php echo form_error('pin'); ?>
				</td>
                <td valign="top">Re-type Pin No.<span style="color:red;">*</span></td>
				<td><input type="password" name="rpin" maxlength="4" class="text" value="<?php echo set_value('rpin',$this->form_data->rpin); ?>"/>
                     <?php echo form_error('rpin'); ?>
				</td>
            </tr>

            <tr>
                <td valign="top">Status<span</span></td>
                <td> <select name='status'>
                        <option value="ACT" selected>Activeted </option>
                        <option value="SPD" >Suspended</option>
                        <option value="LCK" >Locked</option>
                        <option value="DSB">Disabled</option>
                    </select></td>

                <td valign="top">Category<span </span></td>
                <td> <select name='category'>
                        <option value="BRA">Branch</option>
                        <option value="AGC">Agency</option>
                    </select></td>
            </tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="Save"/></td>
			</tr>
		</table>
		</div>
		</form>
		<br />
	  	<?php //echo $link_back;
        ?>
	</div>
</body>
</html>
