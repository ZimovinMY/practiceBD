<?php

use App\Models\AdminUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::factory(2)->create();
        //AdminUser::factory(1)->create([
        //   "name" => "Admin",
        //    "email" => "ZimovinMY@mpei.ru",
        //    "password" => bcrypt("12345")
        //]);
    }
}
