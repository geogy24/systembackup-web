<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_type')->insert([
            'name' => 'admin',
        ]);
        
        DB::table('users_type')->insert([
            'name' => 'client',
        ]);
        
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'business' => '',
            'user_type_id' => 1
        ]);
        
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => 'cliente@cliente.com',
            'password' => bcrypt('cliente'),
            'business' => 'prueba',
            'user_type_id' => 2
        ]);
    }
}
