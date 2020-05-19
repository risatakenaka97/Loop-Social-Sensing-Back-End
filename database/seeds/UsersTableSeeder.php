<?php

use App\Http\User\Model\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 50)->create();
    }
}
