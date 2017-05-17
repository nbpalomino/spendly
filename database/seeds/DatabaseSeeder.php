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
        // $this->call('UsersTableSeeder');
        factory(App\User::class, 4)->create();
        factory(App\Group::class, 2)->create()->each(function($u) { $u->users()->save(App\User::find(1)); });
        factory(App\Item::class, 10)->create();
    }
}
