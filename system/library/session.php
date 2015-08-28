<?php
	class Session {
		public $data = array();

	  	public function __construct() {
			if (!session_id()) {
				ini_set('session.use_only_cookies', 'On');
				ini_set('session.cookie_httponly', 'On');

				session_set_cookie_params(30000, '/', DOMAIN);

				session_start();
				session_name(SESSION_NAME);
			}

			$this->data =& $_SESSION;
		}

		public function getId() {
			return session_id();
		}

		public function destroy() {
			return session_destroy();
		}
	}
?>
