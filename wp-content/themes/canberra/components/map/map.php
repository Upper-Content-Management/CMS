<?php
global $fields;
?>

<!-- add title field -->
<section id="title">
    <div class="title">
        <?= $fields['title']; ?>
    </div>
</section>

<section id="map">
    <!-- ACF Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDsVySgEIT9FOgtB0nPYOLojZqHcAGSnzI"></script>
    <script type="text/javascript">
        
      (function($) {

        /**
         * initMap
         *
         * Renders a Google Map onto the selected jQuery element
         *
         * @date    22/10/19
         * @since   5.8.6
         *
         * @param   jQuery $el The jQuery element.
         * @return  object The map instance.
         */
        function initMap($el) {

          // Find marker elements within map.
          var $markers = $el.find('.marker');

          // Create gerenic map.
          var mapArgs = {
            zoom: $el.data('zoom') || 16,
            mapTypeId: google.maps.MapTypeId.ROADMAP
          };
          var map = new google.maps.Map($el[0], mapArgs);

          // Add markers.
          map.markers = [];
          $markers.each(function() {
            initMarker($(this), map);
          });

          // Center map based on markers.
          centerMap(map);

          // Return map instance.
          return map;
        }

        /**
         * initMarker
         *
         * Creates a marker for the given jQuery element and map.
         *
         * @date    22/10/19
         * @since   5.8.6
         *
         * @param   jQuery $el The jQuery element.
         * @param   object The map instance.
         * @return  object The marker instance.
         */
        function initMarker($marker, map) {

          // Get position from marker.
          var lat = $marker.data('lat');
          var lng = $marker.data('lng');
          var latLng = {
            lat: parseFloat(lat),
            lng: parseFloat(lng)
          };

          // Create marker instance.
          var marker = new google.maps.Marker({
            position: latLng,
            map: map
          });

          // Append to reference for later use.
          map.markers.push(marker);

          // If marker contains HTML, add it to an infoWindow.
          if ($marker.html()) {

            // Create info window.
            var infowindow = new google.maps.InfoWindow({
              content: $marker.html()
            });

            // Show info window when marker is clicked.
            google.maps.event.addListener(marker, 'click', function() {
              infowindow.open(map, marker);
            });
          }
        }

        /**
         * centerMap
         *
         * Centers the map showing all markers in view.
         *
         * @date    22/10/19
         * @since   5.8.6
         *
         * @param   object The map instance.
         * @return  void
         */
        function centerMap( map ) {

            // Create map boundaries from all map markers.
            var bounds = new google.maps.LatLngBounds();
            map.markers.forEach(function( marker ){
                bounds.extend({
                    lat: marker.position.lat(),
                    lng: marker.position.lng()
                });
            });

            // Case: Single marker.
            if( map.markers.length == 1 ){
                map.setCenter( bounds.getCenter() );

            // Case: Multiple markers.
            } else{
                map.fitBounds( bounds );
            }
        }

        // Render maps on page load.
        $(document).ready(function(){
            $('.acf-map').each(function(){
                var map = initMap( $(this) );
            });
        });

        })(jQuery);
    </script>
    
    <?php 
    $query = new WP_Query( 
        array( 
        'post_type' => 'house', 
        'posts_per_page' => -1
        )
    );

    if($query->have_posts()) :
    while($query->have_posts()):
    $query->the_post();
    $the_ID = get_the_ID();
    $get_google_map = get_field('location', $value);

    $output_map[$the_ID]['map'] = '<div class="marker" data-lat="'.$get_google_map['lat'].'" data-lng="'.$get_google_map['lng'].'"></div>';
    
    endwhile; endif;
    wp_reset_postdata(); ?>
    
    <div class="acf-map">
       <?php
       foreach( $output_map as $key => $map_marker ):
	   echo $map_marker['location'];
	   endforeach;
	   ?>
    </div>

</section>