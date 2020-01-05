<?php

use Illuminate\Database\Seeder;
use App\Role;
class roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $inbox = new Role();
        $inbox->name = 'user';
        $inbox->description = 'Үйлчлүүлэгч';
        $inbox->save();


        $home = new Role();
        $home->name = 'notary';
        $home->description = 'Нотариат';
        $home->save();

        $comment = new Role();
        $comment->name = 'admin';
        $comment->description = 'Админ';
        $comment->save();
    }
}