<?php 

require_once("../../includes/initialize.php"); 

if (!$session->is_logged_in()) { redirect_to("login.php"); }

$current_user = SalesRep::find_by_id($session->user_id);



//**************Plum Email Form Submittion***************
if(isset($_POST['p_e_submit'])){

	$plum_email = new PlumEmail();

	
	if($_POST['p_e_client_name']){	
		$plum_email->client_name = trim($_POST['p_e_client_name']);}
		
	if($_POST['p_e_email_list']){	
		$plum_email->email_list = trim($_POST['p_e_email_list']);}
		
	if($_POST['p_e_website_url']){	
		$plum_email->website_url = trim($_POST['p_e_website_url']);}
		
	if($_POST['p_e_send_date']){	
		$plum_email->send_date = trim($_POST['p_e_send_date']);}
		
	if($_POST['p_e_notes']){	
		$plum_email->notes = trim($_POST['p_e_notes']);}
		
	if($_POST['p_e_page_complete'] == 1){	
		$plum_email->page_complete = 1; $p_e_p_c = "YES"; }
		else{ $plum_email->page_complete = 0; $p_e_p_c = "NO"; }
		
	if($_POST['p_e_leads']){	
		$plum_email->leads = trim($_POST['p_e_leads']);}
		
	if($_POST['p_e_id']){	
		$plum_email->id = trim($_POST['p_e_id']);}
	
	if($_POST['p_e_salesrep_id']){	
		$plum_email->salesrep_id = trim($_POST['p_e_salesrep_id']);}
	
	
if($_POST['p_e_update_developer']){


 $to = "developer@plumdm.com";
 $subject = "Changes to Plum Email from {$current_user->first_name} {$current_user->last_name}!";

$headers = "From: " . "{$current_user->first_name}"." "."{$current_user->last_name}"."<{$current_user->username}>" . "\r\n";
$headers .= "Reply-To: " . "{$current_user->first_name}"." "."{$current_user->last_name}"."<{$current_user->username}>" . "\r\n";
$headers .= "CC: "."{$current_user->first_name}"." "."{$current_user->last_name}"."<{$current_user->username}>" ."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>PLUMDM/HELP</title>
		<style type="text/css">
		</style>
	</head>	
	<body style="background-color:white;">

	<table  width="600" align="center" border="0" cellspacing="0" cellpadding="0" >
			<tr>
			<td valign="top" align="center" bgcolor="#ffffff" style=" color:grey; padding: 0px 0px 15px 0px;  font-family: Helvetica, sans-serif; font-size: 20px;">
			Changes From '. $current_user->first_name .' ' .$current_user->last_name.' to Plum Email
			</td>	
			</tr>
	</table>


	<table style="" width="600" align="center" border="0" cellspacing="0" cellpadding="0" class="mainContainer">
		<tr>
		<td>
			
			
			
			<table class="header" height="70" width="600" align="center" border="0" cellspacing="0" cellpadding="0" >
			<tr>
			<td valign="top" align="center" bgcolor="#ffffff" style="background-color:#7A1249; padding: 10px 0px 10px 0px; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Arial, Helvetica, sans-serif; font-size: 16px;">
				<img height="50px" src="http://plumdm.com/PLUMDM_help/public/site_images/plum_logo_name.png">
			</td>	
			</tr>
			</table>
			
			<table class="clientContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:#FF9900; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family:Helvetica; font-size: 22px; padding: 20px 0 5px 0; ">
				'. $plum_email->client_name .'
			</td>	
			</tr>
			</table>
			
			
			<table class="clientLeadsContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:grey; border-right: 1px solid #dbc064; border-left: 1px solid #dbc064; font-family: Helvetica; font-size: 14px; padding: 0px 0px 20px 0; ">
				Leads : '.$plum_email->leads.'
			</td>	
			</tr>
			</table>
			
			
			<table class="urlText" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#c5eccd" align="center" style="color:#7ac784; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 17px; letter-spacing:2px;  padding: 20px 0 5px 0; ">
				URL
			</td>	
			</tr>
			</table>
			
			<table class="urlContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#c5eccd" align="center" style="color:#626169; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 16px; letter-spacing:1px;  padding: 0px 0 20px 0; ">
				<a href="'.$plum_email->website_url.'" style="text-decoration:none; color:#626169">'.$plum_email->website_url.'</a>
			</td>	
			</tr>
			</table>
			
			<table class="emailText" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:grey; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 17px; letter-spacing:2px;  padding: 20px 0 5px 0; ">
				EMAIL LIST
			</td>	
			</tr>
			</table>
			
			<table class="emailContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:#FF9900; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 16px; letter-spacing:1px;  padding: 0px 0 20px 0; ">
				<a style="text-decoration:none; color:#FF9900">'.$plum_email->email_list.'</a>
			</td>	
			</tr>
			</table>
			
			<table class="startExpireContainer" bgcolor="#C5ECCD" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#c5eccd" align="center" style=" border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; color:#626169; font-family: Helvetica; font-size: 16px; letter-spacing:2px;  padding: 20px 0 20px 0;">
			<p style="display:inline; color:#7ac784; margin:0; padding:0">SEND DATE:</p> '.$plum_email->send_date.'
			</td>	
			</tr>
			</table>
			
			<table class="notesText" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:grey; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 17px; letter-spacing:2px;  padding: 20px 0 5px 0; ">
				NOTES
			</td>	
			</tr>
			</table>
			
			<table class="notesContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style=" text-align:center; color:#FF9900; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 14px; letter-spacing:1px;  padding: 0px 50px 20px 50px; ">
				'.$plum_email->notes.'
			</td>	
			</tr>
			</table>

			<table class="checkBoxes" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top"  bgcolor="#c5eccd" align="center" style="color:#626169; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 14px; letter-spacing:0px;  padding: 20px 0 20px 0; ">
				<p style="display:inline; color:#7ac784;">Page Complete:</p> '.$p_e_p_c.'
			</td>	
			</tr>
			</table>
		
			<table class="footer" width="600" align="center"  border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" align="center" bgcolor="#ffffff" style="background-color:white; padding: 10px 0px 10px 0px; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; border-bottom: 1px solid #dbc064; font-family: Arial, Helvetica, sans-serif; font-size: 16px;">
				<img height="50px" src="http://plumdm.com/PLUMDM_help/public/site_images/plum_logo.png">		
			</td>	
			</tr>
			</table>
			
		</td>
		</tr>
	</table>

	</body>	
</html>';


mail($to, $subject, $message, $headers);
}
	
	
	$sucess_p_e = $plum_email->update_p_e_template_info();
	
	//Verifying if information is updated
//	if($sucess_p_e){
//		$session->message("<span class='bold'>Successfully UPDATED</span> <span class='boldCreamColor'> information to Plum Emails.</span>");
//		redirect_to("user.php");
//	} else{
//		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> UPDATE</span> <span class='boldCreamColor'> information to Plum Emails Template.</span>");
//		redirect_to("user.php");
//	}
}



//**************Client Email Form Submittion***************
if(isset($_POST['c_e_submit'])){

	$client_email = new ClientEmail();

	
	if($_POST['c_e_client_name']){	
		$client_email->client_name = trim($_POST['c_e_client_name']);}
		
	if($_POST['c_e_email_list']){	
		$client_email->email_list = trim($_POST['c_e_email_list']);}
		
	if($_POST['c_e_website_url']){	
		$client_email->website_url = trim($_POST['c_e_website_url']);}
		
	if($_POST['c_e_send_date']){	
		$client_email->send_date = trim($_POST['c_e_send_date']);}
		
	if($_POST['c_e_notes']){	
		$client_email->notes = trim($_POST['c_e_notes']);}
		
	if($_POST['c_e_page_complete'] == 1){	
		$client_email->page_complete = 1; $c_e_p_c = "YES"; }
		else{ $client_email->page_complete = 0; $c_e_p_c = "NO"; }
		
	if($_POST['c_e_leads']){	
		$client_email->leads = trim($_POST['c_e_leads']);}
		
	if($_POST['c_e_id']){	
		$client_email->id = trim($_POST['c_e_id']);}
		
	if($_POST['c_e_salesrep_id']){	
		$client_email->salesrep_id = trim($_POST['c_e_salesrep_id']);}
	
if($_POST['c_e_update_developer']){


 $to = "developer@plumdm.com";
 $subject = "Changes to Client Email from {$current_user->first_name} {$current_user->last_name}!";

$headers = "From: " . "{$current_user->first_name}"." "."{$current_user->last_name}"."<{$current_user->username}>" . "\r\n";
$headers .= "Reply-To: " . "{$current_user->first_name}"." "."{$current_user->last_name}"."<{$current_user->username}>" . "\r\n";
$headers .= "CC: "."{$current_user->first_name}"." "."{$current_user->last_name}"."<{$current_user->username}>" ."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>PLUMDM/HELP</title>
		<style type="text/css">
		</style>
	</head>	
	<body style="background-color:white;">

	<table  width="600" align="center" border="0" cellspacing="0" cellpadding="0" >
			<tr>
			<td valign="top" align="center" bgcolor="#ffffff" style=" color:grey; padding: 0px 0px 15px 0px;  font-family: Helvetica, sans-serif; font-size: 20px;">
			Changes From '. $current_user->first_name .' ' .$current_user->last_name.' to Client Email
			</td>	
			</tr>
	</table>


	<table style="" width="600" align="center" border="0" cellspacing="0" cellpadding="0" class="mainContainer">
		<tr>
		<td>
			
			
			
			<table class="header" height="70" width="600" align="center" border="0" cellspacing="0" cellpadding="0" >
			<tr>
			<td valign="top" align="center" bgcolor="#ffffff" style="background-color:#7A1249; padding: 10px 0px 10px 0px; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Arial, Helvetica, sans-serif; font-size: 16px;">
				<img height="50px" src="http://plumdm.com/PLUMDM_help/public/site_images/plum_logo_name.png">
			</td>	
			</tr>
			</table>
			
			<table class="clientContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:#FF9900; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family:Helvetica; font-size: 22px; padding: 20px 0 5px 0; ">
				'. $client_email->client_name .'
			</td>	
			</tr>
			</table>
			
			
			<table class="clientLeadsContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:grey; border-right: 1px solid #dbc064; border-left: 1px solid #dbc064; font-family: Helvetica; font-size: 14px; padding: 0px 0px 20px 0; ">
				Leads : '.$client_email->leads.'
			</td>	
			</tr>
			</table>
			
			
			<table class="urlText" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#c5eccd" align="center" style="color:#7ac784; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 17px; letter-spacing:2px;  padding: 20px 0 5px 0; ">
				URL
			</td>	
			</tr>
			</table>
			
			<table class="urlContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#c5eccd" align="center" style="color:#626169; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 16px; letter-spacing:1px;  padding: 0px 0 20px 0; ">
				<a href="'.$client_email->website_url.'" style="text-decoration:none; color:#626169">'.$client_email->website_url.'</a>
			</td>	
			</tr>
			</table>
			
			<table class="emailText" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:grey; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 17px; letter-spacing:2px;  padding: 20px 0 5px 0; ">
				EMAIL LIST
			</td>	
			</tr>
			</table>
			
			<table class="emailContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:#FF9900; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 16px; letter-spacing:1px;  padding: 0px 0 20px 0; ">
				<a style="text-decoration:none; color:#FF9900">'.$client_email->email_list.'</a>
			</td>	
			</tr>
			</table>
			
			<table class="startExpireContainer" bgcolor="#C5ECCD" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#c5eccd" align="center" style=" border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; color:#626169; font-family: Helvetica; font-size: 16px; letter-spacing:2px;  padding: 20px 0 20px 0;">
			<p style="display:inline; color:#7ac784; margin:0; padding:0">SEND DATE:</p> '.$client_email->send_date.'
			</td>	
			</tr>
			</table>
			
			<table class="notesText" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:grey; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 17px; letter-spacing:2px;  padding: 20px 0 5px 0; ">
				NOTES
			</td>	
			</tr>
			</table>
			
			<table class="notesContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style=" text-align:center; color:#FF9900; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 14px; letter-spacing:1px;  padding: 0px 50px 20px 50px; ">
				'.$client_email->notes.'
			</td>	
			</tr>
			</table>

			<table class="checkBoxes" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top"  bgcolor="#c5eccd" align="center" style="color:#626169; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 14px; letter-spacing:0px;  padding: 20px 0 20px 0; ">
				<p style="display:inline; color:#7ac784;">Page Complete:</p> '.$c_e_p_c.'
			</td>	
			</tr>
			</table>
		
			<table class="footer" width="600" align="center"  border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" align="center" bgcolor="#ffffff" style="background-color:white; padding: 10px 0px 10px 0px; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; border-bottom: 1px solid #dbc064; font-family: Arial, Helvetica, sans-serif; font-size: 16px;">
				<img height="50px" src="http://plumdm.com/PLUMDM_help/public/site_images/plum_logo.png">		
			</td>	
			</tr>
			</table>
			
		</td>
		</tr>
	</table>

	</body>	
</html>';


mail($to, $subject, $message, $headers);
}
	
	$sucess_c_e = $client_email->update_c_e_template_info();
	
	//Verifying if information is updated
//	if($sucess_c_e){
//		$session->message("<span class='bold'>Successfully UPDATED</span> <span class='boldCreamColor'> information to Client Emails.</span>");
//		redirect_to("user.php");
//	} else{
//		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> UPDATE</span> <span class='boldCreamColor'> information to Client Emails Template.</span>");
//		redirect_to("user.php");
//	}
}





//**************Plum Landing Page Form Submittion***************
if(isset($_POST['p_lp_submit'])){
	
	$plum_landing_page = new PlumLP();

	
	if($_POST['p_lp_client_name']){	
		$plum_landing_page->client_name = trim($_POST['p_lp_client_name']);}
		
	if($_POST['p_lp_email']){	
		$plum_landing_page->email = trim($_POST['p_lp_email']);}
		
	if($_POST['p_lp_city']){	
		$plum_landing_page->city = trim($_POST['p_lp_city']);}
		
	if($_POST['p_lp_state']){	
		$plum_landing_page->state = trim($_POST['p_lp_state']);}
		
	if($_POST['p_lp_zip_code']){	
		$plum_landing_page->zip_code = trim($_POST['p_lp_zip_code']);}
		
	if($_POST['p_lp_google_ad'] == 1){	
		$plum_landing_page->google_ad = 1; $p_lp_g_a = "YES"; }
		else{ $plum_landing_page->google_ad = 0; $p_lp_g_a = "NO";  }
		
	if($_POST['p_lp_google_ad_setup'] == 1){	
		$plum_landing_page->google_ad_setup = 1; $p_lp_g_a_s = "YES";  }
		else{ $plum_landing_page->google_ad_setup = 0; $p_lp_g_a_s = "NO"; }
		
	if($_POST['p_lp_website_url']){	
		$plum_landing_page->website_url = trim($_POST['p_lp_website_url']);}
		
	if($_POST['p_lp_start_date']){	
		$plum_landing_page->start_date = trim($_POST['p_lp_start_date']);}
		
	if($_POST['p_lp_expire_date']){	
		$plum_landing_page->expire_date = trim($_POST['p_lp_expire_date']);}
		
	if($_POST['p_lp_notes']){	
		$plum_landing_page->notes = trim($_POST['p_lp_notes']);}
		
	if($_POST['p_lp_page_complete'] == 1){	
		$plum_landing_page->page_complete = 1;  $p_lp_p_c = "YES";}
		else{ $plum_landing_page->page_complete = 0; $p_lp_p_c = "NO"; }
		
	if($_POST['p_lp_renewing_page'] == 1){	
		$plum_landing_page->renewing_page = 1;  $p_lp_r_p = "YES";}
		else{ $plum_landing_page->renewing_page = 0;  $p_lp_r_p = "NO"; }
		
	if($_POST['p_lp_leads']){	
		$plum_landing_page->leads = trim($_POST['p_lp_leads']);}
		
	if($_POST['p_lp_id']){	
		$plum_landing_page->id = trim($_POST['p_lp_id']);}
		
	if($_POST['p_lp_salesrep_id']){	
		$plum_landing_page->salesrep_id = trim($_POST['p_lp_salesrep_id']);}
	
if($_POST['p_lp_update_developer']){



 $to = "developer@plumdm.com";
 $subject = "Changes to Plum Landing Page from {$current_user->first_name} {$current_user->last_name}!";

$headers = "From: " . "{$current_user->first_name}"." "."{$current_user->last_name}"."<{$current_user->username}>" . "\r\n";
$headers .= "Reply-To: " . "{$current_user->first_name}"." "."{$current_user->last_name}"."<{$current_user->username}>" . "\r\n";
$headers .= "CC: "."{$current_user->first_name}"." "."{$current_user->last_name}"."<{$current_user->username}>" ."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>PLUMDM/HELP</title>
		<style type="text/css">
		</style>
	</head>	
	<body style="background-color:white;">

	<table  width="600" align="center" border="0" cellspacing="0" cellpadding="0" >
			<tr>
			<td valign="top" align="center" bgcolor="#ffffff" style=" color:grey; padding: 0px 0px 15px 0px;  font-family: Helvetica, sans-serif; font-size: 20px;">
			Changes From '. $current_user->first_name .' ' .$current_user->last_name.' to Plum Landing Page
			</td>	
			</tr>
	</table>


	<table style="" width="600" align="center" border="0" cellspacing="0" cellpadding="0" class="mainContainer">
		<tr>
		<td>
			
			
			
			<table class="header" height="70" width="600" align="center" border="0" cellspacing="0" cellpadding="0" >
			<tr>
			<td valign="top" align="center" bgcolor="#ffffff" style="background-color:#7A1249; padding: 10px 0px 10px 0px; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Arial, Helvetica, sans-serif; font-size: 16px;">
				<img height="50px" src="http://plumdm.com/PLUMDM_help/public/site_images/plum_logo_name.png">
			</td>	
			</tr>
			</table>
			
			<table class="clientContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:#FF9900; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family:Helvetica; font-size: 22px; padding: 20px 0 15px 0; ">
				'. $plum_landing_page->client_name .'
			</td>	
			</tr>
			</table>
			
			<table class="clientAddressContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:grey; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 14px; padding: 0px 0 5px 0px; ">
				( '.$plum_landing_page->city.' / '.$plum_landing_page->state.'/ '.$plum_landing_page->zip_code.' )
			</td>	
			</tr>
			</table>
			
			
			<table class="clientLeadsContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:grey; border-right: 1px solid #dbc064; border-left: 1px solid #dbc064; font-family: Helvetica; font-size: 14px; padding: 0px 0px 20px 0; ">
				Leads : '.$plum_landing_page->leads.'
			</td>	
			</tr>
			</table>
			
			
			<table class="urlText" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#c5eccd" align="center" style="color:#7ac784; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 17px; letter-spacing:2px;  padding: 20px 0 5px 0; ">
				URL
			</td>	
			</tr>
			</table>
			
			<table class="urlContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#c5eccd" align="center" style="color:#626169; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 16px; letter-spacing:1px;  padding: 0px 0 20px 0; ">
				<a href="'.$plum_landing_page->website_url.'" style="text-decoration:none; color:#626169">'.$plum_landing_page->website_url.'</a>
			</td>	
			</tr>
			</table>
			
			<table class="emailText" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:grey; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 17px; letter-spacing:2px;  padding: 20px 0 5px 0; ">
				EMAIL
			</td>	
			</tr>
			</table>
			
			<table class="emailContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:#FF9900; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 16px; letter-spacing:1px;  padding: 0px 0 20px 0; ">
				<a style="text-decoration:none; color:#FF9900">'.$plum_landing_page->email.'</a>
			</td>	
			</tr>
			</table>
			
			<table class="startExpireContainer" bgcolor="#C5ECCD" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" style=" border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica;">
				<table class="starts" align="left" width="290" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<td valign="top"  bgcolor="#c5eccd" align="center" style="color:#626169; font-family: Helvetica; font-size: 16px; letter-spacing:2px;  padding: 20px 0 20px 0; ">
					<p style="display:inline; color:#7ac784; margin:0; padding:0">STARTS:</p> '.$plum_landing_page->start_date.'
				</td>	
				</tr>
				</table>

				<table class="expires" align="right" width="290" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<td valign="top"  bgcolor="#c5eccd" align="center" style="color:#626169; font-family: Helvetica; font-size: 16px; letter-spacing:2px;  padding: 20px 0 20px 0;  ">
					<p style="display:inline; color:#7ac784; margin:0; padding:0">EXPIRES:</p> '.$plum_landing_page->expire_date.'
				</td>	
				</tr>
				</table>
			</td>	
			</tr>
			</table>
			
			<table class="notesText" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:grey; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 17px; letter-spacing:2px;  padding: 20px 0 5px 0; ">
				NOTES
			</td>	
			</tr>
			</table>
			
			<table class="notesContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style=" text-align:justify; color:#FF9900; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 14px; letter-spacing:1px;  padding: 0px 50px 20px 50px; ">
				'.$plum_landing_page->notes.'
			</td>	
			</tr>
			</table>

			<table class="checkBoxes" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top"  bgcolor="#c5eccd" align="center" style="color:#626169; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 12px; letter-spacing:0px;  padding: 20px 0 20px 0; ">
				<p style="display:inline; color:#7ac784;">Google AdWords:</p> '.$p_lp_g_a.' / <p style="display:inline; color:#7ac784;">AdWords Setup:</p> '.$p_lp_g_a_s.' / <p style="display:inline; color:#7ac784;">Page Complete:</p> '.$p_lp_p_c.' / <p style="display:inline; color:#7ac784;">Renewing Page:</p> '.$p_lp_r_p.' 
			</td>	
			</tr>
			</table>
		
			<table class="footer" width="600" align="center"  border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" align="center" bgcolor="#ffffff" style="background-color:white; padding: 10px 0px 10px 0px; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; border-bottom: 1px solid #dbc064; font-family: Arial, Helvetica, sans-serif; font-size: 16px;">
				<img height="50px" src="http://plumdm.com/PLUMDM_help/public/site_images/plum_logo.png">		
			</td>	
			</tr>
			</table>
			
		</td>
		</tr>
	</table>

	</body>	
</html>';

mail($to, $subject, $message, $headers);

 //$body = "{$plum_email->client_name}";
 //$mailheader = "Surya Test <landings@plumdm.com>";
 //mail($to, $subject, $body);
}


	
	$sucess_p_lp = $plum_landing_page->update_p_lp_template_info();
	
	//Verifying if information is updated
//	if($sucess_p_lp){
//		$session->message("<span class='bold'>Successfully UPDATED</span> <span class='boldCreamColor'> information to Plum Landing Pages.</span>");
//		redirect_to("user.php");
//	} else{
//		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> UPDATE</span> <span class='boldCreamColor'> information to Plum Landing Pages Template.</span>");
//		redirect_to("user.php");
//	}
}






//**************Client Landing Page Form Submittion***************
if(isset($_POST['c_lp_submit'])){
	
	$client_landing_page = new ClientLp();

	
	if($_POST['c_lp_client_name']){	
		$client_landing_page->client_name = trim($_POST['c_lp_client_name']);}
		
	if($_POST['c_lp_email']){	
		$client_landing_page->email = trim($_POST['c_lp_email']);}
		
	if($_POST['c_lp_city']){	
		$client_landing_page->city = trim($_POST['c_lp_city']);}
		
	if($_POST['c_lp_state']){	
		$client_landing_page->state = trim($_POST['c_lp_state']);}
		
	if($_POST['c_lp_zip_code']){	
		$client_landing_page->zip_code = trim($_POST['c_lp_zip_code']);}
		
	if($_POST['c_lp_google_ad'] == 1){	
		$client_landing_page->google_ad = 1; $c_lp_g_a = "YES"; }
		else{ $client_landing_page->google_ad = 0; $c_lp_g_a = "NO"; }
		
	if($_POST['c_lp_google_ad_setup'] == 1){	
		$client_landing_page->google_ad_setup = 1; $c_lp_g_a_s = "YES"; }
		else{ $client_landing_page->google_ad_setup = 0; $c_lp_g_a_s = "NO"; }
		
	if($_POST['c_lp_website_url']){	
		$client_landing_page->website_url = trim($_POST['c_lp_website_url']);}
		
	if($_POST['c_lp_start_date']){	
		$client_landing_page->start_date = trim($_POST['c_lp_start_date']);}
		
	if($_POST['c_lp_expire_date']){	
		$client_landing_page->expire_date = trim($_POST['c_lp_expire_date']);}
		
	if($_POST['c_lp_notes']){	
		$client_landing_page->notes = trim($_POST['c_lp_notes']);}
		
	if($_POST['c_lp_page_complete'] == 1){	
		$client_landing_page->page_complete = 1; $c_lp_p_c = "YES"; }
		else{ $client_landing_page->page_complete = 0; $c_lp_p_c = "NO"; }
		
	if($_POST['c_lp_renewing_page'] == 1){	
		$client_landing_page->renewing_page = 1; $c_lp_r_p = "YES"; }
		else{ $client_landing_page->renewing_page = 0; $c_lp_r_p = "NO"; }
		
	if($_POST['c_lp_leads']){	
		$client_landing_page->leads = trim($_POST['c_lp_leads']);}
		
	if($_POST['c_lp_id']){	
		$client_landing_page->id = trim($_POST['c_lp_id']);}
		
	if($_POST['c_lp_salesrep_id']){	
		$client_landing_page->salesrep_id = trim($_POST['c_lp_salesrep_id']);}
	
	
if($_POST['c_lp_update_developer']){

 $to = "developer@plumdm.com";
 $subject = "Changes to Client Landing Page from {$current_user->first_name} {$current_user->last_name}!";

$headers = "From: " . "{$current_user->first_name}"." "."{$current_user->last_name}"."<{$current_user->username}>" . "\r\n";
$headers .= "Reply-To: " . "{$current_user->first_name}"." "."{$current_user->last_name}"."<{$current_user->username}>" . "\r\n";
$headers .= "CC: "."{$current_user->first_name}"." "."{$current_user->last_name}"."<{$current_user->username}>" ."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>PLUMDM/HELP</title>
		<style type="text/css">
		</style>
	</head>	
	<body style="background-color:white;">

	<table  width="600" align="center" border="0" cellspacing="0" cellpadding="0" >
			<tr>
			<td valign="top" align="center" bgcolor="#ffffff" style=" color:grey; padding: 0px 0px 15px 0px;  font-family: Helvetica, sans-serif; font-size: 20px;">
			Changes From '. $current_user->first_name .' ' .$current_user->last_name.' to Client Landing Page
			</td>	
			</tr>
	</table>


	<table style="" width="600" align="center" border="0" cellspacing="0" cellpadding="0" class="mainContainer">
		<tr>
		<td>
			
			
			<table class="header" height="70" width="600" align="center" border="0" cellspacing="0" cellpadding="0" >
			<tr>
			<td valign="top" align="center" bgcolor="#ffffff" style="background-color:#7A1249; padding: 10px 0px 10px 0px; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Arial, Helvetica, sans-serif; font-size: 16px;">
				<img height="50px" src="http://plumdm.com/PLUMDM_help/public/site_images/plum_logo_name.png">
			</td>	
			</tr>
			</table>
			
			<table class="clientContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:#FF9900; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family:Helvetica; font-size: 22px; padding: 20px 0 15px 0; ">
				'. $client_landing_page->client_name .'
			</td>	
			</tr>
			</table>
			
			<table class="clientAddressContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:grey; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 14px; padding: 0px 0 5px 0px; ">
				( '.$client_landing_page->city.' / '.$client_landing_page->state.'/ '.$client_landing_page->zip_code.' )
			</td>	
			</tr>
			</table>
			
			
			<table class="clientLeadsContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:grey; border-right: 1px solid #dbc064; border-left: 1px solid #dbc064; font-family: Helvetica; font-size: 14px; padding: 0px 0px 20px 0; ">
				Leads : '.$client_landing_page->leads.'
			</td>	
			</tr>
			</table>
			
			
			<table class="urlText" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#c5eccd" align="center" style=" color:#7ac784; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 17px; letter-spacing:2px;  padding: 20px 0 5px 0; ">
				URL
			</td>	
			</tr>
			</table>
			
			<table class="urlContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#c5eccd" align="center" style="color:#626169; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 16px; letter-spacing:1px;  padding: 0px 0 20px 0; ">
				<a href="'.$client_landing_page->website_url.'" style="text-decoration:none; color:#626169">'.$client_landing_page->website_url.'</a>
			</td>	
			</tr>
			</table>
			
			<table class="emailText" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:grey; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 17px; letter-spacing:2px;  padding: 20px 0 5px 0; ">
				EMAIL
			</td>	
			</tr>
			</table>
			
			<table class="emailContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:#FF9900; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 16px; letter-spacing:1px;  padding: 0px 0 20px 0; ">
				<a style="text-decoration:none; color:#FF9900">'.$client_landing_page->email.'</a>
			</td>	
			</tr>
			</table>
			
			<table class="startExpireContainer" bgcolor="#C5ECCD" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" style=" border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica;">
				<table class="starts" align="left" width="290" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<td valign="top"  bgcolor="#c5eccd" align="center" style="color:#626169; font-family: Helvetica; font-size: 16px; letter-spacing:2px;  padding: 20px 0 20px 0; ">
					<p style="display:inline; color:#7ac784; margin:0; padding:0">STARTS:</p> '.$client_landing_page->start_date.'
				</td>	
				</tr>
				</table>

				<table class="expires" align="right" width="290" border="0" cellspacing="0" cellpadding="0">
				<tr>
				<td valign="top"  bgcolor="#c5eccd" align="center" style="color:#626169; font-family: Helvetica; font-size: 16px; letter-spacing:2px;  padding: 20px 0 20px 0;  ">
					<p style="display:inline; color:#7ac784; margin:0; padding:0">EXPIRES:</p> '.$client_landing_page->expire_date.'
				</td>	
				</tr>
				</table>
			</td>	
			</tr>
			</table>
			
			<table class="notesText" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style="color:grey; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 17px; letter-spacing:2px;  padding: 20px 0 5px 0; ">
				NOTES
			</td>	
			</tr>
			</table>
			
			<table class="notesContainer" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top" bgcolor="#f7f7f7" align="center" style=" text-align:justify; color:#FF9900; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 14px; letter-spacing:1px;  padding: 0px 50px 20px 50px; ">
				'.$client_landing_page->notes.'
			</td>	
			</tr>
			</table>

			<table class="checkBoxes" align="center" width="600" border="0" cellspacing="0" cellpadding="0">
			<tr>
			<td valign="top"  bgcolor="#c5eccd" align="center" style="color:#626169; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; font-family: Helvetica; font-size: 12px; letter-spacing:0px;  padding: 20px 0 20px 0; ">
				<p style="display:inline; color:#7ac784;">Google AdWords:</p> ' .$c_lp_g_a. ' / <p style="display:inline; color:#7ac784;">AdWords Setup:</p> '.$c_lp_g_a_s.' / <p style="display:inline; color:#7ac784;">Page Complete:</p>'.$c_lp_p_c. ' / <p style="display:inline; color:#7ac784;">Renewing Page:</p> '.$c_lp_r_p .'
		</td>	
		</tr>
		</table>
		
		<table class="footer" width="600" align="center"  border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td valign="top" align="center" bgcolor="#ffffff" style="background-color:white; padding: 10px 0px 10px 0px; border-left: 1px solid #dbc064; border-right: 1px solid #dbc064; border-bottom: 1px solid #dbc064; font-family: Arial, Helvetica, sans-serif; font-size: 16px;">
				<img height="50px" src="http://plumdm.com/PLUMDM_help/public/site_images/plum_logo.png">		
			</td>	
			</tr>
			</table>
			
		</td>
		</tr>
	</table>

	</body>	
</html>';

mail($to, $subject, $message, $headers);
}
	
	
	
	$sucess_c_lp = $client_landing_page->update_c_lp_template_info();
	
	//Verifying if information is updated
//	if($sucess_c_lp){
//		$session->message("<span class='bold'>Successfully UPDATED</span> <span class='boldCreamColor'> information to Client Landing Pages.</span>");
//		redirect_to("user.php");
//	} else{
//		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> UPDATE</span> <span class='boldCreamColor'> information to Client Landing Pages Template.</span>");
//		redirect_to("user.php");
//	}
}

?>
