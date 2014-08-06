<?php 
$I = new FunctionalTester($scenario);

$I->am('a Larabook member');
$I->wantTo('follow other Larabook users');

//setup
$I->haveAnAccount(['username' => 'OtherUser']);
$I->signIn();


//actions
$I->click('Browse users');
$I->click('OtherUser');

$I->seeCurrentUrlEquals('/@OtherUser');
$I->click('Follow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->see('You are following OtherUser');
$I->dontSee('Follow OtherUser');

//expectations