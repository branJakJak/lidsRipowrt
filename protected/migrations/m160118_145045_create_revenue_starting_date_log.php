<?php

class m160118_145045_create_revenue_starting_date_log extends CDbMigration
{
	public function safeUp()
	{
		$this->createTable("tbl_starting_date_revenue",array(
				"id"=>"pk",
				"revert_date"=>"datetime",
				"user_id"=>"integer",
				"date_inserted"=>"datetime",
			));
		/*add foreign key*/
		$this->addForeignKey("starting_date_revenue_user_fk", "tbl_starting_date_revenue", "user_id", "users", "id", "CASCADE", "CASCADE");
	}
	public function safeDown()
	{
		$this->dropForeignKey("user_fk", "tbl_starting_date_revenue");
		$this->dropTable("tbl_starting_date_revenue");
	}
}