<?php

use tt\Controllers\BlogController;
use tt\Models\Variable;

require_once 'src/Views/components/header.php';
/**
 * @var BlogController
 */
$obj = $this;
?>


<!-- Detail Start -->
<div class="container py-5">
   <div class="row pt-5">
      <div class="col-lg-8">
         <div class="d-flex flex-column text-left mb-4">
            <h4 class="text-secondary mb-3"><?= $obj->dataProvider->getVariables(Variable::CATS_HEAD1) ?></h4>
            <h1 class="mb-3"><?= $obj->dataProvider->getConcreteArticle(0)->title ?></h1>
            <div class="d-index-flex mb-2">
               <span class="mr-3"><i class="fa fa-user text-muted"></i> Admin</span>
               <span class="mr-3"><i class="fa fa-folder text-muted"></i> Web Design</span>
               <span class="mr-3"><i class="fa fa-comments text-muted"></i> 15</span>
            </div>
         </div>

         <div class="mb-5">
            <img class="img-fluid w-100 mb-4" src="<?= $obj->dataProvider->getConcreteArticle(0)->image ?>" alt="Image">
            <p><?= $obj->dataProvider->getConcreteArticle(0)->description ?></p>
         </div>

         <!-- Detail End

            <!-- Articles Start -->
         <!-- <?php $count = 1;
               // foreach ($obj->dataProvider->getActiveArticles() as $article) : 
               ?>

            //    <h2 class="mb-4"><?= $article->title ?></h2>
            //    <img class="img-fluid w-50 float-left mr-4 mb-3" src="" alt=" Image">

            // <?php echo $article->description;
               //    $count++;
               //    if ($count == 3) break;
               // endforeach; 
               ?>

         </div> -->
         <!-- Articles End -->

         <!-- Comments Start -->

         <div class="media bg-light mb-5 p-4 p-md-5">
            <img src="assets/img/user.jpg" alt="Image" class="img-fluid mr-4 mt-1" style="width: 80px;">
            <div class="media-body">
               <h5 class="mb-3">John Doe</h5>
               <p class="m-0">Conset elitr erat vero labore dolor ipsum et diam, tempor eos dolor conset lorem ipsum, ipsum ipsum sit no ut est. Guber ea ipsum erat conset magna kasd amet est magna elitr ea sit justo sed.</p>
            </div>
         </div>

         <div class="mb-5">
            <h3 class="mb-4">3 Comments</h3>
            <div class="media mb-4">
               <img src="assets/img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
               <div class="media-body">
                  <h6>John Doe <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
                  <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum. Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor consetetur at sit.</p>
                  <button class="btn btn-sm btn-light">Reply</button>
               </div>
            </div>
            <div class="media mb-4">
               <img src="assets/img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
               <div class="media-body">
                  <h6>John Doe <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
                  <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum. Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor consetetur at sit.</p>
                  <button class="btn btn-sm btn-light">Reply</button>
                  <div class="media mt-4">
                     <img src="assets/img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                     <div class="media-body">
                        <h6>John Doe <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
                        <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum. Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor consetetur at sit.</p>
                        <button class="btn btn-sm btn-light">Reply</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div style="padding: 30px; background: #f6f6f6;">
            <h3 class="mb-4">Leave a comment</h3>
            <form>
               <div class="form-group">
                  <label for="name">Name *</label>
                  <input type="text" class="form-control" id="name">
               </div>
               <div class="form-group">
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" id="email">
               </div>
               <div class="form-group">
                  <label for="website">Website</label>
                  <input type="url" class="form-control" id="website">
               </div>

               <div class="form-group">
                  <label for="message">Message *</label>
                  <textarea id="message" cols="30" rows="5" class="form-control"></textarea>
               </div>
               <div class="form-group mb-0">
                  <input type="submit" value="Leave Comment" class="btn btn-primary px-3">
               </div>
            </form>
         </div>
      </div>

      <!-- Comments End -->

      <!-- Меню справа Start -->

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

         <!--categories start-->

         <div class="mb-5">
            <h3 class="mb-4">Категории</h3>
            <ul class="list-group">
               <li class="list-group-item d-flex justify-content-between align-items-center">
                  Безопасное содержание
                  <span class="badge badge-primary badge-pill">150</span>
               </li>
               <li class="list-group-item d-flex justify-content-between align-items-center">
                  Галерея
                  <span class="badge badge-primary badge-pill">131</span>
               </li>
               <li class="list-group-item d-flex justify-content-between align-items-center">
                  Грумминг
                  <span class="badge badge-primary badge-pill">78</span>
               </li>
               <li class="list-group-item d-flex justify-content-between align-items-center">
                  О кошках
                  <span class="badge badge-primary badge-pill">56</span>
               </li>
               <li class="list-group-item d-flex justify-content-between align-items-center">
                  О собаках
                  <span class="badge badge-primary badge-pill">98</span>
               </li>
            </ul>
         </div>
         <!--categories end-->

         <!-- <div class="mb-5">
            <img src="assets/img/blog-1.jpg" alt="" class="img-fluid">
         </div> -->

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
                        <small class="mr-3"><i class="fa fa-user text-muted"></i> Admin</small>
                        <small class="mr-3"><i class="fa fa-folder text-muted"></i> Web Design</small>
                        <small class="mr-3"><i class="fa fa-comments text-muted"></i> 15</small>
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
            <h3 class="mb-4">Tag Cloud</h3>
            <div class="d-flex flex-wrap m-n1">
               <a href="" class="btn btn-outline-primary m-1">Design</a>
               <a href="" class="btn btn-outline-primary m-1">Development</a>
               <a href="" class="btn btn-outline-primary m-1">Marketing</a>
               <a href="" class="btn btn-outline-primary m-1">SEO</a>
               <a href="" class="btn btn-outline-primary m-1">Writing</a>
               <a href="" class="btn btn-outline-primary m-1">Consulting</a>
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

<!-- Меню справа End-->




<?php
require_once "src/Views/components/footer.php";
?>