<?php namespace Larabook\Statuses\Events;

use Larabook\Statuses\Status;

/**
* 
*/
class StatusWasPublished
{
	
	public $status;

	function __construct(Status $status)
	{
		$this->status = $status;
	}
}