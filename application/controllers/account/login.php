<?php
/**
 * Neville Controller Account Login
 *
 * @package		Neville
 * @since		0.8.0
 */
class ControllerAccountLogin extends Controller {
	/**
	 * Index
	 */
	public function index() {
		if ($this->user->isLoggedIn()) {
			$this->response->redirect($this->url->link('common/home', '', ''));
		}

		$data['error'] = '';

		if ($this->request->post) {
			$email = $this->request->post['email'];
			$password = $this->request->post['password'];

			if ($email && $password) {
				$this->user->login($email, $password);


				if ($this->user->isLoggedIn()) {
					$this->response->redirect($this->url->link('common/home', '', ''));
				}
			} else {
				$data['error'] = 'Invalid email or password.';
			}
		}

		$this->document->setTitle('Login');
		$this->document->setClass('login');

		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('account/login', $data));
	}
}
