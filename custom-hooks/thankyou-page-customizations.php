// نمایش شناسه محصولات خریداری شده در ابتدای صفحه تشکر
add_action( 'woocommerce_before_thankyou', 'show_product_ids_and_names_on_thankyou_page', 5 );
function show_product_ids_and_names_on_thankyou_page( $order_id ) {
    if ( !$order_id ) return;

    $order = wc_get_order( $order_id );

    echo '<div class="product_id_show_cart" style="margin-bottom:30px; padding:20px; background-color:#fff3cd; border:1px solid #ffeeba; border-radius:8px;">';
    echo '<p style="font-weight:bold; line-height: 32px">توجه: فراموش نکنید از این قسمت اسکرین‌شات بگیرید</p>';
    echo '<div class="product_ids_in_cart">';
    echo '<h3 style="margin-bottom:10px;">شناسه محصولات خریداری شده:</h3>';
    echo '<ul style="margin-right:20px;">';
    foreach ( $order->get_items() as $item_id => $item ) {
        $product = $item->get_product();
        if (!$product) continue;
        $product_id = $product->get_id();
        $product_name = $item->get_name();
        echo '<li>کد <strong>' . esc_html( $product_name ) . '</strong>: ' . esc_html( $product_id ) . '</li>';
    }
    echo '</ul>';
    echo '</div>';
    echo '</div>';
}

// نمایش پیام نصب اپلیکیشن قبل از بخش جزئیات سفارش در صفحه تشکر
add_action( 'woocommerce_before_thankyou', 'custom_thankyou_message_before_order_details', 15 );

function custom_thankyou_message_before_order_details( $order_id ) {
    if ( !$order_id ) return;

    $order = wc_get_order( $order_id );
    if ( !$order ) return;

    echo '<div style="max-width:600px; margin:16px auto 32px; padding:20px; border:1px solid #ccc; background:#f9f9f9; border-radius:8px; text-align: justify">';
    echo '<p style="font-size:16px; line-height:1.8;">';
    echo 'برای مشاهده دوره یا دوره‌های خریداری‌شده ابتدا با کلیک بر روی لینک زیر، اپلیکیشن آکادمی ماهر را نصب کنید و سپس از بخش <strong>دوره‌های من</strong> به دوره‌هایی که شرکت کرده‌اید دسترسی داشته باشید و از طریق اپلیکیشن به تماشای آن‌ها بپردازید.';
    echo '</p>';
    echo '<p style="margin-top:10px;"><a href="https://maher.ir/app-install/" target="_blank" style="color:#0073aa; font-weight:bold;">نصب اپلیکیشن آکادمی ماهر</a></p>';
    echo '<hr>';
    echo '<p style="margin-top:10px;">در صورت هرگونه مشکل، از طریق پشتیبانی ماهر با ما در ارتباط باشید: <strong>09906080906</strong></p>';
    echo '</div>';
}