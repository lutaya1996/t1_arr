<?php

use tt\Controllers\BaseController;

/**
 * @var BaseController
 */
$obj = $this;
?>


<!--Поисковик Start-->
<div class="col-lg-4 mt-5 mt-lg-0">
   <div class="mb-5">
      <form action="">
         <div class="input-group">
            <input type="text" class="form-control form-control-lg" placeholder="Keyword">
            <div class="input-group-append">
               <span class="input-group-text bg-transparent text-primary"><i class="fa fa-search"></i></span>
            </div>
         </div>
      </form>
   </div>
   <!--Поисковик End-->

   <!--Categories start-->

   <div class="mb-5">
      <h3 class="mb-4">Категории</h3>
      <ul class="list-group">

         <?php foreach ($obj->dataProvider->getCategories() as $category => $count) : ?>

            <li class="list-group-item d-flex justify-content-between align-items-center">
               <?= $category ?>
               <span class="badge badge-primary badge-pill"><?= $count ?></span>
            </li>

         <?php endforeach; ?>

      </ul>
   </div>
   <!--categories end-->

   <!--Image Start-->
   <!-- <div class="mb-5">
            <img src="assets/img/blog-1.jpg" alt="" class="img-fluid">
         </div> -->
   <!--Image End-->

   <!--Свежие посты начало-->

   <div class="mb-5">
      <h3 class="mb-4">Свежие посты</h3>

      <?php foreach ($obj->dataProvider->getActiveArticles() as $article) :
         if ($article->id == 0) continue;
         $title = $article->title;
         $description = mb_substr($article->description, 0, 70); ?>

         <div class="d-flex align-items-center border-bottom mb-3 pb-3">
            <img class="img-fluid" src="<?= $article->image ?>" style="width: 80px; height: 80px;" alt="">
            <div class="d-flex flex-column pl-3">
               <a class="text-dark mb-2" href=""> <?= "<b>" . $title . "</b>" .  " " . $description . "..."; ?></a>
               <div class="d-flex">
                  <small class="mr-3"><i class="fa fa-user text-muted"></i> <?= $article->author ?></small>
                  <small class="mr-3"><i class="fa fa-folder text-muted"></i><?= $article->tag ?></small>
                  <small class="mr-3"><i class="fa fa-comments text-muted"></i> <?= $article->amountOfComments ?></small>
               </div>
            </div>
         </div>

      <?php endforeach; ?>

   </div>
   <!--Свежие посты конец-->



   <div class="mb-5">
      <img src="assets/img/blog-2.jpg" alt="" class="img-fluid">
   </div>

   <!--Tags Start-->

   <div class="mb-5">
      <h3 class="mb-4">Теги</h3>
      <div class="d-flex flex-wrap m-n1">

         <?php foreach ($obj->dataProvider->getTags() as $tag) : ?>

            <a href="" class="btn btn-outline-primary m-1"><?= $tag ?></a>

         <?php endforeach; ?>
      </div>
   </div>

   <!--Tags End-->

   <div class="mb-5">
      <img src="https://flexi.de/ru/flexi-ru/wp-content/uploads/2021/06/blog-hero.jpg" alt="" class="img-fluid">
   </div>
   <div>
      <h3 class="mb-4 text-dark">Питомец — это не просто домашнее животное</h3>
      Другу, который дает нам так много, хочется отдать столько же. Именно поэтому в нашем блоге вы можете найти советы экспертов
      на любую тему о домашних животных, а также задать интересующие Вас вопросы в комментариях.
   </div>
</div>
</div>
</div>