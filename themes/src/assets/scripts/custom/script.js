$(window).on('scroll',function(){
	header();
	bannerOpacity();
});

$(document).ready(function() {

	$('.navigation, .dot-navigation').onePageNav({
		changeHash: true,
		currentClass: 'current',
		'scrollOffset': 117,
	});

	$('.instagram').pongstgrm({
		accessId: '349678621',
		accessToken: '349678621.5fb86dc.5916e493b1ee49ee868bd343d3110cb3',
		show: 'sophandchrisgetwed',
		column: 'tile-container col-xs-12 col-sm-3 col-md-3 col-lg-3',
		button: ''
	});

	setTimeout(function(){
		if($('.tile-container').length > 7){
			$('.instagram-container').find('button').css('display','table');
		}
	}, 2000);

	mmenu();
	homeHeight();
	sectionHeight();

});

$(window).on("orientationchange",function(){

	setTimeout(function(){
		homeHeight();
	}, 10);

});

function mmenu(){
	var $menu = $('.mobile-navigation'),
		$html = $('html, body');

	$menu.mmenu({
		navbar: false,
		slidingSubmenus: false,
		dragOpen: {
			open: true,
			threshold: 50,
			width:{
				max: 150
			}
		}
	},{
		openingInterval: 0
	});

	var $anchor = false;
	$menu.find( 'li > a' ).on(
		'click',
		function( e )
		{
			$anchor = $(this);
		}
	);

	var api = $menu.data( 'mmenu' );
	api.bind( 'closed',
		function()
		{
			if ( $anchor )
			{
				var href = $anchor.attr( 'href' );
				$anchor = false;

				//	if the clicked link is linked to an anchor, scroll the page to that anchor
				if ( href.slice( 0, 1 ) == '#' )
				{
					$html.animate({scrollTop:$( href ).offset().top}, 1000);
				}
			}
		}
	);
}

function bannerOpacity(){
	if ($(window).width() > 1024) {
		var scrollVar = $(window).scrollTop(),
			bannerHeight = $('#home').height();

		$('#home img').css({
			'opacity': ((bannerHeight - scrollVar) / bannerHeight)
		});
	}
}

function header(){
	var scrollVar = $(window).scrollTop(),
		bannerHeight = $('#home').height() - 48;

	if (scrollVar >= bannerHeight) {
		$(".header, .dots").addClass('alternative');
	}else{
		$(".header, .dots").removeClass('alternative');
	}
}

function sectionHeight(){

	$('.section').each( function(){
		if($(this).height() < $(window).height() && $(window).width() > 1024){
			$(this).css('height', $(window).height() - 48);
		}
	});

}

function homeHeight(windowHeight){
	$('.home').css('height', $(window).height());
}