<?php namespace Adrian\Tasks\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('adrian_tasks_tasks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id', 'project_foreign')->references('id')->on('adrian_projects_projects');
            $table->string('name', 100);
            $table->string('assignee', 100);
            $table->integer('tracked time');
            $table->date('start date');
            $table->date('end date');
        });
    }

    public function down()
    {
        Schema::dropIfExists('adrian_tasks_tasks');
    }
}
