<?php namespace Adrian\Project\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('adrian_project_projects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 100);
            $table->string('customer', 100);
            $table->string('project_manager', 100);
            $table->integer('rate');
            $table->integer('budget');
            $table->boolean('complete');
        });
    }

    public function down()
    {
        Schema::dropIfExists('adrian_project_projects');
    }
}
