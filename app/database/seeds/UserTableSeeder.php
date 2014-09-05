<?php
/**
 * Created by PhpStorm.
 * User: vmuthu
 * Date: 5/8/14
 * Time: 1:25 PM
 */

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('user')->delete();

        User::create(array(
            'username' => 'muthu',
            'password' => Hash::make('muthu123')
        ));

        User::create(array(
            'username' => 'veera',
            'password' => Hash::make('muthu12')
        ));
    }

}