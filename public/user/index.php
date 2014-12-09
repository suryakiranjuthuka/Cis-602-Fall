<?php 

require_once("../../includes/initialize.php");

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<!--<meta name="google" content="notranslate">-->
<meta http-equiv="Content-Language" content="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
<title>CIS 602 | Home</title>
<link href="../stylesheets/plum_help.css" rel="stylesheet" type="text/css" media="screen,projection">	
</head>

<body>
<div id="container"><!-- ***** START CONTAINER***** -->

<a id="TOP"></a>

<header class="bottomShadow">
	<div id="headerImage" style="color:lightgrey; font-size:25px; padding-top:27px; position:relative; left:-10px;">Provenance</div>
    <div class="transition" id="loginLink"><a href="login.php" target="_blank">LOGIN</a></div>
</header>

<section id="mainButtonsBackgroundContainer">
    <div id="mainButtonsContainer">
            <div class="allShadow" id="emailButton">Email</div>
            <div class="allShadow" id="landingPageButton">Landing Pages</div>
            <div id="sliderLine"></div>
            <div id="selectCircle"></div>
            <div id="circleLetter"></div>
    </div>
</section>


<div id="introduction">
	<div id="introductionContainer">
	<h1>&nbsp;WELCOME TO </br>----CIS 602----</h1>
    <h2>Choose <span style="color:#4ad486";>Email</span> Templates (or) <span style=" color:rgb(58,190,192);">Landing Page</span> Templates</h2>
    </div>
</div>

<!--*************************************************************** START EMAIL TEMPLATES CONTAINER ******************************************************-->
<!--********************************************* END OF EMAIL TEMPLATES CONTAINER ******************************************************-->








<!--******************************************************** START LANDINGPAGE TEMPLATES CONTAINER ******************************************************-->
<section style="position:relative; top:-100px;" id="allLandingPageTemplatesContainer">

	<h1 id="clientEmails" class="innerShadow2">		<!--*****************CLIENT LANDING PAGE Heading***************-->
    	<a class="lpClientScroll" style="float:left; margin-top:-30px;" id="CLIENT"></a>
    	<div id="clientEmailsContainer">
                CLIENT LANDING PAGES
        </div>
    </h1>
    

<div id="allPlumEmailsContainer">	<!-- Start All CLIENT LP Container-->
	
	
	
	
		<div class="full_template_container">
          <div class="browser_bar">		<!-- BROWSER BAR-->
              <div class="dot1"></div>
              <div class="dot1"></div>
              <div class="dot1"></div>
          </div> 
          <div class="templateAllShadow show_template"><a href="info_template1.php" target="_blank"><!-- Template Image -->
		<img class="templateImage" height="220" src="../template_images/08.png"></a>
          </div>
          <div class="templateAllShadow eachTemplateButtonsContainer">	<!-- VIEW & SELECT Buttons-->
              <a href="info_template1.php"><button class="selectButton" language="javascript" style="border-style:none; cursor:pointer; background-color:rgba(123,123,123,.0);" ><div class="insideSelectButton">SELECT</div></button></a>
              <div class="buttonsBorder"></div>
              <a href="sample_template1.php?id=1" target="_blank"><div class="viewButton">VIEW</div></a>
          </div>
     </div><!-- END of CLIENT LP Container-->
	
	

		<div class="full_template_container">
          <div class="browser_bar">		<!-- BROWSER BAR-->
              <div class="dot1"></div>
              <div class="dot1"></div>
              <div class="dot1"></div>
          </div> 
          <div class="templateAllShadow show_template"><a href="info_template2.php" target="_blank"><!-- Template Image -->
		<img class="templateImage" height="220" src="../template_images/09.png"></a>
          </div>
          <div class="templateAllShadow eachTemplateButtonsContainer">	<!-- VIEW & SELECT Buttons-->
              <a href="info_template2.php"><button class="selectButton" language="javascript" style="border-style:none; cursor:pointer; background-color:rgba(123,123,123,.0);" ><div class="insideSelectButton">SELECT</div></button></a>
              <div class="buttonsBorder"></div>
              <a href="sample_template2.php" target="_blank"><div class="viewButton">VIEW</div></a>
          </div>
     </div><!-- END of CLIENT LP Container-->
	
	
	
	
		<div class="full_template_container">
          <div class="browser_bar">		<!-- BROWSER BAR-->
              <div class="dot1"></div>
              <div class="dot1"></div>
              <div class="dot1"></div>
          </div> 
          <div class="templateAllShadow show_template"><a href="info_template3.php" target="_blank"><!-- Template Image -->
		<img class="templateImage" height="220" src="../template_images/10.png"></a>
          </div>
          <div class="templateAllShadow eachTemplateButtonsContainer">	<!-- VIEW & SELECT Buttons-->
              <a href="info_template3.php"><button class="selectButton" language="javascript" style="border-style:none; cursor:pointer; background-color:rgba(123,123,123,.0);" ><div class="insideSelectButton">SELECT</div></button></a>
              <div class="buttonsBorder"></div>
              <a href="sample_template3.php" target="_blank"><div class="viewButton">VIEW</div></a>
          </div>
     </div><!-- END of CLIENT LP Container-->
	
	
	
	
	
	
	
</div>
    
    
    
</section><!--****************************************** END OF EMAIL TEMPLATES CONTAINER ******************************************************-->







<footer style="position:absolute; bottom:0px;"><div class="topLineHeading"></div>
	<img class="transition" src="../site_images/plum_logo.png" width="60px" height="60px" >
</footer>




</div><!-- ***** END OF CONTAINER***** -->

<script type="text/javascript" src="../javascripts/jquery-2.0.2.min.js"></script>
<script type="text/javascript" src="../javascripts/d3.min.js"></script>

<script type="text/javascript">
//*********************************************************On Click Hide Button Loader
$( "#p_e_submit" ).click(function() {
	$("#loader_p_e").fadeIn("fast");
});
$( "#c_e_submit" ).click(function() {
	$("#loader_all_c_e").fadeIn("fast");
});
$( "#p_lp_submit" ).click(function() {
	$("#loader_all_p_lp").fadeIn("fast");
});
$( "#c_lp_submit" ).click(function() {
	$("#loader_all_c_lp").fadeIn("fast");
});





</script>

<script type="text/javascript" src="../javascripts/plumdm_help.js"></script>
</body>
</html>
