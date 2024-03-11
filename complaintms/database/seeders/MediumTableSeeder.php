<?php

namespace Database\Seeders;

use App\Models\Medium;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['Phone','Website'];
        foreach ($data as $datum)
        {
            $medium = new Medium();
            $medium->name = $datum;
            $medium->save();
        }
    }
}
