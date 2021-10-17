<?php
// removing the links to the single product page, if the second remove action not added
// It WILL break your code
remove_action( 'woocommerce_before_shop_loop_item','woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item','woocommerce_template_loop_product_link_close', 5 );

// Eliminate the Single Product Page 
add_filter( 'woocommerce_register_post_type_product','hide_product_page',12,1);
function hide_product_page($args){
  $args["publicly_queryable"]=false;
  $args["public"]=false;
  return $args;
}
?>