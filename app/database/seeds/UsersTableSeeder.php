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
        User::create(array(
            'username' => 'alpha',
            'password' => Hash::make('alpha'),
        ));
        User::create(array(
            'username' => 'bravo',
            'password' => Hash::make('bravo'),
        ));
        User::create(array(
            'username' => 'charlie',
            'password' => Hash::make('charlie'),
        ));
    }

}