<html>
	<head>
		<title>Captcha Demo</title>
	</head>
	
	<body>	
		<form id="form1" method="POST" action="<?php echo site_url('captcha/index'); ?>">
			<table width="50%" border="1" cellpadding="4" cellspacing="1" class="inputBox">			
				<tr>
					<td>Security Code:</td>
					<td>
						<span id="captchaImage"><?php echo $captcha['image']; ?></span> 
					</td>
				</tr>	
				<tr>
					<td><label for="confirmCaptcha">Confirm Sercurity Code:</label></td>
					<td>
						<input size="40" type="text" name="confirmCaptcha" id="confirmCaptcha" value="" />
					</td>
				</tr>		
				<tr>
					<td colspan="2" align="center"><input value=" Submit " class="button" type="submit" /></td>
				</tr>				
			</table>											
		</form>
	</body>
</html>