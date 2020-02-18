<?php
header('Access-Control-Allow-Origin: *');
require './vendor/config.php';

header("Location: ./$apiVersion/index.php");
exit();