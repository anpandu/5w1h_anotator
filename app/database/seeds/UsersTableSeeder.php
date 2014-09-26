<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
        User::create(array(
            'username' => 'admin',
            'password' => Hash::make('admin'),
        ));
        User::create(array(
            'username' => 'guess',
            'password' => Hash::make('guess'),
        ));
    }

}