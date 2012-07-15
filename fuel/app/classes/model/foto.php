<?php
use Orm\Model;

class Model_Foto extends Model
{
	protected static $_properties = array(
		'id',
		'titulo',
		'arquivo',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('titulo', 'Titulo', 'required|max_length[255]');
		// $val->add_field('arquivo', 'Arquivo', 'required|max_length[255]');

		return $val;
	}

	public static function upload()
	{
		$configUpload = array(
			'path' => DOCROOT.DS.'files',
			'randomize' => true,
			'ext_whitelist' => array('img', 'jpg', 'jpeg', 'gif', 'png'),
		);

		Upload::process($configUpload);
		
		$nomeArquivo = null;
		if( Upload::is_valid() )
		{
		    Upload::save();

		    $dados = Upload::get_files('arquivo');
		    $nomeArquivo = $dados['saved_as'];

		    $original = $dados['saved_to'] . $dados['saved_as'];
		    $originalDestino = $dados['saved_to'] . $dados['saved_as'];
		    $thumbnailDestino = $dados['saved_to'] . 'thumb' . DS . $dados['saved_as'];

		    $imagemOriginal = Image::load($original);
		    $imagemOriginal->preset('thumb')->save($thumbnailDestino);
		    $imagemOriginal->preset('qualidade')->save($originalDestino);
		}
		else
		{
			Session::set_flash('error', 'Arquivo inválido. Verifique o formato e o tamanho.');
		}

		return $nomeArquivo;
	}

	public static function buscaTagGaleria($conteudo)
	{
		if( stripos($conteudo, '[fotos]') )
		{
			try
			{
				$conteudo = Cache::get('galeria');
			}
			catch( CacheNotFoundException $e )
			{
				$data = self::find('all');
				$galeria = View::forge('admin/foto/_galeria', array('fotos' => $data));

				$conteudo = str_ireplace('[fotos]', $galeria, $conteudo);

				Cache::set('galeria', $conteudo);
			}
		}

		return $conteudo;
	}

	public static function paginacao()
	{
		$config = array(
			'pagination_url' => Uri::base(false) . 'admin/foto/index',
			'total_items' => self::count(),
		);

		Pagination::set_config($config);

		return DB::select('id', 'titulo', 'arquivo')
					->from(self::table())
	                ->limit(Pagination::$per_page)
	                ->offset(Pagination::$offset)
	                ->as_object()
	                ->execute()
	                ->as_array();
	}
}