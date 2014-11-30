<?php 

require_once("../../includes/initialize.php");
	
	//special case session must be started before its destroyed
	session_start();

	//Get all Sales Reps
	$sales_reps = SalesRep::get_all_salesrep();

if(isset($_POST['submit'])){
	
	$client_landing_page = new ClientLp();
	$edit_c_lp = new ClientLpContent();
	
	
	if($_POST['client_name']){	
	$client_landing_page->client_name = trim($_POST['client_name']);
	}


	if($_POST['client_email']){
	$client_landing_page->email = trim($_POST['client_email']);
	}


	if($_POST['sales_rep_id']){	
	$client_landing_page->salesrep_id = 0;
	$edit_c_lp->temp_salesrep_id = trim($_POST['sales_rep_id']);
	}
		
	$sucess_c_lp = $client_landing_page->create_c_lp_template_info();
	
	$edit_c_lp->clientlp_id = $sucess_c_lp;
//	$edit_c_lp->salesrep_id = trim($_POST['sales_rep_id']);
	$edit_c_lp->title = "Company Name";
	$edit_c_lp->content_header = "What We Do";
	$edit_c_lp->content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
	$edit_c_lp->box1_header = "project manager / business analyst";
	$edit_c_lp->box1_content = "Not every project requires a full-time project manager. But almost every project requires business analysis and requirements gathering. If you need a PM with business analysis skills, we’ve got you covered.";
	$edit_c_lp->box2_header = "project manager / consultant";
	$edit_c_lp->box2_content = "Sometimes you need project managers to get things done, but also experienced management consultants to thoroughly analyze your challenges and make specific recommendations. This is where having the management consulting experience can help a lot.";
	$edit_c_lp->box3_header = "project management training";
	$edit_c_lp->box3_content = "We are well-versed in Agile, traditional, Scrum, Prince2 and other methodologies. We can provide you training specifically built around your Higher Ed culture on any of these topics, or more.";
	$edit_c_lp->footer = "2014 © Your Company Name";
	
	$sucess_edit_c_lp = $edit_c_lp->create_c_lp_content_info();
	
	
	header("Location: template1.php?main_clientlp_edit_id=". $sucess_edit_c_lp);
}
	
?>



<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<title>Info Template1</title>
	<link type="text/css" rel="stylesheet" href="../stylesheets/auto_upload.css">
	</head>

<body>
	<header class="bottomShadow">Please Enter Your Template Information</header>
	
	<!-------------------------Bussiness LOGO------------------------------->
	<form id="form" action="info_template1.php" method="POST">
		
			<h1 id="BLogoContainerh1">Step - <span>1</span></h1>
		<section class="transition" id="BLogoContainer">
	        <h2>Client Name</h2>
	        
	        <div class="bottomShadow transition green">
		        <div id="buisnessNameContainer">
		        	<input type="text" name="client_name" id="b_name" maxlength="32" required>
		        </div>
	       </div>
		</section>

	    
	    <!-------------------------Restaurant LOGO------------------------------->
	    	<h1 id="RLogoContainerh1">Step - <span>2</span></h1>
	    <section class="transition" id="RLogoContainer">
	        <h2>Client Email</h2>
	        
	        <div class="bottomShadow transition green">
			        
				<div id="restaurentNameContainer">
					<input type="text" name="client_email" id="r_name" required>
				</div>
			        
	        </div>
	        
		</section>
	    
	    <!-------------------------Professional Photo------------------------------->
	    	<h1 id="PLogoContainerh1">Step - <span>3</span></h1>
	    <section class="transition" id="PLogoContainer">
	        <h2>Select User</h2>
	        
			<div class="bottomShadow transition green">
				
			        	<select required name="sales_rep_id">
						<option value="">- - - - - -</option>
						<?php foreach($sales_reps as $sales_rep): ?>
						<?php if($sales_rep->id == 1){ continue; } ?>
						<option value="<?php echo $sales_rep->id; ?>"><?php echo $sales_rep->first_name." ".$sales_rep->last_name; ?></option>
						<?php endforeach; ?>
						</select>
	        </div>
	        
		</section>
	    
	    
	    <div class="loader" id="loader_form"></div><!--LOADER-->
	    <!--SUBMIT data, upload photos to next page, save as superglobals-->
		<input type="submit" id="submit" name="submit" value="NEXT">
	    
	</form>
	
	
	
	<footer class="upperShadow">PLUMDM</footer>
	
	<script type="text/javascript" src="public/javascripts/jquery-2.0.3.min.js"></script>
	<script type="text/javascript">
	
		
     </script>
  </body>
</html>