<?php 

require_once("../../includes/initialize.php");

if (!$session->is_logged_in()) { redirect_to("login.php"); }

//Logging Out
if(isset($_GET['logout'])){
  $session->logout(); 
  redirect_to("login.php");
}



$current_user = SalesRep::find_by_id($session->user_id);

$sales_reps = SalesRep::get_all_salesrep();

//$client_lps = ClientLP::find_all_user_c_lp($current_user->id);

$client_lps_content = ClientLpContent::find_all_user_c_lp_content($current_user->id);


//********** Hide c_lp Template Info **************
if(isset($_GET['c_lp_id'])){

	$c_lp_id = trim($_GET['c_lp_id']);
	$current_user_id = trim($_GET['current_user_id']);
	$c_lp_hide = trim($_GET['c_lp_hide']);
	
	$hidden = ClientLp::hide_c_lp_template_info($c_lp_id, $current_user_id, $c_lp_hide);
	
	//Verifying if information is hidden
	if($hidden){
		$session->message("<span class='boldCreamColor'>Client Landing Pages Template Info</span> <span class='bold'> Successfully HIDDEN.</span>");
		redirect_to("user.php");
	} else{
		$session->message("<span class='bold'>Failed</span> <span class='boldCreamColor'> to</span> <span class='bold'> HIDE</span> <span class='boldCreamColor'> Client Landing Pages Template Info.</span>");
		redirect_to("user.php");
	}
}


?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Language" content="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
<title>Cis 602 User</title>
<link href="../stylesheets/plum_help_user.css" rel="stylesheet" type="text/css" media="screen,projection">
<link rel="stylesheet" type="text/css" href="../stylesheets/component_user.css" />
<link rel="stylesheet" href="../stylesheets/jquery.mCustomScrollbar.css" />
<script type="text/javascript" src="../javascripts/jquery-2.0.2.min.js"></script>
<script type="text/javascript" src="../javascripts/jquery.mCustomScrollbar.concat.min.js"></script>
</head>
<body>
<div id="container"><!-- *********************************** START CONTAINER*********************************** -->

<a id="user_info_templates_TOP"></a><!--Scroll Top User Info Template-->

<nav id="firstNav">
	<div id="firstNavTriangle"></div>
    <div id="firstNavUserImage"><img height="100" src="../site_images/default_user.png"></div>
    <h1>Admin Settings</h1>
    <div id="firstNavLinks">
        <a><div class="transition" id="allPlumEmailLink">All Plum Emails</div></a>
        <a><div class="transition" id="allClientEmailLink">All Client Emails</div></a>
        <a><div class="transition" id="allPlumLPLink">All Plum Landing Pages</div></a>
        <a href="#user_info_templates_TOP" class="scroller-link"><div class="transition" id="allClientLPLink">All Client Landing Pages</div></a>
    </div>
</nav>


<nav class="rightShadow" id="secondNav">
<div class="transition" id="userImage"><a href="index.php"><img height="100" src="<?php if($current_user->user_dp_url !== NULL){echo $current_user->user_dp_url;} else{ echo "../site_images/default_user.png";} ?>"></a></div>
<h1 class="textShadow"><a href="user.php">CIS 602 Provenance</a></h1>
<div id="secondNavIcons">
    <a title="Edit Templates"><img class="transition1" height="30" src="../site_images/settings.png"></a>
    <a title="Upload Template"><img class="transition1" height="30"src="../site_images/upload.png"></a>
    <a title="Logout" href="user.php?logout=true"><img class="transition1" height="30" src="../site_images/logout.png"></a>
</div>


<div id="secondNavLinks">
    <a><div class="transition" id="plumEmailLink">Plum Emails</div></a>
    <a><div class="transition" id="clientEmailLink">Client Emails</div></a>
    <a><div class="transition" id="plumLPLink">Plum Landing Pages</div></a>
    <a href="#user_info_templates_TOP" class="scroller-link"><div class="transition" id="clientLPLink">Client Landing Pages</div></a>
</div>

<div id="love">
	<h4>Made with  <span id="loveIcon"><img height="15px;" src="../site_images/love.png"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; for CIS 602.</h4>
    <h3>--Surya--  --Kishore--</h3>
</div>
</nav>




<div class="bottomShadow" id="userNameContainer">
<img height="30" src="../site_images/user.png">
<h1><?php echo $current_user->first_name." ".$current_user->last_name; ?></h1>
</div>

<section id="allUserInfoTemplatesContainer"><!--********************** Main Templates Info Container ***********************************--> 








<div id="startGlobalCLPContainer"><!--Start of All CLP & USER CLP CONTAINER -->





<section id="user_c_lp">

<div id="c_lp_search_container">
<a href="#user_info_templates_TOP" class="scroller-link"><input type="search" name="search_input_c_lp" id="search_input_c_lp" placeholder="search..."></a>
<div class="loader" id="loader_c_lp"></div><!--LOADER-->
</div>

<div id="search_results_c_lp">
<?php foreach($client_lps_content as $client_lp_content):
			$client_lp = ClientLP::find_by_id($client_lp_content->clientlp_id); ?>		
	<!--Start CLIENT LP CONTENT --> 
	

	<div style="margin-bottom:60px;" class="allShadow1 each_user_p_lp">
        
        
        <div class="p_lp_top_container">
        	<!--<img alt="Client" class=" allShadow userImage" height="30" src="../site_images/user.png">-->
        	<h1 class="p_lp_client_name"><?php echo $client_lp->client_name;?></h1>
            
  
            
            <div style="margin-top:7px;" class="p_lp_leads_container">
            	<span class="pound">
                #
                </span>
                <div class="leadsCircle">
				<span class="inside_leads_circle_text">
					<?php echo $client_lp_content->id;?>
                </span>
                </div>
            </div>
        </div>
        
        <div style="height:175px;" class="p_lp_middle_container">
          <div class="p_lp_middle_first_container">

            <div class="p_lp_email_container">
            	<img alt="email" class=" allShadow m_c_i" height="30" src="../site_images/email.png">
                <span>EMAIL :</span>
				<h4 class="p_lp_email"><?php echo $client_lp->email; ?></h4>
            </div>
            <div style="height:46px;" class="p_lp_notes_container">
            	<img alt="notes" class="allShadow m_c_i" height="30" src="../site_images/notes.png">
            	<span>TOTAL NO OF CHANGES :</span>
				<h4 style="width:40px;" class="content light mCustomScrollbar p_lp_notes"><?php echo $client_lp_content->count; ?></h4>
            </div>
			<div class="p_lp_url_container">
            	<img alt="url" class=" allShadow m_c_i" height="30" src="../site_images/link.png">
                <span class="url_span">PROVANANCE TRACK :</span>
        		<h4  style="width:180px;" class="horizontal_scroll p_lp_url"><a class="md-trigger" data-modal="c_lp_modal"><button  language="javascript" id="test25"  onclick="return c_lp(this);" style="border-style:none; outline:0; border:0; background:none; color:grey; cursor:pointer;" value="<?php echo $client_lp_content->one."***".$client_lp_content->two."***".$client_lp_content->three."***".$client_lp_content->four."***".$client_lp_content->five."***".$client_lp_content->six; ?>">- - - - - SHOW - - - - -</button></a>
				
				</h4>
            </div>
          </div>
          
          <div class="p_lp_middle_second_container">
          		<div class="google_ad_container">
                	<h5>PAGE COMPLETE :</h5>
          			<h4 class="<?php if($client_lp_content->complete == 0){ echo "red"; } else{ echo "green"; } ?>">
						<?php if($client_lp_content->complete == 0){ echo "NO"; } else{ echo "YES"; } ?></h4>
                </div>
                <div class="google_ad_setup_container">
                	<h5>PAGE REVIEW :</h5>
                	<h4 class="<?php if($client_lp_content->review == 0){ echo "red"; } else{ echo "green"; } ?>">
						<?php if($client_lp_content->review == 0){ echo "NO"; } else{ echo "YES"; } ?></h4>
                </div>
                <div class="page_complete_container">
                	<h5>FROM TEMPLATE:</h5>
							<span style="color:lightgrey; font-size:20px; display:inline-block; margin:0px 6px 0px; position:relative; right:-15px;" >#</span><span style="color:#57D04F; display:inline-block; font-size:20px; margin-top:0px; position:relative; right:-15px;" ><?php echo $client_lp_content->from_id; ?></span>
						
					</div>
        		</div>
          </div>
		
		
		<div class="p_lp_bottom_container">
        		<div class="start_date_container">
                	<h4>Created At :</h4>
          			<h5><?php echo $client_lp_content->time_created; ?></h5>
                </div>
                <a href="process_template1.php?main_clientlp_edit_id=<?php echo $client_lp_content->id; ?>&temp_salesrep_id=<?php echo $client_lp_content->salesrep_id; ?>" target="_blank" title="Edit" ><button class="editButton transition1" style="border-style:none; outline:0; border:0; background:none;"><img alt="Edit" class="allShadow transition1 edit_template_info" height="30" src="../site_images/edit.png"></button></a>
                
                <a href="sample_template1.php?id=<?php echo $client_lp_content->id; ?>" target="_blank" title="View" id="c_lp_hide"><img alt="View" class="allShadow transition1 hide_template_info" height="30" src="../site_images/hide.png"></a>
                
        </div>
		
		        
        <div style="float:right; position:absolute; top:115px; right:-280px; border: 5px solid #f7f7f7;" class="full_template_container">
          <div class="browser_bar">		<!-- BROWSER BAR-->
              <div class="dot1"></div>
              <div class="dot1"></div>
              <div class="dot1"></div>
          </div> 
          <div  class="templateAllShadow show_template template_info_image"><a href="sample_template1.php?id=<?php echo $client_lp_content->id; ?>" target="_blank">	<!-- Template Image -->
          <img style="margin:0 auto;" class="templateImage" src="../template_images/08.png" height="150"></a>
          </div>
       </div>
		
     </div>


	
	
	<?php endforeach; ?>
</div>

</section><!--END "user_c_lp" SECTION --> 


    																<!--Start CLIENT LP EDIT MODAL CONTENT -->  
      
      <div class="md-modal md-effect-1" id="c_lp_modal">
		<div id="c_lp_modal_popup" class="md-content1"></br>
      		<h2 style="border-bottom:2px solid lightgrey; padding-bottom:20px;">Provnance Track</h2>
		  
                  <div id="c_lp_submit" class="md-close" name="c_lp_submit" type="submit"></div>
		  			<h3 id="one"></h3>
		  			<span id="one_span"></span> 
					<h3 id="two"></h3>
		  			<span id="two_span"></span>
		  			<h3 id="three"></h3>
		  			<span id="three_span"></span>
		  			<h3 id="four"></h3>
		  			<span id="four_span"></span>
		  			<h3 id="five"></h3>
		  			<span id="five_span"></span>
		  			<h3 id="six"></h3>
		  
      	</div>
      </div><!--END CLIENT LP EDIT MODAL CONTENT --> 

<div id="c_lp_overlay" class="md-overlay"></div><!-- the overlay element -->
</div><!--End of All CLP & USER CLP CONTAINER -->


</section> <!--********************************************** END of User Info Templates Container ***************************************-->





</div><!-- ***** END OF CONTAINER***** -->





<script type="text/javascript">
$(function(){
    //*********************************************************************Scroll to link 
    $('.scroller-link').click(function(e){
        e.preventDefault(); //Don't automatically jump to the link
        id = $(this).attr('href').replace('#', ''); //Extract the id of the element to jump to
        $('html,body').animate({scrollTop: $("#"+id).offset().top-$(this).closest('ul').height()},'normal');
    });
});

$(".content").mCustomScrollbar({
    theme:"dark",
	scrollbarPosition:"outside"
});

$(".horizontal_scroll").mCustomScrollbar({
    axis:"x",
	theme:"dark",
	autoExpandScrollbar:true,
	advanced:{autoExpandHorizontalScroll:true},
	scrollButtons:{enable:true}
});


//**************************************************************Form Reset Funcationality
$( "#c_lp_overlay" ).click(function() {
  	document.getElementById("c_lp_form").reset();
});


//*********************************************************On Click Hide Button Loader

$( "#c_lp_hide" ).click(function() {
	$("#loader_all_p_e").fadeIn();
	$("#loader_p_e").fadeIn();
});

//***************************************************************Enter on Search
//All Enter on Search

$(document).ready(function() {
    $('#search_input_all_c_lp').keydown(function(event) {
        if (event.keyCode == 13) {
			 search_all_c_lp();
         }
    });
});



//Enter on Search


$(document).ready(function() {
    $('#search_input_c_lp').keydown(function(event) {
        if (event.keyCode == 13) {
			 search_c_lp();
         }
    });
});




//*********************************************************Reload Function

$('#c_lp_form').submit(function(event) {
    event.preventDefault();

		var c_lp_client_name = $("#c_lp_client_name").val();
		var c_lp_email = $("#c_lp_email").val();
		var c_lp_city = $("#c_lp_city").val();
		var c_lp_state = $("#c_lp_state").val();
		var c_lp_zip_code = $("#c_lp_zip_code").val();
		var c_lp_website_url = $("#c_lp_website_url").val();
		var c_lp_start_date = $("#c_lp_start_date").val();
		var c_lp_expire_date = $("#c_lp_expire_date").val();
		var c_lp_notes = $("#c_lp_notes").val();
		var c_lp_leads = $("#c_lp_leads").val();
		var c_lp_google_ad = c_lp_google_ad();
		function c_lp_google_ad(){if($("#c_lp_google_ad").is(':checked')){ return 1;} else{ return 0;}};
		var c_lp_google_ad_setup = c_lp_google_ad_setup();
		function c_lp_google_ad_setup(){if($("#c_lp_google_ad_setup").is(':checked')){ return 1;} else{ return 0;}};
		var c_lp_page_complete = c_lp_page_complete();
		function c_lp_page_complete(){if($("#c_lp_page_complete").is(':checked')){ return 1;} else{ return 0;}};
		var c_lp_renewing_page = c_lp_renewing_page();
		function c_lp_renewing_page(){if($("#c_lp_renewing_page").is(':checked')){ return 1;} else{ return 0;}};
		var c_lp_id = $("#c_lp_id").val();
		var c_lp_salesrep_id = $("#c_lp_salesrep_id").val();
		var c_lp_submit = 4;
		var c_lp_update_developer = c_lp_update_developer();
		function c_lp_update_developer(){if($("#c_lp_update_developer").is(':checked')){ return 1;} else{ return 0;}};
	
	$.post('reload.php', {c_lp_client_name:c_lp_client_name, c_lp_email:c_lp_email, c_lp_city:c_lp_city, c_lp_state:c_lp_state, c_lp_zip_code:c_lp_zip_code, c_lp_website_url:c_lp_website_url, c_lp_start_date:c_lp_start_date, c_lp_expire_date:c_lp_expire_date, c_lp_notes:c_lp_notes, c_lp_leads:c_lp_leads, c_lp_google_ad:c_lp_google_ad, c_lp_google_ad_setup:c_lp_google_ad_setup, c_lp_page_complete:c_lp_page_complete, c_lp_renewing_page:c_lp_renewing_page, c_lp_id:c_lp_id, c_lp_salesrep_id:c_lp_salesrep_id, c_lp_submit:c_lp_submit, c_lp_update_developer:c_lp_update_developer});

	search_all_c_lp();
	search_c_lp();
	
	$(document).ready(function() {
		$( "#c_lp_overlay" ).click();
        $('#error_message_div_id').click();
	});
	
});



//*********************************************************Search Function
//All Search Function

function search_all_c_lp(){
	$("#loader_all_c_lp").fadeIn(function(){
	$.post('search_all_c_lp.php', { search_input_all_c_lp: document.getElementById("search_input_all_c_lp").value,
									search_input_all_c_lp_user_id: document.getElementById("search_input_all_c_lp_user_id").value,
									search_input_all_c_lp_user_hidden: function(){
										if(document.getElementById("c_lp_checkbox").checked == true){return 1;}else{ return 0; }
									}},
		function(output) {
			$('#search_all_results_c_lp').html(output).show();
		});
	});
	$("#loader_all_c_lp").fadeOut(500);
}



//Search Function
function search_c_lp(){
	$("#loader_c_lp").fadeIn(function(){
	$.post('search_c_lp.php', { search_input_c_lp: document.getElementById("search_input_c_lp").value },
		function(output) {
			$('#search_results_c_lp').html(output).show();
		});
	});
	$("#loader_c_lp").fadeOut(500);
}


//*********************************************************Prepopulated Forms

function c_lp(button) {
		var button_value = button.value;
		var button_values = button_value.split("***");
		
	
	$("#one").html(button_values[0]);
	if(button_values[0] == ""){
		$("#one_span").html('');
	}else{
		$("#one_span").html('<img src="../site_images/down_arrow.png" width="35" height="35">');
	}
	$("#two").html(button_values[1]);
	if(button_values[1] == ""){
		$("#two_span").html('');
	}else{
		$("#two_span").html('<img src="../site_images/down_arrow.png" width="35" height="35">');
	}
	$("#three").html(button_values[2]);
	if(button_values[2] == ""){
		$("#three_span").html('');
	}else{
		$("#three_span").html('<img src="../site_images/down_arrow.png" width="35" height="35">');
	}
	$("#four").html(button_values[3]);
	if(button_values[3] == ""){
		$("#four_span").html('');
	}else{
		$("#four_span").html('<img src="../site_images/down_arrow.png" width="35" height="35">');
	}
	$("#five").html(button_values[4]);
	if(button_values[4] == ""){
		$("#five_span").html('');
	}else{
		$("#five_span").html('<img src="../site_images/down_arrow.png" width="35" height="35">');
	}
	$("#six").html(button_values[5]);

}

//*********************************************SELECT BOX JAVASCRIPT FUNCTION
$('#allUserInfoTemplatesContainer select').each(function(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;
  
    $this.addClass('select-hidden'); 
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option').eq(0).text());
  
    var $list = $('<ul />', {
        'class': 'select-options'
    }).insertAfter($styledSelect);
  
    for (var i = 0; i < numberOfOptions; i++) {
        $('<li />', {
            text: $this.children('option').eq(i).text(),
            rel: $this.children('option').eq(i).val()
        }).appendTo($list);
    }
  
    var $listItems = $list.children('li');
  
    $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.select-styled.active').each(function(){
            $(this).removeClass('active').next('ul.select-options').hide();
        });
        $(this).toggleClass('active').next('ul.select-options').toggle();
    });
  
    $listItems.click(function(e) {
        e.stopPropagation();
        $styledSelect.text($(this).text()).removeClass('active');
        $this.val($(this).attr('rel'));
        $list.hide();
        //console.log($this.val());
		if(window.all_p_e == 1){
		search_all_p_e();
		}
		if(window.all_c_e == 1){
		search_all_c_e();
		}
		if(window.all_p_lp == 1){
		search_all_p_lp();
		}
		if(window.all_c_lp == 1){
		search_all_c_lp();
		}
		document.getElementById('search_input_all_p_e').value='' ; 
		document.getElementById('search_input_all_c_e').value='' ; 
		document.getElementById('search_input_all_p_lp').value='' ; 
		document.getElementById('search_input_all_c_lp').value='' ; 
    });
  
    $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
    });

});
</script>





<script type="text/javascript" src="../javascripts/d3.min.js"></script>
<script type="text/javascript" src="../javascripts/plumdm_help_user.js"></script>
<script src="../javascripts/classie.js"></script>
<script src="../javascripts/modalEffects.js"></script>
</body>
</html>
