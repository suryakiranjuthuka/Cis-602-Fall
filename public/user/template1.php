<?php 

require_once("../../includes/initialize.php");


$current_clp_content = ClientLpContent::find_by_id(trim($_GET['main_clientlp_edit_id']));
$mcei = $_GET['main_clientlp_edit_id'];

//$current_user = SalesRep::find_by_id(1);
$current_clientlp = ClientLp::find_by_id($current_clp_content->clientlp_id);


if(isset($_POST['submitDesignPopup'])){
	if($_POST['completereview'] == complete){
		$current_clp_content->complete = 1;
	}else {
		$current_clp_content->complete = 0;
	}
		
	if($_POST['completereview'] == review){
		$current_clp_content->review = 1;
	}else{
		$current_clp_content->review = 0;
	}
	
	if(isset($_POST['dateTime'])){
		$current_clp_content->time_created = trim($_POST['dateTime']);
	}
	
	$current_clientlp->salesrep_id = $current_clp_content->temp_salesrep_id;
	$current_clp_content->salesrep_id = $current_clp_content->temp_salesrep_id;
	
	$current_clientlp->t_o_c = $current_clp_content->count;
	$current_clientlp->leads = $current_clientlp->id;
	
	$sucess_c_lp_content = $current_clp_content->update_c_lp_content_info();
	$sucess_c_lp = $current_clientlp->update_c_lp_template_info();
	header("Location: user.php");
}
 

if(isset($_POST['form1'])){
	if(isset($_POST['title'])){
		$current_clp_content->title = trim($_POST['title']);
	}
	$current_clp_content->count = $current_clp_content->count + 1;
	$provanance = "Title";
	
	if($current_clp_content->count == 1){
		$current_clp_content->one = $provanance;
	}if($current_clp_content->count == 2){
		$current_clp_content->two = $provanance;
	}if($current_clp_content->count == 3){
		$current_clp_content->three = $provanance;
	}if($current_clp_content->count == 4){
		$current_clp_content->four = $provanance;
	}if($current_clp_content->count == 5){
		$current_clp_content->five = $provanance;
	}if($current_clp_content->count == 6){
		$current_clp_content->six = $provanance;
	}
	
	$sucess_c_lp = $current_clp_content->update_c_lp_content_info();
	header("Location: template1.php?main_clientlp_edit_id=". $mcei);
}


if(isset($_POST['form2'])){
	if(isset($_POST['content_header'])){
		$current_clp_content->content_header = trim($_POST['content_header']);
	}
	if(isset($_POST['content'])){
		$current_clp_content->content = trim($_POST['content']);
	}
	$current_clp_content->count = $current_clp_content->count + 1;
	$provanance = "Content";
	
	if($current_clp_content->count == 1){
		$current_clp_content->one = $provanance;
	}if($current_clp_content->count == 2){
		$current_clp_content->two = $provanance;
	}if($current_clp_content->count == 3){
		$current_clp_content->three = $provanance;
	}if($current_clp_content->count == 4){
		$current_clp_content->four = $provanance;
	}if($current_clp_content->count == 5){
		$current_clp_content->five = $provanance;
	}if($current_clp_content->count == 6){
		$current_clp_content->six = $provanance;
	}
	
	$sucess_c_lp = $current_clp_content->update_c_lp_content_info();
	header("Location: template1.php?main_clientlp_edit_id=". $mcei);
}


if(isset($_POST['form3'])){
	if(isset($_POST['box1_header'])){
		$current_clp_content->box1_header = trim($_POST['box1_header']);
	}
	if(isset($_POST['box1_content'])){
		$current_clp_content->box1_content = trim($_POST['box1_content']);
	}
	$current_clp_content->count = $current_clp_content->count + 1;
	$provanance = "Box-1";
	
	if($current_clp_content->count == 1){
		$current_clp_content->one = $provanance;
	}if($current_clp_content->count == 2){
		$current_clp_content->two = $provanance;
	}if($current_clp_content->count == 3){
		$current_clp_content->three = $provanance;
	}if($current_clp_content->count == 4){
		$current_clp_content->four = $provanance;
	}if($current_clp_content->count == 5){
		$current_clp_content->five = $provanance;
	}if($current_clp_content->count == 6){
		$current_clp_content->six = $provanance;
	}
	
	$sucess_c_lp = $current_clp_content->update_c_lp_content_info();
	header("Location: template1.php?main_clientlp_edit_id=". $mcei);
}


if(isset($_POST['form4'])){
	if(isset($_POST['box2_header'])){
		$current_clp_content->box2_header = trim($_POST['box2_header']);
	}
	if(isset($_POST['box2_content'])){
		$current_clp_content->box2_content = trim($_POST['box2_content']);
	}
	$current_clp_content->count = $current_clp_content->count + 1;
	$provanance = "Box-2";
	
	if($current_clp_content->count == 1){
		$current_clp_content->one = $provanance;
	}if($current_clp_content->count == 2){
		$current_clp_content->two = $provanance;
	}if($current_clp_content->count == 3){
		$current_clp_content->three = $provanance;
	}if($current_clp_content->count == 4){
		$current_clp_content->four = $provanance;
	}if($current_clp_content->count == 5){
		$current_clp_content->five = $provanance;
	}if($current_clp_content->count == 6){
		$current_clp_content->six = $provanance;
	}
	
	$sucess_c_lp = $current_clp_content->update_c_lp_content_info();
	header("Location: template1.php?main_clientlp_edit_id=". $mcei);
}


if(isset($_POST['form5'])){
	if(isset($_POST['box3_header'])){
		$current_clp_content->box3_header = trim($_POST['box3_header']);
	}
	if(isset($_POST['box3_content'])){
		$current_clp_content->box3_content = trim($_POST['box3_content']);
	}
	$current_clp_content->count = $current_clp_content->count + 1;
	$provanance = "Box-3";
	
	if($current_clp_content->count == 1){
		$current_clp_content->one = $provanance;
	}if($current_clp_content->count == 2){
		$current_clp_content->two = $provanance;
	}if($current_clp_content->count == 3){
		$current_clp_content->three = $provanance;
	}if($current_clp_content->count == 4){
		$current_clp_content->four = $provanance;
	}if($current_clp_content->count == 5){
		$current_clp_content->five = $provanance;
	}if($current_clp_content->count == 6){
		$current_clp_content->six = $provanance;
	}
	
	$sucess_c_lp = $current_clp_content->update_c_lp_content_info();
	header("Location: template1.php?main_clientlp_edit_id=". $mcei);
}


if(isset($_POST['form6'])){
	if(isset($_POST['footer'])){
		$current_clp_content->footer = trim($_POST['footer']);
	}
	$current_clp_content->count = $current_clp_content->count + 1;
	$provanance = "Footer";
	
	if($current_clp_content->count == 1){
		$current_clp_content->one = $provanance;
	}if($current_clp_content->count == 2){
		$current_clp_content->two = $provanance;
	}if($current_clp_content->count == 3){
		$current_clp_content->three = $provanance;
	}if($current_clp_content->count == 4){
		$current_clp_content->four = $provanance;
	}if($current_clp_content->count == 5){
		$current_clp_content->five = $provanance;
	}if($current_clp_content->count == 6){
		$current_clp_content->six = $provanance;
	}
	
	$sucess_c_lp = $current_clp_content->update_c_lp_content_info();
	header("Location: template1.php?main_clientlp_edit_id=". $mcei);
}


?>



<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Language" content="en">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes"> -->
<title>Cis 602 | Template 1</title>
<link href='http://fonts.googleapis.com/css?family=Tangerine|Muli:400,400italic|Alegreya:400italic,400' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="../stylesheets/auto_editor.css">
<link rel="stylesheet" type="text/css" href="../stylesheets/template1.css">
<link rel="stylesheet" type="text/css" href="../stylesheets/jquery.qtip.css" />
<link rel="stylesheet" type="text/css" href="../stylesheets/component11.css" />
<script> 
	function popup(){ 
		document.getElementById('finalPopupContent').className = 'md-content';
	}
</script>
</head>
	
<body onload="popup()">
		
	
	<section class="bottomShadow" id="mainNav">
		<h1>Customize Your Template</h1>
		<h2><a href="index.php">HOME</a></h2>
	</section> 

	<section class="allShadow2" id="dashboard">
		<img style="margin-top:130px; margin-bottom:80px;" src="../site_images/plum_logo.png" height="50">

		
		<hr></hr>
		<a id="submitDesignClick" class="md-trigger" data-modal="finalPopup" ><div class="transition1 bottomShadow" id="submitDesign">i am done!</br> submit design</div></a>
		<hr></hr>
		<a href="info_template1.php"><div class="transition1 bottomShadow" id="resetDesign">start over</div></a>
		<hr></hr>

	</section>



<!--************************ Template Container Start ***************************-->
<section class="allShadow" id="templateContainer">
			<header class="bottomShadow">
				<div id="mainTitle"><?php echo $current_clp_content->title; ?></div>
			</header>

			<section id="mainContentContainer">
				<div id="mainContentH1">
					<?php echo $current_clp_content->content_header; ?>
				</div>
				<div id="mainContent">
					<div id="H" class="edit_icon"></div>
					<div id="MCH" class="edit_icon"></div>
					<?php echo $current_clp_content->content; ?>
				</div>
			</section>



			<div class="blocks">
				<div id="b1" class="specializePoint"><div id="box1" class="edit_icon"></div>
						<h2><?php echo $current_clp_content->box1_header; ?></h2>
						<div class="pointSeperator"></div>
						<p><?php echo $current_clp_content->box1_content; ?></p>
					</div>

					<div id="b2" class="specializePoint"><div id="box2" class="edit_icon"></div>
						<h2><?php echo $current_clp_content->box2_header; ?></h2>
						<div class="pointSeperator"></div>
						<p><?php echo $current_clp_content->box2_content; ?></p>
					</div>

					<div id="b3" style="margin-right:0px;" class="specializePoint"><div id="box3" class="edit_icon"></div>
						<h2><?php echo $current_clp_content->box3_header; ?></h2>
						<div class="pointSeperator"></div>
						<p><?php echo $current_clp_content->box3_content; ?></p>
						<div id="footer_edit" class="edit_icon"></div>
					</div>
				</div>

			<footer>
				<p><?php echo $current_clp_content->footer; ?></p>
			</footer>
		</section>




            									<!--********** BEGIN Popup Block********** -->
		<div class="md-modal md-effect-1" id="finalPopup">
			<div id="finalPopupContent">
           			<h2>Submitting Design</h2>
                    <form id="finishDesign" method="post" action="template1.php?main_clientlp_edit_id=<?php echo $mcei; ?>">
						<h3>Client Name : <?php echo $current_clientlp->client_name; ?></h3>
						<h3>Client Email : <?php echo $current_clientlp->email; ?></h3>
						</br><hr></hr>
						<input type="hidden" value="" id="dateTime" name="dateTime">
						<input type="radio" name="completereview" value="review" <?php if($current_clp_content->review == 1){echo " checked";} ?>>Still Reviewing
						<input type="radio" name="completereview" value="complete" <?php if($current_clp_content->complete == 1){echo " checked";} ?>>Page Completed
						<hr></hr>
						
						<div class="loader" id="loader_form"></div><!--LOADER-->
                        <input name="submitDesignPopup" id="submitDesignPopup" type="submit" value="submit"></br>
                    </form>
				</div>
			</div>


		
		<!--This is Content Header & Content tooltip*-->
		<div id="titleTooltip" style="display:none; padding:10px; width:300px;">
			<form action="template1.php?main_clientlp_edit_id=<?php echo $mcei; ?>" method="post">
			<label>Change Title:</label></br>
		    	<input name="title" type="text" id="form_content_header" value="<?php echo $current_clp_content->title; ?>" style="width:200px"></br>
		    <button name="form1">Change</button>
			</form>
		</div>
		


		<!--This is Content Header & Content tooltip*-->
		<div id="contentTooltip" style="display:none; padding:10px; width:400px;">
			<form action="template1.php?main_clientlp_edit_id=<?php echo $mcei; ?>" method="post">
			<label>Change Content Title:</label></br>
		    	<input name="content_header" type="text" id="form_content_header" value="<?php echo $current_clp_content->content_header; ?>" style="width:200px"></br>
				<label>Change Content:</label></br>
				<textarea name="content" id="form_content" style="border:1px solid lightgrey; resize:none; border-radius:9px; padding:3px; width:380px; height:100px;"><?php echo $current_clp_content->content; ?></textarea></br>
		    <button name="form2">Change</button>
			</form>
		</div>


		<!--This is Box1 tooltip*-->
		<div id="box1Tooltip" style="display:none; padding:10px; width:400px;">
			<form action="template1.php?main_clientlp_edit_id=<?php echo $mcei; ?>" method="post">
			<label>Change Box1 Title:</label></br>
		    	<input name="box1_header" type="text" id="form_content_header" value="<?php echo $current_clp_content->box1_header; ?>" style="width:200px"></br>
				<label>Change Box1 Content:</label></br>
				<textarea name="box1_content" id="form_content" style="border:1px solid lightgrey; resize:none; border-radius:9px; padding:3px; width:380px; height:100px;"><?php echo $current_clp_content->box1_content; ?></textarea></br>
		    <button name="form3">Change</button>
			</form>
		</div>

		<!--This is Box2 tooltip*-->
		<div id="box2Tooltip" style="display:none; padding:10px; width:400px;">
			<form action="template1.php?main_clientlp_edit_id=<?php echo $mcei; ?>" method="post">
			<label>Change Box2 Title:</label></br>
		    	<input name="box2_header" type="text" id="form_content_header" value="<?php echo $current_clp_content->box2_header; ?>" style="width:200px"></br>
				<label>Change Box2 Content:</label></br>
				<textarea name="box2_content" id="form_content" style="border:1px solid lightgrey; resize:none; border-radius:9px; padding:3px; width:380px; height:100px;"><?php echo $current_clp_content->box2_content; ?></textarea></br>
		    <button name="form4">Change</button>
			</form>
		</div>

		<!--This is Box3 tooltip*-->
		<div id="box3Tooltip" style="display:none; padding:10px; width:400px;">
			<form action="template1.php?main_clientlp_edit_id=<?php echo $mcei; ?>" method="post">
			<label>Change Box3 Title:</label></br>
		    	<input name="box3_header" type="text" id="form_content_header" value="<?php echo $current_clp_content->box3_header; ?>" style="width:200px"></br>
				<label>Change Box3 Content:</label></br>
				<textarea name="box3_content" id="form_content" style="border:1px solid lightgrey; resize:none; border-radius:9px; padding:3px; width:380px; height:100px;"><?php echo $current_clp_content->box3_content; ?></textarea></br>
		    <button name="form5">Change</button>
			</form>
		</div>

		<!--This is Footer tooltip*-->
		<div id="footerTooltip" style="display:none; padding:10px; width:300px;">
			<form action="template1.php?main_clientlp_edit_id=<?php echo $mcei; ?>" method="post">
			<label>Footer:</label></br>
		    	<input name="footer" type="text" id="form_content_header" value="<?php echo $current_clp_content->footer; ?>" style="width:200px"></br>
		    <button name="form6">Change</button>
			</form>
		</div>



    	<div class="md-overlay"></div><!-- the overlay element -->
    


<script type="text/javascript" src="../javascripts/jquery-2.0.2.min.js"></script>
<script type="text/javascript" src="../javascripts/jquery.qtip.min.js"></script>
<script type="text/javascript" src="../javascripts/classie.js"></script>
<script type="text/javascript" src="../javascripts/modalEffects.js"></script>

<script type="text/javascript">
	

	
	$("#submitDesignClick").click(function() {
		var date = new Date()
		var currentDay = date.toDateString()
		var hours = date.getHours();
		var minutes = date.getMinutes();
		var ampm = hours >= 12 ? 'pm' : 'am';
		hours = hours % 12;
		hours = hours ? hours : 12; // the hour '0' should be '12'
		minutes = minutes < 10 ? '0'+minutes : minutes;
		var currentTime = hours + ':' + minutes + ' ' + ampm;
		
		$("#dateTime")
		.attr("value",currentDay+", "+currentTime);
		
	});

	
	
	$('#H.edit_icon').qtip({ // Grab some elements to apply the tooltip to
		style: { 
			classes: 'qtip-bootstrap qtip-shadow'
		},
		content: {
			text: $('#titleTooltip'),
			title: 'Change Main Title',
			button: 'close'
		},
		hide: {
			event: false,
			event: 'unfocus'
		},
		show: {
			event: 'click',
			solo: true,
			effect: function(offset) {
				$(this).slideDown(150); // "this" refers to the tooltip
			}
		},
		position: {
		 	container: $('#mainContent') ,
			adjust: {
				y:120,
				x:0,
				scroll: false // Can be ommited (e.g. default behaviour)
			},
			my: 'top center',  // Position my top left...
			at: 'top center', // at the bottom right of...
			target: $('header') // my target
		}
	})
	
	
	
	
	$('#MCH.edit_icon').qtip({ // Grab some elements to apply the tooltip to
		style: { 
			classes: 'qtip-bootstrap qtip-shadow'
		},
		content: {
			text: $('#contentTooltip'),
			title: 'Change Main Content',
			button: 'close'
		},
		hide: {
			event: false,
			event: 'unfocus'
		},
		show: {
			event: 'click',
			solo: true,
			effect: function(offset) {
				$(this).slideDown(150); // "this" refers to the tooltip
			}
		},
		position: {
		 	container: $('#mainContent') ,
			adjust: {
				y:50,
				x:40,
				scroll: false // Can be ommited (e.g. default behaviour)
			},
			my: 'left center',  // Position my top left...
			at: 'top left', // at the bottom right of...
			target: $('#mainContent') // my target
		}
	})
	
	
	$('#box1.edit_icon').qtip({ // Grab some elements to apply the tooltip to
		style: { 
			classes: 'qtip-bootstrap qtip-shadow'
		},
		content: {
			text: $('#box1Tooltip'),
			title: 'Change Box1',
			button: 'close'
		},
		hide: {
			event: false,
			event: 'unfocus'
		},
		show: {
			event: 'click',
			solo: true,
			effect: function(offset) {
				$(this).slideDown(150); // "this" refers to the tooltip
			}
		},
		position: {
		 	container: $('#b1') ,
			adjust: {
				y:10,
				x:0,
				scroll: false // Can be ommited (e.g. default behaviour)
			},
			my: 'bottom center',  // Position my top left...
			at: 'top center', // at the bottom right of...
			target: $('#b1') // my target
		}
	})	

	$('#box2.edit_icon').qtip({ // Grab some elements to apply the tooltip to
		style: { 
			classes: 'qtip-bootstrap qtip-shadow'
		},
		content: {
			text: $('#box2Tooltip'),
			title: 'Change Box2',
			button: 'close'
		},
		hide: {
			event: false,
			event: 'unfocus'
		},
		show: {
			event: 'click',
			solo: true,
			effect: function(offset) {
				$(this).slideDown(150); // "this" refers to the tooltip
			}
		},
		position: {
		 	container: $('#b2') ,
			adjust: {
				y:10,
				x:0,
				scroll: false // Can be ommited (e.g. default behaviour)
			},
			my: 'bottom center',  // Position my top left...
			at: 'top center', // at the bottom right of...
			target: $('#b2') // my target
		}
	})	
	
	$('#box3.edit_icon').qtip({ // Grab some elements to apply the tooltip to
		style: { 
			classes: 'qtip-bootstrap qtip-shadow'
		},
		content: {
			text: $('#box3Tooltip'),
			title: 'Change Box3',
			button: 'close'
		},
		hide: {
			event: false,
			event: 'unfocus'
		},
		show: {
			event: 'click',
			solo: true,
			effect: function(offset) {
				$(this).slideDown(150); // "this" refers to the tooltip
			}
		},
		position: {
		 	container: $('#b3') ,
			adjust: {
				y:10,
				x:0,
				scroll: false // Can be ommited (e.g. default behaviour)
			},
			my: 'bottom center',  // Position my top left...
			at: 'top center', // at the bottom right of...
			target: $('#b3') // my target
		}
	})	
	
	$('#footer_edit.edit_icon').qtip({ // Grab some elements to apply the tooltip to
		style: { 
			classes: 'qtip-bootstrap qtip-shadow'
		},
		content: {
			text: $('#footerTooltip'),
			title: 'Change Footer',
			button: 'close'
		},
		hide: {
			event: false,
			event: 'unfocus'
		},
		show: {
			event: 'click',
			solo: true,
			effect: function(offset) {
				$(this).slideDown(150); // "this" refers to the tooltip
			}
		},
		position: {
		 	container: $('#b2') ,
			adjust: {
				y:0,
				x:0,
				scroll: false // Can be ommited (e.g. default behaviour)
			},
			my: 'bottom center',  // Position my top left...
			at: 'bottom center', // at the bottom right of...
			target: $('#b2') // my target
		}
	})	
	
	
	
</script>

	
</body>
	
</html>
