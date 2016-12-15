$(document).ready(function() {
		$(function() {
			$("#ss_1 > img:gt(0)").hide();
			setInterval(function() { 
			  $('#ss_1 > img:first')
			    .fadeOut(1000)
			    .next()
			    .fadeIn(1000)
			    .end()
			    .appendTo('#ss_1');
			},  5000);
			$("#ss_2 > img:gt(0)").hide();
			setInterval(function() { 
			  $('#ss_2 > img:first')
			    .fadeOut(1000)
			    .next()
			    .fadeIn(1000)
			    .end()
			    .appendTo('#ss_2');
			},  7000);
			$("#ss_3 > img:gt(0)").hide();
			setInterval(function() { 
			  $('#ss_3 > img:first')
			    .fadeOut(1000)
			    .next()
			    .fadeIn(1000)
			    .end()
			    .appendTo('#ss_3');
			},  6000);
			$("#ss_4 > img:gt(0)").hide();
			setInterval(function() { 
			  $('#ss_4 > img:first')
			    .fadeOut(1000)
			    .next()
			    .fadeIn(1000)
			    .end()
			    .appendTo('#ss_4');
			},  8000);
		});
});