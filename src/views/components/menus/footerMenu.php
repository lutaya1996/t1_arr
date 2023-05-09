 <?php
   $menu = [
      'Главная' => '/',
      'Котики' => '/cat',
      'Мои статьи' => '/articles',
      'Контакты' => '/contacts'
   ];
   ?>

 <div class="col-md-4 mb-5">
    <h5 class="text-primary mb-4">Меню</h5>
    <div class="d-flex flex-column justify-content-start">
       <?php foreach ($menu as $key => $value) : ?>
          <a class="text-white mb-2" href="<?= $value ?>"><i class="fa fa-angle-right mr-2"></i><?= $key ?></a>
       <?php endforeach; ?>
    </div>
 </div>