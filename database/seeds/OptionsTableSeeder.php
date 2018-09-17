<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $options = array(
        array(
          'nome' => 'site_name',
          'valor' => 'Unicodono'
        ),
        array(
          'nome' => 'credencial_pagseguro',
          'valor' => 'token'
        ),
        array(
          'nome' => 'site_status',
          'valor' => 'on'
        )
      );
      DB::table('options')->insert($options);
    }
}
