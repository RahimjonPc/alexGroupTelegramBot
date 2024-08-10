<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name')->nullable();
            $table->bigInteger('telegram_id')->nullable();
            $table->string('username')->nullable();
            $table->string('language')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('registered')->default(0);
            $table->string('actions')->nullable();
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
            $table->dropColumn('first_name');
            $table->dropColumn('telegram_id');
            $table->dropColumn('username');
            $table->dropColumn('language');
            $table->dropColumn('phone');
            $table->dropColumn('registered');
            $table->dropColumn('actions');
        });
    }
};
