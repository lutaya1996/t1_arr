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



         <form name="sentMessage" id="contactForm" novalidate="novalidate">
            <?php foreach ($obj->dataProvider->getArticles() as $value) : ?>
               <?php
               $id = $value->id;
               ?>
               <h1><?= $value->title ?></h1>
               <div class="control-group">
                  <input class="form-control p-1" id="id-<?= $id ?>" value="<?= $id ?>" disabled />
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <input class="form-control p-1" id="image-<?= $id ?>" value="<?= $value->image ?>" required="required" data-validation-required-message="Ахуел без картнки?????" />
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <input class="form-control p-1" id="title-<?= $id ?>" value="<?= $value->title ?>" required="required" data-validation-required-message="Сука где тайтл" />
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <textarea class="form-control p-4" rows="2" id="description-<?= $id ?>" required="required" data-validation-required-message="F rsfbggnfn"><?= $value->description ?></textarea>
                  <p class="help-block text-danger"></p>
               </div>


            <?php endforeach; ?>



            <div>
               <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton">Send Message</button>
            </div>
         </form>


      </div>
   </div>
</div>
<?php
require_once "src/views/components/footer.php";
?>