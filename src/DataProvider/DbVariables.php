<?php

namespace tt\DataProvider;

use tt\Models\Variable;

class DbVariables
{
   public static function getVariables()
   {
      return
         [
            new Variable(
               Variable::INDEX_SERVICE_HEAD1,
               "Наши сервисы"
            ),
            new Variable(
               Variable::INDEX_SERVICE_HEAD2,
               "<span class=\"text-primary\">Премиальный</span> Сервис для Питомцев"
            ),
            new Variable(
               Variable::ARTICLE_HEAD1,
               "Мои статьи"
            ),
            new Variable(
               Variable::ARTICLE_HEAD2,
               "Обновления из <span class=\"text-primary\">блога</span>"
            ),
            new Variable(
               Variable::CONTACT_HEAD1,
               "Контакты"
            ),
            new Variable(
               Variable::SERVER_DOMAIN,
               "http://cat-blog/"
            ),
         ];
   }
}