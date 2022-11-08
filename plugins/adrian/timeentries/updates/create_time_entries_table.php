<?php namespace Adrian\TimeEntries\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTimeEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('adrian_timeentries_time_entries', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->integer('task_id')->unsigned();
            $table->foreign('task_id', 'task_foreign')->references('id')->on('adrian_tasks_tasks');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
        });
    }

    public function down()
    {
        Schema::dropIfExists('adrian_timeentries_time_entries');
    }
}
