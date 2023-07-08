<?php

use tt\Controllers\BaseController;


/**
 * @var BaseController $obj
 */
$obj = $this;

$variableProvider = $obj->dataProvider->variablesProvider;
?>


<!--Свежие посты начало-->

<div class="mb-5">
    <h3 class="mb-4">Свежие посты</h3>

    <?php foreach ($obj->dataProvider->getActiveArticles() as $article) :
        if ($article->id == 0) continue;
        $title = $article->title;
        $description = mb_substr($article->content, 0, 70); ?>

        <div class="d-flex align-items-center border-bottom mb-3 pb-3">
            <img class="img-fluid" src="<?= $article->image ?>" style="width: 80px; height: 80px;" alt="">
            <div class="d-flex flex-column pl-3">
                <a class="text-dark mb-2" href="<?= $variableProvider->getVariable("URL_ARTICLE_VIEW") . $article->id; ?>"> <?= "<b>" . $title . "</b>" .  " " . $description . "..."; ?></a>
                <div class="d-flex">
                    <small class="mr-3"><i class="fa fa-user text-muted"></i> <?= $article->author ?></small>
                    <small class="mr-3"><i class="fa fa-folder text-muted"></i><?= $article->tag ?></small>
                    <small class="mr-3"><i class="fa fa-comments text-muted"></i> <?= $article->amountOfComments ?></small>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
    <div class="d-flex align-items-center border-bottom mb-3 pb-3">
        <a class=" font-weight-bold mb-2" href="<?=  $variableProvider->getVariable("URL_ARTICLES_VIEW"); ?>"> Читать все статьи</a>
    </div>

</div>
<!--Свежие посты конец-->
