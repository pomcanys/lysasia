<?php
/**
 * OPC review order form template with Remove/Quantity columns
 *
 * @version 2.3
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

?>
<div class="opc_order_review">
    <input type="hidden" name="is_opc" value="1" />

    <div class="shop_table woocommerce-checkout-review-order-table">

        <!-- CART -->
        <div class="checkout-tab cart-tab">
            <span>BESTELLÜBERSICHT</span>
        </div>

        <div class="toggle-tab">
            <div class="headers">
                <span class="product-name"></span>
                <span class="product-quantity"><?php _e( 'Anzahl' ); ?></span>
                <span class="product-depot"><?php _e('Depot'); ?></span>
                <span class="product-subtotal"><?php _e('CHF/Stk.'); ?></span>
                <span class="product-total"><?php _e('Total CHF'); ?></span>
            </div>
            <?php
            do_action( 'woocommerce_review_order_before_cart_contents' );

            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                    ?>
                    <div class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item opc_cart_item', $cart_item, $cart_item_key ) ); ?>" data-add_to_cart="<?php echo $_product->variation_id ? $_product->variation_id : $_product->id; ?>" data-update_key="<?php echo $cart_item_key; ?>">
                        <div class="product-item">
                            <span class="product-details" >
                                <?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ); ?>
                                <?php echo WC()->cart->get_item_data( $cart_item ); ?>

                                <?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s">löschen</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __( 'Remove this item', 'wcopc' ) ), $cart_item_key ); ?>
                            </span>
                            <span class="product-quantity">
                            <?php
                            if ( $_product->is_sold_individually() ) {
                                $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                            } else {
                                $product_quantity = woocommerce_quantity_input( array(
                                    'input_name'  => "cart[{$cart_item_key}][qty]",
                                    'input_value' => $cart_item['quantity'],
                                    'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
                                    'min_value'   => '0'
                                ), $_product, false );
                            }

                            echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key );
                            ?>
                            </span>

                            <span class="product-depot">
                                <?php
                                $depotCost = 10;
                                $genCost = $cart_item['quantity'] * $depotCost;
                                echo money_format('%i',  $genCost);
                                ?>
                            </span>
                            <span class="product-price">
                                <?php
                                echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                ?>
                            </span>

                            <span class="product-total">
                                <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );  ?>
                            </span>
                        </div>
                    </div>
                    <?php
                }
            }

            do_action( 'woocommerce_review_order_after_cart_contents' );
            ?>

            <input type="submit" class="button update-btn" name="update_cart" value="<?php esc_attr_e( 'Update Cart', 'woocommerce' ); ?>" />

            <?php do_action( 'woocommerce_cart_actions' ); ?>

            <?php wp_nonce_field( 'woocommerce-cart' ); ?>

            <?php if ( wc_coupons_enabled() ) { ?>
                <div class="coupon">

                    <label for="coupon_code"><?php _e( 'Coupon:', 'woocommerce' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'woocommerce' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply Coupon', 'woocommerce' ); ?>" />

                    <?php do_action( 'woocommerce_cart_coupon' ); ?>
                </div>
            <?php } ?>

            <p class="form-row form-row my-field-class form-row-wide" id="depot_returned_field"><label for="depot_returned" class="">Pintos retouren</label><input type="text" class="input-text " name="depot_returned" id="depot_returned" placeholder="" value="<?php echo abs(1*WC()->session->get( 'pintos_retourned' )); ?>"></p>

            <div class="cart-subtotal">
                <span><?php _e( 'Zwischentotal', 'wcopc' ); ?></span>
                <span><?php wc_cart_totals_subtotal_html(); ?></span>
            </div>

            <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
                <div class="fee">
                    <span><?php echo esc_html( $fee->name ); ?></span>
                    <span><?php wc_cart_totals_fee_html( $fee ); ?></span>
                </div>
            <?php endforeach; ?>

            <?php do_action( 'woocommerce_after_cart_table' ); ?>

            <div class="order-delivery">
                <span><?php _e( 'Lieferkosten' ); ?></span>
                <span>7</span>
            </div>

            <?php if ( WC()->cart->tax_display_cart === 'excl' ) : ?>
                <?php if ( get_option( 'woocommerce_tax_total_display' ) === 'itemized' ) : ?>
                    <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
                        <div class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
                            <span><?php echo esc_html( $tax->label ); ?></span>
                            <span><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="tax-total">
                        <span><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></span>
                        <span><?php echo wc_price( WC()->cart->get_taxes_total() ); ?></span>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

            <div class="order-total">
                <span><b><?php _e( 'Total', 'wcopc' ); ?></b></span>
                <span><?php wc_cart_totals_order_total_html(); ?></span>
            </div>

            <?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

        </div>
        <!-- END CART -->

        <!-- SHIPPING METHODS -->
        <div class="checkout-tab cart-tab">
            <span>DELIVERY oder TAKE OUT</span>
        </div>

        <div class="toggle-tab shipping-block">
            <?php
                $order = wc_get_order( $order_id );
                print_r($order);
            ?>

            <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

                <?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

                <?php wc_cart_totals_shipping_html(); ?>

                <?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

            <?php endif; ?>
        </div>
        <!-- END SHIPPING METHODS -->

    </div>
</div>