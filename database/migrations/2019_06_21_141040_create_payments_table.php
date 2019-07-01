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
            $table->integer('campanha_id')->nullable();
            $table->string('code')->nullable();
            $table->integer('status')->nullable();
            $table->string('payment_link')->nullable();
            $table->string('payment_method')->nullable();
            $table->decimal('item_amount',12,2)->nullable();

            //Dados do cliente
            $table->string('sender_name')->nullable();
            $table->string('sender_phone')->nullable();
            $table->string('sender_email')->nullable();
            $table->string('sender_cpf')->nullable();
            $table->string('sender_hash')->nullable();
            $table->string('creditcard_token')->nullable();

            // Endereço
            $table->date('creditcard_holderbirthdate')->nullable();
            $table->string('shippigaddress_street')->nullable();
            $table->string('shippigaddress_number')->nullable();
            $table->string('shippigaddress_district')->nullable();
            $table->string('shippigaddress_postalcode')->nullable();
            $table->string('shippigaddress_city')->nullable();
            $table->string('shippigaddress_state')->nullable();

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
