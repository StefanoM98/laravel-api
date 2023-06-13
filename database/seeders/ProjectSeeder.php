<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Project;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 20; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->sentence(4);
            $newProject->slug = Str::slug($newProject->title, '%');
            $newProject->image = $faker->imageUrl(600, 300, 'Project', false, false);
            $newProject->description = $faker->text();
            $newProject->save();
        }
    }
}
