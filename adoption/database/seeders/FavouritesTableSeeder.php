<?php

namespace Database\Seeders;

use App\Models\Favourites;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavouritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
          [
              'user_id'=>'06',
            'listing_id'=>'06',
          ],
            [
              'user_id'=>'06',
            'listing_id'=>'06',
          ],
            [
              'user_id'=>'06',
            'listing_id'=>'06',
          ],
            [
            'user_id'=>'06',
            'listing_id'=>'06',
          ],
        ];
        foreach ($data as $key=>$value)
           Favourites::create($value);
    }
}
