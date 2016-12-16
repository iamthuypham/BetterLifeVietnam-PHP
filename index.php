<?php
$HomePage="YES";
$bodyBG=" class='HomeBodyBG'";
$ExtraHeader="<script src='js/jquery.carouFredSel-6.0.4-packed.js' type='text/javascript'></script>
		<script src='js/jquery.simplyscroll.js' type='text/javascript'></script>
		<link rel='stylesheet' href='css/scroller.css' media='all' type='text/css'>
		<script type='text/javascript'>
			$(function() {
				 $('#images').carouFredSel({
					scroll: {
						items: 1,
						duration: 2000,
						easing: 'quadratic'
					},
					direction: 'up',
					auto: {
						// duration: 2000,
						timeoutDuration: 4000,
						// easing: 'quadratic',
						onBefore: function() {
							var index = $(this).triggerHandler( 'currentPosition' );
							if ( index == 0 ) {
								index = $(this).children().length;
							}
							$('#texts').trigger('slideTo', [ index, {
								fx: 'directscroll'
							}, 'prev' ]);
						}
					}
				 });
				 $('#texts').carouFredSel({
					scroll: {
						items: 1,
						duration: 2000,
						easing: 'quadratic'
					},
					direction: 'up',
					auto: {
						play: true,
					}
				 });
			});
			(function($) {
				$(function() { //on DOM ready
					 $('#scroller').simplyScroll({
				 	 	 customClass: 'vert',
	 	 	 			orientation: 'vertical'
		 			});
				});
			})(jQuery);
		</script>";

$NewsFile="lib/announcements.txt";
if(file_exists($NewsFile) && filesize($NewsFile)!=0){
	$NewsCont=file($NewsFile);
	$NCount=0;
	foreach($NewsCont as $SubCont){
		$NCount++;
		$News[$NCount]=stripslashes(trim($SubCont));
		$NewsO[$NCount]=$News[$NCount];
		$News[$NCount]=implode(' ', array_slice(explode(' ', $News[$NCount]), 0, 17));
		if($NewsO[$NCount]!=$News[$NCount]){
			$News[$NCount]=$News[$NCount]."...";
		}
	}
}
include_once("lib/header.php");
?>
<div class="Donation">
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="K9P45W3RSSL44">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
</div>
<br class="clr" />
<div class="BodyBox">
	<div id="wrapper">
		<div id="images-wrapper">
			<div id="images">
				<img src="images/Education1.jpg" width="680" height="454" border="0" />
				<img src="images/Book-Distribution.jpg" width="680" height="454" border="0" />
				<img src="images/Education3.jpg" width="680" height="454" border="0" />
				<img src="images/Voluntourism1.jpg" width="680" height="454" border="0" />
			</div>
		</div>
		<div id="texts-wrapper">
			<div id="texts">
				<div>
					<div>
						<a href="#" target="_blank">Making the education possible</a>
					</div>
				</div>
				<div>
					<div>
						<a href="#" target="_blank">Distributing books & bringing thousand smiles</a>
					</div>
				</div>
				<div>
					<div>
						<a href="#" target="_blank">Fostering the learning</a>
					</div>
				</div>
				<div>
					<div>
						<a href="#" target="_blank">Organizing Voluntourism programs to collect funds</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="upcomingEvent">
		<div style="text-align: center">
			<h1>UPCOMING EVENT</h1>
			<a href="docs/BLV-Christmas-Flyer.pdf"><img src="images/BLV-Christmas-Flyer-1.jpg"></a>
		</div>
	</div>
	<br class="clr" />
</div>
	
<?
include_once("lib/footer.php");
?>