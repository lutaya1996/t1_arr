<?php

use tt\Controllers\RegisterController;
use tt\Models\Variable;

require_once "src/Views/components/header.php";
/**
 * @var RegisterController $obj
 */
$obj = $this;
?>

<!-- Register Form Start -->
<div class="container-fluid pt-5">
    <div class="d-flex flex-column text-center mb-5 pt-5">
        <h4 class="text-secondary mb-3">Регистрация</h4>
        <h1 class="display-4 m-0"></span></h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 mb-5">
            <div class="contact-form">
                <div id="success"></div>

                <?= $obj->hasError1  ?? $obj->hasError2 ?? ""; ?>


        <!--TODO  ACTION вынеси в вариаблс-->
                <form method="post" action="/register">
                    <div class="control-group">
                        <input type="text" class="form-control p-4 mb-3" value="<?= $_POST["name"] ?? "" ?>" name="name" placeholder="Ваше имя" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control p-4 mb-3" value="<?= $_POST["email"] ?? "" ?>" name="email" placeholder="Ваш Email" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="password" class="form-control p-4 mb-3" value="<?= $_POST["password"] ?? "" ?>" name="password" placeholder="Пароль" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="password" class="form-control p-4 mb-3" value="<?= $_POST["confirm-password"] ?? "" ?>" name="confirm-password" placeholder="Повторите пароль" />
                        <p class="help-block text-danger"></p>
                    </div>


                    <div class="text-center">
                        <button class="btn btn-primary py-3 px-5 " type="submit">Зарегистрироваться </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Register Form End -->


        <?php
        require_once "src/Views/components/footer.php";
        ?>