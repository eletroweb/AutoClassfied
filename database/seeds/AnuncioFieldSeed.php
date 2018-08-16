<?php

use Illuminate\Database\Seeder;

class AnuncioFieldSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('anuncio_fields')->insert([
          'nome' => 'Cor',
          'meta_nome' => 'cor',
          'type' => 'text',
          'place_holder' => 'Digite a cor do veículo',
          'step' => 0,
          'helpText' => 'Esta informação será útil na busca por veículos',
      ]);
      DB::table('anuncio_fields')->insert([
          'nome' => 'Cambio',
          'meta_nome' => 'cambio',
          'type' => 'text',
          'place_holder' => 'Digite o cambio do veículo',
          'step' => 0,
          'helpText' => 'Esta informação será útil na busca por veículos',
      ]);
      DB::table('anuncio_fields')->insert([
          'nome' => 'Km',
          'meta_nome' => 'km',
          'type' => 'number',
          'place_holder' => 'Digite a quilometragem do veículo',
          'step' => 0,
          'helpText' => 'Esta informação será útil na busca por veículos',
      ]);
      DB::table('anuncio_fields')->insert([
          'nome' => 'Combustível',
          'meta_nome' => 'combustivel',
          'type' => 'text',
          'place_holder' => 'Digite o tipo de combustível do veículo',
          'step' => 0,
          'helpText' => 'Esta informação será útil na busca por veículos',
      ]);
      DB::table('anuncio_fields')->insert([
          'nome' => 'Placa',
          'meta_nome' => 'placa',
          'type' => 'text',
          'place_holder' => 'Digite a placa do veículo',
          'step' => 0,
          'helpText' => 'Esta informação será útil na busca por veículos',
      ]);
    }
}
