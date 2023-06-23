<?php

use tt\Controllers\ArticlesEditController;
use tt\Models\Variable;

require_once 'src/Views/components/header.php';

/**
 * @var ArticlesEditController
 */
$obj = $this;
?>

<div class="row justify-content-center">

   <div class="col-12 col-sm-8 mb-5">
      <div class="contact-form">
         <div id="success"></div>
         <h1>Редактируем статьи</h1>



         <!-- TODO Экшен перенести в Variables -->
         <form method="post" action="http://cat-blog/articles/edit">
            <?php
            /* @var $value \tt\Models\Article */
            foreach ($obj->dataProvider->getArticles() as $value) :
            ?>
               <?php
               $id = $value->id;
               ?>
               <h1><?= $value->title ?></h1>
               <div class="control-group">
                  <input type="text" class="form-control p-1" name="id-<?= $id ?>" value="<?= $id ?>" disabled />
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <input type="checkbox" class="form-control p-1" name="active-<?= $id ?>" <?= $value->active ? "checked" : "" ?> value="Активность статьи" />
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <input type="text" class="form-control p-1" name="image-<?= $id ?>" value="<?= $value->image ?>" />
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <textarea class="form-control p-4" name="title-<?= $id ?>"><?= $value->title ?>"</textarea>
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <textarea class="form-control p-4" rows="2" name="description-<?= $id ?>"><?= $value->description ?></textarea>
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <input type="text" class="form-control p-4" rows="2" name="author-<?= $id ?>" value="<?= $value->author ?>" />
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <input type="text" class="form-control p-4" rows="2" name="tag-<?= $id ?>" value="<?= $value->tag ?>" />
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <input type="text" class="form-control p-4" rows="2" name="amountOfComments-<?= $id ?>" value="<?= $value->amountOfComments ?>" />
                  <p class="help-block text-danger"></p>
               </div>


            <?php endforeach; ?>



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