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
  	  <div class="large-8 columns large-centered">
        <?php the_content(); ?>
        <div class="text-center">
          <img class="arrow" src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/arrow.png" alt="" />
        </div>
      </div>
  	</div>
    
  	<?php endwhile; // End the loop ?>
  </div>
  
  <div class="fifty original">
    <?php $image_medium = get_field('primera_imagen_mediana'); ?>
    <img class="trim-small" src="<?php echo $image_medium['url']; ?>" alt="<?php echo $image_medium['alt']; ?>" />
    <div class="fifty">
      <?php $image_small = get_field('primera_imagen_pequena'); ?>
      <img src="<?php echo $image_small['url']; ?>" alt="<?php echo $image_small['alt']; ?>" />
    </div>
    <div class="fifty orangebg redbg right">
      <h4><?php the_field('primer_titulo'); ?></h4>
      <div class="primer_texto">
        <?php the_field('primer_texto'); ?>
      </div>
    </div>
  </div>
  <div class="fifty original right trim-small">
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
    <img class="trim-small" src="<?php echo $image_medium['url']; ?>" alt="<?php echo $image_medium['alt']; ?>" />
    <div class="fifty orangebg">
      <h4><?php the_field('segundo_titulo'); ?></h4>
      <div class="primer_texto">
        <?php the_field('segundo_texto'); ?>
        <ul class="no-bullet socials">
          <li><a class="twitter" href="#">twitter</a></li>
          <li><a class="linkedin" href="#">linkedin</a></li>
        </ul>
      </div>
    </div>
    <div class="fifty right trim-small">
      <?php $image_small = get_field('segunda_imagen_pequena'); ?>
      <img src="<?php echo $image_small['url']; ?>" alt="<?php echo $image_small['alt']; ?>" />
    </div>
  </div>
  
  <!-- third wave -->

  <div class="fifty original">
    <?php $image_medium = get_field('tercera_imagen_mediana'); ?>
    <img class="trim-small" src="<?php echo $image_medium['url']; ?>" alt="<?php echo $image_medium['alt']; ?>" />
    <div class="fifty">
      <?php $image_small = get_field('tercera_imagen_pequena'); ?>
      <img src="<?php echo $image_small['url']; ?>" alt="<?php echo $image_small['alt']; ?>" />
    </div>
    <div class="fifty orangebg redbg right">
      <h4><?php the_field('tercer_titulo'); ?></h4>
      <div class="primer_texto">
        <?php the_field('tercer_texto'); ?>
      </div>
    </div>
  </div>
  <div class="fifty original right trim-small">
    <?php $image_big = get_field('tercera_imagen_grande'); ?>
    <img src="<?php echo $image_big['url']; ?>" alt="<?php echo $image_big['alt']; ?>" />
  </div>
  
  <div class="portfolio trim-small" id="portfolio">
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
      <h3>PORTFOLIO <span class="right" id="click_map">MAP <img src="<?php bloginfo('stylesheet_directory'); ?>/assets/images/location.jpg" alt="" /> </span> </h3>
      <ul class="no-bullet map-points">
        <?php $i = 0; foreach( $posts as $post ): setup_postdata($post);  ?>
          	<li class="uppercase">
          		<a href="<?php echo $i ?>"><?php the_title(); ?></a>
          	</li>
			<?php $i++; endforeach; ?>
      </ul>
    </div>
    <div class="map">
      <div id="googleMap" class="allofthem" style="width:100%;"></div>
      <?php $i = 0; ?>
        <?php  foreach( $posts as $post ): setup_postdata($post);  ?>
          <div id="<?php echo $i ?>-gallery" class="galleries allofthem">
            <a class="closing">X</a>
            <ul class="project-orbit" data-orbit data-options="bullets:false;slide_number:false;timer:false;">
            <li>
              <img src="<?php echo get_field('image_1')['url'];  ?>" alt="" />
			  <div class="orbit-caption">
				  <h6 class="whitetxt"><?php the_title(); ?></h6>
				  <ul class="no-bullet">
					  <li><strong>TYPE:</strong> <?php the_field('type'); ?></li>
					  <li><strong>LOCATION:</strong> <?php the_field('location'); ?></li>
					  <li><strong>FLOORS:</strong> <?php the_field('floors'); ?></li>
					  <li><strong>UNITS:</strong> <?php the_field('units'); ?></li>
					  <li><strong>SIZE:</strong> <?php the_field('size'); ?></li>
					  <li><strong>STATUS:</strong> 
						  <?php
						    $status = get_field('status');
							   if($status == 1){
								   $output = "Active";
							   }else{
								   $output = "Finish";
							   }
							   echo $output;
						   ?>
					   </li>
			      </ul>
			  </div>
            </li>
            <li>
              <img src="<?php echo get_field('image_2')['url'];  ?>" alt="" />
			  <div class="orbit-caption">
				  <h6 class="whitetxt"><?php the_title(); ?></h6>
				  <ul class="no-bullet">
					  <li><strong>TYPE:</strong> <?php the_field('type'); ?></li>
					  <li><strong>LOCATION:</strong> <?php the_field('location'); ?></li>
					  <li><strong>FLOORS:</strong> <?php the_field('floors'); ?></li>
					  <li><strong>UNITS:</strong> <?php the_field('units'); ?></li>
					  <li><strong>SIZE:</strong> <?php the_field('size'); ?></li>
					  <li><strong>STATUS:</strong> 
						  <?php
						    $status = get_field('status');
							   if($status == 1){
								   $output = "Active";
							   }else{
								   $output = "Finish";
							   }
							   echo $output;
						   ?>
					   </li>
			      </ul>
			  </div>
            </li>
            <li>
              <img src="<?php echo get_field('image_3')['url'];  ?>" alt="" />
			  <div class="orbit-caption">
				  <h6 class="whitetxt"><?php the_title(); ?></h6>
				  <ul class="no-bullet">
					  <li><strong>TYPE:</strong> <?php the_field('type'); ?></li>
					  <li><strong>LOCATION:</strong> <?php the_field('location'); ?></li>
					  <li><strong>FLOORS:</strong> <?php the_field('floors'); ?></li>
					  <li><strong>UNITS:</strong> <?php the_field('units'); ?></li>
					  <li><strong>SIZE:</strong> <?php the_field('size'); ?></li>
					  <li><strong>STATUS:</strong> 
						  <?php
						    $status = get_field('status');
							   if($status == 1){
								   $output = "Active";
							   }else{
								   $output = "Finish";
							   }
							   echo $output;
						   ?>
					   </li>
			      </ul>
			  </div>
            </li>
            </ul>
          </div>
        <?php $i = $i+1; ?>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="small-portfolio trim-big">
      <h3>PORTFOLIO</h3>
      <ul class="no-bullet accordion">
        <?php  foreach( $posts as $post ): setup_postdata($post);  ?>
          	<li class="uppercase linkable">
          		<a href="#"><?php the_title(); ?> <span class="fa fa-chevron-down right"></span></a>
				<div class="info-container">
				  <img src="<?php echo get_field('image_1')['sizes']['medium'];  ?>" alt="" />
  				  <ul class="no-bullet">
					  <li><h6><?php the_title(); ?></h6></li>
  					  <li><strong>TYPE:</strong> <?php the_field('type'); ?></li>
  					  <li><strong>LOCATION:</strong> <?php the_field('location'); ?></li>
  					  <li><strong>FLOORS:</strong> <?php the_field('floors'); ?></li>
  					  <li><strong>UNITS:</strong> <?php the_field('units'); ?></li>
  					  <li><strong>SIZE:</strong> <?php the_field('size'); ?></li>
  					  <li><strong>STATUS:</strong> 
  						  <?php
  						    $status = get_field('status');
  							   if($status == 1){
  								   $output = "Active";
  							   }else{
  								   $output = "Finish";
  							   }
  							   echo $output;
  						   ?>
  					   </li>
  			      </ul>
				</div>
          	</li>
        <?php endforeach; ?>
      </ul>
  </div>
  <script>
  $(function() {
	  
	  
	  $("#click_map").click(function(){
		if(!$("#googleMap").is(':visible')) {
		  	$(".galleries.allofthem").hide("fast");
			$("#googleMap").show("fast");
		}
	  });
	  
	  $(".map-points a").on( "click", function( e ) {
		  event.preventDefault();
		  var a_href = $(this).attr('href');
		  console.log(a_href);
		  if($("#googleMap").is(':visible')) {
		      $("#googleMap").hide("fast");
		  }
		  $(".galleries.allofthem").hide("fast");
	      $("#"+a_href+"-gallery").show();
	  });
	  
	  $(".accordion a").on( "click", function( e ) {
	  	e.preventDefault();
		var text = $(this).parent().children(".info-container");
		// console.log(text);
		text.slideToggle();
	  });
	  $( "#menu-main a" ).on( "click", function( event ) {
	      event.preventDefault();
		  var a_href = $(this).attr('href');
		  if (a_href == "#investor-login"){return}
		  $('html, body').animate({
		     scrollTop: $(a_href).offset().top - 120
		  }, 1500);
	      console.log( a_href );
	  });
	  
      $(".closing").click(function(e){
        e.preventDefault();
        $(".allofthem").hide("fast");
        $("#googleMap").show();
      });
  });
  
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
      var image = '<?php bloginfo('stylesheet_directory'); ?>/assets/images/icon.png';

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
            $("#googleMap").hide("fast");
            $("#"+i+"-gallery").show();
            // if (marker.getAnimation() !== null) {
            //    marker.setAnimation(null);
            //  } else {
            //    marker.setAnimation(google.maps.Animation.BOUNCE);
            //  }
            // var contentString = locations[i]["title"];
            // infowindow.setContent(contentString);
            // infowindow.open(map, marker);
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
  
  <div class="pages-container">
  	<?php /* Start loop */ ?>
  	<?php while ( have_posts() ) : the_post(); ?>
  		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
  			<div class="entry-content">
				<div class="row row-x">
					<div class="large-12 columns">
						<?php the_content(); ?>	
					</div>
				</div>
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
