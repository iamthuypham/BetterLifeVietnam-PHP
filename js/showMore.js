$(document).ready(function() {
	$('.Subhead').click(function(e){
		e.preventDefault();
		$(this).closest('li').find('.Subcontent').not(':animated').slideToggle();
	});
	$('.Subhead').toggle( function(e) {
	    e.preventDefault();
            var spid=e.target.id;
            var sp_id=spid.substr(spid.indexOf("_") + 1);
	    if($(this).closest('li').find('.Subhead').children("span").text()=="[-]")
		$(this).closest('li').find('.Subhead').children("span").text("[+]")
	    else
		$(this).closest('li').find('.Subhead').children("span").text("[-]");
	    $('.Spacer'+sp_id).css({height:'0'});
	}, function(e) {
	    e.preventDefault();
            var spid=e.target.id;
            var sp_id=spid.substr(spid.indexOf("_") + 1);
	    if($(this).closest('li').find('.Subhead').children("span").text()=="[-]")
		$(this).closest('li').find('.Subhead').children("span").text("[+]")
	    else
		$(this).closest('li').find('.Subhead').children("span").text("[-]");
	    $('.Spacer'+sp_id).removeAttr('style');
	});
	$('.Subhead2').click(function(e){
		e.preventDefault();
		$(this).closest('li').find('.Subcontent3').not(':animated').slideToggle();
	});
	$('.Subhead2').toggle( function(e) {
	    e.preventDefault();
	    $(this).closest('li').find('.Subhead2').children("span").text("[-]");
	}, function(e) {
	    e.preventDefault();
	    $(this).closest('li').find('.Subhead2').children("span").text("[+]");
	});
	$('[id^=s_]').click(function(e) {
            if( !e ) e = window.event;
            e.preventDefault();
            var fid=e.target.id;
            var eid=fid.substr(fid.indexOf("_") + 1);
            if($('#p_'+eid).css('height') != '360px'){
                $('#p_'+eid).stop().animate({height: '360px'}, 200);
                $(this).html('more &#x25BC;');
            }else{
                $('#p_'+eid).css({height:'100%'});
                var xx = $('#p_'+eid).height();
                $('#p_'+eid).css({height:'360px'});
                $('#p_'+eid).stop().animate({height: xx}, 400);
                // ^^ The above is because you can't animate css to 100% (or any percentage).  So I change it to 100%, get the value, change it back, then animate it to the value. If you don't want animation, you can ditch all of it and just leave: $('.show-more-snippet').css({height:'100%'});^^ //
                $(this).html('less &#x25B2;');
            }
	});
});