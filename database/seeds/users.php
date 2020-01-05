<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
use App\Role;
class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            // Create User
            $role_user = Role::where('name','user')->first();
            $user = new User();
            $user->name = "Нэргүй Бямбадорж";
            $user->email = 'client@notary.mn';
            $user->registration_number = 'ТА97011810';
            $user->phone = '99868427';
            $user->type = '1';// 1 = user; 2 = notary; 3 = admin;
            $user->password = bcrypt('password');
            $user->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $user->save();
            $user->roles()->attach($role_user);
            // Create Notary
            $role_notary = Role::where('name','notary')->first();
            $notary = new User();
            $notary->name = "Нотариат";
            $notary->email = 'notary@notary.mn';
            $notary->registration_number = 'ТА00000000';
            $notary->phone = '99111199';
            $notary->type = '2';// 1 = user; 2 = notary; 3 = admin;
            $notary->confirmed = '1';
            $notary->password = bcrypt('password');
            $notary->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $notary->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $notary->save();
            $notary->roles()->attach($role_notary);
            // Create Admin
            $role_admin = Role::where('name','admin')->first();
            $admin = new User();
            $admin->name = "Админ";
            $admin->email = 'admin@notary.mn';
            $admin->registration_number = 'ТА00000001';
            $admin->phone = '99111199';
            $admin->type = '3';// 1 = user; 2 = notary; 3 = admin;
            $admin->password = bcrypt('password');
            $admin->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $admin->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $admin->save();
            $admin->roles()->attach($role_admin);
    }
}
