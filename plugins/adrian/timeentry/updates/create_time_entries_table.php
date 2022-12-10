<?php namespace Adrian\TimeEntry\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTimeEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('adrian_timeentry_time_entries', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->integer('task_id');
            $table->integer('user_id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('total_time');
        });
    }

    public function down()
    {
        Schema::dropIfExists('adrian_timeentry_time_entries');
    }
}
