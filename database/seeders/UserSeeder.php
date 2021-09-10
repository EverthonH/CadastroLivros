<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<= 5;$i++){
            \App\Models\User::factory(1)->create([
                'email' => 'user' . $i. '@email.com'
            ]);
        }
    }
}
