<?php

use tt\Controllers\ArticleEditConcreteController;
use tt\Models\Variable;
use tt\Helpers\Printer;

require_once 'src/views/components/header.php';

/**
 * @var ArticleEditConcreteController
 */
$obj = $this;
Printer::beautifulP($param);

?>
<h1>Редактируем статью</h1>
<div class="row justify-content-center">
   <div class="col-12 col-sm-8 mb-5">
      <div class="contact-form">
         <div id="success"></div>



         <!-- TODO Экшен перенести в Variables -->
         <form method="post" action="http://cat-blog/\/articles\/edit\/(\d+)/">
            
               <?php
               $id = $param["id"];
               ?>
               <h1><?= $obj->dataProvider->getConcreteArticle($id)->title?></h1>
               <div class="control-group">
                  <input type="text" class="form-control p-1" name="id-<?= $obj->dataProvider->getConcreteArticle($id)->id ?>" value="<?= $id ?>" disabled />
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <input type="checkbox" class="form-control p-1" name="active-<?= $id ?>" <?= $obj->dataProvider->getConcreteArticle($id)->active ? "checked" : "" ?> value="Активность статьи" />
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <input type="text" class="form-control p-1" name="image-<?= $id ?>" value="<?= $obj->dataProvider->getConcreteArticle($id)->image ?>" />
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <input type="text" class="form-control p-1" name="title-<?= $id ?>" value="<?= $obj->dataProvider->getConcreteArticle($id)->title ?>" />
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <input type="text" class="form-control p-4" rows="2" name="description-<?= $id ?>" value="<?= $obj->dataProvider->getConcreteArticle($id)->description ?>" />
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
require_once "src/views/components/footer.php";
?>