<?php

use tt\ControllersNew\ConcreteArticleController;
use tt\Helpers\Printer;

error_reporting(E_ALL);

/**@var ConcreteArticleController $obj*/
$obj = $this;

Printer::beautifulP($obj->article);
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>PetLover - премиальный сервис для питомцев</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <meta content="Free HTML Templates" name="keywords">
   <meta content="Free HTML Templates" name="description">

    <?php
require_once "src/Views/components/header.php";
?>