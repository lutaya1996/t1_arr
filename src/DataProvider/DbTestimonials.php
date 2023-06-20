<?php
namespace tt\DataProvider;

use tt\Models\Testimonial;

class DbTestimonials {

   /**
    * @return array
    */
   public static function getTestimonials(): array
   {
      return
         [
            new Testimonial(
            "assets/img/testimonial-1.jpg",
               "Джейсон Стетхем",
               "Телохранитель",
               "Вы лучшие!"
            ),
            new Testimonial(
            "assets/img/testimonial-2.jpg",
               "Анджелина Джоли",
               "Актриса",
               "Замечательно!"
            ),
            new Testimonial(
            "assets/img/testimonial-3.jpg",
               "Александр Невский",
               "Актер",
               "Absolutely!"
            ),
            new Testimonial(
            "assets/img/testimonial-4.jpg",
               "Крис Жаклин",
               "Кинолог",
               "Лучший сервис!"
            )

         ];
   }
}
