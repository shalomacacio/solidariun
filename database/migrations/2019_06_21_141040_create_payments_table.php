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

            //Dados do cliente
            $table->string('senderName')->nullable();
            $table->string('senderPhone')->nullable();
            $table->string('senderEmail')->nullable();
            $table->string('senderHash')->nullable();
            $table->string('senderCPF')->nullable();
            $table->string('photo')->nullable();

            //Dados do cartão
            $table->string('creditCardHolderName')->nullable();
            $table->string('creditCardHolderPhone')->nullable();
            $table->string('creditCardHolderCPF')->nullable();
            $table->string('creditCardHolderBirthDate')->nullable();

            //Endereco
            $table->string('shippingAddressStreet')->nullable();
            $table->string('shippingAddressNumber')->nullable();
            $table->string('shippingAddressDistrict')->nullable();
            $table->string('shippingAddressPostalCode')->nullable();
            $table->string('shippingAddressCity')->nullable();
            $table->string('shippingAddressState')->nullable();

            //Item
            $table->string('itemId')->nullable(); //campanha_id
            $table->string('itemDescription')->nullable();//campanha_title
            $table->string('itemAmount')->nullable();
            $table->string('itemQuantity')->nullable();

            //Dados do pagamento
            $table->string('paymentMethod')->nullable();
            $table->string('creditCardToken')->nullable();
            $table->string('installmentQuantity')->nullable();
            $table->string('installmentValue')->nullable();

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
