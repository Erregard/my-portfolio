<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Factory as Faker;

class ProjectSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Create some demo projects
        Project::create([
            'title' => 'Personal Portfolio',
            'description' => $faker->sentence(10),
            'image' => 'portfolio.jpg',
            'link' => 'https://myportfolio.com',
        ]);

        Project::create([
            'title' => 'E-commerce Platform',
            'description' => $faker->sentence(10),
            'image' => 'ecommerce.jpg',
            'link' => 'https://mystore.com',
        ]);
    }
};
