<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryAdressInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('delivery_adress_info', function (Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->unsignedInteger('user_id');
			$table->integer('zipcode')->unsinged();
			$table->string('prefecture');
			$table->string('city');
			$table->string('detail_adress');
			$table->string('tel', 20)->unique();
			$table->softDeletes();
			$table->timestamps();
			$table->foreign('user_id')->references('user_id')->on('carts')->onDelete('cascade');
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down()
	{
		Schema::dropIfExists('delivery_adress_info');
	}
}
