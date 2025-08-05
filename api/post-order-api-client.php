// اجرای تابع در صفحه "تشکر" بعد از ثبت سفارش
add_action('woocommerce_thankyou', 'maherApi', 10, 1);

function maherApi($order_id) {
    // دریافت اطلاعات سفارش با استفاده از ID سفارش
    $order = wc_get_order($order_id);
    $data = [];
    $data['country_code'] = 98; // کد کشور (ایران)

    // پردازش و پاک‌سازی شماره موبایل برای اطمینان از فرمت صحیح
    $mobileTemp = $order->get_billing_phone(); 
    $mobile = preg_replace('/^(\+98|0098|098|980|9898|0)/', '', $mobileTemp); 
    $data['mobile'] = (int)$mobile; // تبدیل به عدد صحیح

    // تولید کلید امنیتی برای ارسال به API (براساس اطلاعات موبایل و کد کشور)
    $key_temp = md5('PY&WoRc#' . $data['country_code'] . $data['mobile'] . str_rot13(sha1($data['country_code'] . $data['mobile'], 'PWg@2p!!gt')));
    $data['key'] = $key_temp;

    // دریافت نام و نام خانوادگی از اطلاعات صورت‌حساب
    $data['first_name'] = $order->get_billing_first_name();
    $data['last_name'] = $order->get_billing_last_name();

    // جمع‌آوری اطلاعات محصولات خریداری شده
    $product_items = $order->get_items(); // لیست محصولات در سفارش
    $products = []; 
    $total_price = $order->get_total(); // جمع کل قیمت سفارش
    $reference_code = $order_id; // کد مرجع سفارش (همان ID سفارش)
    $discount_code = $order->get_coupon_codes() ? implode(',', $order->get_coupon_codes()) : 'وارد نشده'; // کدهای تخفیف استفاده شده

    foreach ($product_items as $key => $item) {
        // دریافت اطلاعات محصول
        $product = $order->get_product_from_item($item); 
        $product_id = $product->get_id(); // شناسه محصول
        $price = $item->get_total(); // قیمت نهایی محصول (بعد از اعمال تخفیف)
        $total_price = $item->get_subtotal(); // قیمت اصلی محصول (قبل از تخفیف)

        // ذخیره اطلاعات محصول در آرایه محصولات
        $products[$key] = [
            'product_id' => $product_id,
            'price' => $price,
            'total_price' => $total_price,
            'payment_type' => '0', // مشخص کردن نوع پرداخت (0 = خرید از سایت)
        ];
    }

    // اضافه کردن اطلاعات محصولات و سفارش به آرایه اصلی داده‌ها
    $data['payment_json'] = json_encode($products); // تبدیل آرایه محصولات به JSON
    $data['total_price'] = $total_price; // قیمت کل سفارش
    $data['reference_code'] = $reference_code; // کد مرجع سفارش
    $data['discount_code'] = $discount_code; // کد تخفیف

    // تنظیمات و ارسال درخواست به API
    $url = "https://app.appmaher.ir/api/crm/put-info-user"; // آدرس API
    $ch = curl_init($url); // مقداردهی اولیه cURL
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // غیرفعال کردن بررسی SSL برای میزبان
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // غیرفعال کردن اعتبارسنجی SSL
    curl_setopt($ch, CURLOPT_POST, 1); // تنظیم درخواست به صورت POST
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // ارسال داده‌ها به صورت JSON
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // بازگشت پاسخ به متغیر
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // دنبال کردن ریدایرکت‌ها
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']); // تنظیم هدر نوع محتوا

    $result = curl_exec($ch); // اجرای درخواست
    curl_close($ch); // بستن اتصال cURL

    // لاگ کردن پاسخ API در فایل لاگ
    $encoded = iconv('UTF-8', 'GBK', $result); // تبدیل کاراکترها (در صورت نیاز)
    file_put_contents('./log_' . date("j.n.Y") . '-application-api.log', $encoded, FILE_APPEND); // ذخیره در فایل لاگ
}