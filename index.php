<?php
header('Access-Control-Allow-Origin: *');
require './vendor/config.php';

header("Location: ./$apiVersion/", 301);
exit();