<?php

class m160111_150953_create_allowed_listid extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable("tbl_list_id",array(
				"id"=>"pk",
				"list_id_label"=>"string",
				"list_id_value"=>"string",
			));
		$this->createTable("assigned_allowed_list_id",array(
				"id"=>"pk",
				"list_id"=>"integer",
				"user_id"=>"integer",
			));
		$this->addForeignKey("list_id_fk", "assigned_allowed_list_id", "list_id", "tbl_list_id", "id", "CASCADE", "CASCADE");
		$this->addForeignKey("user_fk", "assigned_allowed_list_id", "user_id", "users", "id", "CASCADE", "CASCADE");
	}

	public function safeDown()
	{
		$this->dropForeignKey("list_id_fk", "assigned_allowed_list_id");
		$this->dropForeignKey("user_fk", "assigned_allowed_list_id");
		$this->dropTable("assigned_allowed_list_id");
		$this->dropTable("tbl_list_id");
	}
}