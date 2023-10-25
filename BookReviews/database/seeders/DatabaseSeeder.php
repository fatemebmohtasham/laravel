<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
   /**
    * Seed the application's database.
    *
    * @return void
    */
   public function run()
   {



        \App\Models\Book::factory(10)->create()->each(function($book){
           $numberRevies = random_int(5,10);
           \App\Models\Reviews::factory()->count($numberRevies)
           ->good()
           ->for($book)
           ->create();
        });

     

        \App\Models\Book::factory(10)->create()->each(function($book){
            $numberRevies = random_int(5,10);
            \App\Models\Reviews::factory()->count($numberRevies)
            ->average()
            ->for($book)
            ->create();
         });

         \App\Models\Book::factory(10)->create()->each(function($book){
            $numberRevies = random_int(5,10);
            \App\Models\Reviews::factory()->count($numberRevies)
            ->bad()
            ->for($book)
            ->create();
         });

   }
}
