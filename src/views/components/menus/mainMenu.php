<?php

use tt\Controllers\BaseController;

/**
 * @var BaseController
 */
$obj = $this;
?>

<div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
   <div class="navbar-nav mr-auto py-0">
      <?php foreach ($obj->dataProvider->getMainMenu() as $key => $value) : ?>
         <?php if ($obj->uri == $value) : ?>
            <a href=<?= $value ?> class="nav-item nav-link active"><?= $key ?></a>
         <?php else : ?>
            <a href=<?= $value ?> class="nav-item nav-link"><?= $key ?></a>
         <?php endif; ?>
      <?php endforeach; ?>
   </div>
    <div class="navbar-nav mr-auto py-0">
    <a href="/login" class="nav-item nav-link ">Авторизация</a>
    <a href="/register" class="nav-item nav-link ">Регистрация</a>
    </div>
</div>