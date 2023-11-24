<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class LoginCest
{
    public function tryPage(AcceptanceTester $I)
   {
       $I->amOnPage('/register_login/login.php');
       $I->see('Login');
   }

   public function tryLoginSuccess(AcceptanceTester $I)
   {
       $I->amOnPage('/register_login/login.php');
       $I->fillField('user_name','Admin123');
       $I->fillField('password','Admin123*');
       $I->click('Login');
       $I->seeCurrentUrlEquals('/website/PingvinTodo/register_login/index.php');
   }

   public function tryLoginFail(AcceptanceTester $I)
   {
       $I->amOnPage('/register_login/login.php');
       $I->amGoingTo('submit user form with invalid values');
       $I->fillField('user_name','Admin123');
       $I->click('Login');
       $I->expect('the form is not valid');
       $I->see('Warning! Please enter some valid information!');
       $I->seeCurrentUrlEquals('/website/PingvinTodo/register_login/login.php');
   }

   public function clickToSignUpInLogin(AcceptanceTester $I)
   {
       $I->amOnPage('/register_login/login.php');
       $I->click('a');
       $I->seeCurrentUrlEquals('/website/PingvinTodo/register_login/signup.php');
   }
}
