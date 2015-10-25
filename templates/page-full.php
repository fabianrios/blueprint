<?php
/*
Template Name: Full Width
*/
get_header(); ?>

<?php get_template_part( 'parts/featured-image' ); ?>

  <?php if(is_front_page() ) { ?>
  
  <div class="homefront">
  	<?php /* Start loop */ ?>
  	<?php while ( have_posts() ) : the_post(); ?>
  	
  	<div class="row">
  	  <div class="large-8 columns large-centered"><?php the_content(); ?></div>
  	</div>
    
  	<?php endwhile; // End the loop ?>
  </div>
  
  <div class="fifty original">
    <?php $image_medium = get_field('primera_imagen_mediana'); ?>
    <img src="<?php echo $image_medium['url']; ?>" alt="<?php echo $image_medium['alt']; ?>" />
    <div class="fifty">
      <?php $image_small = get_field('primera_imagen_pequena'); ?>
      <img src="<?php echo $image_small['url']; ?>" alt="<?php echo $image_small['alt']; ?>" />
    </div>
    <div class="fifty redbg right">
      <h4><?php the_field('primer_titulo'); ?></h4>
      <div class="primer_texto">
        <?php the_field('primer_texto'); ?>
      </div>
    </div>
  </div>
  <div class="fifty original right">
    <?php $image_big = get_field('primera_imagen_grande'); ?>
    <img src="<?php echo $image_big['url']; ?>" alt="<?php echo $image_big['alt']; ?>" />
  </div>
  
  <!--second wave-->
  
  <div class="fifty original">
    <?php $image_big = get_field('segunda_imagen_grande'); ?>
    <img src="<?php echo $image_big['url']; ?>" alt="<?php echo $image_big['alt']; ?>" />
  </div>
  <div class="fifty original right">
    <?php $image_medium = get_field('segunda_imagen_mediana'); ?>
    <img src="<?php echo $image_medium['url']; ?>" alt="<?php echo $image_medium['alt']; ?>" />
    <div class="fifty orangebg">
      <h4><?php the_field('segundo_titulo'); ?></h4>
      <div class="primer_texto">
        <?php the_field('segundo_texto'); ?>
      </div>
    </div>
    <div class="fifty right">
      <?php $image_small = get_field('segunda_imagen_pequena'); ?>
      <img src="<?php echo $image_small['url']; ?>" alt="<?php echo $image_small['alt']; ?>" />
    </div>
  </div>
  
  <!-- third wave -->

  <div class="fifty original">
    <?php $image_medium = get_field('tercera_imagen_mediana'); ?>
    <img src="<?php echo $image_medium['url']; ?>" alt="<?php echo $image_medium['alt']; ?>" />
    <div class="fifty">
      <?php $image_small = get_field('tercera_imagen_pequena'); ?>
      <img src="<?php echo $image_small['url']; ?>" alt="<?php echo $image_small['alt']; ?>" />
    </div>
    <div class="fifty redbg right">
      <h4><?php the_field('tercer_titulo'); ?></h4>
      <div class="primer_texto">
        <?php the_field('tercer_texto'); ?>
      </div>
    </div>
  </div>
  <div class="fifty original right">
    <?php $image_big = get_field('tercera_imagen_grande'); ?>
    <img src="<?php echo $image_big['url']; ?>" alt="<?php echo $image_big['alt']; ?>" />
  </div>
  
  <div class="portfolio">
    <?php
        global $post;
        $args = array( 'numberposts' => 10, 'category_name' => 'portfolio' );
        $posts = get_posts( $args );
        $query = new WP_Query( $args );
        $portfolio = $query->get_posts();
        $output = array();
        foreach( $posts as $post ) {    // Pluck the id and title attributes
            $output[] = array( 'id' => $post->ID, 'title' => $post->post_title, 'lat' => $post->latitud, 'long' => $post->long  );
        }
        $json_portfolio = json_encode( $output );
    ?>
    <div class="info">
      <h3>PORTFOLIO <span class="right">MAP <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/location.jpg" alt="" /> </span> </h3>
      <ul class="no-bullet">
        <?php  foreach( $posts as $post ): setup_postdata($post);  ?>
          	<li class="uppercase">
          		<?php the_title(); ?>
          	</li>
        <?php endforeach; ?>
      </ul>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc tincidunt neque ut risus imperdiet sagittis. Nunc venenatis euismod sem, id porta dolor. Nulla facilisi. Etiam quis urna nibh. 
      </p>
      <p>  Vestibulum sollicitudin pharetra congue. Sed felis tortor, faucibus quis tellus at, pharetra efficitur leo. Aenean arcu nisi, vehicula id diam a, volutpat iaculis orci. Sed porta felis nibh, eu tempus augue tempus sollicitudin. Donec bibendum pulvinar congue. Morbi ornare placerat maximus. Fusce nec ullamcorper tortor. Quisque sed lacus auctor, finibus massa non, commodo enim. Suspendisse egestas qodales aliquam rutrum. Nunc ut lorem non libero finibus tristique nec at sapien. Nulla bibendum dictum nunc, eu pretium nulla condimentum vel</p>
    </div>
    <div class="map">
      <div id="googleMap" style="width:100%;height:680px;"></div>
    </div>
  </div>
  
  <script>
  var locations = new Array();
  locations = <?php echo $json_portfolio; ?>;
  console.log(locations, parseFloat(locations[0]["lat"]), parseFloat(locations[0]["long"]));

  function initialize() {

    var roadAtlasStyles = [
     {
        "featureType": "water",
        "elementType": "geometry.fill",
        "stylers": [
          { "saturation": 1 }
        ]
      }, {
        "featureType": "road",
        "stylers": [
          { "saturation": -10 }
        ]
      }, {
        "featureType": "administrative",
        "stylers": [
          { "saturation": -10 }
        ]
      }, {
        "featureType": "landscape",
        "stylers": [
          { "saturation": -100 }
        ]
      }, {
        "featureType": "poi",
        "stylers": [
          { "saturation": -100 }
        ]
      }, {
      }
    ]

    var mapOptions = {
      zoom: 7,
      scrollwheel: false,
      center: new google.maps.LatLng(parseFloat(locations[0]["long"]), parseFloat(locations[0]["lat"])),
      mapTypeControlOptions: {
        mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'usroadatlas']
      }
    };

    map = new google.maps.Map(document.getElementById('googleMap'),
    mapOptions);

    var styledMapOptions = {

    };

    var usRoadMapType = new google.maps.StyledMapType(
      roadAtlasStyles, styledMapOptions);

      map.mapTypes.set('usroadatlas', usRoadMapType);
      map.setMapTypeId('usroadatlas');



      var infowindow = new google.maps.InfoWindow();

      var marker, i;
      var image = 'images/beachflag.png';

      for (i = 0; i < locations.length; i++) {
        // console.log(locations[i][0]);
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(parseFloat(locations[i]["long"]), parseFloat(locations[i]["lat"])),
          map: map,
          title: locations[i]["title"],
          animation: google.maps.Animation.DROP,
          icon: image
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            console.log(marker, i);
            if (marker.getAnimation() !== null) {
               marker.setAnimation(null);
             } else {
               marker.setAnimation(google.maps.Animation.BOUNCE);
             }
            var contentString = locations[i]["title"];
            infowindow.setContent(contentString);
            infowindow.open(map, marker);
          }
        })(marker, i));
      }


    }


    google.maps.event.addDomListener(window, 'load', initialize);


// var map;
// function initMap() {
//   map = new google.maps.Map(document.getElementById('googleMap'), {
//     center: {lat: parseFloat(locations[0]["long"]), lng: parseFloat(locations[0]["latitud"])},
//     zoom: 8
//   });
// }

	</script>
  
  <?php }else{ ?>
  
  <div class"homefront">
  	<?php /* Start loop */ ?>
  	<?php while ( have_posts() ) : the_post(); ?>
  		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
  			<header>
  				<h1 class="entry-title"><?php the_title(); ?></h1>
  			</header>
  			<div class="entry-content">
  				<?php the_content(); ?>
  			</div>
  			<footer>
  				<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
  				<p><?php the_tags(); ?></p>
  			</footer>
  			<?php comments_template(); ?>
  		</article>
  	<?php endwhile; // End the loop ?>
  </div>
  
  <?php } ?>
  
  


<?php get_footer(); ?>
