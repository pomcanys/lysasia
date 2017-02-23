          
        </div><!-- /.container -->
      </div><!-- /#main -->
    </div><!-- /.page-wrap -->
      
   <div class="container">
      <footer class="footer">
    		<div class="row">
    			<div class="col-sm-6 col-md-3">
    				<a href="https://www.facebook.com/lys.asia" title="LY'S Asia auf Facebook" target="_blank"><div class="icons icon-facebook"><span class="sr-only">Facebook</span></div></a>
            <a href="https://www.tripadvisor.de/Restaurant_Review-g188113-d2558765-Reviews-Ly_s_Asia-Zurich.html" title="LY'S Asia auf TripAdvisor" target="_blank"><div class="icons icon-tripadvisor"><span class="sr-only">TripAdvisor</span></div></a>
    			</div>
    			<div class="col-xs-12 col-md-9">
      			<div class="row">
        			<div class="col-sm-6 col-md-3">
          			<ul class="footer-menu">
            			<li><a href="/newsletter/">Newsletter</a></li>
                  <li><a href="/poinz/">Poinz Sammelkarte</a></li>
                  <li><a href="javascript:;" onclick="Localina.openBooking('0041449990808', $(this));">Tisch reservieren</a></li>
          			</ul>
        			</div>
        			<div class="col-sm-6 col-md-3">
        				 <ul class="footer-menu">
            			<li><a href="/medien/">Medien | Presse</a></li>
            			<li><a href="/impressum/">Impressum</a></li>
            			<!--<li><a href="/delivery-takeout/lieferbedingungen/">Lieferbedingungen</a></li>-->
          			</ul>
        			</div>
              <hr class="visible-xs-block visible-sm-block margin-top" />
        			<div class="col-sm-6 col-md-3">
        				<p><strong>LY’S Asia Maag-Areal </strong><br>
          				Zahnradstrasse 21 <br>
          				8005 Zürich <br>
          				<a href="mailto:contact@lys-asia.ch">contact@lys-asia.ch</a> <br>
          				+41 44 999 08 08
        				</p>
        			</div>
        			<div class="col-sm-6 col-md-3">
        				<p><strong>LY’S Asia Stadelhofen</strong> <br>
          				Stadelhoferstrasse 22 <br>
          				8001 Zürich <br>
          				<a href="mailto:stadelhofen@lys-asia.ch">stadelhofen@lys-asia.ch</a> <br>
          				+41 44 251 53 00
        				</p>
        			</div>
      			</div><!-- /.row -->
    			</div><!-- /.col-md-9 -->
        </div><!-- /.row -->
      </footer>
    </div><!-- /.container -->
      

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="<?php bloginfo( 'template_url' ); ?>/bootstrap/js/bootstrap.min.js"></script>
    <!-- Swiper Slider Gallery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <!-- Custom JS -->
    <script src="<?php bloginfo( 'template_url' ); ?>/js/styles.js"></script>
    <script src="https://localina.com/code/localina.js" type="text/javascript" charset="utf-8"></script><script type="text/javascript">jQuery(document).ready(function() { var $ = jQuery; Localina.init({apiKey: '81002020111222f2c9ccecd2b72b1ff37de7d4fd70c534', locale: 'de'}); });</script>
		<!-- Google Analytics (only not logged-in users) -->
		<?php if ( is_user_logged_in() ) {
			/* do nothing */
			} 
			else {
			echo"
			<script>
  			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  			ga('create', 'UA-27980550-1', 'auto');
  			ga('send', 'pageview');

			</script>";
		} ?>
  <?php wp_footer(); ?>
  </body>
</html>
