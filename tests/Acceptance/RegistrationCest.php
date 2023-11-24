<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

define("REG", "/register_login/signup.php");

class RegistrationCest
{
    public function tryPage(AcceptanceTester $I)
    {
        $I->amOnPage(REG);
        $I->see('Sign Up');
    }

    public function tryWrongRegister(AcceptanceTester $I)
    {
        $I->amOnPage(REG);
        $I->amGoingTo('submit user form with invalid values');
        $I->fillField('user_name','Admin123');
        $I->click('button');
        $I->expect('the form is not valid');
        $I->see('Sign up Warning! All fields must be filled in!');
        $I->seeCurrentUrlEquals('/website/PingvinTodo/register_login/signup.php');
    }

    public function clickToLoginInSignUp(AcceptanceTester $I)
    {
        $I->amOnPage(REG);
        $I->click('a');
        $I->seeCurrentUrlEquals('/website/PingvinTodo/register_login/login.php');
    }
}
