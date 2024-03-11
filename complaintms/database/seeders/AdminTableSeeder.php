<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Department;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['Admin', 'admin@nagarpalika.com', 'password1', 'admin'],
            //['Admin1', 'admin1@nagarpalika.com', 'password1', 'admin'],
            ['Admin Assistant', 'adminassistant@nagarpalika.com', 'password1', 'admin-assistant'],
            //['Admin Assistant1', 'adminassistant1@nagarpalika.com', 'password1', 'admin-assistant'],
            ['Department Head', 'departmenthead@nagarpalika.com', 'password1', 'department-head'],
            //['Department Head1', 'departmenthead1@nagarpalika.com', 'password1', 'department-head'],
            ['Staff', 'staff@nagarpalika.com', 'password1', 'staff'],
            //['Staff1', 'staff1@nagarpalika.com', 'password1', 'staff'],
        ];

        foreach ($data as $datum)
        {
            $admin = new Admin();
            $admin->name = $datum[0];
            $admin->email = $datum[1];
            $admin->password = Hash::make($datum[2]);
            $admin->role_id = Role::where('role',$datum[3])->first()->id;
            $admin->department_id = Department::inRandomOrder()->first()->id;
            //$admin->email_verified_at = now();
            $admin->save();
        }
    }
}
