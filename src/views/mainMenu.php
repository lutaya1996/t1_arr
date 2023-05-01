<?php
$menu = [
   'Главная' => '/',
   'Котики' => '/cat',
   'Мои статьи' => '/articles',
   'Контакты' => '/contacts'
];

$counter = 0;
?>

<div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
   <div class="navbar-nav mr-auto py-0">
      <?php foreach ($menu as $key => $value) : ?>
         <?php if ($counter == 0) : ?>
            <a href=<?= $value ?> class="nav-item nav-link active"><?= $key ?></a>
         <?php else : ?>
            <a href=<?= $value ?> class="nav-item nav-link"><?= $key ?></a>
         <?php endif; ?>
         <?php $counter++; ?>
      <?php endforeach; ?>
   </div>
</div>