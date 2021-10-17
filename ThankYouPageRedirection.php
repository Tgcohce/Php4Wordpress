<?php

# Objective is to block any direct access from reaching the thank you page
# We have a sensitive thank you form we have to protect
add_action( 'template_redirect', 'woocommerce_redirect_after_checkout' );

function woocommerce_redirect_after_checkout() {
global $wp;
    
    # Making sure and order is made

if ( is_checkout() && ! empty( $wp->query_vars['order-received'] ) ) {

	$redirect_url = 'https://example.com/thank-you/';

	wp_redirect($redirect_url );

	exit;
}

}

add_action('template_redirect', function() {
    // ID of the page we are redirecting
    if (!is_page(12345)) {
        return;
    }

    // coming from the checkout, so all is fine
    if (wp_get_referer() === 'https://www.example.com//checkout/') {
        return;
    }

    
    // direct access tried, redirect to home
    wp_redirect(get_home_url());
    exit;
} );



?>
