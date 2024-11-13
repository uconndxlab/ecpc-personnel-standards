<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Discipline;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $disciplines = [
            ['name' => 'Audiologist'],
            ['name' => 'Deaf and Hard of Hearing Specialist'],
            ['name' => 'Early Childhood Educator'],
            ['name' => 'Early Childhood Special Educator'],
            ['name' => 'Family Therapist'],
            ['name' => 'Nurse'],
            ['name' => 'Occupational Therapist'],
            ['name' => 'Physical Therapist'],
            ['name' => 'Psychologist (Clinical)'],
            ['name' => 'Psychologist (Counseling)'],
            ['name' => 'School Psychologist'],
            ['name' => 'Social Worker'],
            ['name' => 'Speech Language Pathologist (Licensed)'],
            ['name' => 'Speech Language Pathologist'],
            ['name' => 'Vision Specialist'],
        ];

        foreach ($disciplines as $discipline) {
            Discipline::create($discipline);
        }
    }
}
