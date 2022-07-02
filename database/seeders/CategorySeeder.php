<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //
        $data = [
            [
                'name' => 'Horror'
            ],
            [
                'name' => 'Kids'
            ],
            [
                'name' => 'Life Motivation'
            ],
            [
                'name' => 'Romance'
            ],
        ];

        foreach($data as $key => $value) {
            Category::create($value);
        }
    }
}
