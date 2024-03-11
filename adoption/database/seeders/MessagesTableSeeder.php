<?php

namespace Database\Seeders;

use App\Models\Messages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
          [
            'sender_id'=>'27',
            'receiver_id'=>'17',
            'listing_id'=>'07',
            'message_content'=>'Dammi xa dammi,Wow',
          ],   [
            'sender_id'=>'27',
            'receiver_id'=>'17',
            'listing_id'=>'07',
            'message_content'=>'Dammi xa dammi,Wow',
          ],   [
            'sender_id'=>'27',
            'receiver_id'=>'17',
            'listing_id'=>'07',
            'message_content'=>'Dammi xa dammi,Wow',
          ],   [
            'sender_id'=>'27',
            'receiver_id'=>'17',
            'listing_id'=>'07',
            'message_content'=>'Dammi xa dammi,Wow',
          ],   [
            'sender_id'=>'27',
            'receiver_id'=>'17',
            'listing_id'=>'07',
            'message_content'=>'Dammi xa dammi,Wow',
          ],
        ];
        foreach($data as $key=>$value)
            Messages::create($value);
    }
}
