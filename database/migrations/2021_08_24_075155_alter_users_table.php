<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('users', function (Blueprint $table) {
			$table->string('oauth_id')->after('remember_token')->unique()->comment('Oauth id');
			$table->text('oauth_token')->after('oauth_id')->comment('Oauth токен');
			$table->text('oauth_refresh_token')->after('oauth_token')->comment('Oauth восстановление');
			$table->integer('oauth_expires_in')->after('oauth_refresh_token')->nullable()->comment('Oauth истекает через');
			$table->string('password')->nullable()->change();
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
			$table->dropColumn('oauth_id');
			$table->dropColumn('oauth_token');
			$table->dropColumn('oauth_refresh_token');
			$table->dropColumn('oauth_expires_in');
			$table->string('password')->change();
		});
    }
}
