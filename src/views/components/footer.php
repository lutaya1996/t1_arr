<?php

use tt\Controllers\BaseController;
use tt\Models\Variable;

/**
 * @var BaseController
 */
$obj = $this;
?>

<!-- Footer Start -->
<div class="container-fluid bg-dark text-white mt-5 py-5 px-sm-3 px-md-5">
   <div class="row pt-5">
      <div class="col-lg-4 col-md-12 mb-5">
         <h1 class="mb-3 display-5 text-capitalize text-white"><span class="text-primary">Pet</span>Lover</h1>
         <p class="m-0">Блог о наших кошечках</p>
      </div>
      <div class="col-lg-8 col-md-12">
         <div class="row">
            <div class="col-md-4 mb-5">
               <h5 class="text-primary mb-4">Контакты</h5>
               <p><i class="fa fa-map-marker-alt mr-2"></i>Кремль</p>
               <p><i class="fa fa-phone-alt mr-2"></i>8-800-55-35-35</p>
               <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
               <div class="d-flex justify-content-start mt-4">
                  <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-twitter"></i></a>
                  <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-facebook-f"></i></a>
                  <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                  <a class="btn btn-outline-light rounded-circle text-center mr-2 px-0" style="width: 36px; height: 36px;" href="#"><i class="fab fa-instagram"></i></a>
               </div>
            </div>
            <?php require 'src/views/components/menus/footerMenu.php' ?>
         </div>
      </div>
   </div>
</div>
<div class="container-fluid text-white py-4 px-sm-3 px-md-5" style="background: #111111;">
   <div class="row">
      <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
         <p class="m-0 text-white">
            &copy; <a class="text-white font-weight-bold" href="#">CatBlog</a>. Все права защищены.
         </p>
      </div>
   </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="<?= $obj->dataProvider->getVariables(Variable::SERVER_DOMAIN) ?>assets/lib/easing/easing.min.js"></script>
<script src="<?= $obj->dataProvider->getVariables(Variable::SERVER_DOMAIN) ?>assets/lib/owlcarousel/owl.carousel.min.js"></script>
<script src="<?= $obj->dataProvider->getVariables(Variable::SERVER_DOMAIN) ?>assets/lib/tempusdominus/js/moment.min.js"></script>
<script src="<?= $obj->dataProvider->getVariables(Variable::SERVER_DOMAIN) ?>assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="<?= $obj->dataProvider->getVariables(Variable::SERVER_DOMAIN) ?>assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Contact Javascript File -->
<!-- <script src="<?= $obj->dataProvider->getVariables(Variable::SERVER_DOMAIN) ?>assets/mail/jqBootstrapValidation.min.js"></script> -->
<!-- <script src="<?= $obj->dataProvider->getVariables(Variable::SERVER_DOMAIN) ?>assets/mail/contact.js"></script> -->

<!-- Template Javascript -->
<script src="<?= $obj->dataProvider->getVariables(Variable::SERVER_DOMAIN) ?>assets/js/main.js"></script>
</body>

</html>