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

        User::create(array('username' => 'alpha', 'password' => Hash::make('alpha'), ));
        User::create(array( 'username' => 'bravo', 'password' => Hash::make('bravo'), ));
        User::create(array( 'username' => 'charlie', 'password' => Hash::make('charlie'), ));
        User::create(array( 'username' => 'abc', 'password' => Hash::make('abc'), ));

        User::create(array('username' => 'delta', 'password' => Hash::make('delta'), ));
        User::create(array( 'username' => 'echo', 'password' => Hash::make('echo'), ));
        User::create(array( 'username' => 'foxtrot', 'password' => Hash::make('foxtrot'), ));
        User::create(array( 'username' => 'def', 'password' => Hash::make('def'), ));

        User::create(array('username' => 'golf', 'password' => Hash::make('golf'), ));
        User::create(array( 'username' => 'hotel', 'password' => Hash::make('hotel'), ));
        User::create(array( 'username' => 'india', 'password' => Hash::make('india'), ));
        User::create(array( 'username' => 'ghi', 'password' => Hash::make('ghi'), ));
    }

}