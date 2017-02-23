<?php get_header(); ?>

					<!-- Content
					================================================== -->
					<div class="row teaser-row">

					 <div class="col-md-9 col-md-push-3">
							<!-- Hauptinhalt -->
							<div class="row main-row lightgrey">
								<div class="col-md-6 main text-black">
								<?php while ( have_posts() ) : the_post(); ?>
									<h1 class="entry-title"><?php the_title(); ?></h1>
									<?php the_content (); ?>
								<?php endwhile; ?>
								</div><!-- /.col-md-6 test-black -->

								<div class="col-md-6 galerie">
										<style>
											#map {
												width: 100%;
												height: 550px;
												color: #333;
											}
										</style>

										
										<script>
											// Map
										function initMap() {
											var lys = {lat: 47.3930962, lng: 8.487612};
											var lys2 = {lat: 47.366563, lng: 8.548457};
											var center = {lat: 47.387160, lng: 8.519640};
											var map = new google.maps.Map(document.getElementById('map'), {
												zoom: 12,
												center: center,
												styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]
											});


											var contentString = 
												'Zahnradstrasse 21<br>'+
												'8005 Zürich<br>'+
												'<br>'+
												'Beim Prime Tower und<br>Bahnhof Hardbrücke'+
												'';
											var infowindow = new google.maps.InfoWindow({
												content: contentString
											});
											var marker = new google.maps.Marker({
												position: lys,
												map: map,
												title: 'LYS ASIA',
												icon: "<?php bloginfo( 'template_url' ); ?>/favicons/favicon-32x32.png"
											});
												marker.addListener('click', function() {
													infowindow.open(map, marker);
											});
										infowindow.open(map,marker);


											var contentString2 = 
												'Stadelhoferstrasse 22 <br>'+
												'8001 Zürich<br>'+
												'';
											var infowindow2 = new google.maps.InfoWindow({
												content: contentString2
											});
											var marker2 = new google.maps.Marker({
												position: lys2,
												map: map,
												title: 'LYS ASIA',
												icon: "<?php bloginfo( 'template_url' ); ?>/favicons/favicon-32x32.png"
											});
												marker2.addListener('click', function() {
													infowindow2.open(map, marker2);
											});


										}
									    </script>
									    <script src="https://maps.googleapis.com/maps/api/js?key= AIzaSyBO6ALdeiH5jqGx5VDwh4NZJABPWvVINOQ&callback=initMap" async defer></script>
										</script>
										 <div id="map"></div>

								</div><!-- /.col-md-6 galerie -->
							</div><!-- /.row main-row -->
						</div><!-- /.col-md-9 -->


						<!-- Sidebar
						================================================== -->
						<?php get_sidebar() ?>
					
		
<?php get_footer(); ?>