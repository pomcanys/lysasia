<?php get_header(); ?>

					<!-- Content
					================================================== -->
          <div class="row row-eq-height">

          	<!-- Left Sidebar
						================================================== -->
            <div class="col-md-3">
              <div class="sidebar grey height-auto">
                <!-- Selection Menu -->
                <h3 class="padding-left">Deine Wahl</h3>
                <ul class="auswahl">
                  <li><a href="#">Suppe</a></li>
                  <li><a href="#">Salat</a></li>
                  <li><a href="#">Vorspeise</a></li>
                  <li><a href="#">China</a></li>
                  <li><a href="#">Thailand</a></li>
                  <li><a href="#">Malaysia</a></li>
                  <li><a href="#">Gemüse (ohne Reis)</a></li>
                  <li><a href="#">Reis | Nudeln</a></li>
                  <li><a href="#">Getränke</a></li>
                  <li><a href="#">Vegetarisch</a></li>
                  <li><a href="#">Vegan</a></li>
                </ul>

                <!-- Conditions Green Box -->
                <div class="sidebar padding-left green conditions">
                  <p><strong>
                    Vegetarische Gerichte *<br>
                    Vegane Gerichte **<br>
                    Leichte Schärfe +<br>
                    Etwas scharf ++<br>
                    Sehr scharf +++<br>
                  </strong></p>
                  <p class="text-black">
                    <strong>Mindestbestellmenge</strong> 13 CHF<br>
                    <strong>Lieferkosten</strong> 7 CHF
                  </p>
                </div><!-- /.sidebar padding-left green conditions -->
              </div><!-- /.sidebar grey height-auto -->
            </div><!-- /.col-md-3 -->


            <!-- Main contant
						================================================== -->
            <div class="col-md-6">
              <div class="main-row lightgrey height-auto">
                <h1>Main Content</h1>
                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
              </div><!-- /.main-row lightgrey height-auto -->
            </div><!-- /.col-md-6 -->


            <!-- Right Sidebar
						================================================== -->
            <div class="col-md-3">
              <div class="sidebar grey height-auto">
                <h3>Warenkorb</h3>

                <table class="table-warenkorb">
                  <tr>
                    <td width="25">1</td>
                    <td>Chili Cashewnuts</td>
                    <td align="right">17.50 CHF</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Lemongrass</td>
                    <td align="right">17.50 CHF</td>
                  </tr>
                  <tr class="text-green">
                    <td colspan="2">Depot Pinto</td>
                    <td align="right">10.00 CHF</td>
                  </tr>
                  <tr class="text-green">
                    <td colspan="2">Versandkosten</td>
                    <td align="right">7.00 CHF</td>
                  </tr>
                  <tfoot>
                    <tr>
                      <td colspan="2">Zwischentotal</td>
                      <td align="right">54.00 CHF</td>
                    </tr>
                  </tfoot>
                </table>
                <p class="text-right"><button class="btn btn-success" type="submit">Bestellen</button></p>
              </div><!-- /.sidebar grey height-auto -->
            </div><!-- /.col-md-3 -->

          </div><!-- /.row .row-eq-height -->
		
<?php get_footer(); ?>