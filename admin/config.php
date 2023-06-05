<?php
//DATA BASE
define("DBDRIVER","mysql");
define("DBHOST",'127.0.0.1');
define("DBNAME","constructora2");
define("DBUSER","constructora");
define("DBPASS","1234");
define("DBPORT","3306");


define('ProPayPal', 0);
if(ProPayPal){
    define("PayPalClientId", "AS1P9QPCa4456XkIv-a5aIdE8YHb5Pcm8N17mCE1OL3R40ovyxIXxZQRsKQ6JL70-zrtrTrueK4Mxc0j");
    define("PayPalSecret", "*******");
    define("PayPalBaseUrl", "https://sandbox.paypal.com");
    define("PayPalENV", "production");
} else {
    define("PayPalClientId", "AS1P9QPCa4456XkIv-a5aIdE8YHb5Pcm8N17mCE1OL3R40ovyxIXxZQRsKQ6JL70-zrtrTrueK4Mxc0j");
    define("PayPalSecret", "EJ4XOK_xrl2OZ3gZTGdnY73duWfCKogdH4YQrsxoQFxSjy6_QmsxeFBgKFz_YV4MyZhWd3Qs_HFlCPph");
    define("PayPalBaseUrl", "https://sandbox.paypal.com");
    define("PayPalENV", "sandbox");
}
?>