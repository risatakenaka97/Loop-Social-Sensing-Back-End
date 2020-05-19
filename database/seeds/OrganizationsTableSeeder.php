<?php

use App\Http\Organization\Model\Organization;
use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Organization::class, 10)->create();
    }
}
