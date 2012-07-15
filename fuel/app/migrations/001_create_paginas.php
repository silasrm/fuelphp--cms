<?php

namespace Fuel\Migrations;

class Create_paginas
{
	public function up()
	{
		\DBUtil::create_table('paginas', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'titulo' => array('constraint' => 255, 'type' => 'varchar'),
			'texto' => array('type' => 'text'),
			'no_menu' => array('constraint' => 1, 'type' => 'tinyint', 'default' => 0),
			'e_home' => array('constraint' => 1, 'type' => 'tinyint', 'default' => 0),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('paginas');
	}
}