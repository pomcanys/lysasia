<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $order ) : ?>

	<?php if ( $order->has_status( 'failed' ) ) : ?>

		<p class="woocommerce-thankyou-order-failed"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

		<p class="woocommerce-thankyou-order-failed-actions">
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
			<?php if ( is_user_logged_in() ) : ?>
				<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My Account', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</p>

	<?php else : ?>

        <div class="checkout-tab login-tab">
            <span>LOGIN / GAST</span>
        </div>
        <div class="checkout-tab login-tab">
            <span>BESTELLINFORMATIONEN</span>
        </div>
        <div class="checkout-tab login-tab">
            <span>BESTELLÜBERSICHT</span>
        </div>
        <div class="checkout-tab login-tab">
            <span>DELIVERY oder TAKE OUT</span>
        </div>
        <div class="checkout-tab login-tab">
            <span>BEZAHLUNG</span>
        </div>
        <div class="checkout-tab login-tab">
            <span>BESTELLBESTÄTIGUNG</span>
        </div>

        <div>
            <?php
                $orderDayTA = get_post_meta( $order->id, 'wcta_shipping_option_day', true );
                $orderDayD = get_post_meta( $order->id, 'wcso_shipping_option_day', true );
                $orderTimeTA = get_post_meta( $order->id, 'wcta_shipping_option_time', true );
                $orderTimeD = get_post_meta( $order->id, 'wcso_shipping_option_time', true );
            ?>

            <p>Vielen Dank für deine Bestellung.</p>
            <p>Am
                <span class="order-date"><?php echo $orderDayTA ? $orderDayTA : $orderDayD; ?></span>
                zwischen
                <span class="order-time"><?php echo $orderTimeTA ? $orderTimeTA : $orderTimeD; ?></span>
                Uhr wird deine Bestellung eintreffen.
            </p>

            <div class="order-products">
                <?php
                do_action( 'woocommerce_review_order_before_cart_contents' );

                foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                        ?>
                        <div class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                <span class="product-name">
                    <?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <strong class="product-quantity">' . sprintf( '%s', $cart_item['quantity'] ) . '</strong>', $cart_item, $cart_item_key ); ?>
                    <?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;'; ?>
                    <?php echo WC()->cart->get_item_data( $cart_item ); ?>
                </span>
                        </div>
                        <?php
                    }
                }

                do_action( 'woocommerce_review_order_after_cart_contents' );
                ?>
            </div>

            <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
                <div class="fee">
                    <span><?php echo esc_html( $fee->name ); ?></span>
                    <span><?php wc_cart_totals_fee_html( $fee ); ?></span>
                </div>
            <?php endforeach; ?>

            <?php if ( wc_tax_enabled() && 'excl' === WC()->cart->tax_display_cart ) : ?>
                <?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
                    <?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : ?>
                        <div class="tax-rate tax-rate-<?php echo sanitize_title( $code ); ?>">
                            <span><?php echo esc_html( $tax->label ); ?></span>
                            <span><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="tax-total">
                        <span><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></span>
                        <span><?php wc_cart_totals_taxes_total_html(); ?></span>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

            <?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
            <?php do_action( 'woocommerce_thankyou', $order->id ); ?>

            <?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

            <div class="order-number">
                <span>Bestellnummer</span>
                <span><?php echo $order->get_order_number(); ?></span>
            </div>
            <p>Eine E-Mail mit den der Bestellbestätigung ist unterwegs zu dir.</p>

            <div class="info-box">
                <p>Box für Infos wie Pinto-Retouren, Lieferzeiten oder TakeOut Abläufe.</p>
            </div>

        </div>
		<!--p class="woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), $order ); ?></p>

		<ul class="woocommerce-thankyou-order-details order_details">
			<li class="order">
				<?php _e( 'Order Number:', 'woocommerce' ); ?>
				<strong><?php echo $order->get_order_number(); ?></strong>
			</li>
			<li class="date">
				<?php _e( 'Date:', 'woocommerce' ); ?>
				<strong><?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></strong>
			</li>
			<li class="total">
				<?php _e( 'Total:', 'woocommerce' ); ?>
				<strong><?php echo $order->get_formatted_order_total(); ?></strong>
			</li>
			<?php if ( $order->payment_method_title ) : ?>
			<li class="method">
				<?php _e( 'Payment Method:', 'woocommerce' ); ?>
				<strong><?php echo $order->payment_method_title; ?></strong>
			</li>
			<?php endif; ?>
		</ul>
		<div class="clear"></div-->

	<?php endif; ?>

<?php else : ?>

	<p class="woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

<?php endif; ?>
