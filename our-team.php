<?php
$pagehead="About";
$bodyBG=" class='InsideBodyBG'";
$ExtraHeader="<link rel='stylesheet' href='css/lightbox.css' type='text/css' media='screen' />";
$ExtraFooter="<script type='text/javascript' src='js/lightbox.js'></script>";
include_once("lib/header.php");
?>
<div class="BodyBox">
<h2 class="Pagehead">Our Team</h2>
<div class="LPanel">
	<h3 style="margin-top: 30px">Our Team</h3>
	<P>Example page</P>
	<ul class="ContentList">
			<li>Thinh - Leader</li>
			<li>A</li>
			<li>B</li>
			<li>C</li>
		</ul>
</div>
<div class="RPanel">
	<a href="" data-lightbox="About" data-title="BLV Team"><img id="RoundedImg" src="" border="0" width="390px"><p class="caption DownSpace">Thinh Picture Here</p></a>
</div>
<?
include_once("lib/footer.php");
?>