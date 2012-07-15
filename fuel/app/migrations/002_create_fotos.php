<?php

namespace Fuel\Migrations;

class Create_fotos
{
	public function up()
	{
		\DBUtil::create_table('fotos', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true),
			'titulo' => array('constraint' => 255, 'type' => 'varchar'),
			'arquivo' => array('constraint' => 255, 'type' => 'varchar'),
			'created_at' => array('constraint' => 11, 'type' => 'int'),
			'updated_at' => array('constraint' => 11, 'type' => 'int'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('fotos');
	}
}