<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')
          ->insert([
              [
                  'name'     => 'Cryborg',
                  'email'    => 'cryborg.live@gmail.com',
                  'password' => bcrypt('password'),
              ],
              [
                  'name'     => 'Saromase',
                  'email'    => 'seiteromain.dev@gmail.com',
                  'password' => bcrypt('password'),
              ]
          ]);
    }
}
