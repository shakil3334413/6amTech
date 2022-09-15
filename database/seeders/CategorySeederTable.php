<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ["Men", "Women", "Camera", "Cloths", "Computer", "Electronics", "Book", "Foods", "Others"];

        foreach($data as $item){
            Category::create([
                "name" => $item
            ]);
        }
    }
}
