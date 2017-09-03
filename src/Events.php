<?php

	namespace CzProject\Events;


	class Events
	{
		/** @var array  [event => handlers] */
		private $events = array();


		/**
		 * @param  string[]
		 */
		public function __construct(array $events)
		{
			foreach ($events as $event) {
				$this->events[$event] = array();
			}
		}


		/**
		 * @param  string
		 * @param  callback
		 * @return self
		 * @throws InvalidArgumentException
		 */
		public function addHandler($event, $handler)
		{
			if (!isset($this->events[$event])) {
				throw new InvalidArgumentException("Unknow event '$event'.");
			}

			$this->events[$event][] = $handler;
			return $this;
		}


		/**
		 * @param  string
		 * @return void
		 */
		public function fireEvent($event/*, ... */)
		{
			if (!isset($this->events[$event])) {
				throw new InvalidArgumentException("Unknow event '$event'.");
			}

			$args = func_get_args();
			array_shift($args);

			foreach ($this->events[$event] as $handler) {
				call_user_func_array($handler, $args);
			}
		}
	}
