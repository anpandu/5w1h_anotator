<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5w1hsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('5w1hs', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('article_id')->unsigned();
			$table->string('what');
			$table->string('who');
			$table->string('where');
			$table->string('when');
			$table->string('why');
			$table->string('how');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('article_id')->references('id')->on('articles');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('5w1hs', function($table) {
			$table->dropForeign('5w1hs_user_id_foreign');
			$table->dropForeign('5w1hs_article_id_foreign');
		});
    	Schema::drop('5w1hs');
	}

}
