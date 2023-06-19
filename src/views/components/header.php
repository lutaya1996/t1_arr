<?php

use tt\Controllers\BaseController;
use tt\Models\Variable;

/**
 * @var BaseController
 */
$obj = $this;
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>PetLover - header</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <meta content="Free HTML Templates" name="keywords">
   <meta content="Free HTML Templates" name="description">

   <!-- Favicon -->
   <link href="<?= $obj->dataProvider->getVariables(Variable::SERVER_DOMAIN) ?>assets/img/favicon.ico" rel="icon">

   <!-- Google Web Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

   <!-- Font Awesome -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

   <!-- Flaticon Font -->
   <link href="<?= $obj->dataProvider->getVariables(Variable::SERVER_DOMAIN) ?>assets/lib/flaticon/font/flaticon.css" rel="stylesheet">

   <!-- Libraries Stylesheet -->
   <link href="<?= $obj->dataProvider->getVariables(Variable::SERVER_DOMAIN) ?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
   <link href="<?= $obj->dataProvider->getVariables(Variable::SERVER_DOMAIN) ?>assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

   <!-- Customized Bootstrap Stylesheet -->
   <link href="<?= $obj->dataProvider->getVariables(Variable::SERVER_DOMAIN) ?>assets/css/style.css" rel="stylesheet">
</head>

<body>
   <!-- Topbar Start -->
   <div class="container-fluid">
      <div class="row py-3 px-lg-5">
         <div class="col-lg-4">
            <a href="<?= $obj->dataProvider->getVariables(Variable::SERVER_DOMAIN) ?>" class="navbar-brand d-none d-lg-block">
               <h1 class="m-0 display-5 text-capitalize"><span class="text-primary">Pet</span>Lover</h1>
            </a>
         </div>
         <div class="col-lg-8 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
               <div class="d-inline-flex flex-column text-center pr-3 border-right">
                  <h6>Часы работы</h6>
                  <p class="m-0">8.00AM - 9.00PM</p>
               </div>
               <div class="d-inline-flex flex-column text-center px-3 border-right">
                  <h6>Напишите нам</h6>
                  <p class="m-0">info@example.com</p>
               </div>
               <div class="d-inline-flex flex-column text-center pl-3">
                  <h6>Позвоните нам</h6>
                  <p class="m-0">+012 345 6789</p>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Topbar End -->


   <!-- Navbar Start -->
   <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-lg-5">
         <a href="" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-5 text-capitalize font-italic text-white"><span class="text-primary">Safety</span>First</h1>
         </a>
         <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
         </button>
         <?php require "src/Views/components/menus/mainMenu.php"; ?>
      </nav>
   </div>
   <!-- Navbar End -->