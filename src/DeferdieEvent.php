<?php

namespace deferdie\Event;

use Illuminate\Http\Request;
use \App\Event;

class DeferdieEvent
{
	/**
	 * The event Model
	 * @var Model
	 */
	private $event;

	public function __construct(Event $e)
	{
		$this->event = $e;
	}

	public function hi()
	{
		dd('Hey');
	}

	/**
	 * Return all of the active events
	 * @return collection of events
	 */
	public function all($type)
	{
		if ($type == 2)
		{
			return $this->event->get();
		}

		return $this->event->where('active', $type)->get();
	}

	/**
	 * Return an event
	 * @return A single event
	 */
	public function show($id, $status)
	{
		if ($status == 1)
		{
			return $this->event->where('id', $id)->where('active', $status)->firstOrFail();
		}
		return $this->event->where('id', $id)->firstOrFail();
	}

	/**
	 * Create an event
	 * @return success
	 */
	public function create(Request $event, $userID)
	{
		$this->event->create([
			'user_id' => $userID,
			'title' => $event->eventTitle,
			'date' => $event->eventDate,
			'image' => $event->file('eventImage')->store('event'),
			'description' => $event->description,
			'canBook' => 1,
			'active' => 0,
		]);
	}

	/**
	 * Update an event
	 * @param  EventID $event  The event ID
	 * @param  The Request $update The update
	 * @return Success
	 */
	public function update($event, $update)
	{
		$eventToUpdate = $this->event->where('id', $event)->firstOrFail();

		$eventToUpdate->title = $update->eventTitle;
		$eventToUpdate->date = $update->eventDate;
		$eventToUpdate->description = $update->description;

		$eventToUpdate->save();

		return $eventToUpdate;
	}

	/**
	 * Delete an event
	 * @param  EventID $event The event to delete
	 * @return Success
	 */
	public function delete($event)
	{
		$event = $this->event->where('id', $event)->firstOrFail();
		$event->delete();
	}

}
