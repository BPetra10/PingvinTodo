<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class TodoCest
{
    public function AddItem(AcceptanceTester $I, LoginCest $login, IndexCest $index){
        $index->toTodoSite($I, $login);
        $I->seeCurrentUrlEquals('/website/PingvinTodo/todo/todo.php');

        $I->fillField('task','Almaevés');
        $I->click('ADD');
        $I->see('Almaevés');
    }

    public function GoBackIndexPage(AcceptanceTester $I, LoginCest $login, IndexCest $index){
        $index->toTodoSite($I, $login);

        $I->click('body > div.parent > div:nth-child(1) > a');
        $I->seeCurrentUrlEquals('/website/PingvinTodo/register_login/index.php');
    }

    public function CheckLogout(AcceptanceTester $I, LoginCest $login, IndexCest $index){
        $index->toTodoSite($I, $login);

        $I->click('body > p > a');
        $I->seeCurrentUrlEquals('/website/PingvinTodo/register_login/login.php');
    }
}
