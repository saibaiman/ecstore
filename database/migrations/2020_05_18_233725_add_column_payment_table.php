<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnPaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment', function (Blueprint $table) {
			$table->integer('zipcode')->unsinged()->after('source');
			$table->string('prefecture')->after('zipcode');
			$table->string('city')->after('prefecture');
			$table->string('detail_address')->after('city');
			$table->string('tel', 20)->unique()->after('detail_address');
			$table->integer('delively_situation')->default(0)->after('tel');

		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment', function (Blueprint $table) {
            //
        });
    }
}
