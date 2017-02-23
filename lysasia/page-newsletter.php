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

									<form action="https://lys-asia.us14.list-manage.com/subscribe/post" method="POST" >
											<input type="hidden" name="u" value="e1b715c46ebce48b4354b0d89">
											<input type="hidden" name="id" value="423856a578">

  										<div class="form-group">
												<label for="MERGE0">E-Mail <span class="req asterisk">*</span></label>
												<input type="email" class="form-control" autocapitalize="off" autocorrect="off" name="MERGE0" id="MERGE0" size="25" value="">
												<label for="MERGE1">Vorname <span class="req asterisk">*</span></label>
												<input type="text" class="form-control" name="MERGE1" id="MERGE1" size="25" value="">
												<label for="MERGE2">Nachname <span class="req asterisk">*</span></label>
												<input type="text" class="form-control" name="MERGE2" id="MERGE2" size="25" value="">
										</div>
  									<button type="submit" class="btn btn-default" name="submit" value="Jetzt anmelden">Jetzt anmelden</button>
										<input type="hidden" name="ht" value="44f3bc60e438fc2e3eacf4af3c381ff8ffc3d43b:MTQ3ODg1OTkzMC40NTQ3">
										<input type="hidden" name="mc_signupsource" value="hosted">
									</form><br><br>
								</div><!-- /.col-md-6 test-black -->

								<div class="col-md-6 galerie">
								<?php $image = get_field('bild_rechts');
								$size = '2sp';
								$thumb = $image['sizes'][ $size ];
								if( !empty($image) ): ?>
									<img class="img-responsive" src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>" height="575" />
								<?php endif; ?>
								<?php endwhile; ?>

								</div><!-- /.col-md-6 galerie -->
							</div><!-- /.row main-row -->
						</div><!-- /.col-md-9 -->

						<!-- Sidebar
						================================================== -->
						<?php get_sidebar() ?>
					
		
<?php get_footer(); ?>