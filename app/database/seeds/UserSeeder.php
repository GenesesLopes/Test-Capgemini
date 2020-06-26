<?php

use Illuminate\Database\Seeder;
use App\{
    User
};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Nome Usuário';
        $user->email = 'email@gmail.com';
        $user->cpf = '924.197.010-38';
        $user->agency = '12-4';
        $user->account = '00.778-13';
        $user->save();
    }
}
