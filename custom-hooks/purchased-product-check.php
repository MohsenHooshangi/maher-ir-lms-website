// غیرفعال کردن دکمه "افزودن به سبد خرید" برای محصولاتی که قبلاً خریداری شده‌اند
add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_user_logged_in_product_already_bought', 30 );
  
function bbloomer_user_logged_in_product_already_bought() {
   global $product;
   if ( ! is_user_logged_in() ) return;
   if ( wc_customer_bought_product( '', get_current_user_id(), $product->get_id() ) ) {
      echo '<div>You purchased this in the past. Buy again?</div>';
   }
}