<?php

use App\Flyer;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class FlyerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->flyers();
        Schema::enableForeignKeyConstraints();
    }

    protected function flyers()
    {
        User::truncate();
        Flyer::truncate();
        factory(Flyer::class, 10)->create();
    }
}
