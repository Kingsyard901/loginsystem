<?php
//
// // This code should be triggered when logging in
// include_once 'sms_number_generator.php';
// $randomSaved = $numberVerification;
//
// // SQL looking up user and fetching phonenumber.
// $elkuser = getenv('ELKSUSER');
// $elkpass = getenv('ELKSPASS');
//
// // Put in 46elks sms/text verification (sending text) here
// $sms = array(
//   "to"      => $_SESSION['phone'], //Get var for registered number. Format +46766861004
//   "message" => $randomSaved, //Get var from $numberVerification
//   "from"    => "PHP Login Page"
// );
//
// //I need to secure with gitignore to not push my API keys?
// $USER = getenv('ELKSUSER'); //Use .env files? User and Pass is from my account.
// $PASS = getenv('ELKSPASS'); //Use .env files?
//
// $url  = "https://api.46elks.com/a1/sms";
// $auth = 'Authorization: Basic '.
// base64_encode($USER.':'.$PASS)."\r\n".
// "Content-type: application/x-www-form-urlencoded\r\n";
//
// $context = stream_context_create(array(
//   'http' => array(
//     'method' => 'POST',
//     'header'  => $auth,
//     'content' => http_build_query($sms),
//     'timeout' => 10
// )));
//
// $response = file_get_contents($url, false, $context);
