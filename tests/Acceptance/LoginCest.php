<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

define("PAGE", "/register_login/login.php");

class LoginCest
{
    public function tryPage(AcceptanceTester $I)
   {
       $I->amOnPage(PAGE);
       $I->see('Login');
   }

   public function tryLoginSuccess(AcceptanceTester $I)
   {
       $I->amOnPage(PAGE);
       $I->fillField('user_name','Admin123');
       $I->fillField('password','Admin123*');
       $I->click('button');
   }

   public function tryLoginFail(AcceptanceTester $I)
   {
       $I->amOnPage(PAGE);
       $I->amGoingTo('submit user form with invalid values');
       $I->fillField('user_name','Admin123');
       $I->click('button');
       $I->expect('the form is not valid');
       $I->see('Warning! Please enter some valid information!');
       $I->seeCurrentUrlEquals('/website/PingvinTodo/register_login/login.php');
   }

   public function clickToSignUpInLogin(AcceptanceTester $I)
   {
       $I->amOnPage(PAGE);
       $I->click('a');
       $I->seeCurrentUrlEquals('/website/PingvinTodo/register_login/signup.php');
   }
}