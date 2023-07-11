<?php

use tt\Controllers\ArticleCreateController;


require_once "src/Views/components/header.php";
/**
 * @var ArticleCreateController $obj
 */
$obj = $this;
$post = $obj->request->getPost();

?>
    <div class="container-fluid pt-5">
    <div class="d-flex flex-column text-center mb-5 pt-5">
        <h1 class="text-secondary mb-3">Добавляем статью</h1>
        <h1 class="display-4 m-0"></span></h1>
    </div>

<div class="row justify-content-center">
    <div class="col-12 col-sm-8 mb-5">
        <div class="contact-form">
            <div id="success"></div>
            <?= $obj->hasError ?? "" ?>

            <!-- TODO Экшен перенести в Variables -->
            <form method="post" action="http://cat-blog/articles/create">
                <div class="control-group">
                    <input type="checkbox" class="form-control  p-4 mb-3 mt-3" name="active" <?= isset($post["active"]) ? "checked" : "" ?> placeholder="Видимость статьи" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control  p-4 mb-3 mt-3" name="image" value="<?= $post["image"] ?? "" ?>" placeholder="Ссылка на картинку" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control  p-4 mb-3 mt-3" name="title" value="<?= $post["title"] ?? "" ?>" placeholder="Заголовок статьи" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control  p-4 mb-3 mt-3" name="url_key" value="<?= $post["url_key"] ?? "" ?>" placeholder="url_key статьи" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <textarea  class="form-control p-4 mb-3 mt-3" rows="12" name="content" placeholder="Содержание статьи" ><?= $post["content"] ?? "" ?></textarea>

                </div>
                <div class="control-group">
                    <input type="text" class="form-control p-4 mb-3 mt-3"  name="author" value="<?= $post["author"] ?? "" ?>" placeholder="Автор статьи" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control p-4 mb-3 mt-3"  name="tag" value="<?= $post["tag"] ?? "" ?>" placeholder="Теги статьи" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control p-4 mb-3 mt-3"  name="published_date" value="<?= $post["published_date"] ?? "" ?>" placeholder="Дата публикации статьи" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="text-center">
                    <input class="btn btn-primary py-3 px-5 mb-3 mt-3" type="submit" value="Добавить">
                </div>
            </form>


        </div>
        </div>
    </div>
</div>

<?php
require_once "src/Views/components/footer.php";
?>