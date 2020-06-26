<?php

use Illuminate\Database\Seeder;
use App\{
    User,
    Historic
};
use Illuminate\Support\Facades\DB;

class HistoricSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();
            $user = User::find(1);
            $user->balance = 500.00;
            $user->save();
            $user->historic()->save(
                new Historic(['action' => 'deposit', 'value' => 500.00])
            );
            $user->balance = 200.00;
            $user->save();
            $user->historic()->save(
                new Historic(['action' => 'withdraw', 'value' => 300.00])
            );
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
