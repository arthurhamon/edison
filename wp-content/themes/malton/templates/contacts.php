<?php
/*
Template Name: contacts
*/
?>
<?php get_header(); ?>
<?php if( have_posts() ) : the_post(); ?>
<div class="contacts">
	<div id="map"></div>
	<div class="inner">
		<div class="wrap-vertical-position">
			<div class="vertical-middle">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-7 col-xs-12 col-xs-offset-0">
							<div class="text">
								<div class="h2">Контактная<br />информация</div>
								<div class="infor">
									<?php the_content(); ?>
								</div>
							</div>
							<a href="#fancybox-registration" class="btn btn-green btn-block text-uppercase fancybox-preset-registration">Забронировать время</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
	
	var myLatLng = {lat: 54.490200, lng: 36.211500};
	var mapOptions = {
	// How zoomed in you want the map to start at (always required)
	zoom: 18,
	maxZoom: 18,
	scrollwheel: false,
	// The latitude and longitude to center the map (always required)
	center: myLatLng,
	disableDefaultUI: true,
	// How you would like to style the map. 
	// This is where you would paste any style found on Snazzy Maps.
	styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"color":"#000000"}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":"-39"},{"lightness":"35"},{"gamma":"1.08"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"saturation":"0"}]},{"featureType":"landscape.man_made","elementType":"all","stylers":[{"saturation":"-100"},{"lightness":"10"}]},{"featureType":"landscape.man_made","elementType":"geometry.stroke","stylers":[{"saturation":"-100"},{"lightness":"-14"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":"-100"},{"lightness":"10"},{"gamma":"2.26"}]},{"featureType":"poi","elementType":"labels.text","stylers":[{"saturation":"-100"},{"lightness":"-3"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"},{"lightness":"54"}]},{"featureType":"road","elementType":"geometry.stroke","stylers":[{"saturation":"-100"},{"lightness":"-7"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"road.local","elementType":"all","stylers":[{"saturation":"-100"},{"lightness":"-2"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"water","elementType":"geometry.fill","stylers":[{"saturation":"-100"},{"lightness":"100"}]},{"featureType":"water","elementType":"geometry.stroke","stylers":[{"saturation":"-100"},{"lightness":"-100"}]}]
	};
	
      var map;
      function initMap() {
		
		map = new google.maps.Map(document.getElementById('map'), mapOptions);
		<?php $img = get_field('marker-img'); ?>
		<?php if($img) : ?>
		var image = '<?php echo $img['url']; ?>';
		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			icon: image,
		});
		<?php endif; ?>
      }
    </script>
</div>
<?php endif; ?>
<?php get_footer(); ?> 