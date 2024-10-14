<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Sviluppo Full-Stack', 'Sviluppo Frontend', 'Sviluppo Backend', 'UX/UI', "Gestione Database e analisi dati"];

        foreach($types as $t) {
            $type = new Type();
            $type->name = $t;
            $type->slug = Type::generateSlug($t);

            $type->save();
        }
    }
}
