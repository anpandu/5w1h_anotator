<?php

class ArticlesTableSeeder extends Seeder {

    public function run()
    {
        Article::create(array(
            'title' => 'example',
            'text' => 'the quick brown fox jumps over a lazy dog'
        ));
    }

}