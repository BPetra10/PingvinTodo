<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class RegistrationCest
{
    public function tryPage(AcceptanceTester $I)
    {
        $I->amOnPage('/register_login/signup.php');
        $I->see('Sign Up');
    }

    public function tryWrongRegister(AcceptanceTester $I)
    {
        $I->amOnPage('/register_login/signup.php');
        $I->amGoingTo('submit user form with invalid values');
        $I->fillField('user_name','Admin123');
        $I->click('Sign up!');
        $I->expect('the form is not valid');
        $I->see('Sign up Warning! All fields must be filled in!');
        $I->seeCurrentUrlEquals('/website/PingvinTodo/register_login/signup.php');
    }

    public function clickToLoginInSignUp(AcceptanceTester $I)
    {
        $I->amOnPage('/register_login/signup.php');
        $I->click('a');
        $I->seeCurrentUrlEquals('/website/PingvinTodo/register_login/login.php');
    }
}
