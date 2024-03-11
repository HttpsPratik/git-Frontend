<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            ['admin', 'admin', 'administrator'],
            ['Admin Assistant', 'admin-assistant', 'administrator assistant'],
            ['Department Head', 'department-head', 'Head of Department'],
            ['staff', 'staff', 'staff'],
        ];

        foreach($data as $datai){

            $adminrole = new Role();
            $adminrole->name = $datai[0];
            $adminrole->role = $datai[1];
            $adminrole->description = $datai[2];
            //$adminrole->rank = $datai[3];
            $adminrole->save();

        }
    }
}
