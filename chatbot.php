<?php

$API_URL = 'https://api.line.me/v2/bot/message';
$ACCESS_TOKEN = 'Es3Kz8W5FIyX+e9W8QhhNvTreG4FuPaUwlTi/CCK5+g51055N5mYYzPLtcFOEfe3Mrdtvk0KNvGP3owBpYOBIE/Xq3aDuJ+w0VI/3Eelkl7/bvEz+Kv2K0pBsumqTnDpQDXTqsC7yucteBdhejsnXwdB04t89/1O/w1cDnyilFU=';
$channelSecret = 'a35820614034732a864c1e03c76bb327';
$POST_HEADER = array('Content-Type: application/json', 'Authorization: Bearer ' . $ACCESS_TOKEN);

$request = file_get_contents('php://input');
$request_array = json_decode($request, true);
$message = $request_array['events'][0]['message']['text'];
foreach ($request_array['events'] as $event) {
  $reply_token = $event['replyToken'];
}

# Get API
function file_get_contents_curl($url)
{
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}

$Api = file_get_contents_curl("https://e-sport.in.th/ssdev/ecom/dashboard/api/products/");
// $html = file_get_contents_curl("http://dummy.restapiexample.com/api/v1/employees"); #API Dummy
$dataFromApi = json_decode($Api, true);
echo $dataFromApi['Api'];

foreach ($dataFromApi['Api'] as $data) {
  // $dataName[] = $data['employee_name'];
  // $dataSalary[] = $data['employee_salary'];
  echo $dataFromApi['Api'];
}

# Flex Message
include 'flex_message.php';

if ($message == "แสดงสินค้า") {
  $data = [
    'replyToken' => $reply_token,
    'messages' => [$jsonFlex]
  ];
  $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
  $send_result = send_reply_message($API_URL . '/reply', $POST_HEADER, $post_body);
}
else {
  $data = [
    'replyToken' => $reply_token,
    'messages' => [$text]
  ];
  $post_body = json_encode($data, JSON_UNESCAPED_UNICODE);
  $send_result = send_reply_message($API_URL . '/reply', $POST_HEADER, $post_body);
}

# Reply Messages
function send_reply_message($url, $post_header, $post_body)
{
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $post_header);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post_body);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}

# Rich Menu
// $url = 'https://api.line.me/v2/bot/richmenu';
// $rich = json_encode($jsonRich, JSON_UNESCAPED_UNICODE);
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
// curl_setopt($ch, CURLOPT_HTTPHEADER, $POST_HEADER);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $rich);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// $response = curl_exec($ch);
// curl_close($ch);
// echo $response;
