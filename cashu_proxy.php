<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$cashu_url = "https://api.cashu.com/oauth/token";

$data = [
    "client_id" => "579beb6493348e6060f765c405b51827b63500331cadaae2b1b1d7dfb029e99e",
    "client_secret" => "b1e6fe4c01aab26ba015debfcc8c9ff7b3cded4d2ab193f82159b67ef749e959",
    "grant_type" => "client_credentials"
];



$ch = curl_init($cashu_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/x-www-form-urlencoded"]);

$response = curl_exec($ch);
if($response === false){
    http_response_code(500);
    echo json_encode(["error" => curl_error($ch)]);
} else {
    header('Content-Type: application/json');
    echo $response;
}
curl_close($ch);
