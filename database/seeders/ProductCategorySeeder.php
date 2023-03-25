<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public $category_list = [
        'Advance Directer',
        'Services',
        'Hair Coloring',
        'Other Services',
        'Product Sales',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0, $length = count($this->category_list); $i < $length; $i++) {
            $country = new ProductCategory();
            $country->category_name = $this->category_list[$i];
            $country->save();
        }
    }
}
