<?php

use tt\Controllers\CatalogController;
use tt\Models\Variable;

/**
 * @var CatalogController
 */
$obj = $this;

require_once 'src/Views/components/header.php';
?>

<!-- Services Start -->
<div class="container-fluid bg-light pt-5">
   <div class="container py-5">
      <div class="d-flex flex-column text-center mb-5">
         <h4 class="text-secondary mb-3"><?= $obj->dataProvider->getVariables(Variable::INDEX_SERVICE_HEAD1) ?></h4>
         <h1 class="display-4 m-0"><?= $obj->dataProvider->getVariables(Variable::INDEX_SERVICE_HEAD2) ?></h1>
      </div>
      <div class="row pb-3">
         <?php foreach ($obj->dataProvider->getServices() as $service) : ?>
            <div class="col-md-6 col-lg-4 mb-4">
               <div class="d-flex flex-column text-center bg-white mb-2 p-3 p-sm-5">
                  <h3 class="<?= $service->iconClass ?> display-3 font-weight-normal text-secondary mb-3"></h3>
                  <h3 class="mb-3"><?= $service->title ?></h3>
                  <p><?= $service->description ?></p>
               </div>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
</div>
<!-- Services End -->

<!-- Pricing Plan Start -->
<div class="container-fluid bg-light pt-5 pb-4">
   <div class="container py-5">
      <div class="d-flex flex-column text-center mb-5">
         <h4 class="text-secondary mb-3">Наши цены</h4>
         <h1 class="display-4 m-0">Выберите <span class="text-primary">лучший тариф</span></h1>
      </div>
      <div class="row">
         <div class="col-lg-4 mb-4">
            <div class="card border-0">
               <div class="card-header position-relative border-0 p-0 mb-4">
                  <img class="card-img-top" src="assets/img/price-1.jpg" alt="">
                  <div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
                     <h3 class="text-primary mb-3">Базовый</h3>
                     <h1 class="display-4 text-white mb-0">
                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>49<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Mo</small>
                     </h1>
                  </div>
               </div>
               <div class="card-body text-center p-0">
                  <ul class="list-group list-group-flush mb-4">
                     <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Кормление</li>
                     <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Содержание</li>
                     <li class="list-group-item p-2"><i class="fa fa-times text-danger mr-2"></i>Грумминг и СПА</li>
                     <li class="list-group-item p-2"><i class="fa fa-times text-danger mr-2"></i>Ветеринарная помощь</li>
                  </ul>
               </div>
               <div class="card-footer border-0 p-0">
                  <a href="" class="btn btn-primary btn-block p-3" style="border-radius: 0;">Выбрать</a>
               </div>
            </div>
         </div>
         <div class="col-lg-4 mb-4">
            <div class="card border-0">
               <div class="card-header position-relative border-0 p-0 mb-4">
                  <img class="card-img-top" src="assets/img/price-2.jpg" alt="">
                  <div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
                     <h3 class="text-secondary mb-3">Стандарт</h3>
                     <h1 class="display-4 text-white mb-0">
                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>99<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Mo</small>
                     </h1>
                  </div>
               </div>
               <div class="card-body text-center p-0">
                  <ul class="list-group list-group-flush mb-4">
                     <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Кормление</li>
                     <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Содержание</li>
                     <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Грумминг и СПА</li>
                     <li class="list-group-item p-2"><i class="fa fa-times text-danger mr-2"></i>Ветеринарная помощи</li>
                  </ul>
               </div>
               <div class="card-footer border-0 p-0">
                  <a href="" class="btn btn-secondary btn-block p-3" style="border-radius: 0;">Выбрать</a>
               </div>
            </div>
         </div>
         <div class="col-lg-4 mb-4">
            <div class="card border-0">
               <div class="card-header position-relative border-0 p-0 mb-4">
                  <img class="card-img-top" src="assets/img/price-3.jpg" alt="">
                  <div class="position-absolute d-flex flex-column align-items-center justify-content-center w-100 h-100" style="top: 0; left: 0; z-index: 1; background: rgba(0, 0, 0, .5);">
                     <h3 class="text-primary mb-3">Премиум</h3>
                     <h1 class="display-4 text-white mb-0">
                        <small class="align-top" style="font-size: 22px; line-height: 45px;">$</small>149<small class="align-bottom" style="font-size: 16px; line-height: 40px;">/ Mo</small>
                     </h1>
                  </div>
               </div>
               <div class="card-body text-center p-0">
                  <ul class="list-group list-group-flush mb-4">
                     <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Кормление</li>
                     <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Содержание</li>
                     <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Грумминг и СПА</li>
                     <li class="list-group-item p-2"><i class="fa fa-check text-secondary mr-2"></i>Ветеринарная помощь</li>
                  </ul>
               </div>
               <div class="card-footer border-0 p-0">
                  <a href="" class="btn btn-primary btn-block p-3" style="border-radius: 0;">Выбрать</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Pricing Plan End -->

<!-- Features Start -->
<div class="container">
   <div class="row align-items-center">
      <div class="col-lg-5">
         <img class="img-fluid w-100" src="https://hotelforcats.ru/images/kakdressirovatkoshku.jpg" alt="">
      </div>
      <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
         <h4 class="text-secondary mb-3">Почему мы?</h4>
         <h1 class="display-4 mb-4"><span class="text-primary">Особый уход</span> за животными</h1>
         <p class="mb-4">
            <b>PetLover – лучший вариант передержки для домашних питомцев.</b>
         </p>
         </p>
         Если вам нужна качественная гостиница для животных в Москве или в другом городе с безупречной
         репутацией, отличным сервисом и любящей животных командой котонянь, обращайтесь к услугам PetLover
         - лучшего отеля для животных в столице с видеонаблюдением. 24 часа в сутки вы сможете наблюдать за своим ненаглядным питомцем и
         общаться с ним посредством камеры.
         </p>
         <div class="row py-2">
            <div class="col-6">
               <div class="d-flex align-items-center mb-4">
                  <h1 class="flaticon-cat font-weight-normal text-secondary m-0 mr-3"></h1>
                  <h5 class="text-truncate m-0">Лучшие в индустрии</h5>
               </div>
            </div>
            <div class="col-6">
               <div class="d-flex align-items-center mb-4">
                  <h1 class="flaticon-doctor font-weight-normal text-secondary m-0 mr-3"></h1>
                  <h5 class="text-truncate m-0">Экстренные службы</h5>
               </div>
            </div>
            <div class="col-6">
               <div class="d-flex align-items-center">
                  <h1 class="flaticon-care font-weight-normal text-secondary m-0 mr-3"></h1>
                  <h5 class="text-truncate m-0">Особый уход</h5>
               </div>
            </div>
            <div class="col-6">
               <div class="d-flex align-items-center">
                  <h1 class="flaticon-dog font-weight-normal text-secondary m-0 mr-3"></h1>
                  <h5 class="text-truncate m-0">Поддержка клиентов</h5>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Features End -->

<?php
require_once "src/Views/components/footer.php";
?>