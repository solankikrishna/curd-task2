<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //State Arr
        $states = [
            ['name'=>'Gujarat'],
            ['name'=>'Panjab'],
            ['name'=>'Maharashtra'],
        ];
        \App\Models\State::insert($states);
    }
}
