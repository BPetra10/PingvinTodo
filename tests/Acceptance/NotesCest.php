<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class NotesCest
{
    public function AddItem(AcceptanceTester $I, LoginCest $login, IndexCest $index){
        $index->toNotesSite($I, $login);
        $I->seeCurrentUrlEquals('/website/PingvinTodo/notes/notes.php');

        $I->fillField('title','Notetitle');
        $I->fillField('desc','Test note desc');
        $I->click('addNote');
        $I->see('Test note desc');
    }

    public function CheckLogout(AcceptanceTester $I, LoginCest $login, IndexCest $index){
        $index->toNotesSite($I, $login);

        $I->click('body > header > div > div.userinfo > div.sign-out > a');
        $I->seeCurrentUrlEquals('/website/PingvinTodo/register_login/login.php');
    }
}
