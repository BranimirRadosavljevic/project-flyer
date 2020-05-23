<?php

use App\Flyer;
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
        Flyer::truncate();
        factory(Flyer::class, 10)->create();
    }
}
