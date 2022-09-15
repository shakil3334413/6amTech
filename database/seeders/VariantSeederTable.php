<?php

namespace Database\Seeders;

use App\Models\Variant;
use Illuminate\Database\Seeder;

class VariantSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ["x", "xl", "l", "xxl", "m"];
        foreach($data as $value){
            Variant::create([
                'size' => $value
            ]);
        }
    }
}
