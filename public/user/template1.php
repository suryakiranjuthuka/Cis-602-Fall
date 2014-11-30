<?php 

require_once("../../includes/initialize.php");


$current_clp_content = ClientLpContent::find_by_id(trim($_GET['main_clientlp_edit_id']));

$current_user = SalesRep::find_by_id($_SESSION['info_sales_rep_id']);


//********** Hide p_e Template Info **************
if(isset($_GET['p_e_id'])){
	
	$p_e_id = trim($_GET['p_e_id']);
	$current_user_id = trim($_GET['current_user_id']);
	$p_e_hide = trim($_GET['p_e_hide']);
	
	$hidden = PlumEmail::hide_p_e_template_info($p_e_id, $current_user_id, $p_e_hide);
	
	//Verifying if information is hidden
	if($hidden){
		$session->message("<span class='boldCreamColor'>Plum Emails Template Info</span> <span class='bold'> Successfully HIDDEN.</span>");
		redirect_to("user.php");
	} else{
		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> HIDE</span> <span class='boldCreamColor'> Plum Emails Template Info.</span>");
		redirect_to("user.php");
	}
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
		<a class="md-trigger" data-modal="finalPopup" ><div class="transition1 bottomShadow" id="submitDesign">i am done!</br> submit design</div></a>
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
           			<h2>Fill In Your Personal Informantion</h2>
                    <form id="finishDesign" method="post" action="template1.php">
					    <input type="hidden" id="sem_bullet51" name="sem_bullet51" >
					    <input type="hidden" id="sem_meal_change1" name="sem_meal_change1" >
					    <textarea style="visibility: hidden; position: absolute; " id="disclaimer1" name="disclaimer1" ></textarea>
					    <div class="fieldContainerLeft">
					    <label style="">Agent's First Name</label>
						<input type="text" name="c_lp_client_firstname1" required>
						</div>
						
						<input style="top:-10px;" type="checkbox" name="client_terms" id="client_terms" value="client_terms">
						<h3 style="font-weight: bold; margin-top: 10px; margin-bottom: 20px;">*TERMS & CONDITIONS: I have reviewed my page carefully and  understand </br> that any additional changes may incur a fee.</h3>
						
						
						<div class="loader" id="loader_form"></div><!--LOADER-->
                        <input name="submitDesignPopup" id="submitDesignPopup" type="submit" value="submit"></br>
                    </form>
				</div>
			</div>


		<!--This is Content Header & Content tooltip*-->
		<div id="titleTooltip" style="display:none; padding:10px; width:300px;">
			<label>Change Title:</label></br>
		    	<input type="text" id="form_content_header" value="<?php echo $current_clp_content->title; ?>" style="width:200px"></br>
		    <button onclick="change_sem_number()">Change</button>
		</div>


		<!--This is Content Header & Content tooltip*-->
		<div id="contentTooltip" style="display:none; padding:10px; width:400px;">
			<label>Change Content Title:</label></br>
		    	<input type="text" id="form_content_header" value="<?php echo $current_clp_content->content_header; ?>" style="width:200px"></br>
				<label>Change Content:</label></br>
				<textarea id="form_content" style="border:1px solid lightgrey; resize:none; border-radius:9px; padding:3px; width:380px; height:100px;"><?php echo $current_clp_content->content; ?></textarea></br>
		    <button onclick="change_sem_number()">Change</button>
		</div>


		<!--This is Box1 tooltip*-->
		<div id="box1Tooltip" style="display:none; padding:10px; width:400px;">
			<label>Change Box1 Title:</label></br>
		    	<input type="text" id="form_content_header" value="<?php echo $current_clp_content->box1_header; ?>" style="width:200px"></br>
				<label>Change Box1 Content:</label></br>
				<textarea id="form_content" style="border:1px solid lightgrey; resize:none; border-radius:9px; padding:3px; width:380px; height:100px;"><?php echo $current_clp_content->box1_content; ?></textarea></br>
		    <button onclick="change_sem_number()">Change</button>
		</div>

		<!--This is Box2 tooltip*-->
		<div id="box2Tooltip" style="display:none; padding:10px; width:400px;">
			<label>Change Box2 Title:</label></br>
		    	<input type="text" id="form_content_header" value="<?php echo $current_clp_content->box2_header; ?>" style="width:200px"></br>
				<label>Change Box2 Content:</label></br>
				<textarea id="form_content" style="border:1px solid lightgrey; resize:none; border-radius:9px; padding:3px; width:380px; height:100px;"><?php echo $current_clp_content->box2_content; ?></textarea></br>
		    <button onclick="change_sem_number()">Change</button>
		</div>

		<!--This is Box3 tooltip*-->
		<div id="box3Tooltip" style="display:none; padding:10px; width:400px;">
			<label>Change Box3 Title:</label></br>
		    	<input type="text" id="form_content_header" value="<?php echo $current_clp_content->box3_header; ?>" style="width:200px"></br>
				<label>Change Box3 Content:</label></br>
				<textarea id="form_content" style="border:1px solid lightgrey; resize:none; border-radius:9px; padding:3px; width:380px; height:100px;"><?php echo $current_clp_content->box3_content; ?></textarea></br>
		    <button onclick="change_sem_number()">Change</button>
		</div>

		<!--This is Footer tooltip*-->
		<div id="footerTooltip" style="display:none; padding:10px; width:300px;">
			<label>Footer:</label></br>
		    	<input type="text" id="form_content_header" value="<?php echo $current_clp_content->footer; ?>" style="width:200px"></br>
		    <button onclick="change_sem_number()">Change</button>
		</div>



    	<div class="md-overlay"></div><!-- the overlay element -->
    


<script type="text/javascript" src="../javascripts/jquery-2.0.2.min.js"></script>
<script type="text/javascript" src="../javascripts/jquery.qtip.min.js"></script>
<script type="text/javascript" src="../javascripts/classie.js"></script>
<script type="text/javascript" src="../javascripts/modalEffects.js"></script>

<script type="text/javascript">
	



	function change_bullets(){
		document.getElementById("bullet_title").innerHTML = document.getElementById("sem_bullet_title_change").value;
		var bullettitle = document.getElementById("sem_bullet_title_change").value;
		bullettitle = bullettitle.replace(/'/g, '&#39;');
		document.getElementById("sem_bullet_title_change1").value = bullettitle;
		if(document.getElementById("sem_bullet1").value != ""){
			var bullet1 = document.getElementById("sem_bullet1").value;
			bullet1 = bullet1.replace(/'/g, '&#39;');
			document.getElementById("bullet1").innerHTML = "<li>"+document.getElementById("sem_bullet1").value+"</li>";
			document.getElementById("sem_bullet11").value = "<li>"+bullet1+"</li>";
			}else{
			document.getElementById("bullet1").innerHTML = "";
				}
		if(document.getElementById("sem_bullet2").value != ""){
			var bullet2 = document.getElementById("sem_bullet2").value;
			bullet2 = bullet2.replace(/'/g, '&#39;');
			document.getElementById("bullet2").innerHTML = "<li>"+document.getElementById("sem_bullet2").value+"</li>";
			document.getElementById("sem_bullet21").value = "<li>"+bullet2 +"</li>";
			}else{
				document.getElementById("bullet2").innerHTML = "";
				}
		if(document.getElementById("sem_bullet3").value != ""){
			var bullet3 = document.getElementById("sem_bullet3").value;
			bullet3 = bullet3.replace(/'/g, '&#39;');
			document.getElementById("bullet3").innerHTML = "<li>"+document.getElementById("sem_bullet3").value+"</li>";
			document.getElementById("sem_bullet31").value = "<li>"+bullet3+"</li>";
			}else{
				document.getElementById("bullet3").innerHTML = "";
				}
		if(document.getElementById("sem_bullet4").value != ""){
			var bullet4 = document.getElementById("sem_bullet4").value;
			bullet4 = bullet4.replace(/'/g, '&#39;');
			document.getElementById("bullet4").innerHTML = "<li>"+document.getElementById("sem_bullet4").value+"</li>";
			document.getElementById("sem_bullet41").value = "<li>"+bullet4 +"</li>";
			}else{
				document.getElementById("bullet4").innerHTML = "";
				}
		if(document.getElementById("sem_bullet5").value != ""){
			var bullet5 = document.getElementById("sem_bullet5").value;
			bullet5 = bullet5.replace(/'/g, '&#39;');
			document.getElementById("bullet5").innerHTML = "<li>"+document.getElementById("sem_bullet5").value+"</li>";
			document.getElementById("sem_bullet51").value = "<li>"+bullet5+"</li>";
			}
			else{
				document.getElementById("bullet5").innerHTML = "";
				}
	}

	function change_sem_bio(){
		document.getElementById("bio_title").innerHTML = document.getElementById("sem_bio_title_change").value;
		var biotitle = document.getElementById("sem_bio_title_change").value;
		biotitle = biotitle.replace(/'/g, '&#39;');
		document.getElementById("sem_bio_title_change1").value = biotitle;
		var text = document.getElementById("bio").value;
		text = text.replace(/\r\n/g, '<br />').replace(/[\r\n]/g, '<br />');
		text = text.replace(/'/g, '&#39;');
		document.getElementById("biography").innerHTML = text;
		document.getElementById("bio1").value = text;		
	}
	
	function change_sem_info(){
		document.getElementById("adv_name").innerHTML = document.getElementById("sem_name_change").value+" ";
		document.getElementById("sem_name_change1").value = document.getElementById("sem_name_change").value+" ";
		
		var e = document.getElementById("sem_meal_change");
		var meal = e.options[e.selectedIndex].value;
         		
		document.getElementById("meal").innerHTML = meal;
	    document.getElementById("sem_meal_change1").value = meal;
		
		document.getElementById("date_1_day").innerHTML = document.getElementById("sem_date1_day_change").value;;
		document.getElementById("sem_date1_day_change1").value = document.getElementById("sem_date1_day_change").value;
		document.getElementById("date_1_date").innerHTML = document.getElementById("sem_date1_date_change").value;
		document.getElementById("sem_date1_date_change1").value = document.getElementById("sem_date1_date_change").value;
		document.getElementById("date_1_time").innerHTML = document.getElementById("sem_date1_time_change").value;
		document.getElementById("sem_date1_time_change1").value = document.getElementById("sem_date1_time_change").value;
		
		document.getElementById("date_2_day").innerHTML = document.getElementById("sem_date2_day_change").value;
		document.getElementById("sem_date2_day_change1").value = document.getElementById("sem_date2_day_change").value;
		document.getElementById("date_2_date").innerHTML = document.getElementById("sem_date2_date_change").value;
		document.getElementById("sem_date2_date_change1").value = document.getElementById("sem_date2_date_change").value;
		document.getElementById("date_2_time").innerHTML = document.getElementById("sem_date2_time_change").value;
		document.getElementById("sem_date2_time_change1").value = document.getElementById("sem_date2_time_change").value;
		
		
		<?php if($_SESSION['r_two_name1'] == NULL){
			 echo '
		document.getElementById("date_3_day").innerHTML = document.getElementById("sem_date3_day_change").value;
		document.getElementById("sem_date3_day_change1").value = document.getElementById("sem_date3_day_change").value;
		document.getElementById("date_3_date").innerHTML = document.getElementById("sem_date3_date_change").value;
		document.getElementById("sem_date3_date_change1").value = document.getElementById("sem_date3_date_change").value;
		document.getElementById("date_3_time").innerHTML = document.getElementById("sem_date3_time_change").value;
		document.getElementById("sem_date3_time_change1").value = document.getElementById("sem_date3_time_change").value;';
		} ?>
		
		
		
		<?php if($_SESSION['r_logo'] != NULL){
			 echo 'document.getElementById("rName1").innerHTML = document.getElementById("1rName").value;
					document.getElementById("sem_location_rName1").value = document.getElementById("1rName").value;';
		} ?>
		document.getElementById("street1").innerHTML = document.getElementById("1sem_location_street").value;
		document.getElementById("sem_location_street1").value = document.getElementById("1sem_location_street").value;
		document.getElementById("city1").innerHTML = document.getElementById("1sem_location_city").value;
		document.getElementById("sem_location_city1").value = document.getElementById("1sem_location_city").value;
		
		
		<?php if($_SESSION['r_two_name1'] != NULL){
			 echo '
		document.getElementById("street2").innerHTML = document.getElementById("2sem_location_street").value;
		document.getElementById("sem_location_street2").value = document.getElementById("2sem_location_street").value;
		document.getElementById("city2").innerHTML = document.getElementById("2sem_location_city").value;
		document.getElementById("sem_location_city2").value = document.getElementById("2sem_location_city").value;';
		} ?>
		
		
			if((document.getElementById("sem_date1_day_change").value == "")){
				document.getElementById("date1").style.display = "none";
				document.getElementById("original_date1").value = 0 ;
			}else{
				document.getElementById("date1").style.display = "inline-block";
				document.getElementById("original_date1").value = 1 ;
			}
			
			if((document.getElementById("sem_date2_day_change").value == "")){
				document.getElementById("original_date2").value = 0 ;
				document.getElementById("date2").style.display = "none";
			}else{
				document.getElementById("date2").style.display = "inline-block";
				document.getElementById("original_date2").value = 1 ;
			}


			if((document.getElementById("sem_date3_date_change").value == "")){
				document.getElementById("original_date3").value = 0 ;
				document.getElementById("date3").style.display = "none";
				document.getElementById("date1").style.paddingLeft = "50px";
				document.getElementById("date1").style.paddingRight = "50px";
				document.getElementById("date2").style.paddingLeft = "50px";
				document.getElementById("date2").style.paddingRight = "50px";	
			}else{
				document.getElementById("original_date3").value = 1 ;
				document.getElementById("date3").style.display = "inline-block";
				document.getElementById("date1").style.paddingLeft = "5px";
				document.getElementById("date1").style.paddingRight = "5px";
				document.getElementById("date2").style.paddingLeft = "5px";
				document.getElementById("date2").style.paddingRight = "5px";
			}


			
		   if((document.getElementById("2sem_location_street").value == "")){
		   		document.getElementById("restaurant2").style.display = "none";
		   }else{
		   		document.getElementById("restaurant2").style.display = "inline-block";
		   }
	}

	function change_sem_number(){
		document.getElementById("seminar_number").innerHTML = document.getElementById("sem_num_change").value;
		document.getElementById("sem_num_change1").value = document.getElementById("sem_num_change").value;
	}
	
	function swapStyleSheet1(sheet){
		document.getElementById('template_style').setAttribute('href', sheet);
		document.getElementById('stylesheet').value = 'seminar1_original.css';
	}
	function swapStyleSheet2(sheet){
		document.getElementById('template_style').setAttribute('href', sheet);
		document.getElementById('stylesheet').value = 'seminar1_blue.css';
	}
	function swapStyleSheet3(sheet){
		document.getElementById('template_style').setAttribute('href', sheet);
		document.getElementById('stylesheet').value = 'seminar1_gray.css';
	}
	function swapStyleSheet4(sheet){
		document.getElementById('template_style').setAttribute('href', sheet);
		document.getElementById('stylesheet').value = 'seminar1_red.css';
	}
	
	function disclaimer(){
		var text3 = document.getElementById("disclaimer").value;
		text3 = text3.replace(/\r\n/g, '<br />').replace(/[\r\n]/g, '<br />');
		text3 = text3.replace(/'/g, '&#39;');
		document.getElementById("disclaimerMain").innerHTML = text3;
		document.getElementById("disclaimer1").value = text3;			
	}
	
	function kill_disclaimer(){
	    document.getElementById('optDisEdit').style.display = "none";
	    document.getElementById('disclaimerMain').style.display = "none";
	}

	
	
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
