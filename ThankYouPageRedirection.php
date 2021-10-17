<?php
add_action( 'woocommerce_thankyou', 'bbloomer_redirectcustom');
function bbloomer_redirectcustom( $order_id ){
    $order = wc_get_order( $order_id );
    $url = 'thank-you-page-url';
    if ( ! $order->has_status( 'failed' ) ) {
        wp_safe_redirect( $url );
        exit;
    }
}

add_action('template_redirect', function() {
    // If user is in thank you page dont take action
    if (!is_page('thank-you')) {
        return;
    }

    // The proper page the user has to be coming from
    if (wp_get_referer() === 'url/if-coming-from-this-page-no-problem') {
        return;
    }

    // we are on thank you page
    // user is not coming from the proper pipeline
    // redirect  	
    wp_redirect('url/page-to-be-redirected');
    exit;
} );

?>