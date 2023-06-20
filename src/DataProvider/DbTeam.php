<?php

namespace tt\DataProvider;

use tt\Models\Team;

class DbTeam
{

   public static function getTeam()
   {
      return [
         new Team(
            "assets/img/team-1.jpg",
            "Mollie Ross",
            "Founder & CEO"
         ),
         new Team(
            "assets/img/team-2.jpg",
            "Jennifer Page",
            "Chef Executive"
         ),
         new Team(
            "assets/img/team-3.jpg",
            "Kate Glover",
            "Doctor"
         ),
         new Team(
            "assets/img/team-4.jpg",
            "Lilly Fry",
            "Trainer"
         ),

      ];
   }
}
