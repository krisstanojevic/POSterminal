<?php

use Illuminate\Database\Seeder;
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->delete();
        Article::create(array(
            'name'     => 'Paper',
            'price'    => '2',
        ));
        Article::create(array(
            'name'     => 'Notebook',
            'price'    => '80',
        ));
        Article::create(array(
            'name'     => 'Backpack',
            'price'    => '2000',
        ));
        Article::create(array(
            'name'     => 'Ink',
            'price'    => '300',
        ));
        Article::create(array(
            'name'     => 'Glass',
            'price'    => '100',
        ));
        Article::create(array(
            'name'     => 'Plate',
            'price'    => '150',
        ));
        Article::create(array(
            'name'     => 'Knife',
            'price'    => '500',
        ));
        Article::create(array(
            'name'     => 'Spoon',
            'price'    => '50',
        ));
        Article::create(array(
            'name'     => 'Fork',
            'price'    => '50',
        ));
        Article::create(array(
            'name'     => 'Table',
            'price'    => '6000',
        ));
        Article::create(array(
            'name'     => 'Chair',
            'price'    => '4500',
        ));
        Article::create(array(
            'name'     => 'Pencile',
            'price'    => '180',
        ));
        Article::create(array(
            'name'     => 'Eraser',
            'price'    => '120',
        ));
        Article::create(array(
            'name'     => 'Window',
            'price'    => '20000',
        ));
        Article::create(array(
            'name'     => 'Printer',
            'price'    => '36000',
        ));
        Article::create(array(
            'name'     => 'Toner',
            'price'    => '230',
        ));
        Article::create(array(
            'name'     => 'Stapler',
            'price'    => '3450',
        ));        
        Article::create(array(
            'name'     => 'Paper clip (10 pieces)',
            'price'    => '30',
        ));
        Article::create(array(
            'name'     => 'Scissors',
            'price'    => '560',
        ));
        
    }
}
