<?php

use App\Dish;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10; $i++) { 
            $newDish = new Dish();
            $newDish->name = $faker->sentence(3, false);
            $newDish->ingredients = $faker->sentence(5, false);
            $newDish->price = $faker->numberBetween(1, 99);
            $newDish->allergens = $faker->sentence(5, false);
            $newDish->save();
        }
    }
}
