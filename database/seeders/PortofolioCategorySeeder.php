<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PortofolioCategory;

class PortofolioCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PortofolioCategory::insert([
            'name'  => 'Building',
        ]);

        PortofolioCategory::insert([
            'name'  => 'Interior',
        ]);
    }
}
