<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.1.2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/** @global WC_Checkout $checkout */

?>

<div class="checkout-tab login-tab">
    <span>LOGIN / GAST</span>
</div>
<div class="login-block toggle-tab">
    <?php
    if ( is_user_logged_in() ) {
        echo
            '<ul id="shipping_method">
                <li>
                    <input type="radio" name="logged-in" id="logged-in" class="shipping_method" checked>
                    <label for="logged-in">LOGIN</label>
                </li>
                <li>
                    <input type="radio" name="logged-in" id="logged-out" class="shipping_method">
                    <label for="logged-out"><a class="loggout-lnk" href="'. wp_logout_url( get_permalink() ) .'">GASTBESTELLUNG</a></label>    
                </li>
            </ul>';
        echo '</div>';
    } else {
        echo
        '<ul id="shipping_method">
                <li>
                    <a href="#" class="showlogin">
                        <input type="radio" name="logged-in" id="logged-in" class="shipping_method">
                        <label for="logged-in">LOGIN</label>
                    </a>
                </li>
                <li>
                    <input type="radio" name="logged-in" id="logged-out" class="shipping_method" checked>
                    <label for="logged-out">GASTBESTELLUNG</a></label>
                </li>
            </ul>';
    }
    ?>

    <?php
    /**
     * Checkout login form
     *
     * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-login.php.
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
     * @version     2.0.0
     */

    if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
    }

    if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
        return;
    }

    wc_print_notice( $info_message, 'notice' );
    ?>



    <?php
    woocommerce_login_form(
        array(
            'message'  => __( '' ),
            'redirect' => wc_get_page_permalink( 'checkout' ),
            'hidden'   => true
        )
    );
    ?>
</div>

