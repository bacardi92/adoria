jQuery(document).ready(function($){
	function init_map(){
	    var myOptions = {zoom:14,center:new google.maps.LatLng(mapData.lat,mapData.leng),
	        mapTypeId: google.maps.MapTypeId.ROADMAP};
	    map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
	    marker = new google.maps.Marker({   map: map,
	                                        position: new google.maps.LatLng(mapData.lat,mapData.leng)
	                                    });
	    infowindow = new google.maps.InfoWindow({content:mapData.address});
	    google.maps.event.addListener(marker, 'click', function(){
	        infowindow.open(map,marker);
	    });
	    infowindow.open(map,marker);
	}
	google.maps.event.addDomListener(window, 'load', init_map);

	$('.addFile').click(function(e){
		e.preventDefault();
		$('.file-input').click();
	})
	$('#attachedFile').change(function() {
        var filename = $('#attachedFile')[0].files[0];
        $('.fileStatus').html(filename.name);
    });
});