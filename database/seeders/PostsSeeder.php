<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('posts')->insert(
            array(
                0 => array(
                    'category_id'         => 1,
                    'title'  => 'Este es un post en el ambito de deportes',
                    'summary'=> 'El resumen del post',
                    'image' => '',
                    'description' => 'Esta es la descripcion del post',
                    'author' => 'anonimo'
                ),
                1 => array(
                    'category_id'         => 2,
                    'title'  => 'Este es un post de finanzas',
                    'summary'=> 'El resumen del post de finanzas',
                    'image' => '',
                    'description' => 'Esta es la descripcion del post en la categoria de finanzas',
                    'author' => 'Luis'
                )
            )
        );
    }
}
