<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('payment', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('customer_id');
			$table->string('stripe_id');
			$table->integer('amount');
			$table->string('source');
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
		Schema::dropIfExists('payment');
	}
}
