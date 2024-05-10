<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [['passing_standard' => '', 'passing_spin' => '', 'passing_pop' => '', 'tackling_front_rear' => '', 'tackling_rear_side' => '', 'tackling_side' => '', 'tackling_scrabble' => '', 'kicking_drop_punt' => '', 'kicking_drop_grubber' => '', 'kicking_drop_goal' => '']];

        foreach ($skills as $skill) {
            DB::table('skills')->insert($skill);
        }
    }
}
