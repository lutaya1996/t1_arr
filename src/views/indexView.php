<?php

use tt\Controllers\IndexController;
use tt\Models\Variable;


require_once 'src/Views/components/header.php';


/**
 * @var IndexController
 */
$obj = $this;

?>

<!-- Carousel Start -->
<div class="container-fluid p-0">
   <div id="header-carousel" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
         <?php foreach ($obj->dataProvider->getSlides() as $slide) : ?>
            <div class="carousel-item <?= $slide->showOnFirst ? "active" : "" ?>">
               <img class="w-100" src="<?= $slide->image ?>" alt="Image">
               <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                  <div class="p-3" style="max-width: 900px;">
                     <h3 class="text-white mb-3 d-none d-sm-block"><?= $slide->firstHead ?></h3>
                     <h1 class="display-3 text-white mb-3"><?= $slide->secondHead ?></h1>
                     <h5 class="text-white mb-3 d-none d-sm-block"><?= $slide->thirdHead ?></h5>
                     <!-- <a href="" class="btn btn-lg btn-primary mt-3 mt-md-4 px-4">Book Now</a>
                     <a href="" class="btn btn-lg btn-secondary mt-3 mt-md-4 px-4">Learn More</a> -->
                  </div>
               </div>
            </div>

         <?php endforeach; ?>
      </div>
      <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
         <div class="btn btn-primary rounded" style="width: 45px; height: 45px;">
            <span class="carousel-control-prev-icon mb-n2"></span>
         </div>
      </a>
      <a class="carousel-control-next" href="#header-carousel" data-slide="next">
         <div class="btn btn-primary rounded" style="width: 45px; height: 45px;">
            <span class="carousel-control-next-icon mb-n2"></span>
         </div>
      </a>
   </div>
</div>
<!-- Carousel End -->

<?php require_once "src/Views/components/bookingService.php"; ?>

<!-- About Start -->
<div class="container py-5">
   <div class="row py-5">
      <div class="col-lg-7 pb-5 pb-lg-0 px-3 px-lg-5">
         <h4 class="text-secondary mb-3">О нас</h4>
         <h1 class="display-4 mb-4"><span class="text-primary">Содержание</span> & <span class="text-secondary">Дневной уход</span></h1>
         <h5 class="text-muted mb-3">Мы оказываем комплексные услуги вашим домашним любимцам: собакам и кошкам. </h5>
         <p class="mb-4">Мы можем предложить Вашим питомцам высококвалифицированную круглосуточную ветеринарную помощь, услуги по осуществлению стильных и гигиенических стрижек собак и кошек.</p>
         <ul class="list-inline">
            <li>
               <h5><i class="fa fa-check-double text-secondary mr-3"></i>Лучшие в индустрии</h5>
            </li>
            <li>
               <h5><i class="fa fa-check-double text-secondary mr-3"></i>Экстренные службы помощи</h5>
            </li>
            <li>
               <h5><i class="fa fa-check-double text-secondary mr-3"></i>Поддержка клиентов 24/7</h5>
            </li>
         </ul>
         <a href="" class="btn btn-lg btn-primary mt-3 px-4">Узнать больше</a>
      </div>
      <div class="col-lg-5">
         <div class="row px-3">
            <div class="col-12 p-0">
               <img class="img-fluid w-100" src="assets/img/about-1.jpg" alt="">
            </div>
            <div class="col-6 p-0">
               <img class="img-fluid w-100" src="assets/img/about-2.jpg" alt="">
            </div>
            <div class="col-6 p-0">
               <img class="img-fluid w-100" src="assets/img/about-3.jpg" alt="">
            </div>
         </div>
      </div>
   </div>
</div>
<!-- About End -->


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


<!-- Features Start -->
<div class="container">
   <div class="row align-items-center">
      <div class="col-lg-5">
         <img class="img-fluid w-100" src="assets/img/feature.jpg" alt="">
      </div>
      <div class="col-lg-7 py-5 py-lg-0 px-3 px-lg-5">
         <h4 class="text-secondary mb-3">Почему мы?</h4>
         <h1 class="display-4 mb-4"><span class="text-primary">Особый уход</span> за животными</h1>
         <p class="mb-4">Оказываем комплексные услуги вашим домашним любимцам: собакам и кошкам. </p>
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


<!-- Pricing Plan Start -->
<div class="container-fluid bg-light pt-5 pb-4">
   <div class="container py-5">
      <div class="d-flex flex-column text-center mb-5">
         <h4 class="text-secondary mb-3">Наши цены</h4>
         <h1 class="display-4 m-0">Выберите<span class="text-primary">лучший тариф</span></h1>
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


<!-- Team Start -->
<div class="container mt-5 pt-5 pb-3">
   <div class="d-flex flex-column text-center mb-5">
      <h4 class="text-secondary mb-3">Наша команда</h4>
      <h1 class="display-4 m-0">Встречайте наших <span class="text-primary">членов команды</span></h1>
   </div>
   <div class="row">
      <div class="col-lg-3 col-md-6">
         <div class="team card position-relative overflow-hidden border-0 mb-4">
            <img class="card-img-top" src="assets/img/team-1.jpg" alt="">
            <div class="card-body text-center p-0">
               <div class="team-text d-flex flex-column justify-content-center bg-light">
                  <h5>Mollie Ross</h5>
                  <i>Founder & CEO</i>
               </div>
               <div class="team-social d-flex align-items-center justify-content-center bg-dark">
                  <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                  <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                  <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                  <a class="btn btn-outline-primary rounded-circle text-center px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-3 col-md-6">
         <div class="team card position-relative overflow-hidden border-0 mb-4">
            <img class="card-img-top" src="assets/img/team-2.jpg" alt="">
            <div class="card-body text-center p-0">
               <div class="team-text d-flex flex-column justify-content-center bg-light">
                  <h5>Jennifer Page</h5>
                  <i>Chef Executive</i>
               </div>
               <div class="team-social d-flex align-items-center justify-content-center bg-dark">
                  <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                  <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                  <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                  <a class="btn btn-outline-primary rounded-circle text-center px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-3 col-md-6">
         <div class="team card position-relative overflow-hidden border-0 mb-4">
            <img class="card-img-top" src="assets/img/team-3.jpg" alt="">
            <div class="card-body text-center p-0">
               <div class="team-text d-flex flex-column justify-content-center bg-light">
                  <h5>Kate Glover</h5>
                  <i>Doctor</i>
               </div>
               <div class="team-social d-flex align-items-center justify-content-center bg-dark">
                  <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                  <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                  <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                  <a class="btn btn-outline-primary rounded-circle text-center px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-3 col-md-6">
         <div class="team card position-relative overflow-hidden border-0 mb-4">
            <img class="card-img-top" src="assets/img/team-4.jpg" alt="">
            <div class="card-body text-center p-0">
               <div class="team-text d-flex flex-column justify-content-center bg-light">
                  <h5>Lilly Fry</h5>
                  <i>Trainer</i>
               </div>
               <div class="team-social d-flex align-items-center justify-content-center bg-dark">
                  <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                  <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                  <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                  <a class="btn btn-outline-primary rounded-circle text-center px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Team End -->


<!-- Testimonial Start -->
<div class="container-fluid bg-light my-5 p-0 py-5">
   <div class="container p-0 py-5">
      <div class="d-flex flex-column text-center mb-5">
         <h4 class="text-secondary mb-3">Отзывы</h4>
         <h1 class="display-4 m-0">Отзывы <span class="text-primary">наших клиентов</span></h1>
      </div>
      <div class="owl-carousel testimonial-carousel">
         <div class="bg-white mx-3 p-4">
            <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
               <img class="img-fluid" src="assets/img/testimonial-1.jpg" style="width: 80px; height: 80px;" alt="">
               <div class="ml-3">
                  <h5>Имя клиента</h5>
                  <i>Профессия</i>
               </div>
            </div>
            <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum sanct clita</p>
         </div>
         <div class="bg-white mx-3 p-4">
            <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
               <img class="img-fluid" src="assets/img/testimonial-2.jpg" style="width: 80px; height: 80px;" alt="">
               <div class="ml-3">
                  <h5>Client Name</h5>
                  <i>Profession</i>
               </div>
            </div>
            <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum sanct clita</p>
         </div>
         <div class="bg-white mx-3 p-4">
            <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
               <img class="img-fluid" src="assets/img/testimonial-3.jpg" style="width: 80px; height: 80px;" alt="">
               <div class="ml-3">
                  <h5>Client Name</h5>
                  <i>Profession</i>
               </div>
            </div>
            <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum sanct clita</p>
         </div>
         <div class="bg-white mx-3 p-4">
            <div class="d-flex align-items-end mb-3 mt-n4 ml-n4">
               <img class="img-fluid" src="assets/img/testimonial-4.jpg" style="width: 80px; height: 80px;" alt="">
               <div class="ml-3">
                  <h5>Client Name</h5>
                  <i>Profession</i>
               </div>
            </div>
            <p class="m-0">Sed ea amet kasd elitr stet, stet rebum et ipsum est duo elitr eirmod clita lorem. Dolor tempor ipsum sanct clita</p>
         </div>
      </div>
   </div>
</div>
<!-- Testimonial End -->


<!-- Blog Start -->
<div class="container pt-5">
   <div class="d-flex flex-column text-center mb-5">
      <h4 class="text-secondary mb-3">Pet Blog</h4>
      <h1 class="display-4 m-0"><span class="text-primary">Updates</span> From Blog</h1>
   </div>
   <div class="row pb-3">
      <div class="col-lg-4 mb-4">
         <div class="card border-0 mb-2">
            <img class="card-img-top" src="assets/img/blog-1.jpg" alt="">
            <div class="card-body bg-light p-4">
               <h4 class="card-title text-truncate">Diam amet eos at no eos</h4>
               <div class="d-flex mb-3">
                  <small class="mr-2"><i class="fa fa-user text-muted"></i> Admin</small>
                  <small class="mr-2"><i class="fa fa-folder text-muted"></i> Web Design</small>
                  <small class="mr-2"><i class="fa fa-comments text-muted"></i> 15</small>
               </div>
               <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est diam eos, rebum sit vero stet justo</p>
               <a class="font-weight-bold" href="">Read More</a>
            </div>
         </div>
      </div>
      <div class="col-lg-4 mb-4">
         <div class="card border-0 mb-2">
            <img class="card-img-top" src="assets/img/blog-2.jpg" alt="">
            <div class="card-body bg-light p-4">
               <h4 class="card-title text-truncate">Diam amet eos at no eos</h4>
               <div class="d-flex mb-3">
                  <small class="mr-2"><i class="fa fa-user text-muted"></i> Admin</small>
                  <small class="mr-2"><i class="fa fa-folder text-muted"></i> Web Design</small>
                  <small class="mr-2"><i class="fa fa-comments text-muted"></i> 15</small>
               </div>
               <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est diam eos, rebum sit vero stet justo</p>
               <a class="font-weight-bold" href="">Read More</a>
            </div>
         </div>
      </div>
      <div class="col-lg-4 mb-4">
         <div class="card border-0 mb-2">
            <img class="card-img-top" src="assets/img/blog-3.jpg" alt="">
            <div class="card-body bg-light p-4">
               <h4 class="card-title text-truncate">Diam amet eos at no eos</h4>
               <div class="d-flex mb-3">
                  <small class="mr-2"><i class="fa fa-user text-muted"></i> Admin</small>
                  <small class="mr-2"><i class="fa fa-folder text-muted"></i> Web Design</small>
                  <small class="mr-2"><i class="fa fa-comments text-muted"></i> 15</small>
               </div>
               <p>Diam amet eos at no eos sit lorem, amet rebum ipsum clita stet, diam sea est diam eos, rebum sit vero stet justo</p>
               <a class="font-weight-bold" href="">Read More</a>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Blog End -->


<?php
require_once "src/Views/components/footer.php";
?>