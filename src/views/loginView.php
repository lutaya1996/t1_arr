<?php
use tt\Controllers\LoginController;
use tt\Models\Variable;

require_once 'src/Views/components/header.php';
/**
 * @var LoginController
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
                    <form name="sentMessage" id="contactForm"  method="post" enctype="application/x-www-form-urlencoded" action="http://cat-blog/login" novalidate="novalidate">
                        <div class="control-group">
                            <input type="email" class="form-control p-4" id="email" placeholder="Ваш Email" required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="password" class="form-control p-4" id="password" placeholder="Пароль" required="required" data-validation-required-message="Please enter your password" />
                            <p class="help-block text-danger"></p>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton">Войти</button>
                        </div>
                    </form>
                </div>
            </div>
    <!-- Contact End -->


<?php
require_once "src/Views/components/footer.php";
?>