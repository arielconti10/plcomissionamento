<?php

use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert(
            [
                'name' => 'JUCIANE',
                'document' => '000.000.000-00',
                'email' => 'juciane@plprestadora.com.br',
                'shop_id   ' => '1',
            ],
            [
                'name' => 'VITOR',
                'document' => '000.000.000-00',
                'email' => 'vitor@plprestadora.com.br',
                'shop_id   ' => '2',
            ],
            [
                'name' => 'IRENE',
                'document' => '000.000.000-00',
                'email' => 'irene@plprestadora.com.br',
                'shop_id   ' => '1',
            ],
            [
                'name' => 'ROSY',
                'document' => '000.000.000-00',
                'email' => 'rosy@plprestadora.com.br',
                'shop_id   ' => '2',
            ]
        );
    }
}
