<?php 

require_once("../../includes/initialize.php");


$current_clp_content = ClientLpContent::find_by_id(1);

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Language" content="en">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes"> -->
<title>Cis 602 | Template 1</title>
<link rel="stylesheet" type="text/css" href="../stylesheets/template1.css">
</head>

<body>
	
<header class="bottomShadow">
	<div id="mainTitle"><?php echo $current_clp_content->title; ?></div>
</header>
	
<section id="mainContentContainer">
	<div id="mainContentH1">
		<?php echo $current_clp_content->content_header; ?>
	</div>
	<div id="mainContent">
		<?php echo $current_clp_content->content; ?>
	</div>
</section>
	
	
	
<div class="blocks">
	<div class="specializePoint">
			<h2><?php echo $current_clp_content->box1_header; ?></h2>
			<div class="pointSeperator"></div>
			<p><?php echo $current_clp_content->box1_content; ?></p>
		</div>
	
		<div class="specializePoint">
			<h2><?php echo $current_clp_content->box2_header; ?></h2>
			<div class="pointSeperator"></div>
			<p><?php echo $current_clp_content->box2_content; ?></p>
		</div>
	
		<div style="margin-right:0px;" class="specializePoint">
			<h2><?php echo $current_clp_content->box3_header; ?></h2>
			<div class="pointSeperator"></div>
			<p><?php echo $current_clp_content->box3_content; ?></p>
		</div>
	</div>

<footer>
	<p><?php echo $current_clp_content->footer; ?></p>
</footer>
	
</body>
	
</html>
