<?php

use tt\Controllers\LoginController;


require_once 'src/Views/components/header.php';
/**
 * @var LoginController $obj
 */
$obj = $this;

?>

    <!-- Contact Start -->
    <div class="container-fluid pt-5">
    <div class="d-flex flex-column text-center mb-5 pt-5">
        <h4 class="text-secondary mb-3">Авторизация</h4>
        <h1 class="display-4 m-0"></span></h1>
    </div>
    <div class="row justify-content-center">
    <div class="col-12 col-sm-8 mb-5">
        <div class="contact-form">
            <div id="success"></div>

            <form name="sentMessage" method="post" action="http://cat-blog/login">

                <?php if(isset($obj->error)) :?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $obj->error ?>
                </div>
                <?php endif;?>

                <div class="control-group">
                    <input type="email" class="form-control p-4 mb-3" name="email"
                           value="<?php echo $_POST["email"] ?? "" ?>" placeholder="Ваш Email" required="required"
                           data-validation-required-message="Пожалуйста, введите Ваш email"/>

                </div>
                <div class="control-group">
                    <input type="password" class="form-control p-4 mb-3" name="password"
                           value="<?php echo $_POST["password"] ?? "" ?>" placeholder="Пароль" required="required"
                           data-validation-required-message="Пожалуйста, введите Ваш пароль"/>
                </div>

                <div class="text-center">
                    <button class="btn btn-primary py-3 px-5" type="submit">Войти</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact End -->


<?php
require_once "src/Views/components/footer.php";
?>