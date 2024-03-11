<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data =[
         [
             'name'=>'Pratik Thapa',
          'email'=>'Pratik.thapa.1223@gmail.com',
          'password'=>'123456',

          'contact_number'=>'9845839904',
          'address'=>'Hetauda-04',

         ],    [
             'name'=>'Pratik Thapa',
          'email'=>'Pratik.thapa.1223@gmail.com',
          'password'=>'123456',

          'contact_number'=>'9845839904',
          'address'=>'Hetauda-04',

         ],    [
             'name'=>'Pratik Thapa',
          'email'=>'Pratik.thapa.1223@gmail.com',
          'password'=>'123456',

          'contact_number'=>'9845839904',
          'address'=>'Hetauda-04',

         ],    [
             'name'=>'Pratik Thapa',
          'email'=>'Pratik.thapa.1223@gmail.com',
          'password'=>'123456',

          'contact_number'=>'9845839904',
          'address'=>'Hetauda-04',

         ],    [
             'name'=>'Pratik Thapa',
          'email'=>'Pratik.thapa.1223@gmail.com',
          'password'=>'123456',

          'contact_number'=>'9845839904',
          'address'=>'Hetauda-04',

         ],    [
             'name'=>'Pratik Thapa',
          'email'=>'Pratik.thapa.1223@gmail.com',
          'password'=>'123456',

          'contact_number'=>'9845839904',
          'address'=>'Hetauda-04',

         ],    [
             'name'=>'Pratik Thapa',
          'email'=>'Pratik.thapa.1223@gmail.com',
          'password'=>'123456',

          'contact_number'=>'9845839904',
          'address'=>'Hetauda-04',

         ],

        ];

        foreach ($data as $key=>$value)
            Users::create($value);
    }
}
