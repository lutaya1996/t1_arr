<?php

namespace tt\DataProvider\Db;

use tt\Models\Variable;

class DbVariables
{
   /**
    * @return Variable[]
    */
   public static function getVariables(): array
   {
      return
         [
            new Variable(
               Variable::INDEX_SERVICE_HEAD1,
               "Что мы предлагаем"
            ),
            new Variable(
               Variable::INDEX_SERVICE_HEAD2,
               "<span class=\"text-primary\">Премиальный</span> Сервис для Питомцев"
            ),
            new Variable(
               Variable::ARTICLE_HEAD1,
               "Блог о питомцах"
            ),
            new Variable(
               Variable::ARTICLE_HEAD2,
               "Обновления из <span class=\"text-primary\">блога</span>"
            ),
            new Variable(
               Variable::CONTACT_HEAD1,
               "Остались вопросы?"
            ),
            new Variable(
               Variable::BLOG_HEAD,
               "Наш блог"
            ),
            new Variable(
               Variable::INDEX_SERVICE_HEAD2,
               "<span class=\"text-primary\">Премиальный</span> Сервис для Питомцев"
            ),
            new Variable(
               Variable::SERVER_DOMAIN,
               "http://cat-blog/"
            ),
            new Variable(
               Variable::URL_ARTICLES_EDIT,
               "http://cat-blog/articles/edit"
            ),
            new Variable(
               Variable::URL_ARTICLES_CREATE,
               "http://cat-blog/articles/create"
            ),
            new Variable(
               Variable::URL_ARTICLE_EDIT,
               "http://cat-blog/articles/edit/"
            ),
             new Variable(
                 Variable:: URL_ARTICLE_VIEW,
                 "http://cat-blog/articles/"
             ),
             new Variable(
                 Variable:: URL_ARTICLES_VIEW,
                 "http://cat-blog/articles"
             ),
            new Variable(
               Variable::URL_CATALOG,
               "http://cat-blog/catalog"
            ),
            new Variable(
               Variable::PRICING_PLAN_HEAD1,
               "Наши цены"
            ),
            new Variable(
               Variable::PRICING_PLAN_HEAD2,
               "Выберите <span class=\"text-primary\">лучший тариф</span>"
            ),
            new Variable(
               Variable::PATH_FOOTER,
               "src/Views/components/footer.php"
            ),
            new Variable(
               Variable::PATH_HEADER,
               "src/Views/components/header.php"
            ),
            new Variable(
               Variable::PATH_PRICING_PLAN,
               "src/Views/components/pricingPlan.php"
            ),
            new Variable(
               Variable::PATH_FOOTER_MENU,
               "src/Views/components/footerMenu.php"
            ),
            new Variable(
               Variable::PATH_MAIN_MENU,
               "src/Views/components/mainMenu.php"
            )
         ];
   }
}
