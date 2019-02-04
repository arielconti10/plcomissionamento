<?php

use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shops')->insert(
            [
              'name' => 'Ermelino',
              'address' => 'Av. Paranaguá, 1442'
            ]);
        DB::table('shops')->insert(
        [
                'name' => 'São Miguek',
                'address' => 'Av. Nordestina, 584'
            ]
        );
    }
}
