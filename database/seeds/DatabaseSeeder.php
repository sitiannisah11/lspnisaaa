<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LabaSeeder::class);
        $this->call(StokppnSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(KategoriSeeder::class);
        $this->call(CurSeeder::class);
        $this->call(TokoSeeder::class);
        $this->call(UserSeeder::class);
    }
}
