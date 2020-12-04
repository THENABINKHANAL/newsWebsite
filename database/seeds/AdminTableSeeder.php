<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=new Admin();
        $admin->name="admin";
        $admin->password=Hash::make("admin123");
        $admin->save();
    }
}
