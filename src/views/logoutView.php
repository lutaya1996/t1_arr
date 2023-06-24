<?php
use tt\Controllers\LogoutController;
use tt\Models\Variable;

require_once 'src/Views/components/header.php';
/**
 * @var \tt\Controllers\LogoutController
 */
$obj = $this;
?>

    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="d-flex flex-column text-center mb-5 pt-5">
            <h4 class="text-secondary mb-3"><?=$obj->dataProvider->getVariables(Variable::CONTACT_HEAD1)?></h4>
            <h1 class="display-4 m-0">Свяжитесь с нами <span class="text-primary">по любому вопросу</span></h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 mb-5">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" novalidate="novalidate">
                        <div class="control-group">
                            <input type="text" class="form-control p-4" id="name" placeholder="Ваше имя" required="required" data-validation-required-message="Please enter your name" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control p-4" id="email" placeholder="Ваш Email" required="required" data-validation-required-message="Please enter your email" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control p-4" id="number" placeholder="Телефон" required="required" data-validation-required-message="Please enter a number" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea class="form-control p-4" rows="6" id="message" placeholder="Сообщение" required="required" data-validation-required-message="Please enter your message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- Contact End -->


<?php
require_once "src/Views/components/footer.php";
?>