<?php

$success = true;
$error = "";

if ($_GET['name'] === "") {
  $error = "Name data empty.";
  $success = false;
}

if ($_GET['email'] === "") {
  $error = "Email data empty.";
  $success = false;
}

if ($success) {
  $msg = "{$_GET['name']} requests your assistance. Please contact them at {$_GET['email']} to sign them up to CovidVault.";
  $success = mail("covid.register@simpleprogramming.com.au", "Demonstration Request", $msg);
} else {
  $error = "Mail failed to send with data: {$json_data}";
}

header('Content-type: application/json;charset=utf-8');
header('Cache-control: max-age=0');
if ($success) {
  http_response_code(200);
  $json_out = json_encode(["msg" => "Email sent successfully"]);
} else {
  http_response_code(500);
  $json_out = json_encode(["msg" => "Error occurred", "error" => $error]);
}
echo $json_out;

?>