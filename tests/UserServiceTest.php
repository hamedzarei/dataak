<?php

/**
 * Created by PhpStorm.
 * User: zrhm7232
 * Date: 1/31/20
 * Time: 3:21 PM
 */
class UserServiceTest extends TestCase
{
    public function testGetItemBy()
    {
        $item = \App\Http\Services\UserService::getItemBy('id', 1);

        $this->assertTrue(array_key_exists('name', $item));
    }
}