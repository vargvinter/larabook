<?php namespace Larabook\Handlers;

use Laracasts\Commander\Events\EventListener;
use Larabook\Registration\Events\UserHasRegistered;
use Larabook\Mailers\UserMailer;

/**
* 
*/
class EmailNotifier extends EventListener {
	
	protected $userMailer;

	public function __construct(UserMailer $userMailer)
	{
		$this->userMailer = $userMailer;
	}

	public function whenUserHasRegistered(UserHasRegistered $event)
	{
		$this->userMailer->sendWelcomeMessageTo($event->user);
	}

}