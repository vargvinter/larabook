<?php 
$I = new FunctionalTester($scenario);

$I->am('a Larabook member');
$I->wantTo('view my profile');

$I->signIn();
$I->postAStatus('My status');

$I->click('Your profile');
$I->seeCurrentUrlEquals('/@Foobar');

$I->see('My status');