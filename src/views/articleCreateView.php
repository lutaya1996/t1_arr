<?php

use tt\Controllers\ArticleCreateController;

require_once 'src/Views/components/header.php';
/**
 * @var ArticleCreateController $obj
 */
$obj = $this;
?>

<h1>Добавляем статьи</h1>

<div class="row justify-content-center">
    <div class="col-12 col-sm-8 mb-5">
        <div class="contact-form">
            <div id="success"></div>
            <?= $obj->hasError ?? "" ?>

            <!-- TODO Экшен перенести в Variables -->
            <form method="post" action="http://cat-blog/articles/create">
                <div class="control-group">
                    <input type="checkbox" class="form-control p-1" name="active" <?= isset($_POST["active"]) ? "checked" : "" ?> placeholder="Активность статьи" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control p-1" name="image" value="<?= $_POST["image"] ?? "" ?>" placeholder="Загрузите картинку" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control p-1" name="title" value="<?= $_POST["title"] ?? "" ?>" placeholder="Заголовок" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control p-4" rows="2" name="description" value="<?= $_POST["description"] ?? "" ?>" placeholder="Текст статьи" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control p-4" rows="2" name="author" value="<?= $_POST["author"] ?? "" ?>" placeholder="Автор статьи" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control p-4" rows="2" name="tag" value="<?= $_POST["tag"] ?? "" ?>" placeholder="Тег" />
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <input type="text" class="form-control p-4" rows="2" name="amountOfComments" value="<?= $_POST["amountOfComments"] ?? "" ?>" placeholder="количество комментариев" />
                    <p class="help-block text-danger"></p>
                </div>
                <div>
                    <input type="submit" value="Добавить">
                </div>
            </form>


        </div>
    </div>
</div>

<?php
require_once "src/Views/components/footer.php";
?>