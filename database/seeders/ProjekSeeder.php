<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Projek;
use Illuminate\Support\Facades\DB;

class ProjekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projek = [
            [
                'title' => 'Branding & Illustration Design',
                'category' => 'Web Design',
                'image_url' => 'images/work-1.jpg'
            ],
            [
                'title' => 'Mobile App Development',
                'category' => 'Mobile',
                'image_url' => 'images/work-2.jpg'
            ],
            [
                'title' => 'E-commerce Website',
                'category' => 'Web Development',
                'image_url' => 'images/work-3.jpg'
            ],
        ];

        foreach ($projek as $item) {
            Projek::create($item);
        }
    }
}