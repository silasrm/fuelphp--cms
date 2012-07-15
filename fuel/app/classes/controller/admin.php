<?php

class Controller_Admin extends Controller_Template
{
	public $template = 'template_admin';

	public function before()
	{
		parent::before();
		 
		if( !Auth::has_access(array($this->request->controller, $this->request->action)) 
			&& !in_array(Request::active()->action, array('login','sair')) )
		{
			Response::redirect('admin');
		}

		$this->template->controller = Request::active()->controller;
	}

	public function action_login()
	{
		if( Auth::check() )
		{
			Response::redirect('admin/pagina');
		}

		$view = View::forge('admin/login');
	    $auth = Auth::instance();
	    $form = Form::forge('login');
	    $form->add('username', 'Username:');
	    $form->add('password', 'Password:', array('type' => 'password'));
	    $form->add('submit', ' ', array('type' => 'submit', 'value' => 'Login', 'class' => 'btn btn-primary'));
	    if($_POST)
	    {
	        if($auth->login(Input::post('username'), Input::post('password')))
	        {
	            Session::set_flash('success', 'Successfully logged in! Welcome '.$auth->get_screen_name());
	            Response::redirect('admin/pagina');
	        }
	        else
	        {
	            Session::set_flash('error', 'Username or password incorrect.');
	        }
	    }
	    $view->set('form', $form, false);

		$this->template->title = 'Admin &raquo; Index';
		$this->template->content = $view;
	}

	public function action_sair()
	{
	    $auth = Auth::instance();
	    $auth->logout();
	    Session::set_flash('success', 'Desconectado.');
	    Response::redirect('admin');
	}
}