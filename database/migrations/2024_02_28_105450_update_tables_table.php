<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTablesTable extends Migration
{
    public function up()
    {
        Schema::table('tables', function (Blueprint $table) {
            $table->string('customer_name')->nullable();
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->text('description')->nullable();
        });
    }

    public function down()
    {
        Schema::table('tables', function (Blueprint $table) {
            $table->dropColumn('customer_name');
            $table->dropColumn('start_time');
            $table->dropColumn('end_time');
            $table->dropColumn('description');
        });
    }
}
