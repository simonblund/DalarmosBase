<?php

use Illuminate\Database\Seeder;

class incidentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Incident::class, 50)->create()->each(function ($u) {
        $u()->save(factory(App\Incident::class)->make());
    });
    }
}
