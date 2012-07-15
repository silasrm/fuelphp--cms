<?php
class Controller_Admin_Foto extends Controller_Admin 
{

	public function action_index()
	{
		$data['fotos'] = Model_Foto::paginacao();
		$data['mensagem'] = Session::get_flash('success');

		$this->template->title = "Fotos";
		$this->template->content = View::forge('admin/foto/index', $data);

	}

	public function action_view($id = null)
	{
		$data['foto'] = Model_Foto::find($id);

		is_null($id) and Response::redirect('Admin_Foto');

		$this->template->title = "Fotos &raquo; Visualizando &raquo; " . $data['foto']->titulo;
		$this->template->content = View::forge('admin/foto/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$nomeArquivo = Model_Foto::upload();			

			$val = Model_Foto::validate('create');
			
			if ($val->run())
			{
				$foto = Model_Foto::forge(array(
					'titulo' => Input::post('titulo'),
					'arquivo' => $nomeArquivo,
				));

				if ($foto and $foto->save())
				{
					Cache::delete('galeria');
					Session::set_flash('success', 'Added foto #'.$foto->id.'.');

					Response::redirect('admin/foto');
				}

				else
				{
					Session::set_flash('error', 'Could not save foto.');
				}
			}
			else
			{
				Session::set_flash('error', 'Informe todos os campos. ' . Session::get_flash('error'));
			}
		}

		$this->template->title = "Fotos &raquo; Nova";
		$this->template->content = View::forge('admin/foto/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('Admin_Foto');

		$foto = Model_Foto::find($id);
		$arquivoAtual = $foto->arquivo;

		$nomeArquivo = Model_Foto::upload();

		$val = Model_Foto::validate('edit');

		if ($val->run())
		{
			$foto->titulo = Input::post('titulo');
			$foto->arquivo = $nomeArquivo;

			if ($foto->save())
			{
				Cache::delete('galeria');

				$arquivoAtualCompleto = DOCROOT . DS . 'files' . DS . $arquivoAtual;
				$arquivoAtualCompletoThumb = DOCROOT . DS . 'files' . DS . 'thumb' . DS . $arquivoAtual;

				if( file_exists($arquivoAtualCompleto) )
				{
					unlink($arquivoAtualCompleto);
					unlink($arquivoAtualCompletoThumb);
				}

				Session::set_flash('success', 'Updated foto #' . $id);

				Response::redirect('admin/foto');
			}

			else
			{
				Session::set_flash('error', 'Could not update foto #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$foto->titulo = $val->validated('titulo');
				$foto->arquivo = $val->validated('arquivo');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('foto', $foto, false);
		}

		$this->template->title = "Fotos &raquo; Editar &raquo; " . $foto->titulo;
		$this->template->content = View::forge('admin/foto/edit');

	}

	public function action_delete($id = null)
	{
		if ($foto = Model_Foto::find($id))
		{
			$arquivoAtual = $foto->arquivo;

			$foto->delete();
			Cache::delete('galeria');

			$arquivoAtualCompleto = DOCROOT . DS . 'files' . DS . $arquivoAtual;
			$arquivoAtualCompletoThumb = DOCROOT . DS . 'files' . DS . 'thumb' . DS . $arquivoAtual;

			if( file_exists($arquivoAtualCompleto) )
			{
				unlink($arquivoAtualCompleto);
				unlink($arquivoAtualCompletoThumb);
			}

			Session::set_flash('success', 'Deleted foto #'.$id);
		}
		else
		{
			Session::set_flash('error', 'Could not delete foto #'.$id);
		}

		Response::redirect('admin/foto');

	}
}