<?php namespace Adrian\Projects\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('adrian_projects_projects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 100);
            $table->string('customer', 100);
            $table->string('project_manager', 100);
            $table->integer('rate');
            $table->integer('budget');
        });
    }

    public function down()
    {
        Schema::dropIfExists('adrian_projects_projects');
    }
}
