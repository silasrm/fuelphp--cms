<?php
use Orm\Model;

class Model_Pagina extends Model
{
	protected static $_properties = array(
		'id',
		'titulo',
		'texto',
		'no_menu',
		'e_home',
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
		$val->add_field('texto', 'Texto', 'required');
		$val->add_field('no_menu', 'Está no menu?', 'required');
		$val->add_field('e_home', 'É home?', 'required');

		return $val;
	}

	public static function paginacao()
	{
		$config = array(
			'pagination_url' => Uri::base(false) . 'admin/pagina/index',
			'total_items' => self::count(),
		);

		Pagination::set_config($config);

		return DB::select('id', 'titulo', 'no_menu', 'e_home')
					->from(self::table())
	                ->limit(Pagination::$per_page)
	                ->offset(Pagination::$offset)
	                ->as_object()
	                ->execute()
	                ->as_array();
	}

	public static function menu()
	{
		return DB::select('id', 'titulo', 'e_home')
					->from(self::table())
					->and_where('no_menu', '=', 1)
					->order_by('e_home', 'desc')
	                ->as_object()
	                ->execute()
	                ->as_array();
	}

	public function save($cascade = null, $use_transaction = false)
	{
		// Se a página for a Home
		if( $this->e_home )
		{
			Cache::delete('home_titulo');
			Cache::delete('home');
			Cache::delete('home_id');
			// Destitui a Home atual
			DB::update(self::table())->value('e_home', 0)->and_where('e_home', '=', 1)->execute();
		}

		return parent::save($cascade, $use_transaction);
	}
}