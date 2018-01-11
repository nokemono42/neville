<?php
/**
 * Neville Model Class
 *
 * @package		Neville
 * @since		0.1.0
 */
	abstract class Model {
		protected $registry;

		/**
		 * Load registry for Model Class
		 *
		 * @param array
		 */
		public function __construct($registry) {
			$this->registry = $registry;
		}

		/**
		 * Retrieve value
		 *
		 * @param string
		 *
		 * @returns string
		 */
		public function __get($key) {
			return $this->registry->get($key);
		}

		/**
		 * Set value
		 *
		 * @param string
		 * @param string
		 */
		public function __set($key, $value) {
			$this->registry->set($key, $value);
		}
	}