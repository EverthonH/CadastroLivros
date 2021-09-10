<?php

namespace Database\Seeders;

use App\Models\Livro;
use App\Models\User;
use Illuminate\Database\Seeder;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $users = User::all();
        foreach($users as $user){
            Livro::factory(2)->create([
                'user_id' => $user->id
            ]);
        }
    }
}
