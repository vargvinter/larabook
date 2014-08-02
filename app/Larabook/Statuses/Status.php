<?php namespace Larabook\Statuses;

use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;
use Larabook\Statuses\Events\StatusWasPublished;
use Eloquent;

/**
* 
*/
class Status extends Eloquent {
	
	use EventGenerator, PresentableTrait;

	protected $fillable = ['body'];

	protected $presenter = 'Larabook\Statuses\StatusPresenter';

	public function user()
	{
		return $this->belongsTo('Larabook\Users\User');
	}

	public static function publish($body)
	{
		$status = new static(compact('body'));

		$status->raise(new StatusWasPublished($status));

		return $status;
	}

}