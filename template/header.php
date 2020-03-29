<?php
header("Content-Type: text/html; charset=UTF-8");
mb_language("Japanese");
ini_set('mbstring.detect_order', 'auto');
ini_set('mbstring.http_input'  , 'auto');
ini_set('mbstring.http_output' , 'pass');
ini_set('mbstring.internal_encoding', 'UTF-8');
ini_set('mbstring.script_encoding'  , 'UTF-8');
ini_set('mbstring.substitute_character', 'none');
mb_internal_encoding("UTF-8");
ini_set('date.timezone', 'Asia/Tokyo');
?>

<!DOCTYPE html>

<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Journey</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/lib/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Jacques+Francois|Jacques+Francois+Shadow&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/lib/reveal-it.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/favicon.jpg">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="assets/lib/masonry.pkgd.min.js"></script>
    <script src="assets/lib/imagesloaded.pkgd.min.js"></script>
    <script src="assets/lib/reveal-it.js"></script>
    <script src="/assets/lib/bodyScrollLock.min.js"></script>
    <script src="assets/js/common.js"></script>
</head>