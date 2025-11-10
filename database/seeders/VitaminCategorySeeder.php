<?php

namespace Database\Seeders;

use App\Models\VitaminCategory;
use Illuminate\Database\Seeder;

class VitaminCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Vitamin Larut Lemak',
                'slug' => 'vitamin-larut-lemak',
                'description' => 'Vitamin yang larut dalam lemak dan dapat disimpan dalam jaringan lemak tubuh. Termasuk vitamin A, D, E, dan K.',
            ],
            [
                'name' => 'Vitamin Larut Air',
                'slug' => 'vitamin-larut-air',
                'description' => 'Vitamin yang larut dalam air dan tidak dapat disimpan lama dalam tubuh. Termasuk vitamin B kompleks dan vitamin C.',
            ],
        ];

        foreach ($categories as $category) {
            VitaminCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
