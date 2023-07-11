<?php

use tt\Controllers\BlogController;


require_once "src/Views/components/header.php";
/**
 * @var BlogController $obj
 */
$obj = $this;
$variableProvider = $obj->dataProvider->variablesProvider;
$articleProvider = $obj->dataProvider->articleProvider;
$authors = $obj->dataProvider->authorsProvider->getAuthors();
?>


<!-- Main Article Start -->
<div class="container py-5">
   <div class="row pt-5">
      <div class="col-lg-8">
         <div class="d-flex flex-column text-left mb-4">
            <h4 class="text-secondary mb-3"><?= $variableProvider->getVariable("BLOG_HEAD") ?></h4>
            <h1 class="mb-3"><?= $articleProvider->getArticleByUrlKey("primary")["title"] ?></h1>
            <div class="d-index-flex mb-2">
               <span class="mr-3"><i class="fa fa-user text-muted"></i> <?= $articleProvider->getArticleByUrlKey("primary")["author"] ?></span>
               <span class="mr-3"><i class="fa fa-folder text-muted"></i> <?= $articleProvider->getArticleByUrlKey("primary")["tag"] ?></span>
               <span class="mr-3"><i class="fa fa-comments text-muted"></i> <?=3?></span>
            </div>
         </div>

         <div class="mb-5">
            <img class="img-fluid w-100 mb-4" src="<?= $articleProvider->getArticleByUrlKey("primary")["image"] ?>" alt="Image">
            <p><?= $articleProvider->getArticleByUrlKey("primary")["content"] ?></p>
         </div>

         <!-- Main Article End-->

         <!-- Comments Start -->

         <!--Author of article start-->
         <div class="media bg-light mb-5 p-4 p-md-5">
            <img src="<?= ($authors[0])->image; ?>" alt="Image" class="img-fluid mr-4 mt-1" style="width: 80px;">
            <div class="media-body">
               <h5 class="mb-3"><?= ($authors[0])->name; ?></h5>
               <p class="m-0"><?= ($authors[0])->profession; ?></p>
            </div>
         </div>
         <!--Author of article End-->

         <div class="mb-5">
            <h3 class="mb-4">3 Comments</h3>
            <div class="media mb-4">
               <img src="/assets/img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
               <div class="media-body">
                  <h6>John Doe <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
                  <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum. Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor consetetur at sit.</p>
                  <button class="btn btn-sm btn-light">Reply</button>
               </div>
            </div>
            <div class="media mb-4">
               <img src="/assets/img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
               <div class="media-body">
                  <h6>John Doe <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
                  <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum. Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor consetetur at sit.</p>
                  <button class="btn btn-sm btn-light">Reply</button>
                  <div class="media mt-4">
                     <img src="/assets/img/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                     <div class="media-body">
                        <h6>John Doe <small><i>01 Jan 2045 at 12:00pm</i></small></h6>
                        <p>Diam amet duo labore stet elitr invidunt ea clita ipsum voluptua, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum. Gubergren clita aliquyam consetetur sadipscing, at tempor amet ipsum diam tempor consetetur at sit.</p>
                        <button class="btn btn-sm btn-light">Reply</button>
                     </div>
                  </div>
               </div>
            </div>
         </div>

       <!--Comment Form Start-->
         <?php require_once "src/Views/components/forms/commentForm.php" ?>
      </div>
      <!--Comment Form End-->

      <!-- Comments End -->


      <!-- Меню справа Start -->

      <?php require_once "src/Views/components/sideBar.php" ?>
   </div>
</div>

      <!-- Меню справа End-->


      <?php
      require_once "src/Views/components/footer.php";
      ?>