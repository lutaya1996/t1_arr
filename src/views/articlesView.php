<?php

use tt\ControllersNew\ArticlesController;


/**
 * @var ArticlesController $obj
 */
$obj = $this;

$variableProvider = $obj->dataProvider->variablesProvider;
$articles = $obj->articles;

require_once "src/Views/components/header.php";

?>


    <!-- Blog Start -->
    <div class="container pt-5">
    <a class="font-weight-bold" href="<?= $variableProvider->getVariable("URL_ARTICLES_EDIT") ?>">Редактировать
        статьи</a><br>
    <a class="font-weight-bold" href="<?= $variableProvider->getVariable("URL_ARTICLES_CREATE") ?>">Добавить
        статью</a>
    <div class="d-flex flex-column text-center mb-5 pt-5">
        <h1 class="text-secondary mb-3"><?= $variableProvider->getVariable("ARTICLE_HEAD1") ?></h1>
        <h2 class="m-0"><?= $variableProvider->getVariable("ARTICLE_HEAD2") ?></h2>
    </div>
    <div class="row pb-3">
    <div>
        <div>
            <?php
            foreach ($articles as $article) : ?>
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 mb-2">
                        <img class="card-img-top" src="<?= $article->image ?>" alt="">
                        <div class="card-body bg-light p-4">
                            <h4 class="card-title text-truncate"><?= $article->title ?></h4>
                            <div class="d-flex mb-3">
                                <small class="mr-2"><i class="fa fa-user text-muted"></i> <?= $article->author ?>
                                </small>
                                <small class="mr-2"><i class="fa fa-folder text-muted"></i> <?= $article->tag ?></small>
                                <small class="mr-2"><i
                                            class="fa fa-comments text-muted"></i> <?= $article->amountOfComments ?>
                                </small>
                            </div>
                            <p><?= mb_substr($article->content, 0, 150) ?></p>
                            <div>
                                <a class="font-weight-bold"
                                   href="
                            <?= $variableProvider->getVariable("URL_ARTICLE_EDIT") . $article->url_key ?>">Редактировать
                                    статью</a>
                            </div>
                            <div>
                                <a class="font-weight-bold"
                                   href="
                            <?= $variableProvider->getVariable("URL_ARTICLE_VIEW") . $article->url_key ?>">Читать
                                    статью</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>


            <!-- <div class="col-lg-12">
               <nav aria-label="Page navigation">
                  <ul class="pagination justify-content-center mb-4">
                     <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous">
                           <span aria-hidden="true">&laquo; Previous</span>
                        </a>
                     </li>
                     <li class="page-item active"><a class="page-link" href="#">1</a></li>
                     <li class="page-item"><a class="page-link" href="#">2</a></li>
                     <li class="page-item"><a class="page-link" href="#">3</a></li>
                     <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                           <span aria-hidden="true">Next &raquo;</span>
                        </a>
                     </li>
                  </ul>
               </nav>
            </div> -->
        </div>
    </div>
    <!-- Blog End -->

<?php
require_once "src/Views/components/footer.php";
?>