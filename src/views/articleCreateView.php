<?php

use tt\Controllers\ArticleCreateController;
use tt\Helpers\Printer;

require_once 'src/Views/components/header.php';
/**
 * @var ArticleCreateController $obj
 */
$obj = $this;
echo session_id();

?>
    <div class="container-fluid pt-5">
    <div class="d-flex flex-column text-center mb-5 pt-5">
        <h4 class="text-secondary mb-3">Добавляем статью</h4>
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
                    <input type="checkbox" class="form-control  p-4 mb-3" name="active" <?= isset($_POST["active"]) ? "checked" : "" ?> placeholder="Активность статьи" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control  p-4 mb-3" name="image" value="<?= $_POST["image"] ?? "" ?>" placeholder="Загрузите картинку" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control  p-4 mb-3" name="title" value="<?= $_POST["title"] ?? "" ?>" placeholder="Заголовок" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <textarea  class="form-control p-4 mb-3" rows="12" name="description" value="<?= $_POST["description"] ?? "" ?>" placeholder="Текст статьи" ></textarea>

                </div>
                <div class="control-group">
                    <input type="text" class="form-control p-4 mb-3" rows="2" name="author" value="<?= $_POST["author"] ?? "" ?>" placeholder="Автор статьи" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control p-4 mb-3" rows="2" name="tag" value="<?= $_POST["tag"] ?? "" ?>" placeholder="Тег" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control p-4 mb-3" rows="2" name="amountOfComments" value="<?= $_POST["amountOfComments"] ?? "" ?>" placeholder="количество комментариев" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="text-center">
                    <input class="btn btn-primary py-3 px-5 " type="submit" value="Добавить">
                </div>
            </form>


        </div>
        </div>
    </div>
</div>

<?php
require_once "src/Views/components/footer.php";
?>