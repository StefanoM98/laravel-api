<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['Virtual_gaming', 'Cloud_Gaming', 'Streaming_gaming', 'Position_gaming'];

        foreach ($technologies as $technology) {
            $new_tec = new Technology();
            $new_tec->name = $technology;
            $new_tec->slug = Str::slug($technology);
            $new_tec->save();
        }
    }
}
