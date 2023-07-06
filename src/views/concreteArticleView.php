<?php

use tt\ControllersNew\ConcreteArticleController;

require_once "src/Views/components/header.php";
/**
 * @var ConcreteArticleController $obj
 */
$obj = $this;

$id = $obj->article->id;


?>


    <!-- Article Start -->
    <div class="container py-5">
    <div class="d-flex align-items-center mb-3 ">
        <!--TODO-->
        <a class=" font-weight-bold mb-2" href="http://cat-blog/articles"> Все статьи</a>
    </div>
    <div class="row pt-5">
    <div class="col-lg-8">
        <div class="d-flex flex-column text-left mb-4">
            <h4 class="text-secondary mb-3"><?= $id ?></h4>
            <h1 class="mb-3"><?= $obj->article->title ?></h1>
            <div class="d-index-flex mb-2">
                <span class="mr-3"><i class="fa fa-user text-muted"></i> <?= $obj->article->author ?></span>
                <span class="mr-3"><i class="fa fa-folder text-muted"></i> <?= $obj->article->tag ?></span>
                <span class="mr-3"><i class="fa fa-comments text-muted"></i> <?= $obj->article->amountOfComments ?></span>
            </div>
        </div>

        <div class="mb-5">
            <img class="img-fluid w-100 mb-4" src="<?= $obj->article->image ?>" alt="Image">
            <p><?= $obj->article->content ?></p>
        </div>

        <!--  Article End-->

        <!--Author of article start-->
        <div class="media bg-light mb-5 p-4 p-md-5">
            <img src="<?= ($obj->dataProvider->getAuthors()[0])->image; ?>" alt="Image" class="img-fluid mr-4 mt-1" style="width: 80px;">
            <div class="media-body">
                <h5 class="mb-3"><?= ($obj->dataProvider->getAuthors()[0])->name; ?></h5>
                <p class="m-0"><?= ($obj->dataProvider->getAuthors()[0])->profession; ?></p>
            </div>
        </div>
        <!--Author of article End-->

        <!-- Comments Start -->

        <!--Comment Form Start-->
        <?php require_once "src/Views/components/forms/commentForm.php" ?>
    </div>
    <!--Comment Form End-->

    <!-- Comments End -->


    <!-- Меню справа Start -->

    <?php require_once "src/Views/components/sideBar.php" ?>

    <!-- Меню справа End-->


<?php
require_once "src/Views/components/footer.php";
?>