<?php //el seeder realiza cambios en los registros de las tablas

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert(
            array(
                0 => array(
                    'name'         => 'Deportes',
                    'description'  => 'Categoria para el ambito de deportes'
                ),
                1 => array(
                    'name'         => 'Finanzas',
                    'description'  => 'Categoria de Finanzas'
                )
            )
        );
    }
}
