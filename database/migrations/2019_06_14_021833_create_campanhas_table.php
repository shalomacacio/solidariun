<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCampanhasTable.
 */
class CreateCampanhasTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('campanhas', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title')->unique()->notNul();
			$table->longText('description')->notNul();
            $table->decimal('goal', 12,2)->notNul();
            $table->decimal('reached',12,2)->nullable();
            $table->dateTime('dt_final')->notNul();
            $table->string('img')->notNul();
            $table->string('movie')->notNul();
            $table->tinyInteger('flg_active')->default(1);
            $table->integer('category_id')->notNul();
            $table->integer('user_id')->notNul();
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('campanhas');
	}
}
