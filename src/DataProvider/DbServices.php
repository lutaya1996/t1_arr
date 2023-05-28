<?php
namespace tt\DataProvider;
use tt\Models\Service;

class DbServices
{
    /**
     * @return Service[]
     */
   public static function getServices(): array
   {
      return 
      [
         new Service(
            1,
            "flaticon-house",
            "пансион для домашних животных",
            "возьмем вашего питтомца на временное содержание"
         ),
         new Service(
            2,
            "flaticon-food",
            "кормление питомцев",
            "покормим вашего питомца в ваше отсуствие"
         ),
         new Service(
            3,
            "flaticon-grooming",
            "грумминг для ваших питомцев",
            "пострижем красиво"
         ),
         new Service(
            4,
            "flaticon-cat",
            "тренировка питомцев",
            "лучшеи кинологи обучат вашего питомца"
         ),
         new Service(
            5,
            "flaticon-dog",
            "упражнения для питомцев",
            "физнагрузка для вашего питомца"
         ),
         new Service(
            6,
            "flaticon-vaccine",
            "вакцинация питомцев",
            "вакцинируем вашего питомца"
         )
      ];
   }
}