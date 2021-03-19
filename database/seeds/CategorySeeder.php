<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $catList = config('categories');

        foreach ($catList as $category) {
            $newcategory = new Category();
            $newcategory->name = $category['name'];
            $newcategory->save();
        }
    }
}