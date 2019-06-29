<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreatePaymentsTable.
 */
class CreatePaymentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('campanha_id')->nullable();
            $table->string('code')->nullable();
            $table->string('status')->nullable();
            $table->string('payment_link')->nullable();
            $table->string('payment_method')->nullable();
            $table->decimal('item_amount',12,2)->nullable();

            //Dados do cliente
            $table->string('sender_name')->nullable();
            $table->string('sender_phone')->nullable();
            $table->string('sender_email')->nullable();
            $table->string('sender_cpf')->nullable();

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
		Schema::drop('payments');
	}
}
