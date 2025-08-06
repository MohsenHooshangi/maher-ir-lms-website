# Maher Academy – Educational LMS Website

This project contains selected documentation and source code for [maher.ir](https://maher.ir), a WordPress-based online academy offering training courses in industrial electricity, Siemens, earthing, drives, and more.

## 🔧 Project Overview

- 📅 **Duration:** April 20, 2024 – Present  
- 👨‍💻 **Role:** Full implementation, technical support, REST API integration, bug fixing, server configuration, and campaign-based landing page design using Elementor.

## 🧰 Technologies Used

- WordPress + Elementor Pro + JetEngine  
- WooCommerce + PHP (custom functions and plugin integration)  
- REST API (external API communication via cURL)  
- Figma & Photoshop (for UI/UX and banners)

## 🧠 About the Project

Maher Academy is a platform dedicated to training professionals in the field of **industrial electricity** through modern LMS tools. It empowers users to:

- Learn practical technical skills  
- Prepare for job placement or entrepreneurship  
- Build a professional portfolio for international migration

Users who purchase a course via the website automatically gain access to that course in the **Maher mobile app** via a custom post-purchase hook that sends order data to the app's backend API.


  ## 🧩 Custom WooCommerce & WordPress Logic

The following custom features were implemented in the Maher LMS website:

- **Order-to-App Sync API**: On WooCommerce thank-you page, user order data (name, phone, product ID, etc.) is sent via cURL to the Maher mobile app API. See: `/api/post-order-api-client.php`
- **Thank-you Page Enhancements**: Shows purchased product IDs and installation guide for the mobile app. See: `/custom-hooks/thankyou-page-customizations.php`
- **Prevent Repeat Purchases**: Hides "Add to cart" button if the user already bought the product. See: `/custom-hooks/purchased-product-check.php`
- **Custom Post Type `mag`**: Adds a new post type for articles and news. See: `/custom-post-types/register-mag-post-type.php`
- **Checkout Field Cleanup**: Simplifies checkout by removing unnecessary address fields. See: `/functions/remove-checkout-address-fields.php`


## 🖼️ Screenshots

| Screenshot | Description |
|------------|-------------|
| `Maher-Aacademy-Home-Page.jpeg` | Maher Website homepage |
| `Maher-Academy-Courses-Page.jpeg` | Maher Website Courses Archive Page |
| `Maher-Academy-Course-Page.jpeg` | Maher Website Course Page Sample |
| `Maher-Aacademy-Landing-Page-Sample.jpeg` | Maher Website Landing Page Sample |
| `Maher-Academy-Admin-Dashboard.png` | Maher WordPress dashboard with plugin & course management |
| `Maher-Academy-Application-Home-Page.jpg` |Maher  Application Homepage |
| `Maher-Academy-Application-Course-Page.jpg` | Maher  Application Course Page Sample |
| `Maher-Academy-Application-Admin-Panel-Page.png` | Maher  Application Admin Dashboard |

## 📂 Project Files

- `/api/post-order-api-client.php`: Custom WooCommerce hook to send post-order data to mobile app via external REST API (using cURL)
- `/plugins-used/list-of-plugins.txt`: List of essential plugins used in the project
- `/custom-hooks/purchased-product-check.php`: Theme-based custom code snippets and hooks
- `/custom-hooks/thankyou-page-customizations.php`: Theme-based custom code snippets and hooks
- `/custom-post-types/register-mag-post-type.php`: Register a custom post type called mag to publish specialized content such as articles or reviews related to the electrical industry
- `/functions/remove-checkout-address-fields.php`: Remove unnecessary address fields on the WooCommerce checkout page to simplify the course purchase process

## 📄 Additional Documentation

- ✅ Official contract confirming employment  
- ✅ Letter from company verifying contributions  
- ✅ Social security (insurance) proof  
- ✅ Payment slips & transactions  
- ✅ Visual proof: site, admin, API responses

## 📌 Notes

⚠️ Note: To respect company privacy, only non-sensitive code and screenshots are shared publicly in this repository.

---

## 📬 Contact

If you’d like to learn more or collaborate:

- 📧 Email: **mr.hooshangi.official@gmail.com**  
- 🌐 Website: [www.mohsenhooshangi.ir](https://www.mohsenhooshangi.ir)  
- 🖥️ GitHub: [github.com/mrhooshangigit](https://github.com/mrhooshangigit)
