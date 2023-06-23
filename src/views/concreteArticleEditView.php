<?php

use tt\Controllers\ArticleEditConcreteController;
use tt\Models\Variable;
use tt\Helpers\Printer;

require_once 'src/Views/components/header.php';

/**
 * @var ArticleEditConcreteController
 */
$obj = $this;
$article = $obj->article;
$id = $obj->article->id;

?>
<h1>Редактируем статью</h1>
<div class="row justify-content-center">
   <div class="col-12 col-sm-8 mb-5">
      <div class="contact-form">
         <div id="success"></div>

         <?= $obj->hasError ?? "" ?>

         <!-- TODO Экшен перенести в Variables -->
         <form method="post" action="<?= $obj->dataProvider->getVariables(Variable::URL_ARTICLE_EDIT) . $id ?>">
            <h1><?= $article->title ?></h1>
            <div class="control-group">
               <input type="text" class="form-control p-1" name="id" value="<?= $id ?>" disabled />
               <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
               <input type="checkbox" class="form-control p-1" name="active" <?= $article->active ? "checked" : "" ?> value="Активность статьи" />
               <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
               <input type="text" class="form-control p-1" name="image" value="<?= $article->image ?>" />
               <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
               <input type="text" class="form-control p-1" name="title" value="<?= $article->title ?>" />
               <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
               <input type="text" class="form-control p-4" rows="2" name="description" value="<?= $article->description ?>" />
               <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
               <input type="text" class="form-control p-4" rows="2" name="author" value="<?= $article->author ?>" />
               <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
               <input type="text" class="form-control p-4" rows="2" name="tag" value="<?= $article->tag ?>" />
               <p class="help-block text-danger"></p>
            </div>
            <div class="control-group">
               <input type="text" class="form-control p-4" rows="2" name="amountOfComments" value="<?= $article->amountOfComments ?>" />
               <p class="help-block text-danger"></p>
            </div>


            <div>
               <input type="submit" value="Редактировать">
               <!-- <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button> -->
            </div>
         </form>


      </div>
   </div>
</div>
<?php
require_once "src/Views/components/footer.php";
?>