<?php

use tt\Controllers\BaseController;


/**
 * @var BaseController $obj
 */
$obj = $this;

$variableProvider = $obj->dataProvider->variablesProvider;

?>

<div class="container-fluid bg-light pt-5 pb-4">
   <div class="container py-5">
      <div class="d-flex flex-column text-center mb-5">
         <h4 class="text-secondary mb-3"><?= $variableProvider->getVariable("PRICING_PLAN_HEAD1") ?></h4>
         <h1 class="display-4 m-0"><?= $variableProvider->getVariable("PRICING_PLAN_HEAD2") ?></h1>
      </div>
      <div class="row">

         <div class="col-lg-4 mb-4">
            <div class="card border-0">
               <div class="card-header position-relative border-0 p-0 mb-4">
                  <img class="card-img-top" src="/assets/img/price-1.jpg" alt="">
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
                  <img class="card-img-top" src="/assets/img/price-2.jpg" alt="">
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
                  <img class="card-img-top" src="/assets/img/price-3.jpg" alt="">
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