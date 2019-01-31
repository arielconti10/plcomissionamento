<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert(
            [
                'document' => '914.461.128-53',
                'name' => 'MARIA IRIS NOGUEIRA',
                'telephone' => '11-966478109',
            ],
            [
                'document' => '173.466.168-20',
                'name' => 'SANDRA MARIA NUNES LAZARO',
                'telephone' => '11-958425842',
            ],
            [
                'document' => '493.604.938-72',
                'name' => 'VALDECI ANDRADE AMORIN',
                'telephone' => '11-35360414',
            ],
            [
                'document' => '136.115.248-67',
                'name' => 'CARLOS ROBERTO DOS SANTOS',
                'telephone' => '11-25457360',
            ],
            [
                'document' => '030.209.318-43',
                'name' => 'RAIMUNDO FERREIRA DOS SANTOS',
                'telephone' => '11-965987864',
            ]
            );
    }
}
