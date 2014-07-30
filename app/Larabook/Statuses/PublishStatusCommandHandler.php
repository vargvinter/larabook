<?php namespace Larabook\Statuses;

use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;
use Larabook\Statuses\StatusRepository;
use Larabook\Statuses\Status;

/**
* 
*/
class PublishStatusCommandHandler implements CommandHandler {
	
	use DispatchableTrait;

	protected $repository;

	public function __construct(StatusRepository $repository)
	{
		$this->repository = $repository;
	}

	public function handle($command)
	{
		$status = Status::publish($command->body);
		$status = $this->repository->save($status, $command->userId);
		$this->dispatchEventsFor($status);

		return $status;

	}
}