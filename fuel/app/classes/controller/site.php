<?php

/**
 * @todo Por editor html simples OK
 * @todo Por cache nas páginas OK
 * @todo Criar favicon e icons restantes
 */
class Controller_Site extends Controller_Template
{
	public function before()
	{
		parent::before();

		$this->template->paginaAtiva = null;

		try
		{
			// Cache::delete('menu');
			$menu = Cache::get('menu');
		}
		catch( CacheNotFoundException $e )
		{
			$menu = Model_Pagina::menu();

			Cache::set('menu', $menu);
		}

		$this->template->menu = $menu;
	}

	public function action_index()
	{
		try
		{
			// Cache::delete('home_titulo');
			// Cache::delete('home');
			// Cache::delete('home_id');

			$titulo = Cache::get('home_titulo');
			$conteudo = Cache::get('home');
			$id = Cache::get('home_id');
		}
		catch( CacheNotFoundException $e )
		{
			$pagina = Model_Pagina::find('first', array( 'where' => array(array('e_home', 1)) ));
			$titulo = $pagina->titulo;
			$id = $pagina->id;
			$conteudo = View::forge('site/ver', array('pagina' => $pagina))->auto_filter(false);

			Cache::set('home_titulo', $titulo);
			Cache::set('home', $conteudo);
			Cache::set('home_id', $pagina->id);
		}
		
		$this->template->paginaAtiva = $id;
		$this->template->title = '';
		$this->template->content = $conteudo;
	}

	public function action_404()
	{
		$this->template->title = 'Página não encontrada - Erro 404 | ';
		$this->template->content = View::forge('site/404');
	}

	public function action_ver()
	{
		$id = $this->param('id');
		
		try
		{
			$titulo = Cache::get('pagina_titulo_' . $id);
			$conteudo = Cache::get('pagina_' . $id);
		}
		catch( CacheNotFoundException $e )
		{
			echo 111;
			$pagina = Model_Pagina::find($id);
			$titulo = $pagina->titulo;
			$conteudo = View::forge('site/ver', array('pagina' => $pagina))->auto_filter(false);

			Cache::set('pagina_titulo_' . $id, $titulo);
			Cache::set('pagina_' . $id, $conteudo);
		}
		
		$this->template->paginaAtiva = $id;
		$this->template->title = $titulo . ' | ';
		$this->template->content = $conteudo;
	}
}