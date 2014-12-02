<?php 

require_once("../../includes/initialize.php"); 

if (!$session->is_logged_in()) { redirect_to("login.php"); }

$current_user = SalesRep::find_by_id($session->user_id);


if(isset($_POST['search_input_c_lp'])){
	$search_in = trim($_POST['search_input_c_lp']);
	
	$client_lps_content = ClientLpContent::search_c_lp($search_in, $current_user->id);
	
}

?>


<script type="text/javascript">

$(".content").mCustomScrollbar({
    theme:"dark"
});

$(".horizontal_scroll").mCustomScrollbar({
    axis:"x",
	theme:"dark",
	autoExpandScrollbar:true,
	advanced:{autoExpandHorizontalScroll:true},
	scrollButtons:{enable:true}
});

//Form Reset Funcationality
$( "#c_lp_overlay" ).click(function() {
  
  	document.getElementById("c_lp_form").reset();
  
});

</script>

<script src="../javascripts/modalEffects.js"></script>


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
							<span style="color:lightgrey; font-size:20px; display:inline-block; margin:0px 6px 0px; position:relative; right:-15px;" >#</span><span style="color:#57D04F; display:inline-block; font-size:20px; margin-top:0px; position:relative; right:-15px;" ><?php echo $client_lp_content->id; ?></span>
						
					</div>
        		</div>
          </div>
		
		
		<div class="p_lp_bottom_container">
        		<div class="start_date_container">
                	<h4>Created At :</h4>
          			<h5><?php echo $client_lp_content->time_created; ?></h5>
                </div>
                <a href="template1.php?main_clientlp_edit_id=<?php echo $client_lp_content->id; ?>" target="_blank" title="Edit" ><button class="editButton transition1" style="border-style:none; outline:0; border:0; background:none;"><img alt="Edit" class="allShadow transition1 edit_template_info" height="30" src="../site_images/edit.png"></button></a>
                
                <a href="sample_template1.php?main_clientlp_edit_id=<?php echo $client_lp_content->id; ?>" target="_blank" title="View" id="c_lp_hide"><img alt="View" class="allShadow transition1 hide_template_info" height="30" src="../site_images/hide.png"></a>
                
        </div>
		
		        
        <div style="float:right; position:absolute; top:115px; right:-280px; border: 5px solid #f7f7f7;" class="full_template_container">
          <div class="browser_bar">		<!-- BROWSER BAR-->
              <div class="dot1"></div>
              <div class="dot1"></div>
              <div class="dot1"></div>
          </div> 
          <div  class="templateAllShadow show_template template_info_image"><a href="sample_template1.php?main_clientlp_edit_id=<?php echo $client_lp_content->id; ?>" target="_blank">	<!-- Template Image -->
          <img style="margin:0 auto;" class="templateImage" src="../template_images/08.png" height="150"></a>
          </div>
       </div>
		
     </div>


	
	
	<?php endforeach; ?>
</div>