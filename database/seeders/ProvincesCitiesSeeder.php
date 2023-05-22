<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvincesCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $alicante = Province::create(['province_name' => 'Alicante']);

        $alicante->cities()->createMany([
            ['city_name' => 'Alicante'],
            ['city_name' => 'Elche'],
            ['city_name' => 'Torrevieja'],
        ]);

        $barcelona = Province::create(['province_name' => 'Barcelona']);

        $barcelona->cities()->createMany([
            ['city_name' => 'Barcelona'],
            ['city_name' => 'Badalona'],
            ['city_name' => 'Hospitalet de Llobregat'],
        ]);

        $islasbaleares = Province::create(['province_name' => 'Islas Baleares']);

        $islasbaleares->cities()->createMany([
            ['city_name' => 'Palma de Mallorca'],
            ['city_name' => 'Ibiza'],
            ['city_name' => 'Manacor'],
        ]);

        $madrid = Province::create(['province_name' => 'Madrid']);

        $madrid->cities()->createMany([
            ['city_name' => 'Madrid'],
            ['city_name' => 'Alcalá de Henares'],
            ['city_name' => 'Fuenlabrada'],
        ]);


        $valencia = Province::create(['province_name' => 'Valencia']);

        $valencia->cities()->createMany([
            ['city_name' => 'Valencia'],
            ['city_name' => 'Torrent'],
            ['city_name' => 'Gandía'],
        ]);
    }
}
