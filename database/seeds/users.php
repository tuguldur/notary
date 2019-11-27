<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\User;
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
            $user = new User();
            $user->name = "Нэргүй Бямбадорж";
            $user->email = 'b18.bymbuush@gmail.com';
            $user->registration_number = 'ТА97011810';
            $user->type = '1';// 1 = user; 2 = notary; 3 = admin;
            $user->password = bcrypt('password');
            $user->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $user->save();
            // Create Notary
            $user = new User();
            $user->name = "Нотариат";
            $user->email = 'notary@brainstall.team';
            $user->registration_number = 'ТА00000000';
            $user->type = '2';// 1 = user; 2 = notary; 3 = admin;
            $user->password = bcrypt('password');
            $user->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $user->save();
            // Create Admin
            $user = new User();
            $user->name = "Админ";
            $user->email = 'admin@brainstall.team';
            $user->registration_number = 'ТА00000001';
            $user->type = '3';// 1 = user; 2 = notary; 3 = admin;
            $user->password = bcrypt('password');
            $user->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $user->save();
            
    }
}
