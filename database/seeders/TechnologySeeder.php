<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tech_arr = ['HTML', 'CSS', 'JS', 'EJS', 'Laravel', 'React', 'MySQL', 'Ruby'];

        foreach($tech_arr as $tech) {
            $new_tech = new Technology();
            $new_tech->name = $tech;
            $new_tech->slug = Technology::generateSlug($new_tech->name);

            $new_tech->save();
        }
    }
}
