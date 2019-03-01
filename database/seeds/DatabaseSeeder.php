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
        // DB::table('users')->delete();
        $data=\App\User::where('email', '=', 'israj.haliri@gmail.com')->delete();

        DB::table('users')->insert([
        'name' => 'Israj Haliri',
        'email' => 'israj.haliri@gmail.com',
        'password' =>  Hash::make('12345678'),
        'avatar' =>  'me.jpg',         
        'address' =>  'Cidadap Rt 003/002 Sukaraja Sukabumi',         
        'phone' =>  '085862624149',         
        'created_at' =>  date("Y-m-d H:i:s") ,        
        'updated_at' =>  date("Y-m-d H:i:s"),
        ]);
    }
}
