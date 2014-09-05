<?php
/**
 * Created by PhpStorm.
 * User: vmuthu
 * Date: 5/10/14
 * Time: 6:04 PM
 */

return array(
    'default' => 'sqlite',
    'connections' => array(
        'sqlite' => array(
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => ''
        ),
    )
);