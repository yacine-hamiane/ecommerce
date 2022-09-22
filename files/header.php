<?php
session_start();
echo @$_SESSION['client'];
//echo "<br>";
echo @$_SESSION['tel'];
include('files/db.php') ;
include('functions/functions.php');


if (isset($_GET['lang']) AND $_GET['lang'] == 'fr') {
  # code...
  include 'files/language/fr.php';;
}elseif (isset($_GET['lang']) AND $_GET['lang'] == 'ar') {
  # code...
  include 'files/language/ar.php';;
}else{
  if (!isset($_GET['lang'])) {
  # code...
  if (locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']) == 'fr_FR' OR locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']) == 'fr') {
  # code...
  //header('location:index.php?lang=fr');
  include 'files/language/fr.php';
}elseif (locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']) == 'ar_AR' OR locale_accept_from_http($_SERVER['HTTP_ACCEPT_LANGUAGE']) == 'ar') {
  # code...
  include 'files/language/ar.php';
}else{
  include 'files/language/ar.php';
}
}//end !isset($_GET['lang'])
}


 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>First Shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo_title.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>