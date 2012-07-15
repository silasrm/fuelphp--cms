<?php

namespace Fuel\Migrations;

use Auth;

class Create_users
{
	public function up()
	{
		\DBUtil::create_table('users', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'username' => array('constraint' => 255, 'type' => 'varchar'),
			'password' => array('constraint' => 255, 'type' => 'varchar'),
			'group' => array('constraint' => 11, 'type' => 'int'),
			'email' => array('constraint' => 255, 'type' => 'varchar'),
			'last_login' => array('constraint' => 255, 'type' => 'varchar'),
			'login_hash' => array('constraint' => 255, 'type' => 'varchar'),
			'profile_fields' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));

		// Cria o usuário admin padrão
		Auth::instance()->create_user('admin', 'copernico', 'demo@cms.com', 100);
		// Cria usuario mamao
		Auth::instance()->create_user('demo', 'demo', 'demo2@cms.com', 1);
	}

	public function down()
	{
		\DBUtil::drop_table('users');
	}
}