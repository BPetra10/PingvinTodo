<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class IndexCest
{
    public function tryPage(AcceptanceTester $I, LoginCest $login)
    {
        $login->tryLoginSuccess($I);
        $I->seeCurrentUrlEquals('/website/PingvinTodo/register_login/index.php');

        $I->see('PenguinTODO');
    }

    public function toTodoSite(AcceptanceTester $I, LoginCest $login){
        $login->tryLoginSuccess($I);
        $I->click("body > div.button-container > div:nth-child(1) > a");
    }

    public function toNotesSite(AcceptanceTester $I, LoginCest $login){
        $login->tryLoginSuccess($I);
        $I->click("body > div.button-container > div:nth-child(2) > a");
    }

    public function signOut(AcceptanceTester $I, LoginCest $login)
    {
        $login->tryLoginSuccess($I);
        $I->click("body > header > div > div.userinfo > div.sign-out > a");
        $I->seeCurrentUrlEquals('/website/PingvinTodo/register_login/login.php');
    }
}
