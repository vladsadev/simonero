<?php

namespace Database\Seeders;

use App\Models\AnimalType;
use Illuminate\Database\Seeder;

class AnimalTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $animalTypes = [
            [
                'name' => 'dog',
                'display_name' => 'Perro',
                'description' => 'Mamífero doméstico de la familia de los cánidos',
                'is_active' => true,
            ],
            [
                'name' => 'cat',
                'display_name' => 'Gato',
                'description' => 'Mamífero carnívoro de la familia de los félidos',
                'is_active' => true,
            ],
            [
                'name' => 'bird',
                'display_name' => 'Ave',
                'description' => 'Animal vertebrado con plumas y alas',
                'is_active' => true,
            ],
            [
                'name' => 'fish',
                'display_name' => 'Pez',
                'description' => 'Animal vertebrado acuático con branquias',
                'is_active' => true,
            ],
            [
                'name' => 'rabbit',
                'display_name' => 'Conejo',
                'description' => 'Mamífero lagomorfo herbívoro',
                'is_active' => true,
            ],
            [
                'name' => 'hamster',
                'display_name' => 'Hámster',
                'description' => 'Pequeño roedor doméstico',
                'is_active' => true,
            ],
        ];

        foreach ($animalTypes as $type) {
            AnimalType::firstOrCreate(
                ['name' => $type['name']],
                $type
            );
        }
    }
}
