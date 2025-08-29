<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBabakToTimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tims', function (Blueprint $table) {
            $table->integer('babak')->default(1)->after('submissionid');
        });
    }

    public function down()
    {
        Schema::table('tims', function (Blueprint $table) {
            $table->dropColumn('babak');
        });
    }
}
