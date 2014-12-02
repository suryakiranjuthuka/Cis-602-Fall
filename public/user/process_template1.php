<?php 

require_once("../../includes/initialize.php");
	


$current_clp_content = ClientLpContent::find_by_id(trim($_GET['main_clientlp_edit_id']));
$current_salesrep_id = trim($_GET['temp_salesrep_id']);
$mcei = $_GET['main_clientlp_edit_id'];

$create_c_lp = new ClientLpContent();


$create_c_lp->salesrep_id = 0;
$create_c_lp->temp_salesrep_id = $current_salesrep_id;
$create_c_lp->clientlp_id = $current_clp_content->clientlp_id;
$create_c_lp->from_id = $mcei;
$create_c_lp->title = $current_clp_content->title;
$create_c_lp->content_header = $current_clp_content->content_header;
$create_c_lp->content = $current_clp_content->content;
$create_c_lp->box1_header = $current_clp_content->box1_header;
$create_c_lp->box1_content = $current_clp_content->box1_content;
$create_c_lp->box2_header = $current_clp_content->box2_header;
$create_c_lp->box2_content = $current_clp_content->box2_content;
$create_c_lp->box3_header = $current_clp_content->box3_header;
$create_c_lp->box3_content = $current_clp_content->box3_content;
$create_c_lp->footer = $current_clp_content->footer;


$sucess_create_c_lp = $create_c_lp->create_c_lp_content_info();
	
	
	header("Location: template1.php?main_clientlp_edit_id=". $sucess_create_c_lp);

	
?>