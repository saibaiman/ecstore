<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('carts', function (Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('user_id');
			$table->unsignedInteger('order_id')->nullable();
			$table->unsignedInteger('item_id');
			$table->integer('complete')->default(0);
			$table->integer('qty');
			$table->integer('price');
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
	public function down()
	{
		Schema::dropIfExists('carts');
	}
}
