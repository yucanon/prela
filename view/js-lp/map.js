// JavaScript Document

var geocoder = new google.maps.Geocoder();
		
geocoder.geocode({
	'address': '東京都港区北青山3-5-6'
}, function(result, status) {
	if (status == google.maps.GeocoderStatus.OK) {
		var latlng = result[0].geometry.location;
		var options = {
			zoom: 16,
			center:latlng,
			scrollwheel: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map(document.getElementById('map'), options);
		var marker = new google.maps.Marker({
			position: map.getCenter(),
			//icon: new google.maps.MarkerImage('../img/map_rogo.png'),
			title: 'David&Company',
			map: map
		});
	} else {
		alert('error');
	}
});