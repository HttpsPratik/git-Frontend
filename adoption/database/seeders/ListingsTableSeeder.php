<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
         [

             'title'=>'Sheru,Adult-Male-Medium',
             'description'=>'sarcastic, a bit sassy',
             'category'=>'Cat',
             'gender'=>'male',
             'image'=>'Cat.jpg',
             'status'=>'Pending',
         ],  [

             'title'=>'Sheru,Adult-Male-Medium',
             'description'=>'sarcastic, a bit sassy',
             'category'=>'Cat',
             'gender'=>'male',
             'image'=>'Cat.jpg',
             'status'=>'Pending',
         ],  [

             'title'=>'Sheru,Adult-Male-Medium',
             'description'=>'sarcastic, a bit sassy',
             'category'=>'Cat',
             'gender'=>'male',
             'image'=>'Cat.jpg',
             'status'=>'Pending',
         ],  [

             'title'=>'Sheru,Adult-Male-Medium',
             'description'=>'sarcastic, a bit sassy',
             'category'=>'Cat',
             'gender'=>'male',
             'image'=>'Cat.jpg',
             'status'=>'Pending',
         ],  [

             'title'=>'Sheru,Adult-Male-Medium',
             'description'=>'sarcastic, a bit sassy',
             'category'=>'Cat',
             'gender'=>'male',
             'image'=>'Cat.jpg',
             'status'=>'Pending',
         ],  [

             'title'=>'Sheru,Adult-Male-Medium',
             'description'=>'sarcastic, a bit sassy',
             'category'=>'Cat',
             'gender'=>'male',
             'image'=>'Cat.jpg',
             'status'=>'Pending',
         ],
       ];
       foreach ($data as $key=>$value)
          Listings::create($value);

    }
}
