<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class NotesCest
{
    public function AddItem(AcceptanceTester $I, LoginCest $login, IndexCest $index){
        $index->toNotesSite($I, $login);
        $I->seeCurrentUrlEquals('/website/PingvinTodo/notes/notes.php');

        if ($I->tryToSee('Test note desc'))
        {
            $I->expect("Don't wanna add this note over and over again to site.");
        }else{
            $I->fillField('title','Notetitle');
            $I->fillField('desc','Test note desc');
            $I->click('addNote');
        }
    }

    public function CheckLogout(AcceptanceTester $I, LoginCest $login, IndexCest $index){
        $index->toNotesSite($I, $login);

        $I->click('body > header > div > div.userinfo > div.sign-out > a');
        $I->seeCurrentUrlEquals('/website/PingvinTodo/register_login/login.php');
    }
}
