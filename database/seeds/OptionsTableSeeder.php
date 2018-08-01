<?php

use Illuminate\Database\Seeder;

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
          'nome' => 'pagseguro_token',
          'valor' => 'token'
        ),
        array(
          'nome' => 'site_status',
          'valor' => 'on'
        )
      );
      DB::table('users')->insert($options);
    }
}
