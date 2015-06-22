$(function(){

	'use strict';

	var methods = {},
		mapId = '#map-canvas',
		iconUrlMobile = 'wp-content/themes/wedding/images/wedding-map-icon.png',
		iconUrlDesktop = 'wp-content/themes/wedding/images/wedding-map-icon-desktop.png';

	methods.init = function () {

		var styles=[{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#f7f1df"}]},{"featureType":"landscape.natural","elementType":"geometry","stylers":[{"color":"#d0e3b4"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi.medical","elementType":"geometry","stylers":[{"color":"#fbd3da"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#bde6ab"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffe15f"}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#efd151"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"black"}]},{"featureType":"transit.station.airport","elementType":"geometry.fill","stylers":[{"color":"#cfb2db"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#a2daf2"}]}];

		var myLatlng = new google.maps.LatLng(51.001975,-1.733979);

		var styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"});

		var isDraggable = $(document).width() > 767 ? true : false;

		var mapOptions = {
			zoom: 13,
			center: myLatlng,
			scrollwheel: false,
			draggable: isDraggable,
			mapTypeControlOptions: {
				mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
			},
			mapTypeId: 'Styled',
		};

		var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

		map.mapTypes.set('map_style', styledMap);
		map.setMapTypeId('map_style');

		var weddingIcon;

		if (Modernizr.touch) {
			weddingIcon = {
				url: iconUrlMobile,
				scaledSize: new google.maps.Size(50, 50),
				origin: new google.maps.Point(0,0)
			};
		} else {
			weddingIcon = {
				url: iconUrlDesktop
			};
		}

		var contentString = '<div id="content">'+
			'<div id="siteNotice">'+
			'</div>'+
			'<h3 id="firstHeading" class="firstHeading">C&S Wedding</h3>'+
			'<div id="bodyContent">'+
			'<p>Barford Park, Barford Lane</p>'+
			'<p>Salisbury</p>' +
			'<p>SP5 3QF</p>' +
			'</div>';

		var infowindow = new google.maps.InfoWindow({
			content: contentString
		});

		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			title: 'Uluru (Ayers Rock)',
			icon: weddingIcon
		});

		google.maps.event.addListener(marker, 'click', function() {
			infowindow.open(map,marker);
		});

	};

	if($(mapId).length){
		methods.init();
	}

});