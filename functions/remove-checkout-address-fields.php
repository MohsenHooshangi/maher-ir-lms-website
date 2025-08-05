add_filter( 'woocommerce_checkout_fields', 'remove_address_fields' );

function remove_address_fields( $fields ) {
    // حذف فیلدهای آدرس
    unset( $fields['billing']['billing_address_1'] ); // آدرس خط 1
    unset( $fields['billing']['billing_address_2'] ); // آدرس خط 2
    unset( $fields['billing']['billing_city'] ); // شهر
    unset( $fields['billing']['billing_postcode'] ); // کد پستی
    unset( $fields['billing']['billing_state'] ); // استان
    unset( $fields['billing']['billing_country'] ); // کشور

    // حذف سایر فیلدها در صورت نیاز
    unset( $fields['shipping']['shipping_address_1'] ); // آدرس ارسال

    return $fields;
}
