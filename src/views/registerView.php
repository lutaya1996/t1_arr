<?php

use tt\Controllers\RegisterController;
use tt\Models\Variable;

require_once "src/Views/components/header.php";
/**
 * @var RegisterController $obj
 */
$obj = $this;

//Массив с ошибками, если какие-то поля пустые
/** @var array $errors */
$errors = $obj->checkForEmptyInputs($_POST);

//Массив с ошибками, если какие-то поля заполнены неверно
/** @var array $invalidData */
$invalidData = $obj->checkData($_POST);

?>

<!-- Register Form Start -->
<div class="container-fluid pt-5">
    <div class="d-flex flex-column text-center mb-5 pt-5">
        <h4 class="text-secondary mb-3">Регистрация</h4>
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 mb-5">
            <div class="contact-form">
                <div id="success"></div>

        <!--TODO  ACTION вынеси в вариаблс-->
                <form method="post" action="/register">
                    <div class="control-group">
                        <span style="color:red">* Обязательные поля</span>
                    </div>
                    <div class="control-group">
                        <span style="color:red">*</span>
                        <input type="text" class="form-control p-4 mb-1" value="<?= $_POST["name"] ?? "" ?>" name="name" placeholder="Ваше имя" required="true"/>
                        <label style="color:red" class="error"><?php echo empty($_POST) ? "" : $errors["name"] ;?></label>
                        <label style="color:red" class="error"><?php echo empty($_POST) ? "" : $invalidData["name"] ;?></label>
                        <label class="text">Используйте ТОЛЬКО латиницу или ТОЛЬКО кириллицу. Первая буква имени должна быть в верхнем регистре, а все остальные в нижнем.</label>
                    </div>
                    <div class="control-group">
                        <span style="color:red">*</span>
                        <input type="email" class="form-control p-4 mb-1" value="<?= $_POST["email"] ?? "" ?>" name="email" placeholder="Ваш Email" required="true"/>
                        <label style="color:red" class="error"><?php echo empty($_POST) ? "" : $errors["email"] ;?></label>
                        <label style="color:red" class="error"><?php echo empty($_POST) ? "" : $invalidData["email"] ;?></label>
                        <label class="info">Укажите полный email</label>
                    </div>
                    <div class="control-group">
                        <span style="color:red">*</span>
                        <input type="password" class="form-control p-4 mb-1" value="<?= $_POST["password"] ?? "" ?>" name="password" placeholder="Пароль" required="true"/>
                        <label style="color:red" class="error"><?php echo empty($_POST) ? "" : $errors["password"]  ;?></label>
                        <label style="color:red" class="error"><?php echo empty($_POST) ? "" : $invalidData["password"] ;?></label>
                        <label class="info">Пароль должен состоять из латинских символов, обязательно иметь 1 символ в верхнем и нижнем регистре, 1 цифру и иметь длину от 8 до 12 символов.</label>
                    </div>
                    <div class="control-group">
                        <span style="color:red">*</span>
                        <input type="password" class="form-control p-4 mb-1" value="<?= $_POST["confirm-password"] ?? "" ?>" name="confirm-password" placeholder="Повторите пароль" required="true"/>
                        <label style="color:red" class="error"><?php echo empty($_POST) ? "" : $errors["confirm-password"] ;?></label>
                        <label style="color:red" class="error"><?php echo empty($_POST) ? "" : $errors["same"] ;?></label>
                    </div>


                    <div class="text-center">
                        <button class="btn btn-primary py-3 px-5 mb-3 " type="submit"><span class="" >Зарегистрироваться</span> </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Register Form End -->


        <?php
        require_once "src/Views/components/footer.php";
        ?>