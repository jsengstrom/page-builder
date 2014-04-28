// @codekit-prepend "inc/cycle.js"
// @codekit-prepend "inc/cycle.center.js"
// @codekit-prepend "inc/lightbox.js"

(function($) {

function render_map( $el ) {

  var $markers = $el.find('.marker');

  var args = {
    zoom		: 16,
    center		: new google.maps.LatLng(0, 0),
    mapTypeId	: google.maps.MapTypeId.ROADMAP
  };

  var map = new google.maps.Map( $el[0], args);

  map.markers = [];

  $markers.each(function(){

    add_marker( $(this), map );

  });

  center_map( map );

}

function add_marker( $marker, map ) {

  var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

  var marker = new google.maps.Marker({
    position	: latlng,
    map			: map
  });

  map.markers.push( marker );

  if( $marker.html() )
  {

    var infowindow = new google.maps.InfoWindow({
      content		: $marker.html()
    });

    google.maps.event.addListener(marker, 'click', function() {

      infowindow.open( map, marker );

    });
  }

}

function center_map( map ) {

  var bounds = new google.maps.LatLngBounds();

  $.each( map.markers, function( i, marker ){

    var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

    bounds.extend( latlng );

  });

  if( map.markers.length == 1 )
  {
    map.setCenter( bounds.getCenter() );
    map.setZoom( 16 );
  }
  else
  {
    map.fitBounds( bounds );
  }

}
  
jQuery(document).ready(function(){

  $('.google-map').each(function(){

  render_map( $(this) );

  });
  
  $('.lightbox a').lightbox();
  
});

})(jQuery);