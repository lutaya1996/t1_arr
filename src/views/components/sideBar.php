<?php

use tt\Controllers\BaseController;
use tt\Models\Variable;

/**
 * @var BaseController $obj
 */
$obj = $this;

?>


<!--Поисковик Start-->
<div class="col-lg-4 mt-5 mt-lg-0" xmlns="http://www.w3.org/1999/html">
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

    <!--Свежие посты начало-->
    <?php require_once "src/Views/components/latestArticles.php"; ?>
    <!--Свежие посты конец-->


    <div class="mb-5">
        <img src="/assets/img/blog-2.jpg" alt="" class="img-fluid">
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
        Другу, который дает нам так много, хочется отдать столько же. Именно поэтому в нашем блоге вы можете найти
        советы экспертов
        на любую тему о домашних животных, а также задать интересующие Вас вопросы в комментариях.
    </div>
</div>
