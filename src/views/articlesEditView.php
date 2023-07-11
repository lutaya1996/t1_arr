<?php

use tt\Controllers\ArticlesEditController;
use tt\Models\Article;

/**
 * @var ArticlesEditController $obj
 */
$obj = $this;
$articles = $obj->articles;

require_once "src/Views/components/header.php";
?>

    <div class="container-fluid pt-5">
    <div class="d-flex flex-column text-center mb-5 pt-5">
        <h1 class="text-secondary mb-3">Редактируем статьи</h1>
        <h1 class="display-4 m-0"></span></h1>
    </div>


<div class="row justify-content-center">

   <div class="col-12 col-sm-8 mb-5">
      <div class="contact-form">
         <div id="success"></div>


         <!-- TODO Экшен перенести в Variables -->
         <form method="post"  action="http://cat-blog/articles/edit">
            <?php
            /* @var $value Article */
            foreach ($articles as $article) :
            ?>
               <?php
               $id = $article["id"];
               ?>
               <h4><?= $article["title"] ?></h4>
               <div class="control-group">
                   <input type="text" class="form-control p-1 text-center mb-3 mt-3" id="id" name="<?=$id?>[id-<?=$id?>]" value="<?= $article["id"] ?>" disabled />
                   <label for="id">ID статьи</label>
               </div>
             <div class="control-group">
                 <input type="checkbox" class="form-control p-1 mb-3 mt-3" id="active" name="<?=$id?>[active-<?=$id?>]" value="<?= $article["active"] ? "checked" : "" ?>"  />
                 <label for="active">Видимость статьи</label>
             </div>
             <div class="control-group">
                 <input type="text" class="form-control p-4 mb-3 mt-3" id="image" name="<?=$id?>[image-<?=$id?>]" value="<?= $article["image"] ?>" />
                 <label for="image">Ссылка на картинку</label>
             </div>
             <div class="control-group">
                 <textarea  class="form-control p-4 mb-3 mt-3" rows="2" id="title" name="<?=$id?>[title-<?=$id?>]"><?= $article["title"] ?></textarea>
                 <label for="title">Заголовок статьи</label>
             </div>
             <div class="control-group">
                 <input type="text" class="form-control p-4 mb-3 mt-3" id="url_key" name="<?=$id?>[url_key-<?=$id?>]" value="<?= $article["url_key"] ?>" />
                 <label for="url_key">url_key статьи</label>
             </div>
             <div class="control-group">
                 <textarea  class="form-control p-4 mb-3 mt-3" rows="20" id="content" name="<?=$id?>[content-<?=$id?>]" ><?= $article["content"] ?></textarea>
                 <label for="content">Содержание статьи</label>
             </div>
             <div class="control-group">
                 <input type="text" class="form-control p-4 mb-3 mt-3"  id="tag" name="<?=$id?>[tag-<?=$id?>]" value="<?= $article["tag"] ?>" />
                 <label for="tag">Теги статьи</label>
             </div>
             <div class="control-group">
                 <input type="text" class="form-control p-4 mb-3 mt-3" id="author" name="<?=$id?>[author-<?=$id?>]" value="<?= $article["author"] ?>" />
                 <label for="author">Автор статьи</label>
             </div>
             <div class="control-group">
                 <input type="text" class="form-control p-4 mb-3 mt-3"  id="published_date" name="<?=$id?>[published_date-<?=$id?>]" value="<?= $article["published_date"] ?>" />
                 <label for="published_date">Дата публикации статьи</label>
             </div>

            <?php endforeach; ?>



            <div class="text-center">
               <input class="btn btn-primary py-3 px-5 " type="submit" value="Редактировать">
               <!-- <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button> -->
            </div>
         </form>


      </div>
      </div>
   </div>
</div>
<?php
require_once "src/Views/components/footer.php";
?>