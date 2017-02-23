<!-- Content
					================================================== -->
					<div class="row teaser-row row-eq-height woo-twobars-container">
                        <!-- SIDEBAR -->
                        <div class="col-md-3 woo-left-side">
                            <div class="woo-left-inner">
                                <?php dynamic_sidebar( 'shop-left-cats' ); ?>
                            </div>
                            <div class="left-green vbottom">
                                <?php dynamic_sidebar( 'shop-left-bottom' ); ?>
                            </div>
                        </div>
                        <!-- END SIDEBAR -->

                        <div class="col-md-9 woo-center success-page">
                                <div class="col-md-12 main-full text-black">
                                <?php while ( have_posts() ) : the_post(); ?>
                                    <h1 class="entry-title"><?php the_title(); ?></h1>
                                    <?php the_content (); ?>
                                <?php endwhile; ?>

                        <?php
                        if (get_query_var('order-received')) {
                                $order = wc_get_order( get_query_var('order-received') );
                        ?>

                            <?php
                            $orderDayTA = get_post_meta( $order->id, 'wcta_shipping_option_day', true );
                            $orderDayD = get_post_meta( $order->id, 'wcso_shipping_option_day', true );
                            $orderTimeTA = get_post_meta( $order->id, 'wcta_shipping_option_time', true );
                            $orderTimeD = get_post_meta( $order->id, 'wcso_shipping_option_time', true );
                            ?>

                            <p><strong>Vielen Dank für deine Bestellung.</strong></p>
                            <p><strong>
                                Am
                                <span class="order-date"><?php echo $orderDayTA ? $orderDayTA : $orderDayD; ?></span>
                                zwischen
                                <span class="order-time"><?php echo $orderTimeTA ? $orderTimeTA : $orderTimeD; ?></span>
                                Uhr wird deine Bestellung eintreffen.
                            </strong></p>

                            <div class="order-products">
                            <?php
                                $items = $order->get_items();

                                foreach ( $items as $item_id => $item_data ) {
                                    echo '<div class="product-name">';
                                        echo '<strong class="product-quantity">'. $order->get_item_meta($item_id, '_qty', true) .'</strong> ';
                                        echo '<span class="product-name">'. $item_data['name'] . '</span>';
                                    echo '</div>';
                                }
                            ?>
                            </div>

                            <div class="depot-pintos">
                                <span class="order-title">Davon Depot Pintos</span>
                                <span class="total-qty order-val">
                                    <?php
                                    $items = $order->get_items();
                                    $totalQty = array();
                                    foreach ( $items as $item_id => $item_data ) {
                                        $itemsQty = $order->get_item_meta($item_id, '_qty', true);
                                        array_push($totalQty, $itemsQty);
                                    }
                                    echo array_sum($totalQty);
                                    ?>
                                </span>
                                <span class="order-num"><?php echo money_format('%i',  (array_sum($totalQty) * 10)); ?></span>
                            </div>

                            <div class="returned-pintos">
                                <span class="order-title">Pintos Retouren</span>
                                <span class="order-val"><?php echo get_post_meta( $order->id, 'pintos_retourned', true ); ?></span>
                                <span class="order-num">
                                    <?php
                                        $returnedPintos = get_post_meta( $order->id, 'pintos_retourned', true );
                                        echo '-' . money_format('%i',  ($returnedPintos * 10));
                                    ?>
                                </span>
                            </div>

                            <?php
                                if ( WC()->session->get( 'chosen_shipping_methods' )[0] == 'wcta_local_shipping' ) { ?>
                                    <div class="order-delivery">
                                        <span class="order-title"><?php _e( 'Lieferkosten' ); ?></span>
                                        <span class="order-val"></span>
                                        <span class="order-num">7.00</span>
                                    </div>
                                <?php }
                            ?>

                            <div class="order-total">
                                <span class="order-title"><strong><?php _e( 'Total', 'woocommerce' ); ?></strong></span>
                                <span class="order-val"></span>
                                <span><?php echo wc_price( $order->get_total() ); ?></span>
                            </div>

                            <?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

                            <div class="order-number">
                                <strong>
                                    <span class="order-title">Bestellnummer</span>
                                    <span><?php echo $order->id; ?></span>
                                </strong>
                            </div>

                            <p><strong>Eine E-Mail mit den der Bestellbestätigung ist unterwegs zu dir.</strong></p>

                            <div class="info-box">
                                <p>Box für Infos wie Pinto-Retouren, Lieferzeiten oder TakeOut Abläufe.</p>
                            </div>


                        <?php } ?>



                        </div><!-- /.col-md-9 -->
                    </div>



