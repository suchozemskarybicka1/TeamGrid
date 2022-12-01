<?php namespace Adrian\Task\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('adrian_task_tasks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id', 'project_foreign')->references('id')->on('adrian_projects_projects');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id', 'user_foreign')->references('id')->on('users');
            $table->string('name', 100);
            $table->string('assignee', 100);
            $table->time('total_time');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_completed')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('adrian_task_tasks');
    }
}