<?php
use tt\Controllers\ArticlesController;

require_once 'src/views/components/header.php';

$obj = $this;
?>

<h1>Добавляем статьи</h1>

    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 mb-5">
            <div class="contact-form">
                <div id="success"></div>



                <!-- TODO Экшен перенести в Variables -->
                <form method="post" action="http://cat-blog/articles/edit">
                        <div class="control-group">
                            <input type="checkbox" class="form-control p-1" name="active" placeholder="Активность статьи" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control p-1" name="image" placeholder="image" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control p-1" name="title" placeholder="title"/>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control p-4" rows="2" name="description" placeholder="decription" />
                            <p class="help-block text-danger"></p>
                        </div>
                    <div>
                        <input type="submit" value="Добавить">
                        <!-- <button class="btn btn-primary py-3 px-5" type="submit">Send Message</button> -->
                    </div>
                </form>


            </div>
        </div>
    </div>

<?php
require_once "src/views/components/footer.php";
?>