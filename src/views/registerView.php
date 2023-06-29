<?php

use tt\Controllers\RegisterController;
use tt\Models\Variable;

require_once "src/Views/components/header.php";
/**
 * @var RegisterController $obj
 */
$obj = $this;
$errors = $obj->checkForEmptyInputs($_POST);

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
<!--                <h4 class="display-12 m-3"> <span style="color:red" class="error">--><?php //echo empty($_POST) ? "" : $obj->checkForEmptyInputs($_POST) ;?><!--</span></h4>-->

        <!--TODO  ACTION вынеси в вариаблс-->
                <form method="post" action="/register">
                    <div class="control-group">
                        <span style="color:red">* Обязательные поля</span>
                    </div>
                    <div class="control-group">
                        <span style="color:red">*</span>
                        <input type="text" class="form-control p-4 mb-1" value="<?= $_POST["name"] ?? "" ?>" name="name" placeholder="Ваше имя" required="true"/>
                        <label style="color:red" class="error"><?php echo empty($_POST) ? "" : $errors["name"] ;?></label>
                    </div>
                    <div class="control-group">
                        <span style="color:red">*</span>
                        <input type="email" class="form-control p-4 mb-1" value="<?= $_POST["email"] ?? "" ?>" name="email" placeholder="Ваш Email" required="true"/>
                        <label style="color:red" class="error"><?php echo empty($_POST) ? "" : $errors["email"] ;?></label>
                    </div>
                    <div class="control-group">
                        <span style="color:red">*</span>
                        <input type="password" class="form-control p-4 mb-1" value="<?= $_POST["password"] ?? "" ?>" name="password" placeholder="Пароль" required="true"/>
                        <label style="color:red" class="error"><?php echo empty($_POST) ? "" : $errors["password"]  ;?></label>
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