<?php

class Controller_Admin_Pagina extends Controller_Admin
{
	public function action_index()
	{
		$data['paginas'] = Model_Pagina::paginacao();
		$data['mensagem'] = Session::get_flash('success');

		$this->template->title = "Páginas";
		$this->template->content = View::forge('admin/pagina/index', $data);

	}

	public function action_view($id = null)
	{
		$data['pagina'] = Model_Pagina::find($id);

		is_null($id) and Response::redirect('Pagina');

		$this->template->title = "Páginas &raquo; Visualizar &raquo; " . $data['pagina']->titulo;
		$this->template->content = View::forge('admin/pagina/view', $data)->auto_filter(false);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Pagina::validate('create');
			
			if ($val->run())
			{
				$pagina = Model_Pagina::forge(array(
					'titulo' => Input::post('titulo'),
					'texto' => Input::post('texto'),
					'no_menu' => Input::post('no_menu'),
					'e_home' => Input::post('e_home'),
					'e_home' => Input::post('e_home'),
					'e_home' => Input::post('e_home'),
				));

				if ($pagina and $pagina->save())
				{
					if( $pagina['no_menu'] == 1 )
					{
						Cache::delete('menu');
					}

					Session::set_flash('success', 'Added pagina #'.$pagina->id.'.');

					Response::redirect('admin/pagina');
				}

				else
				{
					Session::set_flash('error', 'Could not save pagina.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Páginas &raquo; Nova";
		$this->template->content = View::forge('admin/pagina/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Pagina');

		$pagina = Model_Pagina::find($id);

		$val = Model_Pagina::validate('edit');

		if ($val->run())
		{
			$pagina->titulo = Input::post('titulo');
			$pagina->texto = Input::post('texto');
			$pagina->no_menu = Input::post('no_menu');
			$pagina->e_home = Input::post('e_home');

			if ($pagina->save())
			{
				Cache::delete('pagina_titulo_' . $id);
				Cache::delete('pagina_' . $id);

				if( $pagina->no_menu == 1 )
				{
					Cache::delete('menu');
				}

				Session::set_flash('success', 'Updated pagina #' . $id);

				Response::redirect('admin/pagina');
			}

			else
			{
				Session::set_flash('error', 'Could not update pagina #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$pagina->titulo = $val->validated('titulo');
				$pagina->texto = $val->validated('texto');
				$pagina->no_menu = $val->validated('no_menu');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('pagina', $pagina, false);
		}

		$this->template->title = "Páginas &raquo; Editar &raquo; " . $pagina->titulo;
		$this->template->content = View::forge('admin/pagina/edit');

	}

	public function action_delete($id = null)
	{
		if ($pagina = Model_Pagina::find($id))
		{
			$pagina->delete();
			Cache::delete('pagina_titulo_' . $id);
			Cache::delete('pagina_' . $id);

			if( $pagina->no_menu == 1 )
			{
				Cache::delete('menu');
			}

			Session::set_flash('success', 'Deleted pagina #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete pagina #'.$id);
		}

		Response::redirect('admin/pagina');

	}
}