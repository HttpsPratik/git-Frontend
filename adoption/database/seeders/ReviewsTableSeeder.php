<?php

namespace Database\Seeders;

use App\Models\Reviews;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
            [
                'user_id'=>'27',
                'listing_id'=>'17',
                'rating'=>'4.5',
                'review_content'=>'Dammi xa dammi, Wooooow',
            ],  [
                'user_id'=>'27',
                'listing_id'=>'17',
                'rating'=>'4.5',
                'review_content'=>'Dammi xa dammi, Wooooow',
            ],  [
                'user_id'=>'27',
                'listing_id'=>'17',
                'rating'=>'4.5',
                'review_content'=>'Dammi xa dammi, Wooooow',
            ],  [
                'user_id'=>'27',
                'listing_id'=>'17',
                'rating'=>'4.5',
                'review_content'=>'Dammi xa dammi, Wooooow',
            ],  [
                'user_id'=>'27',
                'listing_id'=>'17',
                'rating'=>'4.5',
                'review_content'=>'Dammi xa dammi, Wooooow',
            ],
        ];

        foreach ($data as $key=>$value)
            Reviews::create($value);
    }
}
