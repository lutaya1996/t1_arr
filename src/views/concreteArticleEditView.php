<?php

use tt\Controllers\ConcreteArticleEditController;


require_once "src/Views/components/header.php";

/**
 * @var ConcreteArticleEditController $obj
 */
$obj = $this;
$article = $obj->article;
$id = $obj->article->id;

$variableProvider = $obj->dataProvider->variablesProvider;

?>
    <div class="container-fluid pt-5">
    <div class="d-flex flex-column text-center mb-5 pt-5">
        <h1 class="text-secondary mb-3">Редактируем статью</h1>
    </div>
<div class="row justify-content-center">
   <div class="col-12 col-sm-8 mb-5">
      <div class="contact-form">
         <div id="success"></div>

          <?php if(isset($obj->hasError)):?>
          <div class="alert alert-danger" role="alert">
              <?= $obj->hasError ?>
          </div>
           <?php endif; ?>

         <!-- TODO Экшен перенести в Variables -->
         <form method="post" action="<?=$variableProvider->getVariable("URL_ARTICLE_EDIT") . $article->url_key ?>">
            <h4><?= $article->title ?></h4>
             <p class="help-block text-danger"></p>
            <div class="control-group">
               <input type="text" class="form-control p-1 text-center mb-3 mt-3" id="id" name="id" value="<?= $id ?>" disabled />
               <label for="id">ID статьи</label>
            </div>
             <div class="control-group">
                 <input type="checkbox" class="form-control p-1 mb-3 mt-3" id="active" name="active" <?= $article->active ? "checked" : "" ?> value="1" />
                 <label for="active">Видимость статьи</label>
             </div>
            <div class="control-group">
               <input type="text" class="form-control p-4 mb-3 mt-3" id="image" name="image" value="<?= $article->image ?>" />
                <label for="image">Ссылка на картинку</label>
            </div>
            <div class="control-group">
                <textarea  class="form-control p-4 mb-3 mt-3" rows="2" id="title" name="title"><?= $article->title ?></textarea>
                <label for="title">Заголовок статьи</label>
            </div>
             <div class="control-group">
                 <input type="text" class="form-control p-4 mb-3 mt-3" rows="2" id="url_key" name="url_key" value="<?= $article->url_key ?>" />
                 <label for="url_key">url_key статьи</label>
             </div>
            <div class="control-group">
               <textarea  class="form-control p-4 mb-3 mt-3" rows="20" id="content" name="content" ><?= $article->content ?></textarea>
                <label for="content">Содержание статьи</label>
            </div>
            <div class="control-group">
               <input type="text" class="form-control p-4 mb-3 mt-3" rows="2" id="tag" name="tag" value="<?= $article->tag ?>" />
                <label for="tag">Теги статьи</label>
            </div>
            <div class="control-group">
               <input type="text" class="form-control p-4 mb-3 mt-3" rows="2" id="author" name="author" value="<?= $article->author ?>" />
                <label for="author">Автор статьи</label>
            </div>
             <div class="control-group">
                 <input type="text" class="form-control p-4 mb-3 mt-3" rows="2" id="published_date" name="published_date" value="<?= $article->published_date ?>" />
                 <label for="published_date">Дата публикации статьи</label>
             </div>


            <div class="text-center">
               <input class="btn btn-primary py-3 px-5 mb-3 mt-3" type="submit" value="Редактировать">
            </div>
         </form>


      </div>
   </div>
</div>
<?php
require_once "src/Views/components/footer.php";
?>