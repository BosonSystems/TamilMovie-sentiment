<?php
/**
 * Created by PhpStorm.
 * User: vmuthu
 * Date: 5/10/14
 * Time: 5:46 PM
 */

class UserTest extends TestCase {
    public function testThatTrueIsTrue()
    {
        $this->assertTrue(true);
    }
    /**
     * Username is required
     */
    public function testUsernameIsRequired()
    {
        // Create a new User
        $user = new User;
        $user->email = "phil@ipbrown.com";
        $user->password = "password";
        $user->username = "phil";

        // User should not save
        $this->assertFalse($user->save());

        // Save the errors
        $errors = $user->errors()->all();

        // There should be 1 error
        $this->assertCount(1, $errors);

        // The username error should be set
        $this->assertEquals($errors[0], "The username field is required.");
    }
}