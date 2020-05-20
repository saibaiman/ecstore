<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnTwitterInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::table('users', function (Blueprint $table) {
			$table->string('nickname')->nullable();
			$table->string('access_token')->nullable();
			$table->string('access_token_secret')->nullable();
			$table->string('twitter_id')->nullable()->unique();
			$table->string('avatar')->nullable();

		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
