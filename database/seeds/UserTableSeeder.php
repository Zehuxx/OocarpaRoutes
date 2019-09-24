<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use MongoDB\BSON\ObjectID; 
class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::connection('mongodb')->collection('users')->delete();
        DB::connection('mongodb')->collection('users')->insert([
        	'role_id' => new ObjectID("5d607f9db2d1b72ef0ec1366"),
        	'name' => 'admin',
        	'last_name' => 'Lopez',
        	'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'), // secret
            'user_img' => str_random(10),
        ]);
        DB::connection('mongodb')->collection('users')->insert([
            'role_id' => new ObjectID("5d607fa9b2d1b72ef0ec1367"),
            'name' => 'user',
            'last_name' => 'Lopez',
            'email' => 'user@gmail.com',
            'password' => bcrypt('secret'), // secret
            'user_img' => str_random(10),
        ]);
        DB::connection('mongodb')->collection('users')->insert([
            'role_id' => new ObjectID("5d607fb2b2d1b72ef0ec1368"),
            'name' => 'company',
            'last_name' => 'Lopez',
            'email' => 'company@gmail.com',
            'password' => bcrypt('secret'), // secret
            'user_img' => str_random(10),
        ]);
    }
}
