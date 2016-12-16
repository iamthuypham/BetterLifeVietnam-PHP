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
	<table>
		<tr>
			<td><img src="images/About/our-team-profile/Alyssa.jpg"></td>
			<td>
				<h3>Alyssa</h3>
				<p></p>
			</td>
		</tr>
	</table>
</div>
<div class="RPanel">
	<a href="" data-lightbox="About" data-title="BLV Team"><img id="RoundedImg" src="" border="0" width="390px"><p class="caption DownSpace">Thinh Picture Here</p></a>
</div>
<?
include_once("lib/footer.php");
?>