<?php
use tt\Controllers\ContactsController;

require_once "src/Views/components/header.php";
/**
 * @var ContactsController $obj
 */
$obj = $this;

$variableProvider = $obj->dataProvider->variablesProvider;
?>

<!-- Contact Start -->
<div class="container-fluid pt-5">
   <div class="d-flex flex-column text-center mb-5 pt-5">
      <h1 class="text-secondary mb-3"><?=$variableProvider->getVariable("CONTACT_HEAD1")?></h1>
      <h4 class="display-4 m-0">Свяжитесь <span class="text-primary"> с нами</span></h4>
   </div>
   <div class="row justify-content-center">
      <div class="col-12 col-sm-8 mb-5">
         <div class="contact-form">
            <div id="success"></div>
            <form name="sentMessage" id="contactForm"  method="POST" action="http://cat-blog/contacts">
               <div class="control-group">
                  <input type="text" class="form-control p-4" name="name" placeholder="Ваше имя" required="required" data-validation-required-message="Please enter your name" />
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <input type="email" class="form-control p-4" name="email" placeholder="Ваш Email" required="required" data-validation-required-message="Please enter your email" />
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <input type="text" class="form-control p-4" name="number" placeholder="Телефон" required="required" data-validation-required-message="Please enter a number" />
                  <p class="help-block text-danger"></p>
               </div>
               <div class="control-group">
                  <textarea class="form-control p-4" rows="6" name="message" placeholder="Сообщение" required="required" data-validation-required-message="Please enter your message"></textarea>
                  <p class="help-block text-danger"></p>
               </div>
               <div class="text-center">
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