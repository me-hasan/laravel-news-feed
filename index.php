<?php 
use Khayrulhasan\NewsApi\Api;
 
require __DIR__.'/vendor/autoload.php';
 
$response = (new Api)->json();
 
echo "The Laravel-News.com feed has returned ".count($response['items']['items'])." items.\n";