<?php 

require_once("../../includes/initialize.php");


$current_clp_content = ClientLpContent::find_by_id(trim($_GET['id']));

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Language" content="en">
<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes"> -->
<title>Cis 602 | Template 1</title>
<link rel="stylesheet" type="text/css" href="../stylesheets/template1.css">
<style>
	@charset "utf-8";
/* CSS Document */

@import url(http://fonts.googleapis.com/css?family=Lato:300,400);
@import url(http://fonts.googleapis.com/css?family=Quicksand:700);
@import url(http://fonts.googleapis.com/css?family=Raleway:400,300,500);
/*------ COLOR PALLET-----*/
/*
#565347  :  GREY(link & Paragraph)
#81785a  :  LIGHT GREY(border bottom)
#820000  :  RED(Headings)
#eae9e6  :  BORDER
*/

/**
 * Eric Meyer's Reset CSS v2.0 (http://meyerweb.com/eric/tools/css/reset/)
 * http://cssreset.com
 */
 
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
 
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure,
footer, header, hgroup, menu, nav, section, div {
	display: block;
}
body {
	line-height: 1;
	/*font-family: 'Lato', 'Open Sans', sans-serif;*/
	height:100%;
	width:100%;
	position:fixed;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}

a {
	color:inherit;
    text-decoration: none;
}

a:hover 
{
     text-decoration:none; 
     cursor:pointer;  
}

.transition{
	-webkit-transition: .1s;
	transition: .1s;
}

.transition1{
	-webkit-transition: .2s;
	transition: .2s;
}

.transitionSwatch{
	-webkit-transition: .2s;
	transition: .2s;
	transition-delay: .3s;
}



/* Shadows */
.templateAllShadow {
-moz-box-shadow: 0 0 10px 0px rgba(0, 0, 0, 0.090);
-webkit-box-shadow: 0 0 10px 0px rgba(0, 0, 0, 0.090);
box-shadow: 0 0 10px 0px rgba(0, 0, 0, 0.090);
}

/*.allShadow {
-moz-box-shadow: 0 0 3px black;
-webkit-box-shadow: 0 0 3px black;
box-shadow: 0 0 5px grey;
}*/

.allShadow {
	-webkit-box-shadow: 0 0 25px -5px grey;
	box-shadow: 0 0 25px -5px grey;
}

.allShadow1 {
-moz-box-shadow: 0 0 10px rgba(0, 0, 0, .2);
-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, .2);
box-shadow: 0 0 10px 0px rgba(0, 0, 0, .2);
}

.allShadow2 {
-moz-box-shadow: 5px 0 10px rgba(0, 0, 0, .3);
-webkit-box-shadow: 5px 0 10px rgba(0, 0, 0, .3);
box-shadow: 5px 0 10px 0px rgba(0, 0, 0, .3);
}

.allShadow3 {
-moz-box-shadow: 0px 0 10px grey;
-webkit-box-shadow: 0px 0 10px grey;
box-shadow: 0px 0 10px 0px grey;
}

.rightBottomShadow {
  -moz-box-shadow:    3px 3px 5px 6px #ccc;
  -webkit-box-shadow: 3px 3px 5px 6px #ccc;
  box-shadow:         3px 3px 5px 6px #ccc;
}

.innerShadow1{
   -moz-box-shadow:    inset 0 0 8px #000000;
   -webkit-box-shadow: inset 0 0 8px #000000;
   box-shadow:         inset 0 0 8px #000000;
}

.innerShadow2{
  box-shadow: inset 0px 0px 13px 1px #B1B1B1;
  -webkit-box-shadow: inset 0px 0px 13px 1px #B1B1B1;
  -moz-box-shadow: inset 0px 0px 13px 1px #B1B1B1;
  -o-box-shadow: inset 0px 0px 13px 1px #B1B1B1;
}

.headerInsetShadow{
	-moz-box-shadow:   inset  0 -8px 8px -8px #696868;
   -webkit-box-shadow: inset  0 -8px 8px -8px #696868;
   box-shadow:         inset  0 -8px 8px -8px #696868;
}

.bottomShadow {
  -webkit-box-shadow: 0px 3px 5px 0px rgba(50, 50, 50, 0.5);
  -moz-box-shadow:    0px 3px 5px 0px rgba(50, 50, 50, 0.5);
  box-shadow:         0px 3px 5px 0px rgba(50, 50, 50, 0.5);
}

.bottomFixedNavShadow {
  -webkit-box-shadow: 0px 3px 5px 0px rgba(50, 50, 50, 0.2);
  -moz-box-shadow:    0px 3px 5px 0px rgba(50, 50, 50, 0.2);
  box-shadow:         0px 3px 5px 0px rgba(50, 50, 50, 0.2);
}

.upperShadow {
  -webkit-box-shadow: 0px -5px 5px 0px rgba(50, 50, 50, 0.5);
  -moz-box-shadow:    0px -5px 5px 0px rgba(50, 50, 50, 0.5);
  box-shadow:         0px -5px 5px 0px rgba(50, 50, 50, 0.5);
}

.textShadow{
    font:100px Lato Bold;
    text-transform:uppercase;
    color:#313543;
    text-align:center;
    margin-top:10%;
    margin-bottom:0px;
    text-shadow:rgba(0,0,0,0.8) 0px -2px 0px,rgba(255,255,255,0.3) 0px 2px 2px;
 }



/* --------------------- PRE LOADER STYLES ---------------------- */
#loader_form{
	position:relative;
	top: 0px;
	display:none;
}

.loader {
  margin: 10px auto 20px;
  font-size: 10px;
  position: relative;
  text-indent: -9999em;
  border-top: .3em solid rgba(141,0,87, 0.3);
  border-right: .3em solid rgba(141,0,87, 0.3);
  border-bottom: .3em solid rgba(141,0,87, 0.3);
  border-left: .3em solid #8D0057;
  -webkit-animation: load8 1.1s infinite linear;
  animation: load8 1.1s infinite linear;
}
.loader,
.loader:after {
  border-radius: 50%;
  width: 22px;
  height: 22px;
}
@-webkit-keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}

body{
	background-color: #fff8ea;
	overflow:auto;
	position:relative;
	font-family: 'Open Sans', 'Lato', sans-serif;
	background-color: #EDEff3;
}
	
</style>
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
