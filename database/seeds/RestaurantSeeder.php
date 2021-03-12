<?php

use App\Restaurant;
use Illuminate\Database\Seeder;
Use Faker\Generator as Faker;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            $newRestaurant = new Restaurant();
            $newRestaurant->name = $faker->sentence(2, false);
            $newRestaurant->address = $faker->address();
            $newRestaurant->phone_number = $faker->phoneNumber();
            $newRestaurant->save();
        }
    }
}
