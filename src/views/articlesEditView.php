<?php

use tt\Controllers\ArticlesEditController;
use tt\Models\Variable;

require_once 'src/views/components/header.php';

/**
 * @var ArticlesEditController
 */
$obj = $this;
?>
<h1>Редактируем статьи</h1>
<div class="row justify-content-center">
   <div class="col-12 col-sm-8 mb-5">
      <div class="contact-form">
         <div id="success"></div>



         <!-- TODO Экшен перенести в Variables -->
         <form method="post" action="http://cat-blog/articles/edit">
            <?php foreach ($obj->dataProvider->getArticles() as $value) : ?>
               <?php
               $id = $value->id;
               ?>
               <h1><?= $value->title ?></h1>
               <div class="control-group">
                  <input type="text" class="form-control p-1" name="id-<?= $id ?>" value="<?= $id ?>" disabled />
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <input type="text" class="form-control p-1" name="image-<?= $id ?>" value="<?= $value->image ?>" />
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <input type="text" class="form-control p-1" name="title-<?= $id ?>" value="<?= $value->title ?>" />
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <input type="text" class="form-control p-4" rows="2" name="description-<?= $id ?>" value="<?= $value->description ?>" />
                  <p class="help-block text-danger"></p>
               </div>


            <?php endforeach; ?>



            <div>
               <input type="submit" value="Submit">
               <!-- <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button> -->
            </div>
         </form>


      </div>
   </div>
</div>
<?php
require_once "src/views/components/footer.php";
?>