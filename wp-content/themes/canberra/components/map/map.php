<?php
global $fields;
?>

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
          var icon = new google.maps.MarkerImage('<?= get_svg("icon") ?>');
            
          var marker = new google.maps.Marker({
            position: latLng,
            map: map,
//            icon: icon,
            title: 'house location'
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
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'title'
        )
    );

    // if there are existing posts with the type "house", get the post ID, title and link
    if($query->have_posts()) :
    while($query->have_posts()):
    $query->the_post();
    $id = get_the_ID();
    $title = get_the_title();
    $link = get_permalink();
   
    // if the parent field "house_components" contains row entries, get the sub field "location"
    if( have_rows('house_components') ):
    while ( have_rows('house_components') ) : the_row();
    $location = get_sub_field('location');
    $gallery = get_sub_field('gallery');
    $image = $gallery[0];
    $image_src = $image['url'];
    $image_alt = $image['alt'];

    $output_map[$id]['location'] = 
    '<div class="marker" data-lat="'.$location['lat'].'" data-lng="'.$location['lng'].'">
        <p class="house_name"><a href="'.$link.'">'.$title.'</a></p>
        <p class="house_address">'.$location['address'].'</p>
    </div>';

    $output_table[$id]['row'] = 
    '<tr class="row">
        <td><a href="'.$link.'">'.$title.'</a></td><td>'.$location['address'].'</td><td>'.$location['lat'].', '.$location['lng'].'</td>
    </tr>';
            
    wp_reset_postdata();
   
    endwhile; endif;
   
    endwhile;
    else :
    
        // no houses to display
   
    endif; ?>

    <div class="acf-map">
        <?php
        // for each house post, display the location as a marker on the map
        foreach( $output_map as $key => $map_marker ):
        echo $map_marker['location'];
        endforeach;
        ?>
    </div>
    
    <div id="house_list">
        <table>
            <th>Name</th>
            <th>Address</th>
            <th>Coordinates</th>
        
        <?php
        // for each house post, display the house data in a row in the table
        foreach( $output_table as $key => $house_data ):
            echo $house_data['row'];
            endforeach; ?>
                
        </table>
    </div>

</section>