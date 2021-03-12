<?php

use App\Order;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            $newOrder = new Order();
            $newOrder->special_requests = $faker->sentence(5);
            $newOrder->exp_date = $faker->dateTimeInInterval($startDate = 'now', $endDate = '+ 1 hour');
            $newOrder->name = $faker->firstName();
            $newOrder->lastname = $faker->lastName();
            $newOrder->address = $faker->address();
            $newOrder->phone_number = $faker->phoneNumber();
            $newOrder->save();
        }

    }
}
